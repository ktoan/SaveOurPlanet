<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function grant() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else {
                $data = DB::table('roles')->where('role', "System User")->first();
                return view('components.back-end.role.grant')->with('data', $data);
            }
        }
    }

    public function grantRole(Request $request) {
        $data = [];
        $data['searchInfo'] = $request->searchInfo;
        $data['viewMess'] = $request->viewMess;
        $data['sendMail'] = $request->sendMail;
        $data['addSlider'] = $request->addSlider;
        $data['manageSlider'] = $request->manageSlider;
        $data['browseSlider'] = $request->browseSlider;
        $data['addImage'] = $request->addImage;
        $data['manageImage'] = $request->manageImage;
        $data['browseImage'] = $request->browseImage;
        $data['addEvent'] = $request->addEvent;
        $data['manageEvent'] = $request->manageEvent;
        $data['browseEvent'] = $request->browseEvent;
        $data['addBlog'] = $request->addBlog;
        $data['manageBlog'] = $request->manageBlog;
        $data['browseBlog'] = $request->browseBlog;
        $data['addProject'] = $request->addProject;
        DB::table('roles')->where('role', "System User")->update($data);
        alert()->success('Thành công', 'Bạn đã phân quyền cho System User thành công!');
        return \redirect()->back();
    }

    public function allowRole() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else {
                $users = User::where('utype', 'User')->get();
                return view('components.back-end.role.allow')->with('users', $users);
            }
        }
    }

    public function allowSU($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else {
                User::where([
                    ['utype', 'User'],
                    ['id', $id]
                ])->update(['utype' => 'System User']);
                alert()->success('Thành công', 'Bạn đã trao quyền System User cho '. $user->email);
                return \redirect()->back();
            }
        }
    }

    public function removeRole() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else {
                $users = User::where('utype', 'System User')->get();
                return view('components.back-end.role.remove')->with('users', $users);
            }
        }
    }

    public function removeSU($id) {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype !== "Admin") {
                return exit;
            } else {
                User::where([
                    ['utype', 'System User'],
                    ['id', $id]
                ])->update(['utype' => 'User']);
                alert()->info('Thành công', 'Bạn đã xóa quyền System User của '. $user->email);
                return \redirect()->back();
            }
        }
    }

    public function searchInfo() {
        session_start();
        $user = Session::get('user');
        if(!isset($user)) {
            return exit;
        } else {
            if ($user->utype === "User") {
                return exit;
            } else if($user->utype === "Admin") {
                $users = DB::table('users')->where('utype', '<>', "Admin")->get();
                return view('components.back-end.user.search')->with('users', $users);
            } else if ($user->utype==="System User") {
                $role = DB::table('roles')->where('role', "System User")->first();
                if($role->searchInfo===0) {
                    return exit;
                } else if ($role->searchInfo===2) {
                    $users = DB::table('users')->where('utype', '<>', "Admin")->get();
                    return view('components.back-end.user.search')->with('users', $users);
                }
            }
        }
    }

    public function searchUserInfo(Request $request) {
        $output = '';
        $users = DB::table('users')
            ->where([
                ['fullname', 'LIKE', '%'.$request->keyword.'%'],
                ['utype', '<>', 'Admin']
            ])
            ->orWhere([
                ['email', 'LIKE', '%'.$request->keyword.'%'],
                ['utype', '<>', 'Admin']
            ])
            ->orWhere([
                ['phone', 'LIKE', '%'.$request->keyword.'%'],
                ['utype', '<>', 'Admin']
            ])
            ->orWhere([
                ['address', 'LIKE', '%'.$request->keyword.'%'],
                ['utype', '<>', 'Admin']
            ])
            ->get();
        if(count($users)!=0) {
            foreach ($users as $user) {
                $output.='<tr>
                       <td>'.$user->id.'</td>
                       <td>'.$user->fullname.'</td>
                       <td>'.$user->email.'</td>
                       <td>'.$user->phone.'</td>
                       <td>'.$user->address.'</td>
                       <td>'.$user->sex.'</td>
                       <td>'.$user->utype.'</td>
                   </tr>';
            }
        } else {
            $output.='<tr>
                       <td>Không có dữ liệu phù hợp</td>
                   </tr>';
        }
        return response()->json($output);
    }

}
