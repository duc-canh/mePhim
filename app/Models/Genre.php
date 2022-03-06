<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];

    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
