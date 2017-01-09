<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Sports;
use App\SportsComment;
use Auth;
use Image;
use App\Page;
use Counter;

class SportsController extends Controller
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
        $sports = Sports::orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','outsidesports')->first();

        return view('sports.index')->with('sports', $sports)->with('category',$category);
    }

    public function sortBy(Request $request)
    {
        switch ($request->key) {
            case 'date':
                $sports = Sports::orderBy('created_at', 'desc')->paginate(10);
                return view('sports.index')->with('sports', $sports);
                break;

            case 'name':
                $sports = Sports::orderBy('title', 'asc')->paginate(10);
                return view('sports.index')->with('sports', $sports);
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
            'title' => 'required|max:255|unique:sports,title',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
        }

        $sports = new Sports; 

        $sports->user_id = Auth::user()->id;
        $sports->title = $request->title;
        $sports->body = $request->body;
        $sports->image = $fileName;
        $sports->user = Auth::user()->name;
        $sports->update = Auth::user()->name;
        $sports->featured = $request->featured;
        $sports->save();

        $request->session()->flash('alert-success', 'Post was successfully created!');
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
        $stories = Sports::get();
        if (Sports::all()->count() <= 2) {
            $stories = Sports::where('id', '!=', $sports->id)->get();
        }
        else if (Sports::all()->count() > 2) {
            $stories = Sports::where('id', '!=', $sports->id)->get()->random(2);
        }

        $counter = Counter::showAndCount('sports.show', $sports->id);
        $sports->views = $counter;
        if ($sports->views == config('app.trend_time') ) {
            $sports->trend_date = time();
        }
        $sports->update();

        return view('sports.show')->with('sports', $sports)->with('comments', $comments)->with('stories', $stories)->with('counter', $counter);
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
        $sports = Sports::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:sports,title,'.$sports->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $sports->image = $fileName;
        }

        $sports->title = $request->title;
        $sports->body = $request->body;
        $sports->update = Auth::user()->name;
        $sports->update();
        
        $request->session()->flash('alert-success', 'Post was successfully edited!');
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

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('sports.index');    
    }

    public function sportsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
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

    public function featured(Request $request, $id) {
        $sports = Sports::find($id);
        $sports->featured = '1';
        $sports->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }

    public function unfeatured(Request $request, $id) {
        $sports = Sports::find($id);
        $sports->featured = '0';
        $sports->update();

        $request->session()->flash('alert-danger', 'Post was successfully unfeatured!');
        return redirect()->route('home');        
    }
}
