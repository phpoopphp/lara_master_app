<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with(['user','category','photo'])->get();
        return view('admin.posts.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $input=$request->all();
        if($request->hasFile('photo')){
//            $input['photo_id']=parent::fileUpload($request);
            $input['photo_id']=$this->fileUpload($request);
        }else{
            $input['photo_id']=rand(3,6);
        }

        auth()->user()->posts()->create($input);
        return redirect()->route('admin.posts.index');
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
        $post=Post::with('photo')->find($id);
        return view('admin.posts.edit',compact('post'));
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
       $post=auth()->user()->posts()->whereId($id)->first();
       $input=$request->all();
       if($request->hasFile('photo')){
           $input['photo_id']=$this->fileUpload($request);
           \File::delete($post->photo->file);
       }else{
           $input['photo_id']=$post->photo_id;
       }
       $post->update($input);
       return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        \File::delete($post->photo->file);
        $post->delete();
        return back();
    }
}
