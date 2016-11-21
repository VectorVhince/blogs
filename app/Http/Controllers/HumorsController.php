<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Humors;
use App\HumorsComment;
use App\Featured;
use Auth;

class HumorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humors = Humors::orderBy('id', 'desc')->get();

        return view('humors.index')->with('humors', $humors);
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

        $humors = new Humors; 

        $humors->title = $request->title;
        $humors->body = $request->body;
        $humors->image = $fileName;
        $humors->user = Auth::user()->name;
        $humors->update = Auth::user()->name;
        $humors->save();

        return redirect()->route('humors.show',$humors->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $humors = Humors::find($id);
        $comments = Humors::find($id)->humorsComments;
        return view('humors.show')->with('humors', $humors)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $humors = Humors::find($id);

        return view('humors.edit')->with('humors', $humors);
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
        $humors = Humors::find($id);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('img/uploads'), $fileName);
            $humors->image = $fileName;
        }

        $humors->title = $request->title;
        $humors->body = $request->body;
        $humors->update = Auth::user()->name;
        $humors->update();
        
        return redirect()->route('humors.show',$humors->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Featured::where('category_id', Humors::find($id)->id)->delete();
        Humors::find($id)->delete();

        return redirect()->route('humors.index');    
    }

    public function humorsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $humors = Humors::find($id);

        $comment = new HumorsComment;
        $comment->humors_id = $humors->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('humors.show',$humors->id);
    }
}
