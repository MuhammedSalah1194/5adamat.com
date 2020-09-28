<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\Store\ContactStore;
use App\Http\Requests\front\Store\StoreComment;
use App\Http\Requests\Profile\Store\ProfileStore;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use SweetAlert;

class Home extends Controller{

    public function __construct(){
        $this->middleware('auth')->only([
            'commentUpdate',
            'commentStore',
            'profileUpdate'
            ]);
    }

    public function index(){
        $video = Video::Published()->count(); 
        $category = Category::count(); 
        $skill = Skill::count();
        $tag = Tag::count();
        $comments = Comment::with('user', 'video')->orderBy('id', 'asc')->paginate(10);
        return view('dashboard.backend',compact('video','category','skill','tag','comments'));
    }
    
    public function IndexVideo(){
        $videos = Video::Published()->orderBy('id', 'desc');
        if(request()->has('search') && request()->get('search') != ''){
                $videos = $videos->where('name', 'like', '%'. request()->get('search') .'%');
            }
        $videos = $videos->paginate(30);
        return view('home', compact('videos'));
    }

    public function category($id){
        $cat = Category::findOrFail($id);
        $videos = Video::Published()->where('cat_id', $id)->orderBy('id', 'desc')->paginate(30);
        return view('front.category.index', compact('videos', 'cat'));
    }

    public function skills($id){
        $skill = Skill::findOrFail($id);
        $videos = Video::Published()->whereHas('skills', function($query) use($id) {
            $query->where('skill_id', $id);
        })->orderBy('id', 'desc')->paginate(30);
        return view('front.skill.index', compact('videos', 'skill'));
    }

    public function video($id){
        $video = Video::Published()->with('skills', 'tags', 'cat', 'user', 'comments.user')->findOrFail($id);
        return view('front.video.index', compact('video'));
    }

    public function tags($id){
       $tag = Tag::findOrFail($id);
        $videos = Video::Published()->whereHas('tags', function($query) use($id) {
            $query->where('tag_id', $id);
        })->orderBy('id', 'desc')->paginate(30);
        return view('front.tag.index', compact('videos', 'tag'));
    }

    public function commentUpdate($id ,StoreComment $request) {
        $comment = Comment::findOrFail($id);
        if($comment->user_id == auth()->user()->id || auth()->user()->group == 'admin'){
            $comment->update(['comment'=>$request->comment]);
            alert()->success('Success', 'Comment Updated');
        }
        return redirect()->route('front.video' , $comment->video_id);
    }

    public function commentStore($id ,StoreComment $request) {
        $video = Video::Published()->findOrFail($id);
        $comment = Comment::create([
            'comment'=>$request->comment,
            'user_id'=> auth()->user()->id,
            'video_id'=>$video->id,
        ]);
        alert()->success('Success', 'Comment Added');
        
        return redirect()->route('front.video', $video->id);
    }

    public function contactStore(ContactStore $request) {
         Contact::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'message'=>$request->message,
         ]);
         alert()->success('Success', 'Success Message');
        return redirect()->route('front.landing');
    }


    public function Welcome(){
        $videos = Video::Published()->orderBy('id', 'desc')->paginate(10);
        $videos_Count = Video::Published()->count();
        $comments_Count = Comment::count();
        $tags_Count = Tag::count();
        return view('welcome', compact('videos', 'videos_Count', 'comments_Count', 'tags_Count'));
    }

    public function page($id, $slug){
        $page = Page::findOrFail($id);
        return view('front.page.index', compact('page'));
    }

    public function profile($id, $slug){
        $row = User::findOrfail($id);
        return view('front.profile.index', compact('row'));
    }

    public function profileUpdate(ProfileStore $request){
        $row = User::findOrFail(auth()->user()->id);
        $array = [];
        if($request->email != $row->email){
            $email = User::where('email', $request->email)->first();

            if($email == null){
                $array['email'] = $request->email;
            }
        }

        if($request->name != $row->name){
            $array['name'] = $request->name;
        }

        if($request->password != ''){
            $array['password'] = Hash::make($request->password);
        }

        if(!empty($array)){
            $row->update($array);
        }
        alert()->success('Your Profile have been Updated', 'Done');
       return redirect()->route('front.profile', ['id'=>$row->id, 'slug'=>slug($row->name)]);    }

    }