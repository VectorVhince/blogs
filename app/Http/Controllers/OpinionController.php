<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Opinion;
use App\OpinionComment;
use Auth;
use Image;
use App\Page;


class OpinionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['update','store','destroy','edit','featured','unfeatured']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opinions = Opinion::orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','selfopinion')->first();

        return view('opinion.index')->with('opinions', $opinions)->with('category',$category);
    }

    public function sortBy(Request $request)
    {
        switch ($request->key) {
            case 'date':
                $opinions = Opinion::orderBy('created_at', 'desc')->paginate(10);
                return view('opinion.index')->with('opinions', $opinions);
                break;

            case 'name':
                $opinions = Opinion::orderBy('title', 'asc')->paginate(10);
                return view('opinion.index')->with('opinions', $opinions);
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
            'title' => 'required|max:255|unique:opinions,title',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
        }

        $opinion = new Opinion;
        $opinion->user_id = Auth::user()->id;
        $opinion->title = $request->title;
        $opinion->body = $request->body;
        $opinion->image = $fileName;
        $opinion->user = Auth::user()->name;
        $opinion->update = Auth::user()->name;
        $opinion->featured = $request->featured;
        $opinion->save();
        
        $request->session()->flash('alert-success', 'Post was successfully created!');
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
        $stories = Opinion::where('id', '!=', $news->id)->get()->random(2);

        return view('opinion.show')->with('opinion', $opinion)->with('comments', $comments)->with('stories', $stories);
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
        $opinion = Opinion::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:opinions,title,'.$opinion->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);
        
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $opinion->image = $fileName;
        }

        $opinion->title = $request->title;
        $opinion->body = $request->body;
        $opinion->update = Auth::user()->name;
        $opinion->update();
        
        $request->session()->flash('alert-success', 'Post was successfully edited!');
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

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('opinion.index');
    }

    public function opinionComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
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

    public function featured(Request $request, $id) {
        $opinion = Opinion::find($id);
        $opinion->featured = '1';
        $opinion->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }

    public function unfeatured(Request $request, $id) {
        $opinion = Opinion::find($id);
        $opinion->featured = '0';
        $opinion->update();

        $request->session()->flash('alert-danger', 'Post was successfully unfeatured!');
        return redirect()->route('home');        
    }
}
