<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('admin.genre.list',\compact('genres'));
    }
    public function create(){
        return view('admin.genre.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $slug = Str::slug($request->title);
        $checkSlug = Genre::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        Genre::create([
            'title'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.genre.index')->with('success','create successfully');
    }

    public function edit($id){
        $genre = Genre::find($id);
        return view('admin.genre.edit',compact('genre'));
    }

    public function update(Request $request,$id){
        $genre = Genre::find($id);
        $slug = Str::slug($request->title);
        $checkSlug = Genre::where('slug',$slug)->first();

        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        $genre->update([
            'title'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$request->status ? "0" : "1",
        ]);
        return redirect()->route('admin.genre.index')->with('success','update successfully');
    }

    public function delete($id){
        Genre::where('id',$id)->delete();
        return redirect()->route('admin.genre.index')->with('success','delete successfully');
    }
}
