<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\PostComment;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required|max:255',
            'post_body' => 'required',
            'post_img' => 'required',
        ]);

        $fileName = time() . '.' . $request->file('post_img')->getClientOriginalExtension();

        if ($request->hasFile('post_img')) {
            $request->file('post_img')->move(public_path('img/uploads'), $fileName);
        }

        $post = new Post; 

        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->post_img = $fileName;
        $post->post_user = Auth::user()->name;
        $post->post_update = Auth::user()->name;
        $post->save();

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Post::find($id)->postComments;
        return view('posts.show')->with('post', $post)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
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
            'post_title' => 'required|max:255',
            'post_body' => 'required',
        ]);
        $post = Post::find($id);


        if ($request->hasFile('post_img')) {
            $fileName = time() . '.' . $request->file('post_img')->getClientOriginalExtension();
            $request->file('post_img')->move(public_path('img/uploads'), $fileName);
            $post->post_img = $fileName;
        }

        $post->post_title = $request->post_title;
        $post->post_body = $request->post_body;
        $post->post_update = Auth::user()->name;
        $post->update();
        
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('posts.index');    
    }

    public function postComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $post = Post::find($id);

        $comment = new PostComment;
        $comment->post_id = $post->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('posts.show',$post->id);
    }
}
