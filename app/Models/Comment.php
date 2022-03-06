<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'movie_id',
        'name',
        'content',
    ];
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
