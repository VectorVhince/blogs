<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Features;
use App\FeaturesComment;
use Auth;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Features::orderBy('id', 'desc')->get();

        return view('features.index')->with('features', $features);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.create');
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
            'features_title' => 'required|max:255',
            'features_body' => 'required',
            'features_img' => 'required',
        ]);

        $fileName = time() . '.' . $request->file('features_img')->getClientOriginalExtension();

        if ($request->hasFile('features_img')) {
            $request->file('features_img')->move(public_path('img/uploads'), $fileName);
        }

        $features = new features; 

        $features->features_title = $request->features_title;
        $features->features_body = $request->features_body;
        $features->features_img = $fileName;
        $features->features_user = Auth::user()->name;
        $features->features_update = Auth::user()->name;
        $features->save();

        return redirect()->route('features.show',$features->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $features = Features::find($id);
        $comments = Features::find($id)->featuresComments;
        return view('features.show')->with('features', $features)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $features = features::find($id);

        return view('features.edit')->with('features', $features);
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
            'features_title' => 'required|max:255',
            'features_body' => 'required',
        ]);
        $features = Features::find($id);


        if ($request->hasFile('features_img')) {
            $fileName = time() . '.' . $request->file('features_img')->getClientOriginalExtension();
            $request->file('features_img')->move(public_path('img/uploads'), $fileName);
            $features->features_img = $fileName;
        }

        $features->features_title = $request->features_title;
        $features->features_body = $request->features_body;
        $features->features_update = Auth::user()->name;
        $features->update();
        
        return redirect()->route('features.show',$features->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Features::find($id)->delete();

        return redirect()->route('features.index');    
    }

    public function featuresComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
        ]);

        $features = Features::find($id);

        $comment = new FeaturesComment;
        $comment->features_id = $features->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('features.show',$features->id);
    }
}
