<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\EventActivity;
use App\Models\Activity;
use App\Models\Image;
use App\Models\Project;
use App\Models\RegisNotification;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HandleController;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function join() {
        session_start();
        $user = Session::get('user');
        if(isset($user)&&$user->utype==='Admin' || isset($user)&&$user->utype==="System User") {
            return Redirect::to('/admin/dashboard');
        } else if(isset($user) && $user->utype==="User") {
            return Redirect::to('/');
        } else {
            return view('sign');
        }
    }

    public function checkLogin(Request $request) {
        session_start();
        $checkExist = User::where(['email' => $request->email, 'password' => md5($request->password)])->count();
        if($checkExist>0) {
            $user = User::where(['email' => $request->email, 'password' => md5($request->password)])->first();
            Session::put('user', $user);
            $activity = [];
            $activity['userID'] = $user->id;
            $activity['descActivity'] = "đã đăng nhập vào hệ thống";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            if($user->utype==="User") {
                alert()->success('Chào mừng', "Bạn đã đăng nhập thành công");
                return Redirect::to('/');
            } else if ($user->utype==="Admin") {
                alert()->success('Chào mừng', "Bạn đã đăng nhập thành công");
                return Redirect::to('/admin/dashboard');
            } else {
                alert()->success('Chào mừng', "Bạn đã đăng nhập thành công");
                return Redirect::to('/admin/dashboard');
            }
        } else {
            alert()->error('Thất bại', 'Tài khoản hoặc mật khẩu không đúng');
            return Redirect::to('/join');
        }
    }

    public function checkRegister(Request $request) {
        session_start();
        $error = [];
        // Check biểu thức chính quy mật khẩu
        if (!$this->passwordValid($request->password)) {
            array_push($error, 'Mật khẩu bạn nhập chưa đúng định dạng');
        }
        // Check mật khẩu nhập lại có khớp?
        if($request->password != $request->cpassword) {
            array_push($error, 'Xác nhận mật khẩu không khớp');
        }
        // Kiểm tra tài khoản đã tồn tại chưa
        $checkExist = User::where('email', $request->email)->count();
        if($checkExist!=0) {
            array_push($error, 'Tài khoản đã tồn tại');
        }
        // Handle Form
        if(count($error)==0) {
            $data = [];
            $data['email'] = $request->email;
            $data['fullname'] = $request->fullname;
            $data['password'] = md5($request->password);
            $data['dateCreated'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            User::insert($data);
            alert()->success('Thành công', "Đăng ký tài khoản thành công");
            return Redirect::to('/join');
        } else {
            alert()->error($error);
            return Redirect::to('/join');
        }
    }

    public function logout() {
        session_start();
        $user = Session::get('user');
        Session::put('user', NULL);
        alert()->info('Thành công', "Đã đăng xuất");
        return Redirect::to('/join');
    }

    public function regisRecover() {
        session_start();
        $user = Session::get('user');
        if (!isset($user)) {
            return "";
        } else {
            if ($user->token=="") {
                $token = strtoupper(Str::random(6));
                User::where('email', $user->email)->update(['token' => $token]);
                alert()->success('Thành công', "Đã đăng ký bảo mật tài khoản");
                Session::put('user', User::where('email', $user->email)->first());
                return redirect()->back();
            } else {
                alert()->info('Thông báo', "Email đã đăng ký bảo mật");
                return redirect()->back();
            }
        }
    }

    public function forgotPassword() {
        session_start();
        $user = Session::get('user');
        if(isset($user)&&$user->utype==='Admin' || isset($user)&&$user->utype==="System User") {
            return Redirect::to('/admin/dashboard');
        } else if(isset($user) && $user->utype==="User") {
            return Redirect::to('/');
        } else {
            return view('forgot-password');
        }
    }

    public function checkToken(Request $request) {
        $email = $request->email;
        $user = User::where('email', $request->email)->first();
        if (!isset($user)) {
            alert()->error('Thất bại', "Không tồn tại email này trong hệ thống!");
            return redirect()->back();
        } else {
            if ($user->token == "") {
                alert()->error('Thất bại', "Email chưa đăng ký lấy lại mật khẩu!");
                return redirect()->back();
            } else {
                $title = "Yêu cầu lấy lại mật khẩu";
                $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
                $data = $email;
                $mailDetails = [];
                $mailDetails['title'] = $title;
                $mailDetails['link'] = url('/recover-password?email='.$data.'&token='. $user->token);
                $mailDetails['time'] = $now;
                Mail::send('components.back-end.mail.reset-password-mail', ['data' => $data, 'mailDetails' => $mailDetails], function ($message) use ($title, $data) {
                    $message->to($data)->subject($title);
                    $message->from($data, $title);
                });
                alert()->success('Thành công', "Đã gửi mail lấy lại mật khẩu, vui lòng check hộp thư điện tử!");
                return redirect()->back();
            }
        }
    }

    public function recoverPassword() {
        return view('recover-password');
    }

    public function updateNewPassword(Request $request) {
        $error = [];
        // Check biểu thức chính quy mật khẩu
        if (!$this->passwordValid($request->newPassword)) {
            array_push($error, 'Mật khẩu bạn nhập chưa đúng định dạng');
        }
        // Check mật khẩu nhập lại có khớp?
        if($request->newPassword != $request->cnewPassword) {
            array_push($error, 'Xác nhận mật khẩu không khớp');
        }
        // Handle Form
        if(count($error)==0) {
            $user =  User::where('email', $request->email)->where('token', $request->token)->first();
            if (!isset($user)) {
                alert()->error("Lỗi", "Đã xảy ra lỗi trong quá trình thực hiện.");
                return redirect()->back();
            } else {
                $newToken = strtoupper(Str::random(6));
                $data = [];
                $data['token'] = $newToken;
                $data['password'] = md5($request->newPassword);
                User::where('email', $request->email)->where('token', $request->token)->update($data);
                alert()->success("Thành công", "Đã cập nhật lại mật khẩu, đăng nhập ngay.");
                return Redirect::to('join');
            }
        } else {
            alert()->error($error);
            return redirect()->back();
        }
    }

    public function dashboard() {
        $users = User::all();
        foreach ($users as $value) {
            $value->dateCreated = \DateTime::createFromFormat('Y-m-d', $value->dateCreated);
            $value->dateCreated = $value->dateCreated->format('d-m-Y');
        }
        $blogs = Blog::where('status', '1')->get();
        $totalViews = 0;
        foreach ($blogs as $value) {
            $totalViews = $totalViews + $value->viewCount;
        }
        $projects = Project::where('status', '1')->get();
        $events = Event::where('status', '1')->get();
        $total = 0;
        foreach ($projects as $value) {
            $total = $total + $value->now;
        }
        $total = number_format($total, 0,",",".");
        $totalBrowses = Blog::where('status', 0)->count() + Project::where('status', 0)->count() + Event::where('status', 0)->count() + Image::where('status', 0)->count() + Slider::where('status', 0)->count();
        $eventActivities = EventActivity::orderBy('date', 'DESC')->orderBy('time', 'DESC')->take(15)->get();
        foreach ($eventActivities as $value) {
            $value->date = \DateTime::createFromFormat('Y-m-d', $value->date);
            $value->date = $value->date->format('d-m-Y');
        }
        return view('components.back-end.dashboard')
            ->with(['users' => $users, 'blogs' => $blogs,
                'projects' => $projects, 'total' => $total,
                'totalViews' => $totalViews, 'totalBrowses' => $totalBrowses,
                'eventActivities' => $eventActivities, 'events' => $events]);
    }

    public function profile($id) {
        $data = User::where('id', $id)->where('utype', 'Admin')->first();
        return view('components.back-end.profile')->with('data', $data);
    }

    public function saveProfile(Request $request, $id) {
        $data = [];
        $data['fullname'] = $request->fullname;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['sex'] = $request->sex;
        User::where('id', $id)->update($data);
        $user = Session::get('user');
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã cập nhật thông tin";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công', 'Đã cập nhật lại thông tin của bạn!');
        Session::put('user', NULL);
        Session::put('user', User::where('id', $id)->first());
        return redirect()->back();
    }

    public function changePassword(Request $request, $id) {
        $data = [];
        $user = User::where('id', $id)->first();
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
            User::where('id', $id)->update(['password'=>md5($request->newPassword)]);
        $user = Session::get('user');
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã đăng nhập vào hệ thống";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
            alert()->success('Thành công', 'Cập nhật mật khẩu thành công!');
            return redirect()->back();
        } else {
            alert()->error($err);
            return redirect()->back();
        }
    }

    public function uploadAvatar(Request $request, $id) {
        $file = $request->file('avatar');
        $link = 'back-end/assets/images/uploaded/avatar/';
        $new_image_name = 'UIMG'.date('YmdHis').uniqid().'.jpg';
        $move = $file->move(public_path($link), $new_image_name);
        if (!$move) {
            return response()->json(['status' => 0, 'msg' => 'Có lỗi gì đó đã xảy ra.']);
        } else {
            User::where('id', $id)->update(['avatar' => $new_image_name]);
            $user = User::where('id', $id)->first();
        $user = Session::get('user');
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã cập nhật ảnh đại diện";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
            Session::put('user', NULL);
            Session::put('user', $user);
            return response()->json(['status' => 1, 'msg' => 'Ảnh đã được cập nhật.']);
        }
    }

    public function sendNotificationAll() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                return view('components.back-end.mail.send-all');
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->sendMail===0) {
                    return exit;
                } else if ($role->sendMail===2) {
                    return view('components.back-end.mail.send-all');
                }
            }
        }
    }

    public function sendNotificationPrivate($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('regis_notifications')->where('id', $id)->first();
                return view('components.back-end.mail.send-private')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->sendMail===0) {
                    return exit;
                } else if ($role->sendMail===2) {
                    $data = DB::table('regis_notifications')->where('id', $id)->first();
                    return view('components.back-end.mail.send-private')->with('data', $data);
                }
            }
        }
    }

    public function postNotificationAll(Request $request) {
        $users = DB::table('regis_notifications')->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title = $request->title;
        $data = [];
        foreach ($users as $user) {
            $data['email'][] = $user->email;
        }
        $mailDetails = [];
        $mailDetails['title'] = $request->title;
        $mailDetails['header'] = $request->header;
        $mailDetails['message'] = $request->message;
        $mailDetails['time'] = $now;
        Mail::send('components.back-end.mail.noti-mail', ['data' => $data, 'mailDetails' => $mailDetails], function ($message) use ($title, $data) {
            $message->to($data['email'])->subject($title);
            $message->from($data['email'], $title);
        });
        $user = Session::get('user');
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã gửi email cho toàn bộ người dùng";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công', 'Đã gửi email thông báo cho tất cả những người dùng đăng ký');
        return \redirect()->back();
    }

    public function postNotificationPrivate(Request $request, $id) {
        $user = DB::table('regis_notifications')->where('id', $id)->first();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title = $request->title;
        $data = $user->email;
        $mailDetails = [];
        $mailDetails['title'] = $request->title;
        $mailDetails['header'] = $request->header;
        $mailDetails['message'] = $request->message;
        $mailDetails['time'] = $now;
        Mail::send('components.back-end.mail.noti-mail', ['data' => $data, 'mailDetails' => $mailDetails], function ($message) use ($title, $data) {
            $message->to($data)->subject($title);
            $message->from($data, $title);
        });
        $user = Session::get('user');
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã gửi email cho ". $data;
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công', 'Đã gửi email thông báo cho '. $data);
        return \redirect()->back();
    }
    public function notification() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('regis_notifications')->paginate(5);
                return view('components.back-end.mail.notification')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->sendMail===0) {
                    return exit;
                } else if ($role->sendMail===2) {
                    $data = DB::table('regis_notifications')->paginate(5);
                    return view('components.back-end.mail.notification')->with('data', $data);
                }
            }
        }
    }

    public function viewMess() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('messages')->orderBy('id', 'DESC')->paginate(5);
                return view('components.back-end.user.view-mess')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->viewMess===0) {
                    return exit;
                } else if ($role->viewMess===2) {
                    $data = DB::table('messages')->orderBy('id', 'DESC')->paginate(5);
                    return view('components.back-end.user.view-mess')->with('data', $data);
                }
            }
        }
    }

    public function userFilter(Request $request) {
        $data = $request->all();
        // Define sub
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub14days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(14)->toDateString();
        $sub1month = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $sub6months = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(6)->toDateString();
        $sub1year = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(12)->toDateString();
        // Define first - end month
        $firstThisMonth = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $firstBeforeMonth = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $endBeforeMonth = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        // Define now
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['value']=='7days') {
            $get = User::whereBetween('dateCreated', [$sub7days, $now])
                ->orderBy('dateCreated', 'ASC')->get();
        }

        if ($data['value']=='14days') {
            $get = User::whereBetween('dateCreated', [$sub14days, $now])
                ->orderBy('dateCreated', 'ASC')->get();
        }

        if ($data['value']=='1month') {
            $get = User::whereBetween('dateCreated', [$sub1month, $now])
                ->orderBy('dateCreated', 'ASC')->get();
        }

        if ($data['value']=='6months') {
            $get = User::whereBetween('dateCreated', [$sub6months, $now])
                ->orderBy('dateCreated', 'ASC')->get();
        }

        if ($data['value']=='1year') {
            $get = User::whereBetween('dateCreated', [$sub1year, $now])
                ->orderBy('dateCreated', 'ASC')->get();
        }
        foreach ($get as $key => $value) {
            $count = User::where('dateCreated', $value->dateCreated)->count();
            $chart_data[] = array(
                'dateCreated' => $value->dateCreated,
                'count' => $count
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function elementDonut(Request $request) {
        $labels = ['Hình ảnh', 'Bài viết', 'Sự kiện', 'Slider', 'Dự án', 'Người dùng'];
        $values = [count(Image::all()), count(Blog::all()), count(Event::all()), count(Slider::all()), count(Project::all()), count(User::all())];
        for ($i=0; $i<=5; $i++) {
            $chart_data[] = array(
                'label' => $labels[$i],
                'value' => $values[$i]
            );
        }
        echo $data = json_encode($chart_data);

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
