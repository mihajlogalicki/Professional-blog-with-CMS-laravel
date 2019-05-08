<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;

class Post extends Model
{

    use SoftDeletes;
    protected $fillable = ['view_count', 'title', 'text', 'published_at', 'categorie_id', 'image'];


    public function getDateAttribute($value){
      return  $this->created_at->diffForHumans();
    }

    public function dateFormatted($showTimes = false){
      $format = "d/m/Y";
      if($showTimes) $format = $format . "H:i:s";
      return  $this->created_at->format($format);
    }

    public function getTagsHtmlAttribute(){
      $anchors = [];
      foreach($this->tags as $tag){
        $anchors[] = '<a href="' . route('tag', $tag->id) . '">' . $tag->name . '</a>';
      }

      return implode(", ", $anchors);
    }

  
    public function scopePublished($query){
      return $query->where('published_at', 1);
    }


    public function scopePopular($query){
      return $query->orderBy('view_count', 'desc');
    }

    public function scopeSearch($query){

      $keyword = request()->input('search');
      return $query->where('title', 'LIKE',  $keyword . "%");

    }

  // Eloquent Relations

  public function author(){
    return $this->belongsTo('App\User', 'user_id');
  }

  public function category(){
    return $this->belongsTo('App\Categorie', 'categorie_id');
  }

  public function tags(){
    return $this->belongsToMany('App\Tag');
  }

  public function comments(){
    return $this->hasMany('App\Comment');
  }

  
}
