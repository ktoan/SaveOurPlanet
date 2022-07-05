<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Event;

class EventController extends Controller
{

    public function addEvent() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                return view('components.back-end.event.add');
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->addEvent===0) {
                    return exit;
                } else if ($role->addEvent!==2) {
                    return view('components.back-end.event.add');
                }
            }
        }
    }
    public function postEvent(Request $request) {
        if ($request->contentPost=="") {
            alert()->error('Opps', 'Không được để rỗng nội dung');
            return redirect()->back();
        } else {
            session_start();
            $user = Session::get("user");
            $data = [];
            $data['name'] = $request->name;
            $data['introduction'] = $request->introduction;
            $data['content'] = $request->contentPost;
            $file = $request->file('imageSource');
            $data['time'] = $request->time;
            $data['date'] = $request->date;
            $data['location'] = $request->location;
            $file->move('back-end/assets/images/uploaded/events', $file->getClientOriginalName());
            $data['imageSource'] = $file->getClientOriginalName();
            if (isset($user)) {
                $data['createrId'] = $user->id;
            }
            if ($user->utype==="Admin") {
                $data['status'] = 1;
            }
            if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', 'System User')->first();
                if($role->addEvent===1) {
                    $data['status'] = 0;
                }
                if($role->addEvent===2) {
                    $data['status'] = 1;
                }
            }
            $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã tạo một sự kiện";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
            $data['dateCreate'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            Event::insert($data);
            alert()->success('Thành công', 'Đã thêm một sự kiện');
            return redirect()->back();
        }
    }
    public function manageEvent() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Event::where('status', '1')->paginate(5);
                return view('components.back-end.event.manage')->with(['data' => $data]);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageEvent===0) {
                    return exit;
                } else if ($role->manageEvent===2) {
                    $data = Event::where('status', '1')->paginate(5);
                    return view('components.back-end.event.manage')->with(['data' => $data]);
                }
            }
        }
    }
    public function deleteEvent($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                Event::where('id', $id)->delete();
            $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã xóa một sự kiện";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công', 'Bạn đã xóa một sự kiện');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageEvent===0) {
                    return exit;
                } else if ($role->manageEvent!==0) {
                    Event::where('id', $id)->delete();
                    alert()->info('Thành công', 'Bạn đã xóa một sự kiện');
                    return \redirect()->back();
                }
            }
        }
    }
    public function editEvent($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Event::where('id', $id)->first();
                return view('components.back-end.event.edit')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageEvent===0) {
                    return exit;
                } else if ($role->manageEvent===2) {
                    $data = Event::where('id', $id)->first();
                    return view('components.back-end.event.edit')->with('data', $data);
                }
            }
        }
    }
    public function changeEvent(Request $request, $id) {
        if($request->contentPost=="") {
            alert()->error('Opps', 'Không được để rỗng nội dung');
            return redirect()->back();
        } else {
            $data = [];
            $data['name'] = $request->name;
            $data['introduction'] = $request->introduction;
            $data['content'] = $request->contentPost;
            $file = $request->file('imageSource');
            if(isset($file)) {
                $file->move('back-end/assets/images/uploaded/events', $file->getClientOriginalName());
                $data['imageSource'] = $file->getClientOriginalName();
            }
            $data['time'] = $request->time;
            $data['date'] = $request->date;
            $data['location'] = $request->location;
            $user = Session::get('user');
            $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã sửa một sự kiện";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
            Event::where('id', $id)->update($data);
            alert()->success('Thành công', 'Bạn đã cập nhật lại một sự kiện');
            return Redirect::to('/admin/event/manage');
        }
    }
    public function browseEvent() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Event::where('status', '0')->paginate(5);
                return view('components.back-end.event.browse')->with(['data' => $data]);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseEvent===0) {
                    return exit;
                } else if ($role->browseEvent===2) {
                    $data = Event::where('status', '0')->paginate(5);
                    return view('components.back-end.event.browse')->with(['data' => $data]);
                }
            }
        }
    }
    public function allowEvent($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                Event::where('id', $id)->update(['status'=>1]);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã duyệt một sự kiện";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công', 'Bạn đã duyệt một sự kiện');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseEvent===0) {
                    return exit;
                } else if ($role->browseEvent===2) {
                    Event::where('id', $id)->update(['status'=>1]);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã duyệt một sự kiện";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                    alert()->info('Thành công', 'Bạn đã duyệt một sự kiện');
                    return \redirect()->back();
                }
            }
        }
    }
}
