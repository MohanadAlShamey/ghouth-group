<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\DataTables\PostDatatables;
use App\Http\Requests\AddPostRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostDatatables $post)
    {
        return $post->render('admin.posts.dt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::where('id_cat','!=','0')->get();
        return view('admin.posts.add',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostRequest $request)
    {
        $img1=$this->UploadImg($request,'img1','posts');
//        sleep(1);
        $img2=$this->UploadImg($request,'img2','posts');
//        sleep(1);
        $img3=$this->UploadImg($request,'img3','posts');
//        sleep(1);
        $img4=$this->UploadImg($request,'img4','posts');
        $img5=$this->UploadImg($request,'img5','posts');
        $img6=$this->UploadImg($request,'img6','posts');
        $img7=$this->UploadImg($request,'img7','posts');
        // https://www.youtube.com/embed/be_V2PsNw3c
        // https://www.youtube.com/watch?v=_pzkgDyEN-c
        $url=(isset($request->url)&& !empty($request->url))?str_replace('watch?v=','embed/',$request->url):null;
        Post::create([
            'title'=>$request->title,
            'post'=>$request->post,
            'excerpt'=>$request->excerpt,
            'img1'=>$img1,
            'img2'=>$img2,
            'img3'=>$img3,
            'img4'=>$img4,
            'img5'=>$img5,
            'img6'=>$img6,
            'img7'=>$img7,
            'url'=>$url,
            'id_cat'=>$request->id_cat

        ]);
        return redirect()->back()->with('success','تم الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::where('posts.id',$id)->join('categories','posts.id_cat','=','categories.id')
            ->select('posts.*','categories.name')->get()[0];
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats=Category::where('id_cat','!=','0')->get();
        $post=Post::findOrFail($id);
        return view('admin.posts.edit',compact('cats','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddPostRequest $request, $id)
    {
       $post=Post::findOrFail($id);
       $img1=$this->DestroyImg($request,$id,'img1');
       $img2=$this->DestroyImg($request,$id,'img2');
       $img3=$this->DestroyImg($request,$id,'img3');
       $img4=$this->DestroyImg($request,$id,'img4');
       $img5=$this->DestroyImg($request,$id,'img5');
       $img6=$this->DestroyImg($request,$id,'img6');
       $img7=$this->DestroyImg($request,$id,'img7');
        $url=(isset($request->url)&& !empty($request->url))?str_replace('watch?v=','embed/',$request->url):null;
       $post->update([
           'title'=>$request->title,
           'post'=>$request->post,
           'excerpt'=>$request->excerpt,
           'img1'=>$img1,
           'img2'=>$img2,
           'img3'=>$img3,
           'img4'=>$img4,
           'img5'=>$img5,
           'img6'=>$img6,
           'img7'=>$img7,
           'url'=>$url,
           'id_cat'=>$request->id_cat
       ]);
       return redirect()->back()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $path1=storage_path().'/app/images/posts/'.$post->img1;
        $path2=storage_path().'/app/images/posts/'.$post->img2;
        $path3=storage_path().'/app/images/posts/'.$post->img3;
        $path4=storage_path().'/app/images/posts/'.$post->img4;
        if(is_file($path1)){
            unlink($path1);
        }
        if(is_file($path2)){
            unlink($path2);
        }
        if(is_file($path3)){
            unlink($path3);
        }
        if(is_file($path4)){
            unlink($path4);
        }
        $post->delete();
        return redirect('admin/posts')->with('success','تم الحذف بنجاح');
    }
    public function UploadImg($req, $field = 'img', $folder = 'cats')
    {
        $name=null;
        if ($req->hasFile($field)) {
            $path = storage_path('app/images/' . $folder);
            $ex = $req->file($field)->getClientOriginalExtension();
            $name = '_post' . uniqid() .time().'.' . $ex;
            $req->file($field)->move($path, $name);

        }
        return $name;
    }
    public function DestroyImg($req,$id,$feald='img'){
        $old=Post::findOrFail($id)->$feald;
        $name=$this->UploadImg($req,$feald,'posts');
        if($name!=null){
            $path=storage_path().'/app/images/posts/'.$old;
            if (is_file($path)&&file_exists($path)){
                unlink($path);
            }
            return $name;
        }
        return $old;
    }
}
