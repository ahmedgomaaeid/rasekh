<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins =Admin::all();
        return view('admin.admin.index',compact('admins'));
    }
    public function create()
    {
        return view('admin.admin.create');
    }
    public function store(AdminRequest $request)
    {
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        if(!$request->has('p_admin')){
            $admin->p_admin = 0;
        }else{
            $admin->p_admin = 1;
        }
        if(!$request->has('p_purchase')){
            $admin->p_purchase = 0;
        }else{
            $admin->p_purchase = 1;
        }
        if(!$request->has('p_course')){
            $admin->p_course = 0;
        }else{
            $admin->p_course = 1;
        }
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('get.admin.index')->with('success','تم اضافة المشرف بنجاح');
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admin.edit',compact('admin'));
    }
    public function update(Request $request,$id)
    {
        $this ->validate($request,[
            'name'=>'required|max:100',
            'email'=>'required|email|unique:admins,email,'.$id,
            'password'=>'max:100',
        ]);
        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if(!$request->has('p_admin')){
            $admin->p_admin = 0;
        }else{
            $admin->p_admin = 1;
        }
        if(!$request->has('p_purchase')){
            $admin->p_purchase = 0;
        }else{
            $admin->p_purchase = 1;
        }
        if(!$request->has('p_course')){
            $admin->p_course = 0;
        }else{
            $admin->p_course = 1;
        }
        if(!empty($request->password)){
            $admin->password = bcrypt($request->password);
        }
        $admin->save();
        return redirect()->route('get.admin.index')->with('success','تم تعديل المشرف بنجاح');
    }
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('get.admin.index')->with('success','تم حذف المشرف بنجاح');
    }

    
}
