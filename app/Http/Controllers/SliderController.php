<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function addSlider() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                return view('components.back-end.slider.add');
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->addSlider===0) {
                    return exit;
                } else if ($role->addSlider===2) {
                    return view('components.back-end.slider.add');
                }
            }
        }
    }
    public function postSlider(Request $request) {
        session_start();
        $user = Session::get("user");
        $file=$request->file('imageSource');
        $file->move('back-end/assets/images/uploaded/sliders', $file->getClientOriginalName());
        $data = [];
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['imageSource'] = $file->getClientOriginalName();
        if ($user->utype==="Admin") {
            $data['status'] = 1;
        }
        if ($user->utype==="System User") {
            $role = DB::table('roles')->where('role', 'System User')->first();
            if($role->addSlider===1) {
                $data['status'] = 0;
            }
            if($role->addSlider===2) {
                $data['status'] = 1;
            }
        }
        DB::table('sliders')->insert($data);
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã tạo một slider";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công', "Đã thêm một slider vào website");
        return redirect()->back();
    }
    public function manageSlider() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('sliders')->where('status', '1')->paginate(5);
                return view('components.back-end.slider.manage')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageSlider===0) {
                    return exit;
                } else if ($role->manageSlider===2) {
                    $data = DB::table('sliders')->where('status', '1')->paginate(5);
                    return view('components.back-end.slider.manage')->with('data', $data);
                }
            }
        }
    }
    public function deleteSlider($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                DB::table('sliders')->where('id', $id)->delete();
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã xóa một slider";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công', 'Bạn đã xóa một slider');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageSlider===0) {
                    return exit;
                } else if ($role->manageSlider===2) {
                    DB::table('sliders')->where('id', $id)->delete();
                    $activity = [];
                    $activity['userID'] = $user->id;
                    $activity['descActivity'] = "đã xóa một slider";
                    $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                    $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                    DB::table('activities')->insert($activity);
                    alert()->info('Thành công', 'Bạn đã xóa một slider');
                    return \redirect()->back();
                }
            }
        }
    }
    public function editSlider($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('sliders')->where('id', $id)->first();
                return view('components.back-end.slider.edit')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageSlider===0) {
                    return exit;
                } else if ($role->manageSlider===2) {
                    $data = DB::table('sliders')->where('id', $id)->first();
                    return view('components.back-end.slider.edit')->with('data', $data);
                }
            }
        }
    }
    public function changeSlider(Request $request, $id) {
        $data = [];
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $file = $request->file('imageSource');
        if (isset($file)) {
            $data['imageSource'] = $file->getClientOriginalName();
            $file->move('back-end/assets/images/uploaded/sliders', $file->getClientOriginalName());
        }
        DB::table('sliders')->where('id', $id)->update($data);
        $user = Session::get('user');
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã sửa một slider";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công', 'Đã cập nhật lại slider');
        return Redirect::to('admin/slider/manage');
    }
    public function browseSlider() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('sliders')->where('status', '0')->paginate(5);
                return view('components.back-end.slider.browse')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseSlider===0) {
                    return exit;
                } else if ($role->browseSlider===2) {
                    $data = DB::table('sliders')->where('status', '0')->paginate(5);
                    return view('components.back-end.slider.browse')->with('data', $data);
                }
            }
        }
    }
    public function allowSlider($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                DB::table('sliders')->where('id', $id)->update(['status'=>1]);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã duyệt một slider";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->success('Thành công', 'Bạn đã duyệt một slider');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseSlider===0) {
                    return exit;
                } else if ($role->browseSlider===2) {
                    DB::table('sliders')->where('id', $id)->update(['status'=>1]);
                    $activity = [];
                    $activity['userID'] = $user->id;
                    $activity['descActivity'] = "đã duyệt một slider";
                    $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                    $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                    DB::table('activities')->insert($activity);
                    alert()->success('Thành công', 'Bạn đã duyệt một slider');
                    return \redirect()->back();
                }
            }
        }
    }
}
