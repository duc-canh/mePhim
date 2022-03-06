<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];

    public function movies(){
        return $this->hasMany(Movie::class)->orderBy('id','DESC');
    }
}
