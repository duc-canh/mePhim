<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
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
