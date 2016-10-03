<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;
use App\Post;
use App\News;
use App\Features;
use App\Editors;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(4)->get();
        $opinions = Opinion::orderBy('id', 'desc')->take(2)->get();
        $features = Features::orderBy('id', 'desc')->take(2)->get();
        $editors = Editors::orderBy('id', 'desc')->take(2)->get();
        $news = News::orderBy('id', 'desc')->take(3)->get();
        return view('welcome')->with('opinions', $opinions)->with('posts', $posts)->with('news', $news)->with('features', $features)->with('editors', $editors);
    }
}
