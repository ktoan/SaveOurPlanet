<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Image;

class ImageController extends Controller
{

    public function addImage() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                return view('components.back-end.image.add');
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->addImage===0) {
                    return exit;
                } else if ($role->addImage!==0) {
                    return view('components.back-end.image.add');
                }
            }
        }
    }
    public function postImage(Request $request) {
        session_start();
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
        if(isset($user)) {
            $data['createrId'] = $user->id;
        }
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã đăng một hình ảnh";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
        $data['dateUpload'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        Image::insert($data);
        alert()->success('Thành công', 'Đã thêm một ảnh');
        return redirect()->back();
    }
    public function manageImage() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Image::where('status', '1')->paginate(5);
                foreach ($data as $value) {
                    $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                    $value->dateUpload = $value->dateUpload->format('d-m-Y');
                }
                return view('components.back-end.image.manage')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageImage===0) {
                    return exit;
                } else if ($role->manageImage===2) {
                    $data = Image::where('status', '1')->paginate(5);
                    foreach ($data as $value) {
                        $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                        $value->dateUpload = $value->dateUpload->format('d-m-Y');
                    }
                    return view('components.back-end.image.manage')->with('data', $data);
                }
            }
        }
    }
    public function deleteImage($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                Image::where('id', $id)->delete();
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã xóa một hình ảnh";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công', 'Bạn đã xóa một ảnh');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageImage===0) {
                    return exit;
                } else if ($role->manageImage===2) {
                    Image::where('id', $id)->delete();
                    $activity = [];
                    $activity['userID'] = $user->id;
                    $activity['descActivity'] = "đã xóa một hình ảnh";
                    $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                    $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                    DB::table('activities')->insert($activity);
                    alert()->info('Thành công', 'Bạn đã xóa một ảnh');
                    return \redirect()->back();
                }
            }
        }
    }
    public function editImage($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Image::where('id', $id)->first();
                return view('components.back-end.image.edit')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageImage===0) {
                    return exit;
                } else if ($role->manageImage===2) {
                    $data = Image::where('id', $id)->first();
                    return view('components.back-end.image.edit')->with('data', $data);
                }
            }
        }
    }
    public function changeImage(Request $request, $id) {
        $data = [];
        $file = $request->file('imageSource');
        if (isset($file)) {
            $data['imageSource'] = $file->getClientOriginalName();
            $file->move('back-end/assets/images/uploaded/images', $file->getClientOriginalName());
        }
        $user = Session::get('user');
        Image::where('id', $id)->update($data);
        $activity = [];
        $activity['userID'] = $user->id;
        $activity['descActivity'] = "đã sửa một hình ảnh";
        $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        DB::table('activities')->insert($activity);
        alert()->success('Thành công', 'Bạn đã cập nhật lại một ảnh');
        return Redirect::to('admin/image/manage');
    }
    public function browseImage() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Image::where('status', '0')->paginate(5);
                foreach ($data as $value) {
                    $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                    $value->dateUpload = $value->dateUpload->format('d-m-Y');
                }
                return view('components.back-end.image.browse')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseImage===0) {
                    return exit;
                } else if ($role->browseImage===2) {
                    $data = Image::where('status', '0')->paginate(5);
                    foreach ($data as $value) {
                        $value->dateUpload = \DateTime::createFromFormat('Y-m-d', $value->dateUpload);
                        $value->dateUpload = $value->dateUpload->format('d-m-Y');
                    }
                    return view('components.back-end.image.browse')->with('data', $data);
                }
            }
        }
    }
    public function allowImage($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                Image::where('id', $id)->update(['status'=>1]);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã duyệt một hình ảnh";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->success('Thành công', 'Bạn đã duyệt một ảnh');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseImage===0) {
                    return exit;
                } else if ($role->browseImage===2) {
                    Image::where('id', $id)->update(['status'=>1]);
                    $activity = [];
                    $activity['userID'] = $user->id;
                    $activity['descActivity'] = "đã duyệt một hình ảnh";
                    $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                    $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                    DB::table('activities')->insert($activity);
                    alert()->success('Thành công', 'Bạn đã duyệt một ảnh');
                    return \redirect()->back();
                }
            }
        }
    }
}