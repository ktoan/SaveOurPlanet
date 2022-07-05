<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIAuthController extends Controller
{
    public function login(Request $request) {
        $check = User::where("email", $request->email)->count();
        if ($check==0) {
            return response()->json([
                'success' => false,
                'user' => null,
                'message' => "Email is not existed in our database!"
            ]);
        } else {
            $user = User::where(["email" => $request->email,
             "password" => md5($request->password)])->first();
            if (!isset($user)) {
                return response()->json([
                    'success' => false,
                    'user' => null,
                    'message' => "Email or Password is wrong. Please check again!"
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'message' => "Login Successfully!"
                ]);
            }
        }
    }
    public function register(Request $request) {
        $check = User::where("email", $request->email)->count();
        if ($check>0) {
            return response()->json([
                'success' => false,
                'user' => null,
                'message' => "Email was existed in our data!"
            ]);
        } else {
            if (!preg_match ("/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/", $request->password)) {
                return response()->json([
                    'success' => false,
                    'user' => null,
                    'message' => "Password is incorrect with out syntax!"
                ]);
            } else {
                $user = new User();
                $user->fullname = $request->fullname;
                $user->email = $request->email;
                $user->password = md5($request->password);
                $user->dateCreated = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
                $user->save();
                $sessionUser = User::where("email", $request->email)->first();
                return response()->json([
                    'success' => true,
                    'user' => $sessionUser,
                    'message' => "Welcome to our application!"
                ]);
            }
        }
    }
}