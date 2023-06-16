<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Catogry\MainCategory;
use App\Models\Catogry\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('admin.category.sub-category.index', compact('subCategories'));
    }
    public function create()
    {
        $mainCategories = MainCategory::all();
        return view('admin.category.sub-category.create', compact('mainCategories'));
    }
    public function store(SubCategoryRequest $request)
    {
        if($request->hasFile('photo')){
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/subCategory', $file_name);
        }else
        {
            $file_name = '';
        }
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->main_category_id = $request->main_category_id;
        $subCategory->photo = $file_name;
        $subCategory->save();
        return redirect()->route('get.admin.sub-category')->with('success', 'تم اضافة القسم بنجاح');
    }
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $mainCategories = MainCategory::all();
        return view('admin.category.sub-category.edit', compact('subCategory', 'mainCategories'));
    }
    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        if($request->hasFile('photo')){
            if($subCategory->photo != ''){
                unlink('assets/images/subCategory/' . $subCategory->photo);
            }
            $file_extension = $request->file('photo')->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $request->file('photo')->move('assets/images/subCategory', $file_name);
            $subCategory->photo = $file_name;
        }
        $subCategory->name = $request->name;
        $subCategory->main_category_id = $request->main_category_id;
        if(!$request->has('status')){
            $subCategory->status = 0;
        }else{
            $subCategory->status = 1;
        }
        $subCategory->save();
        return redirect()->route('get.admin.sub-category')->with('success', 'تم تعديل القسم بنجاح');
    }
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory->photo != ''){
            unlink('assets/images/subCategory/' . $subCategory->photo);
        }
        $subCategory->delete();
        return redirect()->route('get.admin.sub-category')->with('success', 'تم حذف القسم بنجاح');
    }
}
