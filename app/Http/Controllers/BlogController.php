<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Blog;

class BlogController extends Controller
{

    public function addBlog() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                return view('components.back-end.blog.add');
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->addBlog===0) {
                    return exit;
                } else if ($role->addBlog!==0) {
                    return view('components.back-end.blog.add');
                }
            }
        }
    }
    public function postBlog(Request $request) {
        if($request->contentPost=="") {
            alert()->error('Opps', 'Không được để rỗng nội dung');
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
            Blog::insert($data);
            $activity = [];
            $activity['userID'] = $user->id;
            $activity['descActivity'] = "đã xóa một bài viết";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            alert()->success('Thành công', 'Đã thêm một bài viết');
            return redirect()->back();
        }
    }
    public function manageBlog() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Blog::where('status', '1')->paginate(5);
                return view('components.back-end.blog.manage')->with(['data' => $data]);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageBlog===0) {
                    return exit;
                } else if ($role->manageBlog===2) {
                    $data = Blog::where('status', '1')->paginate(5);
                    return view('components.back-end.blog.manage')->with(['data' => $data]);
                }
            }
        }
    }
    public function deleteBlog($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                Blog::where('id', $id)->delete();
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã xóa một bài viết";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->info('Thành công', 'Đã xóa một bài viết');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageBlog===0) {
                    return exit;
                } else if ($role->manageBlog===2) {
                    Blog::where('id', $id)->delete();
                    $activity = [];
                    $activity['userID'] = $user->id;
                    $activity['descActivity'] = "đã xóa một bài viết";
                    $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                    $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                    DB::table('activities')->insert($activity);
                    alert()->info('Thành công', 'Đã xóa một bài viết');
                    return \redirect()->back();
                }
            }
        }
    }
    public function editBlog($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Blog::where('id', $id)->first();
                return view('components.back-end.blog.edit')->with('data', $data);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->manageBlog===0) {
                    return exit;
                } else if ($role->manageBlog===2) {
                    $data = Blog::where('id', $id)->first();
                    return view('components.back-end.blog.edit')->with('data', $data);
                }
            }
        }
    }
    public function changeBlog(Request $request, $id) {
        if($request->contentPost=="") {
            alert()->error('Opps', 'Không được để rỗng nội dung');
            return redirect()->back();
        } else {
            $data = [];
            $data['title'] = $request->title;
            $data['introduction'] = $request->introduction;
            $data['content'] = $request->contentPost;
            $file = $request->file('imageSource');
            if(isset($file)) {
                $file->move('back-end/assets/images/uploaded/blogs', $file->getClientOriginalName());
                $data['imageSource'] = $file->getClientOriginalName();
            }
            $user = Session::get('user');
            $data['dateUpload'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $activity = [];
            $activity['userID'] = $user->id;
            $activity['descActivity'] = "đã sửa một bài viết";
            $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
            $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            DB::table('activities')->insert($activity);
            Blog::where('id', $id)->update($data);
            alert()->success('Thành công', 'Đã cập nhật lại một bài viết');
            return Redirect::to('admin/blog/manage');
        }
    }
    public function browseBlog() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $data = Blog::where('status', '0')->paginate(5);
                return view('components.back-end.blog.browse')->with(['data' => $data]);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseBlog===0) {
                    return exit;
                } else if ($role->browseBlog===2) {
                    $data = Blog::where('status', '0')->paginate(5);
                    return view('components.back-end.blog.browse')->with(['data' => $data]);
                }
            }
        }
    }
    public function allowBlog($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                Blog::where('id', $id)->update(['status'=>1]);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã duyệt một bài viết";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                alert()->success('Thành công', 'Đã duyệt một bài viết');
                return \redirect()->back();
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->browseBlog===0) {
                    return exit;
                } else if ($role->browseBlog===2) {
                    Blog::where('id', $id)->update(['status'=>1]);
                $activity = [];
                $activity['userID'] = $user->id;
                $activity['descActivity'] = "đã duyệt một bài viết";
                $activity['time'] = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
                $activity['date'] = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                DB::table('activities')->insert($activity);
                    alert()->success('Thành công', 'Đã duyệt một bài viết');
                    return \redirect()->back();
                }
            }
        }
    }

    public function previewBlog($id) {
        $data = Blog::where('id', $id)->first();
        return view('components.back-end.blog.preview')->with('data', $data);
    }
}