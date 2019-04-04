<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\DataTables\CategoryDataTables;
use App\Http\Requests\AddCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTables $cats)
    {
        return $cats->render('admin.cats.dt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::where('id_cat', 0)->get();
        return view('admin.cats.add', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCatRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $this->UploadImg($request),
            'id_cat' => ((isset($request->id_cat)) ? $request->id_cat : 0),
            'num_personal'=>$request->num_personal,
            'icon'=>$this->UploadImg($request,'icon')
        ]);
        return redirect()->back()->with('success', 'تم الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::findOrFail($id);
        return view('admin.cats.show', compact('cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::findOrFail($id);
        $cats = Category::where('id_cat', 0)->get();
        //dd($cats);
        return view('admin.cats.edit', compact('cat', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatRequest $request, $id)
    {
        Category::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $this->DestroyImg($request, $id),
            'id_cat' => ((isset($request->id_cat)) ? $request->id_cat : 0),
            'num_personal'=>$request->num_personal,
            'icon' => $this->DestroyImg($request, $id,'icon'),
        ]);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::where('id_cat', $id)->count();
        if ($cat > 0) {
            return redirect()->back()->with('wrong', 'هناك أقسام داخل هذا القسم لا يمكن حذفه');
        } else {
            $post = Post::where('id_cat', $id)->count();
            if ($post > 0) {
                return redirect()->back()->with('wrong', 'هناك مقالات داخل هذا القسم لا يمكن حذفه');
            } else {
            Category::findOrFail($id)->delete();
                return redirect()->back()->with('success', 'تم الحذف بنجاح');
            }
        }
    }


    public function UploadImg($req, $field = 'img', $folder = 'cats')
    {
        $name = null;
        if ($req->hasFile($field)) {
            $path = storage_path('app/images/' . $folder);
            $ex = $req->file($field)->getClientOriginalExtension();
            $name = '_cats' . time() . '.' . $ex;
            $req->file($field)->move($path, $name);

        }
        return $name;
    }

    public function DestroyImg($req, $id,$fild='img')
    {
        $old = Category::findOrFail($id)->$fild;
        $name = $this->UploadImg($req,$fild);
        if ($name != null) {
            $path = storage_path() . '/app/images/cats/' . $old;
            if (is_file($path) && file_exists($path)) {
                unlink($path);
            }
            return $name;
        }
        return $old;
    }
}
