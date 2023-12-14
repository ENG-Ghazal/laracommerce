<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }
    public function create(){
        return view('admin.color.create');
    }
    public function store(ColorFormRequest $request){
        $validatedData =  $request->validated();
        $validatedData['status'] = $request->status == true ?'1':'0';
        $color = Color::create($validatedData);
        return redirect()->route('admin.color.index')->with('message','color created successfully');
    }
    public function edit($color_id){
        $color = Color::findOrFail($color_id);
        return view('admin.color.edit',compact('color'));
    }
    public function update(ColorFormRequest $request , int $color_id){
        $color = Color::findOrFail($color_id);
        $validatedData =  $request->validated();
        $validatedData['status'] = $request->status == true ?'1':'0';
        $color->update($validatedData);
        return redirect()->route('admin.color.index')->with('message','color updated successfully');
    }
    public function destroy($color_id){
         $color = Color::findOrFail($color_id);
         $color->delete();
          return redirect()->back()->with('message','Color Deleted Successfully');
    }
}
