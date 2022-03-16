<?php

namespace App\Http\Controllers\Web;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index(){
        $phim_hots = Movie::where('movie_highlight',1)->where('status',1)->get();
        $categories = Category::orderBy('id','DESC')->where('status',1)->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $movie_views = Movie::orderBy('views_count','DESC')->take(7)->get();

        $countries = Country::orderBy('id','DESC')->get();
        $categories_home = Category::with('movies')->orderBy('id','DESC')->where('status',1)->get();
        return view('pages.home',compact('categories','genres','countries','categories_home','phim_hots','movie_views'));
    }
    public function category($slug){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie_views = Movie::orderBy('views_count','DESC')->take(7)->get();

        $cate_slug = Category::where('slug',$slug)->first();
        $movies = Movie::where('category_id',$cate_slug->id)->paginate(40);
        return view('pages.category',compact('categories','genres','countries','cate_slug','movies','movie_views'));
    }
    public function genre($slug){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie_views = Movie::orderBy('views_count','DESC')->take(7)->get();

        $genre_slug = Genre::where('slug',$slug)->first();
        $movies = Movie::where('genre_id',$genre_slug->id)->paginate(1);
        return view('pages.genre',compact('categories','genres','countries','genre_slug','movies','movie_views'));
    }
    public function country($slug){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie_views = Movie::orderBy('views_count','DESC')->take(7)->get();

        $country_slug = Country::where('slug',$slug)->first();
        $movies = Movie::where('country_id',$country_slug->id)->paginate(40);
        return view('pages.country',compact('categories','genres','countries','country_slug','movies','movie_views'));
    }
    public function movie($slug){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie = Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first();
        $movie_related = Movie::with('category','genre','country')->where('category_id',$movie->category_id)
        ->inRandomOrder()->whereNotIn('slug',[$slug])->get();
        
        return view('pages.movie',compact('categories','genres','countries','movie','movie_related'));
    }
    public function watch($slug){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie_views = Movie::orderBy('views_count','DESC')->take(7)->get();

        $movie_watch =  Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first();
        $movie_related = Movie::with('category','genre','country')->where('category_id',$movie_watch->category_id)
        ->inRandomOrder()->whereNotIn('slug',[$slug])->get();
        $movie_episodes = Episode::where('movie_id',$movie_watch->id)->orderBy('episodes','ASC')->get();
        $movie_watch->update([
            'views_count'=>$movie_watch->views_count+1
        ]);

        $comments = Comment::where('movie_id',$movie_watch->id)->orderBy('id','DESC')->paginate(10);

        return view('pages.watch',compact('categories','genres','countries','movie_watch',
        'movie_related','movie_episodes','movie_views','comments'));
    }
    public function episode($slug,$episodes){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();
        $movie_views = Movie::orderBy('views_count','DESC')->take(7)->get();

        $movie_watch =  Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first();
        $movie_related = Movie::with('category','genre','country')->where('category_id',$movie_watch->category_id)
        ->inRandomOrder()->whereNotIn('slug',[$slug])->get();
        $movie_episodes = Episode::where('movie_id',$movie_watch->id)->orderBy('episodes','ASC')->get();
        $movie_episode = $movie_watch->episodes->where('episodes',$episodes)->first();
       
        return view('pages.episode',compact('categories','genres','countries','movie_watch','movie_related','movie_episode','movie_views','movie_episodes'));
    }

    public function search(Request $request){
        $categories = Category::orderBy('id','DESC')->get();
        $genres = Genre::orderBy('id','DESC')->get();
        $countries = Country::orderBy('id','DESC')->get();

        $this->validate($request,[
            'search'=>'required'
        ]);

        $results = Movie::where('title','like','%'.$request->search.'%')->get();
        return view('pages.search',compact('results','categories','genres','countries'));
    }

    public function addComment(Request $reques){
        Comment::create([
            'name' => $request->name,
            'content' => $request->content,
            'movie_id'=>$reques->movie_id,
          ]);
          
          return response()->json(['success'=>'Form is successfully submitted!']);
      
    }

    public function signup(){
        return view('pages.signup');
    }
}
