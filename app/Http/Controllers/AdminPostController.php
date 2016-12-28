<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Http\Requests;
use App\Post;
use App\Photo;
use App\Category;
class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts=Post::all();

        return view('admin.posts.index',compact('posts'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::lists('name','id')->all();
        
        return view('admin.posts.create',compact('categories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input=$request->all();

        $user=\Auth::user();

        if($file=$request->file('photo_id'))
        {
            $name=time().$file->getClientOriginalName();
            $file->move('post_image',$name);

            $photo=Photo::create(['file'=> $name]);

            $input['photo_id']=$photo->id;

        }
         $user->post()->create($input);

         return redirect('admin/post');
        //
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
        $posts=Post::findOrFail($id);
        $categories=Category::lists('name','id')->all();
        return view('admin.posts.edit',compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $input=$request->all();

        if($file=$request->file('photo_id'))
        {
            $name=time().$file->getClientOriginalName();
            $file->move('post_image',$name);

            $photo=Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;
        }
        
        \Auth::user()->post()->whereId($id)->first()->update($input);

        return redirect('admin/post');
        //
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
        
        $photo=$post->photo;
       
        unlink(public_path()."/post_image/".$post->photo->file);

        $photo->delete();
        $post->delete();
        // \Auth::user()->post()->whereId($id)->first()->delete();

       return redirect('admin/post');
        //
    }

    public function post($id)
    {
        $post=Post::findOrFail($id);

        return view('post',compact('post'));


    }
}
