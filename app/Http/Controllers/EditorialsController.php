<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Editorials;
use App\EditorialsComment;
use App\Featured;
use Auth;
use Image;

class EditorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editorials = Editorials::orderBy('id', 'desc')->paginate(10);

        return view('editorial.index')->with('editorials', $editorials);
    }

    public function sortBy(Request $request)
    {
        switch ($request->key) {
            case 'date':
                $editorials = Editorials::orderBy('created_at', 'desc')->paginate(10);
                return view('editorial.index')->with('editorials', $editorials);
                break;

            case 'name':
                $editorials = Editorials::orderBy('title', 'asc')->paginate(10);
                return view('editorial.index')->with('editorials', $editorials);
                break;
            
            default:
                # code...
                break;
        }
        
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
            'title' => 'required|max:255|unique:editorials,title',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
        }

        $editorials = new Editorials; 

        $editorials->user_id = Auth::user()->id;
        $editorials->title = $request->title;
        $editorials->body = $request->body;
        $editorials->image = $fileName;
        $editorials->user = Auth::user()->name;
        $editorials->update = Auth::user()->name;
        $editorials->save();

        $request->session()->flash('alert-success', 'Post was successfully created!');
        return redirect()->route('editorial.show',$editorials->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editorials = Editorials::find($id);
        $comments = Editorials::find($id)->editorialsComments;
        return view('editorial.show')->with('editorials', $editorials)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editorials = Editorials::find($id);

        return view('editorial.edit')->with('editorials', $editorials);
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
        $editorials = Editorials::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:editorials,title,'.$editorials->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $editorials->image = $fileName;
        }

        $editorials->title = $request->title;
        $editorials->body = $request->body;
        $editorials->update = Auth::user()->name;
        $editorials->update();
        
        $request->session()->flash('alert-success', 'Post was successfully edited!');
        return redirect()->route('editorial.show',$editorials->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Featured::where('category_id', Editorials::find($id)->id)->delete();
        
        Editorials::find($id)->delete();

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('editorial.index');    
    }

    public function editorialsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required',
            // 'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $editorials = Editorials::find($id);

        $comment = new EditorialsComment;
        $comment->editorials_id = $editorials->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('editorial.show',$editorials->id);
    }

    public function featured(Request $request, $id) {
        $editorials = Editorials::find($id);
        $editorials->featured = '1';
        $editorials->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }
}
