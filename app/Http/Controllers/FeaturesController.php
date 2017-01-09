<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Features;
use App\FeaturesComment;
use Auth;
use Image;
use App\Page;
use Counter;

class FeaturesController extends Controller
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
        $features = Features::orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','readalso')->first();

        return view('feature.index')->with('features', $features)->with('category',$category);
    }

    public function sortBy(Request $request)
    {
        switch ($request->key) {
            case 'date':
                $features = Features::orderBy('created_at', 'desc')->paginate(10);
                return view('feature.index')->with('features', $features);
                break;

            case 'name':
                $features = Features::orderBy('title', 'asc')->paginate(10);
                return view('feature.index')->with('features', $features);
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
            'title' => 'required|max:255|unique:features,title',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
        }

        $features = new features; 

        $features->user_id = Auth::user()->id;
        $features->title = $request->title;
        $features->body = $request->body;
        $features->image = $fileName;
        $features->user = Auth::user()->name;
        $features->update = Auth::user()->name;
        $features->featured = $request->featured;
        $features->save();

        $request->session()->flash('alert-success', 'Post was successfully created!');
        return redirect()->route('feature.show',$features->id);
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
        $stories = Features::get();
        if (Features::all()->count() <= 2) {
            $stories = Features::where('id', '!=', $features->id)->get();
        }
        else if (Features::all()->count() > 2) {
            $stories = Features::where('id', '!=', $features->id)->get()->random(2);
        }

        $counter = Counter::showAndCount('feature.show', $features->id);
        $features->views = $counter;
        if ($features->views == config('app.trend_time') ) {
            $features->trend_date = time();
        }
        $features->update();
        
        return view('feature.show')->with('features', $features)->with('comments', $comments)->with('stories', $stories)->with('counter', $counter);
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

        return view('feature.edit')->with('features', $features);
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
        $features = Features::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:features,title,'.$features->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);

        
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $features->image = $fileName;
        }

        $features->title = $request->title;
        $features->body = $request->body;
        $features->update = Auth::user()->name;
        $features->update();
        
        $request->session()->flash('alert-success', 'Post was successfully edited!');
        return redirect()->route('feature.show',$features->id);
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

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('feature.index');    
    }

    public function featuresComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $features = Features::find($id);

        $comment = new FeaturesComment;
        $comment->features_id = $features->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('feature.show',$features->id);
    }

    public function featured(Request $request, $id) {
        $features = Features::find($id);
        $features->featured = '1';
        $features->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }

    public function unfeatured(Request $request, $id) {
        $features = Features::find($id);
        $features->featured = '0';
        $features->update();

        $request->session()->flash('alert-danger', 'Post was successfully unfeatured!');
        return redirect()->route('home');        
    }
}
