<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\News;
use App\NewsComment;
use Auth;
use Image;
use App\Page;
use Counter;

class NewsController extends Controller
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
        $news = News::orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','weather')->first();

        return view('news.index')->with('news', $news)->with('category',$category);
    }

    public function sortBy(Request $request)
    {
        switch ($request->key) {
            case 'date':
                $news = News::orderBy('created_at', 'desc')->paginate(10);
                return view('news.index')->with('news', $news);
                break;

            case 'name':
                $news = News::orderBy('title', 'asc')->paginate(10);
                return view('news.index')->with('news', $news);
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
            'title' => 'required|max:255|unique:news,title',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
        }

        $news = new News; 

        $news->user_id = Auth::user()->id;
        $news->title = $request->title;
        $news->body = $request->body;
        $news->image = $fileName;
        $news->user = Auth::user()->name;
        $news->update = Auth::user()->name;
        $news->featured = $request->featured;
        $news->save();

        $request->session()->flash('alert-success', 'Post was successfully created!');
        return redirect()->route('news.show',$news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        $comments = News::find($id)->newsComments;
        $stories = News::get();
        if (News::all()->count() <= 2) {
            $stories = News::where('id', '!=', $news->id)->get();
        }
        else if (News::all()->count() > 2) {
            $stories = News::where('id', '!=', $news->id)->get()->random(2);
        }

        $counter = Counter::showAndCount('news.show', $news->id);
        $news->views = $counter;
        if ($news->views == config('app.trend_time') ) {
            $news->trend_date = time();
        }
        $news->update();

        return view('news.show')->with('news', $news)->with('comments', $comments)->with('stories', $stories)->with('counter', $counter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('news.edit')->with('news', $news);
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
        $news = News::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:news,title,'.$news->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);


        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $news->image = $fileName;
        }

        $news->title = $request->title;
        $news->body = $request->body;
        $news->update = Auth::user()->name;
        $news->update();
        
        $request->session()->flash('alert-success', 'Post was successfully edited!');
        return redirect()->route('news.show',$news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        News::find($id)->delete();

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('news.index');    
    }

    public function newsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $news = News::find($id);

        $comment = new NewsComment;
        $comment->news_id = $news->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('news.show',$news->id);
    }

    public function featured(Request $request, $id) {
        $news = News::find($id);
        $news->featured = '1';
        $news->featured_date = time();
        $news->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }

    public function unfeatured(Request $request, $id) {
        $news = News::find($id);
        $news->featured = '0';
        $news->update();

        $request->session()->flash('alert-danger', 'Post was successfully unfeatured!');
        return redirect()->route('home');        
    }
}
