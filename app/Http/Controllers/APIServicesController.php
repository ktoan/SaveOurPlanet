<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Donation;
use App\Models\Event;
use App\Models\EventActivity;
use App\Models\Image;
use App\Models\Project;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIServicesController extends Controller
{
    public function home(Request $request) {
        $sliders = Slider::where("status", "1")->orderBy("id", "desc")->get();
        $donations = Donation::orderBy("id", "desc")->take(7)->get();
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
        $images = Image::where("status", "1")->orderBy("id", "desc")->take(4)->get();
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
        $blogs = Blog::where("status", "1")->orderBy("id", "desc")->take(5)->get();
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
        $projects = Project::where("status", "1")->orderBy('id', 'desc')->take(5)->get();
        $ps = [];
        foreach ($projects as $p) {
            $user = User::find($p->creater);
            array_push($ps, [
                'id' => $p->id,
                'user' => $user,
                'name' => $p->name,
                'introduction' => $p->introduction,
                'description' => $p->description,
                'content' => $p->content,
                'goal' => $p->goal,
                'now' => $p->now,
                'noMembers' => $p->noMembers,
                'imageSource' => $p->imageSource,
                'dateCreate' => $p->dateCreate,
                'status' => $p->status
            ]);
        }
        $events = Event::where("status", "1")->orderBy('id', 'desc')->take(5)->get();
        $es = [];
        foreach ($events as $e) {
            $check = 0;
            $user = User::find($e->createrId);
            $join = EventActivity::where([
                ['userId', $request->id],
                ['status', '0'],
                ['eventId', $e->id]
            ])->count();
            $quit = EventActivity::where([
                ['userId', $request->id],
                ['status', '1'],
                ['eventId', $e->id]
            ])->count();
            if ($join!=0 || $quit!=0) {
                $check = $join-$quit;
            }
            if ($check==0) {
                $status = "Join Event";
            } else {
                $status = "Quit Event";
            }
            array_push($es, [
                'id' => $e->id,
                'name' => $e->name,
                'introduction' => $e->introduction,
                'content' => $e->content,
                'time' => $e->time,
                'date' => $e->date,
                'location' => $e->location,
                'noMembers' => $e->noMembers,
                'dateCreate' => $e->dateCreate,
                'user' => $user,
                'imageSource' => $e->imageSource,
                'status' => $status
            ]);
        }
        return response()->json([
            'sliders' => $sliders,
            'donations' => $ds,
            'images' => $is,
            'blogs' => $bs,
            'projects' => $ps,
            'events' => $es
        ]);
    }

    public function about(Request $request) {
        $check = DB::table('regis_notifications')->where('email', $request->email)->count();
        if ($check==0) {
            DB::table('regis_notifications')->insert(['email' => $request->email]);
            return response()->json("Complete your notification subscription!");
        } else {
            return response()->json("The Email was registered!");
        }
    }

    public function blogs() {
        $blogs = Blog::where("status", "1")->orderBy("id", "desc")->get();
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
        return response()->json($bs);
    }

    public function deleteBlog(Request $request) {
        $blog = Blog::find($request->id);
        $blog->delete();
        return response()->json("Ok");
    }

    public function uploadBlog(Request $request) {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->introduction = $request->introduction;
        $blog->content = $request->contentPost;
        // Image
        $file = $request->file('uploaded_file');
        $link = 'back-end/assets/images/uploaded/blogs/';
        $move = $file->move(public_path($link), $file->getClientOriginalName());
        $blog->imageSource = $file->getClientOriginalName();
        $blog->status = 0;
        $blog->dateUpload = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $blog->createrId = $request->userId;
        // End image
        if ($move) {
            $blog->save();
            return response()->json("Ok");
        } else {
            return response()->json("Failed");
        }
    }

    public function editBlog(Request $request) {
        $blog = Blog::find($request->blogId);
        $blog->title = $request->title;
        $blog->introduction = $request->introduction;
        $blog->content = $request->contentPost;
        // Image
        $file = $request->file('uploaded_file');
        $link = 'back-end/assets/images/uploaded/blogs/';
        $move = $file->move(public_path($link), $file->getClientOriginalName());
        $blog->imageSource = $file->getClientOriginalName();
        // End image
        if ($move) {
            $blog->save();
            return response()->json("Ok");
        } else {
            return response()->json("Failed");
        }
    }

    public function editBlogNoImage(Request $request) {
        $blog = Blog::find($request->blogId);
        $blog->title = $request->title;
        $blog->introduction = $request->introduction;
        $blog->content = $request->contentPost;
        $blog->save();
        return response()->json("Ok");
    }

    public function viewBlog(Request $request) {
        $b = Blog::find($request->id);
        $b->viewCount = $b->viewCount + 1;
        $b->save();
        $user = User::find($b->createrId);
        $comments = Comment::where("blogId", $b->id)->orderBy("id", "desc")->get();
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
        return response()->json([
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

    public function viewBlogOnWeb($id) {
        $data = Blog::find($id);
        if(!isset($data)) {
            return exit;
        } else {
            $data->dateUpload = \DateTime::createFromFormat('Y-m-d', $data->dateUpload);
            $data->dateUpload = $data->dateUpload->format('d-m-Y');
            return view('components.front-end.blog.view-blog-api')->with(['data' => $data]);
        }
    }

    public function comment(Request $request) {
        $comment = new Comment();
        $comment->userId = $request->userId;
        $comment->blogId = $request->blogId;
        $comment->comment = $request->comment;
        $comment->date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $comment->time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $comment->save();
        $comments = Comment::where("blogId", $comment->blogId)
                        ->orderBy("id", "desc")->get();
        $commentsResponse = [];
        foreach ($comments as $c) {
            $commenter = User::find($c->userId);
            array_push($commentsResponse, [
                'id' => $c->id,
                'user' => $commenter,
                'blogId' => $c->blogId,
                'comment' => $c->comment,
                'date' => $c->date,
                'time' => $c->time
            ]);
        }
        return response()->json($commentsResponse);
    }

    public function deleteComment(Request $request) {
        $deletedComment = Comment::find($request->id);
        if (!isset($deletedComment) || $deletedComment->userId != $request->userId) {
            return response()->json([
                'success' => false,
                'comments' => null,
                'message' => "Have some errors from server..."
            ]);
        } else {
            $deletedComment->delete();
            $b = Blog::find($request->blogId);
            $comments = Comment::where("blogId", $b->id)->orderBy("id", "desc")->get();
            $commentsOfBlog = [];
            foreach ($comments as $c) {
                $commenter = User::find($c->userId);
                array_push($commentsOfBlog, [
                    'id' => $c->id,
                    'user' => $commenter,
                    'blogId' => $c->blogId,
                    'comment' => $c->comment,
                    'date' => $c->date,
                    'time' => $c->time
                ]);
            }
            return response()->json([
                'success' => true,
                'comments' => $commentsOfBlog,
                'message' => "Delete Successfully!"
            ]);
        }
    }

    public function editComment(Request $request) {
        $comment = Comment::find($request->commentId);
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json("Updated Comment");
    }

    public function donations() {
        $donations = Donation::orderBy("id", "desc")->get();
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
        return response()->json($ds);
    }

    public function confirmDonation(Request $request) {
        $donation = new Donation();
        $donation->useId = $request->useId;
        $donation->typeCheckout = "BANKING";
        $donation->typeProduct = $request->typeProduct;
        $donation->amout = $request->amout;
        $donation->desc = $request->desc;
        if ($request->projectId !== 0) {
            $donation->projectId = $request->projectId;
        }
        $donation->date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $donation->time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        $donation->save();
        return response()->json("Ok");
    }

    public function projects() {
        $projects = Project::where("status", "1")->orderBy('id', 'desc')->get();
        $ps = [];
        foreach ($projects as $p) {
            $user = User::find($p->creater);
            array_push($ps, [
                'id' => $p->id,
                'user' => $user,
                'name' => $p->name,
                'introduction' => $p->introduction,
                'description' => $p->description,
                'content' => $p->content,
                'goal' => $p->goal,
                'now' => $p->now,
                'noMembers' => $p->noMembers,
                'imageSource' => $p->imageSource,
                'dateCreate' => $p->dateCreate,
                'status' => $p->status
            ]);
        }
        return response()->json($ps);
    }

    public function viewProject(Request $request) {
        $p = Project::find($request->id);
        if (!isset($p)) {
            return response()->json(null);
        } else {
            $user = User::find($p->creater);
            return response()->json([
                'id' => $p->id,
                'user' => $user,
                'name' => $p->name,
                'introduction' => $p->introduction,
                'description' => $p->description,
                'content' => $p->content,
                'goal' => $p->goal,
                'now' => $p->now,
                'noMembers' => $p->noMembers,
                'imageSource' => $p->imageSource,
                'dateCreate' => $p->dateCreate,
                'status' => $p->status
            ]);
        }
    }

    public function viewProjectOnWeb($id) {
        $data = Project::find($id);
        if(!isset($data)) {
            return exit;
        } else {
            return view('components.front-end.project.view-project-api')->with(['data' => $data]);
        }
    }

    public function images() {
        $images = Image::where("status", "1")->orderBy("id", "desc")->take(4)->get();
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
        return response()->json($is);
    }

    public function uploadImage(Request $request) {
        // Image
        $image = new Image();
        $file = $request->file('uploaded_file');
        $link = 'back-end/assets/images/uploaded/images/';
        $move = $file->move(public_path($link), $file->getClientOriginalName());
        $image->imageSource = $file->getClientOriginalName();
        $image->status = 0;
        $image->dateUpload = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $image->createrId = $request->userId;
        // End image
        if ($move) {
            $image->save();
            return response()->json("Ok");
        } else {
            return response()->json("Failed");
        }
    }

    public function editImage(Request $request) {
        $image = Image::find($request->imageId);
        $file = $request->file('uploaded_file');
        $link = 'back-end/assets/images/uploaded/images/';
        $move = $file->move(public_path($link), $file->getClientOriginalName());
        $image->imageSource = $file->getClientOriginalName();
        if ($move) {
            $image->save();
            return response()->json("Ok");
        } else {
            return response()->json("Failed");
        }
    }

    public function deleteImage(Request $request) {
        $image = Image::find($request->id);
        $image->delete();
        return response()->json("Ok");
    }

    public function events(Request $request) {
        $events = Event::where("status", "1")->orderBy('id', 'desc')->take(5)->get();
        $es = [];
        foreach ($events as $e) {
            $check = 0;
            $user = User::find($e->createrId);
            $join = EventActivity::where([
                ['userId', $request->id],
                ['status', '0'],
                ['eventId', $e->id]
            ])->count();
            $quit = EventActivity::where([
                ['userId', $request->id],
                ['status', '1'],
                ['eventId', $e->id]
            ])->count();
            if ($join!=0 || $quit!=0) {
                $check = $join-$quit;
            }
            if ($check==0) {
                $status = "Join Event";
            } else {
                $status = "Quit Event";
            }
            array_push($es, [
                'id' => $e->id,
                'name' => $e->name,
                'introduction' => $e->introduction,
                'content' => $e->content,
                'time' => $e->time,
                'date' => $e->date,
                'location' => $e->location,
                'noMembers' => $e->noMembers,
                'dateCreate' => $e->dateCreate,
                'user' => $user,
                'imageSource' => $e->imageSource,
                'status' => $status
            ]);
        }
        return response()->json($es);
    }

    public function viewEvent(Request $request) {
        $e = Event::find($request->id);
        $user = User::find($e->createrId);
        $check = 0;
        $join = EventActivity::where([
            ['userId', $request->userId],
            ['status', '0'],
            ['eventId', $request->id]
        ])->count();
        $quit = EventActivity::where([
            ['userId', $request->userId],
            ['status', '1'],
            ['eventId', $request->id]
        ])->count();
        if ($join!=0 || $quit!=0) {
            $check = $join-$quit;
        }
        if ($check==0) {
            $status = "Join Event";
        } else {
            $status = "Quit Event";
        }
        return response()->json([
            'id' => $e->id,
            'name' => $e->name,
            'introduction' => $e->introduction,
            'content' => $e->content,
            'time' => $e->time,
            'date' => $e->date,
            'location' => $e->location,
            'noMembers' => $e->noMembers,
            'dateCreate' => $e->dateCreate,
            'user' => $user,
            'imageSource' => $e->imageSource,
            'status' => $status
        ]);
    }

    public function viewEventOnWeb($id) {
        $data = Event::find($id);
        if(!isset($data)) {
            return exit;
        } else {
            return view('components.front-end.event.view-event-api')->with(['data' => $data]);
        }
    }

    public function joinEvent(Request $request) {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        DB::table('event_activities')
            ->insert(['userId' => $request->userId,
            'eventId' => $request->id,
            'status' => '0',
            'time' => $time,
            'date' => $date
        ]);
        $event = Event::find($request->id);
        $event->noMembers = $event->noMembers+1;
        $event->save();
        return response()->json("Ok");
    }

    public function quitEvent(Request $request) {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $time = Carbon::now('Asia/Ho_Chi_Minh')->format('H:i:s');
        DB::table('event_activities')
            ->insert(['userId' => $request->userId,
            'eventId' => $request->id,
            'status' => '1',
            'time' => $time,
            'date' => $date
        ]);
        $event = Event::find($request->id);
        $event->noMembers = $event->noMembers-1;
        $event->save();
        return response()->json("Ok");
    }

    public function contact(Request $request) {
        $data = [];
        $data['fullname'] = $request->fullname;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        DB::table('messages')->insert($data);
        return response()->json([
            'success' => true,
            'message' => "Message sent to admin!"
        ]);
    }
}
