<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    function create()
    {

        return view('admin.category.create');
    }
    function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $slug = Str::slug($data['slug']);

        $counter = 0;
        while (Category::whereSlug($slug)->exists()) {
            $counter++;
            $slug = Str::slug($data['slug']) . '-' . $counter;
        }


        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $slug;
        $category->description = $data['description'];
        if ($request->hasFile('image')) {
            $file =  $request->file('image');
            $fileName  = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);

            $category->image = $fileName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = auth()->user()->id;
        $category->save();

        return  redirect('admin/category')->with('message', 'Category Added successfully');
    }

    function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('admin.category.edit', compact('category'));
    }

    function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $slug = Str::slug($data['slug']);
        $counter = 0;
        while (Category::whereSlug($slug)->where('id', '!=', $category_id)->exists()) {
            $counter++;
            $slug = Str::slug($data['slug']) . '-' . $counter;
        }


        $category = Category::findOrFail($category_id);
        $category->name = $data['name'];
        $category->slug = $slug;
        $category->description = $data['description'];

        if ($request->hasFile('image')) {

            if (File::exists('uploads/category/' . $category->image)) {
                File::delete('uploads/category/' . $category->image);
            }


            $file =  $request->file('image');
            $fileName  = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = auth()->user()->id;
        $category->update();

        return  redirect('admin/category')->with('message', 'Category Updated successfully');
    }

    function destroy($category)
    {
        $category = Category::findOrFail($category);
        if ($category) {
            if (File::exists('uploads/category/' . $category->image)) {
                File::delete('uploads/category/' . $category->image);
            }
            $category->delete();
            return  redirect('admin/category')->with('message', 'Category Deleted successfully');
        }
    }
}
