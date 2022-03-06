<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'views_count',
        'movie_new',
        'movie_highlight',
        'status',
        'release_year',
        'category_id',
        'genre_id',
        'country_id',
    ];
    protected $timestamp = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function episodes(){
        return $this->hasMany(Episode::class);
    }

   public function urlImage(){
        return '/image/post/'.$this->image;
   }
}
