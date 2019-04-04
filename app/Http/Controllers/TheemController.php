<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Category;

class TheemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::where('id','>','0')->limit(6)->orderBy('id','desc')->get();
//        dd($posts);
        $main_cats=Category::where('id_cat',0)->get();
        return view('theem1.index',compact('main_cats','posts'));
    }
    public function about(){
        return view('theem1.about');
    }

    public function projects($id){
        $main_cats=Category::where('id_cat',0)->get();
        $this_cat=Category::findOrFail($id);
        $cats=Category::where('id_cat',$id)->paginate(12);
        return view('theem1.project',compact('cats','main_cats','this_cat'));
    }

    public function news($id){
        $news=Post::where('id_cat',$id)->orderBy('id','desc')->paginate(12);
        $cat=Category::findOrFail($id);
        return view('theem1.news',compact('news','cat'));
    }


    public function post($id){
        $post=Post::findOrFail($id);
        $main_cats=Category::where('id_cat',0)->get();
        return view('theem1.post',compact('post','main_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
