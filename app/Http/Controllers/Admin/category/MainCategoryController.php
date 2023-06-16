<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Catogry\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index()
    {
        $mainCategories = MainCategory::all();
        return view('admin.category.main-category.index', compact('mainCategories'));
    }
    public function create()
    {
        return view('admin.category.main-category.create');
    }
    public function store(MainCategoryRequest $request)
    {
        if($request->hasFile('photo')){
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/mainCategory', $file_name);
        }else
        {
            $file_name = '';
        }
        $mainCategory = new MainCategory();
        $mainCategory->name = $request->name;
        $mainCategory->photo = $file_name;
        $mainCategory->save();
        return redirect()->route('get.admin.main-category')->with('success', 'تم اضافة القسم بنجاح');
    }
    public function edit($id)
    {
        $mainCategory = MainCategory::find($id);
        return view('admin.category.main-category.edit', compact('mainCategory'));
    }
    public function update(Request $request, $id)
    {
        $mainCategory = MainCategory::find($id);

        if($request->hasFile('photo')){
            if($mainCategory->photo != ''){
                unlink('assets/images/mainCategory/' . $mainCategory->photo);
            }
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/mainCategory', $file_name);
            $mainCategory->photo = $file_name;
        }
        $mainCategory->name = $request->name;
        if(!$request->has('status')){
            $mainCategory->status = 0;
        }else{
            $mainCategory->status = 1;
        }
        $mainCategory->save();
        return redirect()->route('get.admin.main-category')->with('success', 'تم تعديل القسم بنجاح');
    }
    public function destroy($id)
    {
        $mainCategory = MainCategory::find($id);
        if($mainCategory->photo != ''){
            unlink('assets/images/mainCategory/' . $mainCategory->photo);
        }
        $mainCategory->delete();
        return redirect()->route('get.admin.main-category')->with('success', 'تم حذف القسم بنجاح');
    }

}
