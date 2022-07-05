<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Comment;
use App\Models\EventActivity;
use App\Models\Activity;
use App\Models\Donation;
use App\Models\Image;
use App\Models\Project;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home() {
        $sliders = Slider::where('status', '1')->orderBy('id', 'DESC')->take(3)->get();
        $images = Image::orderBy('id', 'DESC')
            ->where('status', '1')->take(4)->get();
        $blogs = Blog::where('status', '1')
            ->orderBy('dateUpload', 'DESC')
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();
        foreach ($blogs as $value) {
            $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
            $value->dateUpload = $value->dateUpload->format('d-m-Y');
        }
        $projects = Project::where('status', '1')
            ->orderBy('dateCreate', 'DESC')
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();
        foreach ($projects as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
        }
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $events = Event::where([
                ['status', '1'],
                // ['date', '>=', $now]
            ])
            ->orderBy('date', 'ASC')
            ->orderBy('id', 'DESC')
            ->take(3)
            ->get();
        foreach ($events as $value) {
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
        }
        $lastestDonation = Donation::orderBy('id', 'DESC')->take(3)->get();
        foreach ($lastestDonation as $value) {
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
            $value->amout = number_format($value->amout, 0,",",".");
        }
        $allProject = Project::all();
        return view('components.front-end.home')->with([
                'sliders' => $sliders,
                'images' => $images,
                'blogs' => $blogs,
                'projects' => $projects,
                'events' => $events,
                'lastestDonation' => $lastestDonation,
                'allProject' => $allProject
            ]);
    }

    public function about() {
        return view('components.front-end.about');
    }

    public function image() {
        $images = Image::where('status', '1')->get();
        return view('components.front-end.image.all')->with(['images' => $images]);
    }

    public function uploadImage() {
        $user = Session::get('user');
        if(isset($user)) {
            return view('components.front-end.image.upload');
        } else {
            return Redirect::to('join');
        }
    }

    public function postImage(Request $request) {
        $user = Session::get("user");
        $file=$request->file('imageSource');
        $file->move('back-end/assets/images/uploaded/images', $file->getClientOriginalName());
        $data = [];
        $data['imageSource'] = $file->getClientOriginalName();
        if ($user->utype==="Admin") {
            $data['status'] = 1;
        }
        if ($user->utype==="System User") {
            $role = DB::table('roles')->where('role', 'System User')->first();
            if($role->addImage===1) {
                $data['status'] = 0;
            }
            if($role->addImage===2) {
                $data['status'] = 1;
            }
        }
        if (isset($user)) {
            $data['createrId'] = $user->id;
        }
        $data['dateUpload'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        Image::insert($data);
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã thêm một ảnh vào website";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công','Hoàn tất thêm ảnh, chờ duyệt ảnh nhé! ^^');
        return redirect()->back();
    }

    public function blog() {
        $blogs = Blog::where('status', '1')->get();
        foreach ($blogs as $value) {
            $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
            $value->dateUpload = $value->dateUpload->format('d-m-Y');
        }
        return view('components.front-end.blog.all')->with(['blogs' => $blogs]);
    }

    public function viewBlog($id) {
        $data = Blog::find($id);
        if(!isset($data)) {
            return exit;
        } else {
            if ($data->status==0) {
                return exit;
            } else if($data->status==1) {
                $data->dateUpload = \DateTime::createFromFormat('Y-m-d', $data->dateUpload);
                $data->dateUpload = $data->dateUpload->format('d-m-Y');
                $recent = Blog::where('id',"<>", $id)->orderBy('id', 'desc')->take(5)->get();
                foreach ($recent as $value) {
                    $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                    $value->dateUpload = $value->dateUpload->format('d-m-Y');
                }
                return view('components.front-end.blog.view')->with(['data' => $data, 'recent' => $recent]);
            }
        }
    }

    public function allComment(Request $request) {
        $allComment = Comment::where('blogId', $request->id)->orderBy('id', 'DESC')->get();
        foreach ($allComment as $value) {
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
        }
        $html = view('components.front-end.blog.list-comment')->with(['allComment' => $allComment])->render();
        return response()->json($html);
    }

    public function sendComment(Request $request) {
        $user = Session::get('user');
        DB::table('comments')->insert([
            'userId' => $user->id,
            'blogId' => $request->id,
            'comment' => $request->comment,
            'date' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),
            'time' => Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s'),
        ]);
    }

    public function upBlog() {
        $user = Session::get('user');
        if (!isset($user)) {
            return Redirect::to('/join');
        } else {
            return view('components.front-end.blog.up');
        }
    }

    public function postBlog(Request $request) {
        if($request->contentPost=="") {
            alert()->error('Lỗi','Không được để trống phần nội dung');
            return redirect()->back();
        } else {
            $data = [];
            $data['title'] = $request->title;
            $data['introduction'] = $request->introduction;
            $data['content'] = $request->contentPost;
            $file = $request->file('imageSource');
            $file->move('back-end/assets/images/uploaded/blogs', $file->getClientOriginalName());
            $data['imageSource'] = $file->getClientOriginalName();
            $user = Session::get('user');
            if (isset($user)) {
                $data['createrId'] = $user->id;
            }
            if ($user->utype==="Admin") {
                $data['status'] = 1;
            }
            if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', 'System User')->first();
                if($role->addBlog===1) {
                    $data['status'] = 0;
                }
                if($role->addBlog===2) {
                    $data['status'] = 1;
                }
            }
            $data['dateUpload'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('blogs')->insert($data);
            $user = Session::get('user');
            $activity = [];
            $activity['userID'] = $user->id;
            $activity['descActivity'] = "đã thêm một bài viết vào website";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            alert()->success('Thành công','Thêm bài viết thành công rồi. Chờ duyệt nhé ^^');
            return redirect()->back();
        }
    }

    public function searchBlog(Request $request) {
        $blogs = Blog::where([
            ['title', 'LIKE', '%'.$request->keyword.'%'],
            ['status', '1']
        ])->get();
        foreach ($blogs as $value) {
            $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
            $value->dateUpload = $value->dateUpload->format('d-m-Y');
        }
        $html = view('ajax-search.front-end.blog')->with(['blogs' => $blogs])->render();
        return response()->json($html);
    }

    public function project() {
        $projects = Project::where('status', '1')->get();
        foreach ($projects as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
        }
        return view('components.front-end.project.all')->with(['projects' => $projects]);
    }

    public function viewProject($id) {
        $data = Project::find($id);
        if(!isset($data)) {
            return exit;
        } else {
            if ($data->status==0) {
                return exit;
            } else if($data->status==1) {
                $recent = Project::where('id',"<>", $id)->orderBy('id', 'desc')->take(5)->get();
                foreach ($recent as $value) {
                    $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
                    $value->dateCreate = $value->dateCreate->format('d-m-Y');
                }
                return view('components.front-end.project.view')->with(['data' => $data, 'recent' => $recent]);
            }
        }
    }
    public function searchProject(Request $request) {
        $projects = Project::where([
            ['name', 'LIKE', '%'.$request->keyword.'%'],
            ['status', '1']
        ])->get();
        foreach ($projects as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
        }
        $html = view('ajax-search.front-end.project')->with(['projects' => $projects])->render();
        return response()->json($html);
    }

    public function donate() {
        $user = Session::get('user');
        if (!isset($user)) {
            return Redirect::to('/join');
        } else {
            $projects = Project::where('status', '1')->get();
            foreach ($projects as $value) {
                $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
                $value->dateCreate = $value->dateCreate->format('d-m-Y');
            }
            return view('components.front-end.donate.index')->with(['projects' => $projects]);
        }
    }

    public function donateWebsite(Request $request) {
        $data = $request->all();
        $user = Session::get('user');
        $time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:m:s d-m-Y');
        $data['timeCheckout'] = $time;
        return view('components.front-end.donate.create-payment')->with(['data' => $data, 'user' => $user]);
    }

    public function donateProject($id) {
        $user = Session::get('user');
        if (!isset($user)) {
            return Redirect::to('/join');
        } else {
            $project = Project::where('id', $id)->first();
            $project->dateCreate = \DateTime::createFromFormat('Y-m-d', $project->dateCreate);
            $project->dateCreate = $project->dateCreate->format('d-m-Y');
            return view('components.front-end.donate.project')->with(['project' => $project]);
        }
    }

    public function createPaymentProject(Request $request, $id) {
        $data = $request->all();
        $user = Session::get('user');
        $time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:m:s d-m-Y');
        $data['timeCheckout'] = $time;
        $project = Project::where('id', $id)->first();
        $project->dateCreate = \DateTime::createFromFormat('Y-m-d', $project->dateCreate);
        $project->dateCreate = $project->dateCreate->format('d-m-Y');
        return view('components.front-end.donate.create-payment-project')->with(['data' => $data, 'user' => $user, 'project' => $project]);
    }

    public function confirmPayment(Request $request) {
        $user = Session::get('user');
        if (!isset($user)) {
            return exit();
        } else {
            $data = [];
            $data['useId'] = $user->id;
            $data['typeCheckout'] = $request->bank_code;
            $data['typeProduct'] = $request->ordertype;
            $data['amout'] = (double) $request->Amount;
            $data['desc'] = $request->OrderDescription;
            $data['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $data['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            Donation::insert($data);
            $activity = array(
                'userID' => $user->id,
                'descActivity' => 'đã donate '.$request->Amount. ' cho quỹ phát triển Website',
                'date' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),
                'time' => Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s'),
            );
            DB::table('activities')->insert($activity);
            alert()->success('Thành công', 'Đã ủng hộ vào trang web, tiếp tục đồng hành cùng Save Our Planet nhé !');
            return Redirect::to('donate');
        }
    }

    public function confirmPaymentProject(Request $request, $id) {
        $user = Session::get('user');
        if (!isset($user)) {
            return exit();
        } else {
            $data = [];
            $data['useId'] = $user->id;
            $data['projectId'] = $id;
            $data['typeCheckout'] = $request->bank_code;
            $data['typeProduct'] = $request->ordertype;
            $data['amout'] = (double) $request->Amount;
            $data['desc'] = $request->OrderDescription;
            $data['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $data['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            // dd($data);
            Donation::insert($data);
            $project = Project::where('id', $id)->first();
            $total = $project->now + $data['amout'];
            echo $total;
            Project::where('id', $id)->update(['now' => $total]);
            $activity = array(
                'userID' => $user->id,
                'descActivity' => 'đã donate '.$request->Amount. ' cho dự án '.$project->name,
                'date' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),
                'time' => Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s'),
            );
            DB::table('activities')->insert($activity);
            alert()->success('Thành công', 'Đã ủng hộ cho '.$project->name.', tiếp tục đồng hành cùng Save Our Planet nhé !');
            return Redirect::to('donate');
        }
    }

    public function event() {
        $events = Event::all();
        foreach ($events as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
        }
        return view('components.front-end.event.all')->with(['events' => $events]);
    }

    public function viewEvent($id) {
        $data = Event::where('id', $id)->first();
        $data->dateCreate = \DateTime::createFromFormat('Y-m-d', $data->dateCreate);
        $data->dateCreate = $data->dateCreate->format('d-m-Y');
        $data->date = \DateTime::createFromFormat('Y-m-d', $data->date);
        $data->date = $data->date->format('d-m-Y');
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->format('Y:m:d');
        $upComing = Event::where('id',"<>", $id)->where('date', '>=', $dateNow)->orderBy('date', 'asc')->take(3)->get();
        $pass = Event::where('id',"<>", $id)->where('date', '<', $dateNow)->orderBy('date', 'asc')->take(3)->get();
        $user = Session::get('user');
        $check = 0;
        if (isset($user)) {
            $join = EventActivity::where([
                ['userId', $user->id],
                ['status', '0'],
                ['eventId', $id]
            ])->count();
            $quit = EventActivity::where([
                ['userId', $user->id],
                ['status', '1'],
                ['eventId', $id]
            ])->count();
            if ($join!=0 || $quit!=0) {
                $check = $join-$quit;
            }
        }
        foreach ($upComing as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
        }
        foreach ($pass as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
        }
        return view('components.front-end.event.view')->with(['data' => $data, 'upComing' => $upComing, 'pass' => $pass, 'check' => $check]);
    }

    public function searchEvent(Request $request) {
        $events = Event::where([
            ['name', 'LIKE', '%'.$request->keyword.'%'],
            ['status', '1']
        ])->get();
        foreach ($events as $value) {
            $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
            $value->dateCreate = $value->dateCreate->format('d-m-Y');
        }
        $html = view('ajax-search.front-end.event')->with(['events' => $events])->render();
        return response()->json($html);
    }

    public function regisNotification(Request $request) {
        $check = DB::table('regis_notifications')->where('email', $request->email)->count();
        if ($check==0) {
            DB::table('regis_notifications')->insert(['email' => $request->email]);
            alert()->success('Thành công','Hoàn tất đăng ký nhận thông báo!');
            return \redirect()->back();
        } else {
            alert()->error('Thất bại','Email đã được đăng ký!');
            return \redirect()->back();
        }
    }

    public function contact() {
        return view('components.front-end.contact');
    }

    public function postMessage(Request $request) {
        $data = [];
        $data['fullname'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        DB::table('messages')->insert($data);
        alert()->success('Thành công','Đã gửi tin nhắn đến quản trị viên!');
        return redirect()->back();
    }

    public function joinEvent($id) {
        $user = Session::get('user');
        if (!isset($user)) {
            return Redirect::to('join');
        } else {
            $join = EventActivity::where([
                ['userId', $user->id],
                ['status', '0'],
                ['eventId', $id]
            ])->count();
            $quit = EventActivity::where([
                ['userId', $user->id],
                ['status', '1'],
                ['eventId', $id]
            ])->count();
            if (isset($join) || isset($quit)) {
                $check = $join-$quit;
            }
            if ($check>0) {
                exit();
            } else if ($check == 0) {
                $date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                $time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                DB::table('event_activities')
                    ->insert(['userId' => $user->id,
                        'eventId' => $id,
                        'status' => '0',
                        'time' => $time,
                        'date' => $date
                    ]);
                $event = DB::table('events')->where('id', $id)->first();
                $event->noMembers = $event->noMembers+1;
                DB::table('events')->where('id', $id)->update(['noMembers' => $event->noMembers]);
                alert()->success('Thành công','Bạn đã đăng ký tham gia sự kiện này!');
                return \redirect()->back();
            }
        }
    }

    public function quitEvent($id) {
        $user = Session::get('user');
        if (!isset($user)) {
            exit();
        } else {
            $join = EventActivity::where([
                ['userId', $user->id],
                ['status', '0'],
                ['eventId', $id]
            ])->count();
            $quit = EventActivity::where([
                ['userId', $user->id],
                ['status', '1'],
                ['eventId', $id]
            ])->count();
            if (isset($join) || isset($quit)) {
                $check = $join-$quit;
            }
            if ($check>0) {
                $date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                $time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                DB::table('event_activities')
                    ->insert(['userId' => $user->id,
                        'eventId' => $id,
                        'status' => '1',
                        'time' => $time,
                        'date' => $date
                    ]);
                $event = DB::table('events')->where('id', $id)->first();
                $event->noMembers = $event->noMembers-1;
                DB::table('events')->where('id', $id)->update(['noMembers' => $event->noMembers]);
                alert()->info('Thành công','Bạn đã hủy đăng ký tham gia sự kiện này!');
                return \redirect()->back();
            } else if ($check == 0) {
                exit();
            }
        }
    }

    public function profile() {
        $user = Session::get('user');
        if (!isset($user)) {
            return "";
        } else {
            $userInfo = User::where('id', $user->id)->first();
            $events = Event::where('status', 1)->get();
            $dataEvent = [];
            foreach ($events as $event) {
                $join = EventActivity::where([
                    ['userId', $user->id],
                    ['eventId', $event->id],
                    ['status', 0]
                ])->get()->count();
                $quit = EventActivity::where([
                    ['userId', $user->id],
                    ['eventId', $event->id],
                    ['status', 1]
                ])->get()->count();
                if (isset($join) || isset($quit)) {
                    $check = $join-$quit;
                }
                if ($check>0) {
                    array_push($dataEvent, $event);
                }
            }
            foreach($dataEvent as $value) {
                $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
                $value->dateCreate = $value->dateCreate->format('d-m-Y');
                $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
                $value->date = $value->date->format('d-m-Y');
            }
            $dataImage = Image::where('createrId', $user->id)->take(4)->get();
            $dataBlog = Blog::where('createrId', $user->id)->take(3)->get();
            foreach ($dataBlog as $value) {
                $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                $value->dateUpload = $value->dateUpload->format('d-m-Y');
            }
            $activities = Activity::orderBy('id', 'DESC')->where('userID', $user->id)->take(15)->get();
            foreach($activities as $value) {
                $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
                $value->date = $value->date->format('d-m-Y');
            }
            return view('components.front-end.profile.profile')->with(['userInfo' => $userInfo, 'eventJoined' => $dataEvent, 'images' => $dataImage
                , 'blogs' => $dataBlog, 'activities' => $activities]);
        }
    }

    public function saveProfile(Request $request) {
        $data = [];
        $data['fullname'] = $request->fullname;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['sex'] = $request->sex;
        $user = Session::get('user');
        User::where('id', $user->id)->update($data);
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã thay đổi thông tin cá nhân";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công','Cập nhật thông tin thành công');
        Session::put('user', NULL);
        Session::put('user', User::where('id', $user->id)->first());
        return redirect()->back();
    }

    public function changePassword(Request $request) {
        $sessionUser = Session::get('user');
        $user = User::where('id', $sessionUser->id)->first();
        $err = [];
        if($user->password !== md5($request->oldPassword)) {
            array_push($err, 'Mật khẩu cũ không khớp!');
        }
        if(!$this->passwordValid($request->newPassword)) {
            array_push($err, 'Mật khẩu mới không đúng định dạng!');
        }
        if(!$this->passwordValid($request->cnewPassword)) {
            array_push($err, 'Xác nhận mật khẩu không đúng định dạng!');
        }
        if($request->newPassword !== $request->cnewPassword) {
            array_push($err, 'Mật khẩu mới không khớp!');
        }
        if(count($err)==0) {
            User::where('id', $sessionUser->id)->update(['password'=>md5($request->newPassword)]);
            $activity = [];
            $activity['userID'] = $sessionUser->id;
            $activity['descActivity'] = "đã cập nhật mật khẩu";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            alert()->success('Thành công','Đã cập nhật mật khẩu mới!');
            return redirect()->back();
        } else {
            $modals = [];
            foreach ($err as $key => $value) {
                array_push($modals, $value);
            }
            alert()->error($modals);
            return redirect()->back();
        }
    }


    public function changeAvatar(Request $request) {
        $userInfo = Session::get('user');
        $file = $request->file('avatar');
        $link = 'back-end/assets/images/uploaded/avatar/';
        $new_image_name = 'UIMG'.date('YmdHis').uniqid().'.jpg';
        $move = $file->move(public_path($link), $new_image_name);
        if (!$move) {
            return response()->json(['status' => 0, 'msg' => 'Có lỗi gì đó đã xảy ra.']);
        } else {
            User::where('id', $userInfo->id)->update(['avatar' => $new_image_name]);
            $id = $userInfo->id;
            Session::put('user', null);
            Session::put('user', User::where('id', $id)->first());
            $activity = [];
            $activity['userID'] = $userInfo->id;
            $activity['descActivity'] = "đã thay đổi ảnh đại diện";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            return response()->json(['status' => 1, 'msg' => 'Ảnh đã được cập nhật.']);
        }
    }

    public function myEvent() {
        $user = Session::get('user');
        if (isset($user)) {
            $userInfo = User::where('id', $user->id)->first();
            $events = DB::table('events')->where('status', 1)->get();
            $dataEvent = [];
            foreach ($events as $event) {
                $join = EventActivity::where([
                    ['userId', $user->id],
                    ['eventId', $event->id],
                    ['status', 0]
                ])->get()->count();
                $quit = EventActivity::where([
                    ['userId', $user->id],
                    ['eventId', $event->id],
                    ['status', 1]
                ])->get()->count();
                if (isset($join) || isset($quit)) {
                    $check = $join-$quit;
                }
                if ($check>0) {
                    array_push($dataEvent, $event);
                }
            }
            foreach($dataEvent as $value) {
                $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
                $value->dateCreate = $value->dateCreate->format('d-m-Y');
                $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
                $value->date = $value->date->format('d-m-Y');
            }
        return view('components.front-end.profile.event')->with(['events' => $dataEvent, 'userInfo' => $userInfo]);
        } else {
            return "";
        }
    }

    public function myBlog() {
        $user = Session::get('user');
        if (isset($user)) {
            $userInfo = User::where('id', $user->id)->first();
            $blogs = Blog::where('createrId', $userInfo->id)->get();
            foreach($blogs as $value) {
                $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                $value->dateUpload = $value->dateUpload->format('d-m-Y');
            }
        return view('components.front-end.profile.blog')->with(['blogs' => $blogs, 'userInfo' => $userInfo]);
        } else {
            return "";
        }
    }


    public function editMyBlog($id) {
        $userInfo = Session::get('user');
        if (isset($userInfo)) {
            $blog = DB::table('blogs')->where([
                ['id', $id],
                ['createrId', $userInfo->id]
            ])->first();
            if (isset($blog)) {
                return view('components.front-end.profile.edit-blog')->with([
                    'blog' => $blog,
                    'userInfo' => $userInfo
                ]);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    public function changeMyBlog(Request $request, $id) {
        $userInfo = Session::get('user');
        if (isset($userInfo)) {
            $blog = DB::table('blogs')->where([
                ['id', $id],
                ['createrId', $userInfo->id]
            ])->first();
            if (isset($blog)) {
                if($request->contentPost=='') {
                    alert()->error('Lỗi','Không được để trống nội dung!');

                    return redirect()->back();
                } else {
                    $data = [];
                    $data['title'] = $request->title;
                    $data['introduction'] = $request->introduction;
                    $data['content'] = $request->contentPost;
                    $file = $request->file('imageSource');
                    if (isset($file)) {
                        $data['imageSource'] = $file->getClientOriginalName();
                    }
                    Blog::where('id', $id)->update($data);
                    $activity = [];
                    $activity['userID'] = $userInfo->id;
                    $activity['descActivity'] = "đã sửa một bài viết";
                    $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                    $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                    DB::table('activities')->insert($activity);
                    alert()->success('Thành công','Sửa bài viết thành công!');
                    return Redirect::to('profile/my-blog');
                }
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    public function deleteMyBlog($id) {
        $userInfo = Session::get('user');
        if (isset($userInfo)) {
            $blog = DB::table('blogs')->where([
                ['id', $id],
                ['createrId', $userInfo->id]
            ])->first();
            if (isset($blog)) {
                DB::table('blogs')->where([
                    ['id', $id],
                    ['createrId', $userInfo->id]
                ])->delete();
                $activity = [];
                $activity['userID'] = $userInfo->id;
                $activity['descActivity'] = "đã xóa một bài viết";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công','Đã xóa bài viết!');
                return redirect()->back();
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    public function myImage() {
        $user = Session::get('user');
        if (isset($user)) {
            $userInfo = User::where('id', $user->id)->first();
            $images = Image::where('createrId', $user->id)->get();
            foreach($images as $value) {
                $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                $value->dateUpload = $value->dateUpload->format('d-m-Y');
            }
        return view('components.front-end.profile.image')->with(['images' => $images, 'userInfo' => $userInfo]);
        } else {
            return "";
        }
    }

    public function editMyImage($id) {
        $userInfo = Session::get('user');
        if (isset($userInfo)) {
            $image = Image::where([
                ['id', $id],
                ['createrId', $userInfo->id]
            ])->first();
            if (isset($image)) {
                return view('components.front-end.profile.edit-image')->with([
                    'image' => $image,
                    'userInfo' => $userInfo
                ]);
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    public function changeMyImage(Request $request, $id) {
        $userInfo = Session::get('user');
        if (isset($userInfo)) {
            $image = Image::where([
                ['id', $id],
                ['createrId', $userInfo->id]
            ])->first();
            if (isset($image)) {
                $file = $request->file('imageSource');
                $file->move('back-end/assets/images/uploaded/images', $file->getClientOriginalName());
                $image = Image::where('id', $id)->update(['imageSource' => $file->getClientOriginalName()]);
                $activity = [];
                $activity['userID'] = $userInfo->id;
                $activity['descActivity'] = "đã sửa một hình ảnh";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                    alert()->success('Thành công','Đã cập nhật hình ảnh mới!');
                return redirect()->back();
            } else {
                return "";
            }
        } else {
            return "";
        }
    }


    public function deleteMyImage($id) {
        $user = Session::get('user');
        if (isset($user)) {
            $image = Image::where('id', $id)
            ->where('createrId', $user->id)
            ->first();
            if (isset($image)) {
                Image::where('id', $id)->delete();
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã xóa một hình ảnh";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công','Đã xóa hình ảnh!');
                return redirect()->back();
            } else {
                return "";
            }
        } else {
            return "";
        }
    }


    public function passwordValid($string)
    {
        if (preg_match ("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/", $string)) {
            return true;
        } else {
            return false;
        }
    }
}