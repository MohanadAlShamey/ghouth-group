<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\OrderShiped;
use App\Post;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{



public function getPost($id){
    $post=Post::findOrFail($id);
    $cat=Category::findOrFail($post->id_cat);
    $path=storage_path().'/app/images/cats/'.$cat->img;
    if(is_file($path)){
        $path=asset('storage/app/images/cats/'.$cat->img);
    }else{
        $path=false;
    }
    return view('site.post',compact('cat','post','path'));
}


public function about(){
    return view('theem1.about');
}


    ########################################
    #               Finish                 #
    ########################################
    // get last news
    public function lastNews(){
        $posts=Post::paginate(8);
        //dd($cats);
        //dd($posts_limit);
        return view('site.last_news',compact('posts'));
    }
    // get all categories
    public function cats($id){
        $cats= Category::where('id_cat',$id)->paginate(8);
        //dd($cats);
        //dd($posts_limit);
        return view('site.cats',compact('cats'));
    }
    // main page
    public function index(){

        $proj= Category::where('id_cat',0)->limit(8)->get();

        return view('site.index',compact('proj'));
    }
// get post in one cat
    public function getCat($id){
        $posts=Post::where('id_cat',$id)->paginate(8);
        $cat=Category::findOrFail($id);
        $path=storage_path().'/app/images/cats/'.$cat->img;
        if (is_file($path)){
            $path=asset('storage/app/images/cats/'.$cat->img);
        }else{
            $path=false;
        }
        return view('site.posts',compact('posts','cat','path'));
    }
// change id post in main page
    public function getId($to,$arr,$id){
        if(in_array($id,$arr)){
            $id=rand(0,$to);
            return $this->getId($to,$arr,$id);
        }
        return $id;

    }

    public function SendEmail(Request $request){
        $setting=Setting::where('name','email')->get()[0]->value;
        $name=$request->name;
        $email=$request->email;
        $sub=$request->subject;
        $msg=$request->message;
        Mail::to('redadnan@gmail.com')
            ->send(new OrderShiped($name,$email,$sub,$msg));
        return redirect()->back()->with('success','تم الإرسال بنجاح');
    }
}
