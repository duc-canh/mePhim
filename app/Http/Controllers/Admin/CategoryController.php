<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        return view('admin.category.list',\compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $slug = Str::slug($request->title);
        $checkSlug = Category::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        Category::create([
            'title'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.category.index')->with('success','create successfully');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $slug = Str::slug($request->title);
        $checkSlug = Category::where('slug',$slug)->first();

        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        $category->update([
            'title'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$request->status ? "0" : "1",
        ]);
        return redirect()->route('admin.category.index')->with('success','update category successfully');
    }

    public function delete($id){
        Category::where('id',$id)->delete();
     return redirect()->route('admin.category.index');
    }
}
