<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $comments=Comment::all();
        // return $comments;
        return view('admin.comments.index',compact('comments'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=\Auth::user();

        $data=[
            'post_id'=>$request->post_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'body'=>$request->body,
            'is_active'=>0
        ];

        Comment::create($data);

        $request->session()->flash('comment_message','Your Comment Successfully Posted.Held for Review.!');
        return \Redirect::back();
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
        // return "yyyy";
        $comments=Comment::where('post_id',$id)->get();
        // return $comments;
        return view('admin.comments.show',compact('comments'));
      
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
        //
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

        Comment::findOrFail($id)->update($request->all());

        return \Redirect::back();
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

        Comment::findOrFail($id)->delete();

        return \Redirect::back();
        //
    }
}
