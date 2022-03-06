<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('admin.country.list',\compact('countries'));
    }
    public function create(){
        return view('admin.country.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);

        $slug = Str::slug($request->title);
        $checkSlug = Country::where('slug',$slug)->first();

        while($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }
        Country::create([
            'title'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.country.index')->with('success','create successfully');
    }

    public function edit($id){
        $country = Country::find($id);
        return view('admin.country.edit',compact('country'));
    }

    public function update(Request $request,$id){
        $country = Country::find($id);
        $slug = Str::slug($request->title);
        $checkSlug = Country::where('slug',$slug)->first();

        if($checkSlug){
            $slug = $checkSlug->slug . Str::random(2);
        }

        $country->update([
            'title'=>$request->title,
            'slug'=>$slug,
            'description'=>$request->description,
            'status'=>$request->status ? "0" : "1",
        ]);
        return redirect()->route('admin.country.index')->with('success','update successfully');
    }

    public function delete($id){
        Country::where('id',$id)->delete();
        return redirect()->route('admin.country.index')->with('success','delete successfully');
    }
}
