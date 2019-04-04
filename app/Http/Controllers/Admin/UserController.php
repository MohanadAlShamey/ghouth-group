<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UserChangePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\DataTables\UserDataTables;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTables $r)
    {

        return $r->render('admin.users.dt.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(AddUserRequest $request)
    {
        //$request->validated();
      User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
          'role'=>$request->role
      ]);
      return redirect()->back()->with('success','تمت إضافة العضو بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user=User::findOrFail($id);
        if($id==1&& auth()->user()->id!=1){
            return redirect()->back()->with('success','ليس لديك الصلاحية للتعديل على المدير');
        }
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role
        ]);
        return redirect('admin/users')->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id!=1 && auth()->user()->id!=$id){
            User::findOrFail($id)->delete();
        }
        return redirect()->back()->with('success','تم الحذف بنجاح');
    }
    public function changePassword(UserChangePasswordRequest $request , $id){
        $user=User::findOrFail($id);
        if($id==1&& auth()->user()->id!=1){
            return redirect()->back()->with('success','ليس لديك الصلاحية للتعديل على المدير');
        }
        $user->update([
            'password'=>bcrypt($request->password),
        ]);
        return redirect('admin/users')->with('success','تم التعديل بنجاح');
    }
}
