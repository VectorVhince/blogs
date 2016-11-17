<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Artworks;
use App\ArtworksComment;
use Auth;

class ArtworksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artworks = Artworks::orderBy('id', 'desc')->get();

        return view('artworks.index')->with('artworks', $artworks);
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

        $artworks = new Artworks; 

        $artworks->title = $request->title;
        $artworks->body = $request->body;
        $artworks->image = $fileName;
        $artworks->user = Auth::user()->name;
        $artworks->update = Auth::user()->name;
        $artworks->save();

        return redirect()->route('artworks.show',$artworks->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artworks = Artworks::find($id);
        $comments = Artworks::find($id)->artworksComments;
        return view('artworks.show')->with('artworks', $artworks)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artworks = Artworks::find($id);

        return view('artworks.edit')->with('artworks', $artworks);
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
        $artworks = Artworks::find($id);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img/uploads'), $fileName);
            $artworks->image = $fileName;
        }

        $artworks->title = $request->title;
        $artworks->body = $request->body;
        $artworks->update = Auth::user()->name;
        $artworks->update();
        
        return redirect()->route('artworks.show',$artworks->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artworks::find($id)->delete();

        return redirect()->route('artworks.index');    
    }

    public function artworksComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $artworks = Artworks::find($id);

        $comment = new ArtworksComment;
        $comment->artworks_id = $artworks->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('artworks.show',$artworks->id);
    }
}
