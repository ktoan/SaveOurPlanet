<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Donation;
use App\Models\Event;
use App\Models\EventActivity;
use App\Models\Image;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class APIUserController extends Controller
{
    public function get(Request $request) {
        $user = User::find($request->id);
        return response()->json($user);
    }

    public function update(Request $request) {
        $user = User::find($request->id);
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->sex = $request->sex;
        $user->save();
        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => "Update Successfully!"
        ]);
    }

    public function avatar(Request $request) {
        $file = $request->file('uploaded_file');
        $link = 'back-end/assets/images/uploaded/avatar/';
        $new_image_name = 'UIMG'.date('YmdHis').uniqid().'.jpg';
        $move = $file->move(public_path($link), $new_image_name);
        if (!$move) {
            return response()->json("Failed");
        } else {
            User::where('id', $request->userId)->update(['avatar' => $new_image_name]);
            return response()->json("Ok");
        }
    }

    public function wall(Request $request) {
        $donations = Donation::where('useId', $request->id)->orderBy("id", "desc")->get();
        $ds = [];
        foreach ($donations as $d) {
            $user = User::find($d->useId);
            $project = Project::find($d->projectId);
            if (isset($project)) {
                array_push($ds, [
                    'id' => $d->id,
                    'user' => $user,
                    'projectName' => $project->name,
                    'typeProduct' => $d->typeProduct,
                    'desc' => $d->desc,
                    'typeCheckout' => $d->typeCheckout,
                    'amout' => $d->amout,
                    'date' => $d->date,
                    'time' => $d->time
                ]);
            } else {
                array_push($ds, [
                    'id' => $d->id,
                    'user' => $user,
                    'projectName' => null,
                    'typeProduct' => $d->typeProduct,
                    'desc' => $d->desc,
                    'typeCheckout' => $d->typeCheckout,
                    'amout' => $d->amout,
                    'date' => $d->date,
                    'time' => $d->time
                ]);
            }
        }
        $images = Image::where("createrId", $request->id)->orderBy("id", "desc")->get();
        $is = [];
        foreach ($images as $i) {
            $user = User::find($i->createrId);
            array_push($is, [
                'id' => $i->id,
                'user' => $user,
                'dateUpload' => $i->dateUpload,
                'imageSource' => $i->imageSource,
                'status' => $i->status
            ]);
        }
        $blogs = Blog::where("createrId", $request->id)->orderBy("id", "desc")->take(5)->get();
        $bs = [];
        foreach ($blogs as $b) {
            $user = User::find($b->createrId);
            $comments = Comment::where("blogId", $b->id)->get();
            $commenters = [];
            foreach ($comments as $c) {
                $user = User::find($c->userId);
                array_push($commenters, [
                    'id' => $c->id,
                    'user' => $user,
                    'blogId' => $c->blogId,
                    'comment' => $c->comment,
                    'date' => $c->date,
                    'time' => $c->time,
                ]);
            }
            array_push($bs, [
                'id' => $b->id,
                'title' => $b->title,
                'introduction' => $b->introduction,
                'content' => $b->content,
                'imageSource' => $b->imageSource,
                'user' => $user,
                'comments' => $commenters,
                'viewCount' => $b->viewCount,
                'status' => $b->status
            ]);
        }
        return response()->json([
            'donations' => $ds,
            'images' => $is,
            'blogs' => $bs,
        ]);
    }
}
