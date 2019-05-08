<?php

namespace App\Views\Composers;
use Illuminate\View\View;
// Models
use App\Categorie;
use App\Post;
use App\Tag;

class NavigationComposer {

    public function compose(View $view){

        $this->composeCategories($view);
        $this->composeTags($view);
        $this->composePopularPosts($view);

    }

    public function composeCategories(View $view){
  
            $categories = Categorie::with(['posts' => function($query){
                $query->published();
            }])->get();

           $view->with('categories', $categories);

      }

      public function composeTags(view $view){
            $tags = Tag::has('posts')->get();
            $view->with('tags', $tags);
      }

    public function composePopularPosts(View $view){
  
             $posts = Post::published()->popular()->take(3)->get();
             $view->with('posts', $posts);
        }
}

