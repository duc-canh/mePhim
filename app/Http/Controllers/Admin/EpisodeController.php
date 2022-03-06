<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpisodeController extends Controller
{
    public function index(){
        $episodes = Episode::paginate(10);
        return view('admin.episode.list',compact('episodes'));
    }
    public function create(){
        $movies = Movie::all();
        return view('admin.episode.create',compact('movies'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'movie_id'=>'required',
            'link_movie'=>'required',
            'episodes'=>'required',
        ]);
        Episode::create([
            'movie_id'=>$request->movie_id,
            'link_movie'=>$request->link_movie,
            'episodes'=>$request->episodes,
        ]);
        return redirect()->route('admin.episode.index')->with('success','crate episode successfully');
    }
    public function edit($id){
        $episode = Episode::find($id);
        $movies = Movie::all();
        return view('admin.episode.edit',compact('episode','movies'));
    }
    public function update(Request $request,$id){
        
        $episode = Episode::find($id);
        $episode->update([
            'movie_id'=>isset($request->movie_id) ? $request->movie_id : $episode->movie_id,
            'link_movie'=>$request->link_movie,
            'episodes'=>$request->episodes,
        ]);
        return redirect()->route('admin.episode.index')->with('success','update episode successfully');
    }
    public function delete($id){
        Episode::where('id',$id)->delete();
        return redirect()->route('admin.episode.index')->with('success','delete episode successfully');
    }
}
