<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    public function addProject() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                return view('components.back-end.project.add');
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->addProject===0) {
                    return exit;
                } else if ($role->addProject!==0) {
                    return view('components.back-end.project.add');
                }
            }
        }
    }

    public function postProject(Request $request) {
        if($request->contentPost=="") {
            alert()->error('Opps', 'Không được để trống phần nội dung');
            return redirect()->back();
        } else {
            $user = Session::get('user');
            $data = [];
            $data['creater'] = $user->id;
            $data['name'] = $request->name;
            $data['introduction'] = $request->introduction;
            $data['description'] = $request->description;
            $data['content'] = $request->contentPost;
            $data['goal'] = $request->goal;
            $data['dateCreate'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y:m:d');
            $file = $request->file('imageSource');
            $data['imageSource'] = $file->getClientOriginalName();
            if (isset($user)) {
                if($user->utype==="Admin") {
                    $data['status'] = 1;
                } else if ($user->utype==="System User") {
                    $role = DB::table('roles')->where('role', "System User");
                    if($role->addProject==1) {
                        $data['status'] = 0;
                    } else if ($role->addProject==2) {
                        $data['status'] = 1;
                    }
                }
            }
            $activity = [];
            $activity['userID'] = $user->id;
            $activity['descActivity'] = "đã tạo một dự án";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            $file->move('back-end/assets/images/uploaded/projects', $file->getClientOriginalName());
            DB::table('projects')->insert($data);
            alert()->success('Thành công', 'Đã thêm thành công một dự án');
            return redirect()->back();
        }
    }

    public function manageProject() {
        session_start();
        $user = Session::get('user');
        if ($user->utype !== "Admin") {
            exit;
        } else {
            $data = DB::table('projects')->where('status', '1')->paginate(5);
            $users = User::all();
            foreach ($data as $value) {
                $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
                $value->dateCreate = $value->dateCreate->format('d-m-Y');
            }
            return view('components.back-end.project.manage')->with(['data' => $data, 'users' => $users]);
        }
    }

    public function deleteProject($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else if($user->utype === "Admin") {
                DB::table('projects')->where('id', $id)->delete();
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã xóa một dự án";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công', 'Đã xóa một dự án');
                return \redirect()->back();
            }
        }
    }

    public function editProject($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = DB::table('projects')->where('id', $id)->first();
                return view('components.back-end.project.edit')->with('data', $data);
            }
        }
    }

    public function changeProject(Request $request, $id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if($request->contentPost=="") {
                alert()->error('Opps', 'Không được để rỗng phần nội dung');
                return redirect()->back();
            } else {
                $file = $request->file('imageSource');
                $data = [];
                if(isset($file) && $file->getClientOriginalName()!=="") {
                    $file->move('back-end/assets/images/uploaded/projects', $file->getClientOriginalName());
                    $data['imageSource'] = $file->getClientOriginalName();
                }
                $data['name'] = $request->name;
                $data['content'] = $request->contentPost;
                $data['introduction'] = $request->introduction;
                $data['description'] = $request->description;
                $data['goal'] = $request->goal;
                DB::table('projects')->where('id', $id)->update($data);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã sửa một dự án";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->success('Thành công', 'Đã cập nhật thành công một dự án');
                return Redirect::to('/admin/project/manage');
            }
        }
    }

    public function browseProject() {
        session_start();
        $user = Session::get('user');
        if ($user->utype !== "Admin") {
            exit;
        } else {
            $data = DB::table('projects')->where('status', '0')->paginate(5);
            $users = User::all();
            foreach ($data as $value) {
                $value->dateCreate = \DateTime::createFromFormat('Y-m-d', $value->dateCreate);
                $value->dateCreate = $value->dateCreate->format('d-m-Y');
            }
            return view('components.back-end.project.browse')->with(['data' => $data, 'users' => $users]);
        }
    }

    public function allowProject($id) {
        session_start();
        $user = Session::get('user');
        if ($user->utype !== "Admin") {
            exit;
        } else {
            DB::table('projects')->where('id', $id)->where('status', '0')->update(['status' => '1']);
            $activity = [];
            $activity['userID'] = $user->id;
            $activity['descActivity'] = "đã duyệt một dự án";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            alert()->success('Thành công', 'Đã duyệt một dự án');
            return Redirect::to('admin/project/browse');
        }
    }
}
