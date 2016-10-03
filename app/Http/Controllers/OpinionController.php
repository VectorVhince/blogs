<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Opinion;
use App\OpinionComment;

use Auth;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opinions = Opinion::all();

        return view('opinion.index')->with('opinions', $opinions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opinion.create');
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
            'opinion_title' => 'required|max:255',
            'opinion_body' => 'required',
            'opinion_img' => 'required',
        ]);

        $fileName = time() . '.' . $request->file('opinion_img')->getClientOriginalExtension();

        if ($request->hasFile('opinion_img')) {
            $request->file('opinion_img')->move(public_path('img/uploads'), $fileName);
        }

        $opinion = new Opinion;
        $opinion->opinion_title = $request->opinion_title;
        $opinion->opinion_body = $request->opinion_body;
        $opinion->opinion_img = $fileName;
        $opinion->opinion_user = Auth::user()->name;
        $opinion->opinion_update = Auth::user()->name;
        $opinion->save();
        
        return redirect()->route('opinion.show',$opinion->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opinion = Opinion::find($id);
        $comments = Opinion::find($id)->opinionComments;
        return view('opinion.show')->with('opinion', $opinion)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opinion = Opinion::find($id);

        return view('opinion.edit')->with('opinion', $opinion);
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
            'opinion_title' => 'required|max:255',
            'opinion_body' => 'required',
        ]);
        $opinion = Opinion::find($id);


        if ($request->hasFile('opinion_img')) {
            $fileName = time() . '.' . $request->file('opinion_img')->getClientOriginalExtension();
            $request->file('opinion_img')->move(public_path('img/uploads'), $fileName);
            $opinion->opinion_img = $fileName;
        }

        $opinion->opinion_title = $request->opinion_title;
        $opinion->opinion_body = $request->opinion_body;
        $opinion->opinion_update = Auth::user()->name;
        $opinion->update();
        
        return redirect()->route('opinion.show',$opinion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Opinion::find($id)->delete();

        return redirect()->route('opinion.index');
    }

    public function opinionComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $opinion = Opinion::find($id);

        $comment = new OpinionComment;
        $comment->opinion_id = $opinion->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('opinion.show',$opinion->id);
    }
}
