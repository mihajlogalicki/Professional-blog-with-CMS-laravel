<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//import model
use App\Model;
use App\Post;
use App\Comment;

class CommentController extends Controller
{

    public function store(Request $request, $id){

        $this->validate($request, [
            'author_name' => 'required',
            'author_email' => 'required|unique:comments',
            'text' => 'required'
        ]);

        $data = $request->all();
        $data['post_id'] = $id;

        Comment::create($data);
        return redirect()->back()->with('message', "Your comment successfully send.");
    }
}
