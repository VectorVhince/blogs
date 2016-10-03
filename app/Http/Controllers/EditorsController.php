<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Editors;
use App\EditorsComment;
use Auth;

class EditorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editors = Editors::orderBy('id', 'desc')->get();

        return view('editors.index')->with('editors', $editors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editors.create');
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
            'editors_title' => 'required|max:255',
            'editors_body' => 'required',
            'editors_img' => 'required',
        ]);

        $fileName = time() . '.' . $request->file('editors_img')->getClientOriginalExtension();

        if ($request->hasFile('editors_img')) {
            $request->file('editors_img')->move(public_path('img/uploads'), $fileName);
        }

        $editors = new Editors; 

        $editors->editors_title = $request->editors_title;
        $editors->editors_body = $request->editors_body;
        $editors->editors_img = $fileName;
        $editors->editors_user = Auth::user()->name;
        $editors->editors_update = Auth::user()->name;
        $editors->save();

        return redirect()->route('editors.show',$editors->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editors = Editors::find($id);
        $comments = Editors::find($id)->editorsComments;
        return view('editors.show')->with('editors', $editors)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editors = Editors::find($id);

        return view('editors.edit')->with('editors', $editors);
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
            'editors_title' => 'required|max:255',
            'editors_body' => 'required',
        ]);
        $editors = Editors::find($id);


        if ($request->hasFile('editors_img')) {
            $fileName = time() . '.' . $request->file('editors_img')->getClientOriginalExtension();
            $request->file('editors_img')->move(public_path('img/uploads'), $fileName);
            $editors->editors_img = $fileName;
        }

        $editors->editors_title = $request->editors_title;
        $editors->editors_body = $request->editors_body;
        $editors->editors_update = Auth::user()->name;
        $editors->update();
        
        return redirect()->route('editors.show',$editors->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Editors::find($id)->delete();

        return redirect()->route('editors.index');    
    }

    public function editorsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $editors = Editors::find($id);

        $comment = new EditorsComment;
        $comment->editors_id = $editors->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('editors.show',$editors->id);
    }
}
