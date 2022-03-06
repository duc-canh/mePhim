<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episodes';
    protected $fillable = [
        'movie_id',
        'link_movie',
        'episodes',
    ];
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
