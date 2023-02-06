<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    function create(){
        return view('admin.category.create');

    }
    function store(CategoryFormRequest $request){
        $data = $request->validated();

        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        if($request->hasFile('image')){
            $file =  $request->file('image');
            $fileName  = time() .'.'. $file->getClientOriginalExtension();
            $file->move('uploads/category/',$fileName);

            $category->image = $fileName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = auth()->user()->id;
        $category->save();

        return  redirect('admin/category')->with('message','Category Added successfully');

    }
}
