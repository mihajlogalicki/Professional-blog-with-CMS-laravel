<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = ['author_name', 'author_email', 'text', 'post_id'];

  // date Accessors
  public function getDateAttribute(){
   return  $this->created_at->diffForHumans();
  }

   public function post(){
        return $this->belongsTo('App\Comment');
  }
}
