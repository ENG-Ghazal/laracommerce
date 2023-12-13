<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request){
          $validatedData = $request->validated();
        //   $category = Category::create($validatedData);
        $category = new Category();
        $category->name = $validatedData['name'];
        $category->slug = Str::slug ($validatedData['slug']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $file_name = time().'.'.$ext;
            $file->move(public_path('uploads/category/'),$file_name);
            $category->image = $file_name;

        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_description = $validatedData['meta_description'];
        $category->meta_keyword = $validatedData['meta_keyword'];

        $category->status = $request['status'] == true ? '1': '0';
        $category->save();

           return redirect()->route('admin.category.index')->with('message','category added successfully');
    }
    public function edit($id){
      $category = Category::find($id);
      return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormRequest $request , $id){
        $validatedData = $request->validated();
        $category = Category::findOrFail($id);
        $category->name = $validatedData['name'];
        $category->slug = Str::slug ($validatedData['slug']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){
            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
        
            $ext = $file->getClientOriginalExtension();
            $file_name = time().'.'.$ext;
            $file->move(public_path('uploads/category/'),$file_name);
            $category->image = $file_name;

        }
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_description = $validatedData['meta_description'];
        $category->meta_keyword = $validatedData['meta_keyword'];

        $category->status = $request['status'] == true ? '1': '0';
        $category->update();

           return redirect()->route('admin.category.index')->with('message','category updated successfully');
    }
}
