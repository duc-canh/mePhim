<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::paginate(10);
       


        return view('admin.movie.list',compact('movies'));
    }

    public function create(){
         $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();

        return view('admin.movie.create',compact('categories','genres','countries'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'required',
            'movie_new'=>'required',
            'movie_highlight'=>'required',
            'status'=>'required',
            'release_year'=>'required',
        ]);
        $slug = Str::slug($request->title);
        $checkSlug = Movie::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();
            $extension = strtolower($extension);
            if(strcasecmp($extension,'jpg') == 0 || strcasecmp($extension,'png') == 0 || 
            strcasecmp($extension,'jepg') == 0){
                $image = Str::random(5)."_".$name_file;
                while(file_exists("image/post/".$image)){
                    $image = Str::random(5)."_".$name_file;
                }
                $file->move("image/post",$image);
            }
        }
        Movie::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image,
            'slug'=>$slug,
            'views_count'=>0,
            'movie_new'=>$request->movie_new,
            'movie_highlight'=>$request->movie_highlight,
            'status'=>$request->status,
            'release_year'=>$request->release_year,
            'category_id'=>$request->category_id,
            'genre_id'=>$request->genre_id,
            'country_id'=>$request->country_id,
        ]);
        return redirect()->route('admin.movie.index')->with('success','create successfully');
    }

    public function edit($id){
        $movie = Movie::find($id);
        $categories = Category::all();
        $genres = Genre::all();
        $countries = Country::all();

        return view('admin.movie.edit',compact('movie','categories','genres','countries'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'movie_new'=>'required',
            'movie_highlight'=>'required',
            'status'=>'required',
            'release_year'=>'required',
        ]);
        $slug = Str::slug($request->title);
        $checkSlug = Movie::where('slug',$slug)->first();

        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();

            $extension = $file->getClientOriginalExtension();
            $extension = strtolower($extension);
            if(strcasecmp($extension,'jpg') == 0 || strcasecmp($extension,'png') == 0 || 
            strcasecmp($extension,'jepg') == 0){
                $image = Str::random(5)."_".$name_file;
                while(file_exists("image/post/".$image)){
                    $image = Str::random(5)."_".$name_file;
                }
                $file->move("image/post",$image);
            }
        }
        $movie = Movie::find($id);
        $movie->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>isset($image) ? $image : $movie->image,
            'slug'=>$slug,
            'movie_new'=>$request->movie_new ? "0" : "1",
            'movie_highlight'=>$request->movie_highlight ? "0" : "1",
            'status'=>$request->status ? "0" : "1",
            'release_year'=>$request->release_year,
            'category_id'=>$request->category_id,
            'genre_id'=>$request->genre_id,
            'country_id'=>$request->country_id,
        ]);
        return redirect()->route('admin.movie.index')->with('success','update successfully');
    }

    public function delete($id){
        $movie = Movie::find($id);
        if(!empty($movie->image)){
            unlink('image/post/'.$movie->image);
        }
        $movie->delete();
        return redirect()->route('admin.movie.index')->with('success','delete successfully');
    }
}
