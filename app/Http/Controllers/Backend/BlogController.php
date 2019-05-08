<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use Intervention\Image\Facades\Image;
// import models
use App\Post;

class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $uploadPath;

     public function __construct(){

         parent::__construct();
         $this->uploadPath = public_path(config('cms.image.directory'));

     }

    public function index(){

        $posts = Post::with('category', 'author')->paginate(3);
        return view("pages.admin.index", compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post){
        
        return view('pages.admin.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'categorie_id' => 'required',
            'image' => 'mimes:jpg,jpeg,bmp,png'
        ]);

        $data = $this->handleRequest($request);

        $request->user()->posts()->create($data);
        return redirect(route('admin.index'))->with('message', 'Your post was created successfully!');
    }

    private function handleRequest($request){

        $data = $request->all();

        if($request->hasFIle('image')){

            $width = config('cms.image.thumbnail.width');
            $height = config('cms.image.thumbnail.height');
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;
            $successUploaded =  $image->move($destination, $fileName);

            if($successUploaded){
                
                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                Image::make($destination. '/' . $fileName)
                     ->resize($width, $height)
                     ->save($destination . "/" . $thumbnail);
            }
            $data['image'] = $fileName;

        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'categorie_id' => 'required',
        ]);

        
        $data = $this->handleRequest($request);
        $post = Post::findOrFail($id)->update($data);
        

        return redirect(route('admin.index'))->with('message', 'Your post was updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect(route('admin.index'))->with('message', 'Your post was deleted successfully!');
    }

}
