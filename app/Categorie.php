<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Categorie extends Model
{
    protected $fillable = ['name', 'slug', ];
    // Eloquent Relations
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
