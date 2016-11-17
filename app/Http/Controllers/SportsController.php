<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sports;
use App\SportsComment;
use Auth;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sports::orderBy('id', 'desc')->get();

        return view('sports.index')->with('sports', $sports);
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            $request->file('image')->move(public_path('img/uploads'), $fileName);
        }

        $sports = new Sports; 

        $sports->title = $request->title;
        $sports->body = $request->body;
        $sports->image = $fileName;
        $sports->user = Auth::user()->name;
        $sports->update = Auth::user()->name;
        $sports->save();

        return redirect()->route('sports.show',$sports->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sports = Sports::find($id);
        $comments = Sports::find($id)->sportsComments;
        return view('sports.show')->with('sports', $sports)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sports = Sports::find($id);

        return view('sports.edit')->with('sports', $sports);
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
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png',
        ]);
        $sports = Sports::find($id);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img/uploads'), $fileName);
            $sports->image = $fileName;
        }

        $sports->title = $request->title;
        $sports->body = $request->body;
        $sports->update = Auth::user()->name;
        $sports->update();
        
        return redirect()->route('sports.show',$sports->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sports::find($id)->delete();

        return redirect()->route('sports.index');    
    }

    public function sportsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $sports = Sports::find($id);

        $comment = new SportsComment;
        $comment->sports_id = $sports->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('sports.show',$sports->id);
    }
}
