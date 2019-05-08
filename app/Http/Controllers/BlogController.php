<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

// import models
use App\Post;
use App\Categorie;
use App\User;
use App\Tag;

class BlogController extends Controller
{
    public function index(){

        // ELOQUENT sa Blogom i njegovim autorom, sortiraj od najnovijeg, da je publish i paginacija po 3
        $posts = Post::with('author', 'category', 'tags', 'comments')
                    ->orderBy('created_at', 'DESC')
                    ->published()
                    ->search(request('search'))
                    ->paginate(3);
        return view('pages.index', compact('posts'));
    }

    public function preview($id){

        // pregled bloga koji je publish naravno
         $post = Post::published()
                     ->findOrFail($id);

         // increment counter view            
         $viewCount = $post->view_count + 1;
         $post->update(['view_count' => $viewCount]);

        return view('pages.preview', compact('post'));
    }

    public function category($id){

        // filtriranje blog-a po katerogiriji
        $posts = Categorie::find($id)
                            ->posts()
                            ->with('author', 'tags', 'comments')
                            ->published()
                            ->paginate(3);
        return view('pages.index', compact('posts'));
    }

    public function tag($id){

        // filtriranje blog-a po tagu
        $posts = Tag::find($id)
                            ->posts()
                            ->with('author')
                            ->published()
                            ->paginate(3);
        return view('pages.index', compact('posts'));
    }

    public function author($id){

        // filtriranje blog-a po autoru
        $posts = User::find($id)
                            ->posts()
                            ->with('category', 'tags', 'comments')
                            ->published()
                            ->paginate(3);
        return view('pages.index', compact('posts'));
    }
}
