<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Comments;
use Auth;
use Image;
use App\Page;
use Counter;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','update','store','destroy','edit']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newsIndex()
    {
        $news = Posts::where('category','news')->orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','weather')->first();

        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        return view('index.news')->with('news', $news)->with('category', $category)->with('archive_year', $archive_year);
    }

    public function editorialIndex()
    {
        $editorial = Posts::where('category','editorial')->orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','calendar')->first();

        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        return view('index.editorial')->with('editorial', $editorial)->with('category', $category)->with('archive_year', $archive_year);
    }

    public function opinionIndex()
    {
        $opinion = Posts::where('category','opinion')->orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','selfopinion')->first();

        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        return view('index.opinion')->with('opinion', $opinion)->with('category', $category)->with('archive_year', $archive_year);
    }

    public function featureIndex()
    {
        $feature = Posts::where('category','feature')->orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','readalso')->first();

        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        return view('index.feature')->with('feature', $feature)->with('category', $category)->with('archive_year', $archive_year);
    }

    public function humorIndex()
    {
        $humor = Posts::where('category','humor')->orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','fromweb')->first();

        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        return view('index.humor')->with('humor', $humor)->with('category', $category)->with('archive_year', $archive_year);
    }

    public function sportsIndex()
    {
        $sports = Posts::where('category','sports')->orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','outsidesports')->first();

        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        return view('index.sports')->with('sports', $sports)->with('category', $category)->with('archive_year', $archive_year);
    }

    public function sortBy(Request $request, $category)
    {
        switch ($request->key) {
            case 'date':
                switch ($category) {
                    case 'news':
                        $news = Posts::where('category','news')->orderBy('created_at', 'desc')->paginate(10);
                        $category = Page::where('category','weather')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.news')->with('news', $news)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'editorial':
                        $editorial = Posts::where('category','editorial')->orderBy('created_at', 'desc')->paginate(10);
                        $category = Page::where('category','calendar')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.editorial')->with('editorial', $editorial)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'opinion':
                        $opinion = Posts::where('category','opinion')->orderBy('created_at', 'desc')->paginate(10);
                        $category = Page::where('category','selfopinion')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.opinion')->with('opinion', $opinion)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'feature':
                        $feature = Posts::where('category','feature')->orderBy('created_at', 'desc')->paginate(10);
                        $category = Page::where('category','readalso')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.feature')->with('feature', $feature)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'humor':
                        $humor = Posts::where('category','humor')->orderBy('created_at', 'desc')->paginate(10);
                        $category = Page::where('category','fromweb')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.humor')->with('humor', $humor)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'sports':
                        $sports = Posts::where('category','sports')->orderBy('created_at', 'desc')->paginate(10);
                        $category = Page::where('category','outsidesports')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.sports')->with('sports', $sports)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                }
                break;

            case 'name':
                switch ($category) {
                    case 'news':
                        $news = Posts::where('category','news')->orderBy('title', 'asc')->paginate(10);
                        $category = Page::where('category','weather')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.news')->with('news', $news)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'editorial':
                        $editorial = Posts::where('category','editorial')->orderBy('title', 'asc')->paginate(10);
                        $category = Page::where('category','calendar')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.editorial')->with('editorial', $editorial)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'opinion':
                        $opinion = Posts::where('category','opinion')->orderBy('title', 'asc')->paginate(10);
                        $category = Page::where('category','selfopinion')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.opinion')->with('opinion', $opinion)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'feature':
                        $feature = Posts::where('category','feature')->orderBy('title', 'asc')->paginate(10);
                        $category = Page::where('category','readalso')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.feature')->with('feature', $feature)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'humor':
                        $humor = Posts::where('category','humor')->orderBy('title', 'asc')->paginate(10);
                        $category = Page::where('category','fromweb')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.humor')->with('humor', $humor)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'sports':
                        $sports = Posts::where('category','sports')->orderBy('title', 'asc')->paginate(10);
                        $category = Page::where('category','outsidesports')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.sports')->with('sports', $sports)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                }
                break;

            case 'views':
                switch ($category) {
                    case 'news':
                        $news = Posts::where('category','news')->orderBy('views', 'desc')->paginate(10);
                        $category = Page::where('category','weather')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.news')->with('news', $news)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'editorial':
                        $editorial = Posts::where('category','editorial')->orderBy('views', 'desc')->paginate(10);
                        $category = Page::where('category','calendar')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.editorial')->with('editorial', $editorial)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'opinion':
                        $opinion = Posts::where('category','opinion')->orderBy('views', 'desc')->paginate(10);
                        $category = Page::where('category','selfopinion')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.opinion')->with('opinion', $opinion)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'feature':
                        $feature = Posts::where('category','feature')->orderBy('views', 'desc')->paginate(10);
                        $category = Page::where('category','readalso')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.feature')->with('feature', $feature)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'humor':
                        $humor = Posts::where('category','humor')->orderBy('views', 'desc')->paginate(10);
                        $category = Page::where('category','fromweb')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.humor')->with('humor', $humor)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                    case 'sports':
                        $sports = Posts::where('category','sports')->orderBy('views', 'desc')->paginate(10);
                        $category = Page::where('category','outsidesports')->first();
                        $archive_year = Posts::orderBy('created_at','asc')->get()->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('Y');
                        });
                        return view('index.sports')->with('sports', $sports)->with('category', $category)->with('archive_year', $archive_year);
                        break;
                }
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
        return view('posts.create');
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
            'title' => 'required|max:255|unique:posts,title',
            'category' => 'required',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            Image::make($request->file('image'))->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/thumbnails/' . $fileName));
        }

        $post = new PendingPosts;
        $post->user_id = Auth::user()->id;
        $post->category = $request->category;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $fileName;
        $post->user = Auth::user()->name;
        $post->update = Auth::user()->name;
        $post->featured = $request->featured;
        $post->save();
        
        $request->session()->flash('alert-success', 'Post was successfully created, wait for approval of admin!');
        return redirect()->route('index.'.$post->category,$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        $posts = Posts::all();

        $comments = Posts::find($id)->comments;

        $stories = Posts::get();
        if ($posts->count() <= 7) {
            $stories = Posts::where('id', '!=', $post->id)->inRandomOrder()->get();
        }
        else if ($posts->count() > 7) {
            $stories = Posts::where('id', '!=', $post->id)->random(7)->inRandomOrder()->get();
        }

        $counter = Counter::showAndCount('posts.show', $post->id);
        $post->views = $counter;
        if ($post->views == config('variables.views') ) {
            $post->trend_date = time();
        }
        $post->update();

        return view('posts.show')->with('post', $post)->with('comments', $comments)->with('stories', $stories)->with('counter', $counter);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);

        return view('posts.edit')->with('post', $post);
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
        $post = Posts::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:posts,title,'.$post->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);
        
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $post->image = $fileName;
        }

        $post->title = $request->title;
        $post->category = $request->category;
        $post->body = $request->body;
        $post->update = Auth::user()->name;
        $post->update();
        
        $request->session()->flash('alert-success', 'Post was successfully updated!');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Posts::find($id)->delete();

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('posts.index');
    }

    public function comment(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'dept' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $post = Posts::find($id);

        $comment = new Comments;
        $comment->post_id = $post->id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->dept = $request->dept;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('posts.show',$post->id);
    }

    public function featured(Request $request, $id) {
        $post = Posts::find($id);
        $post->featured = '1';
        $post->featured_date = time();
        $post->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }

    public function unfeatured(Request $request, $id) {
        $post = Posts::find($id);
        $post->featured = '0';
        $post->update();

        $request->session()->flash('alert-danger', 'Post was successfully unfeatured!');
        return redirect()->route('home');        
    }
}
