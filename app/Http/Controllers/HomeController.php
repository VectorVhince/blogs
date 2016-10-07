<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;
use App\Post;
use App\News;
use App\Features;
use App\Featured;
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
        $featured = Featured::orderBy('id', 'desc')->take(4)->get();
        $news = News::orderBy('id', 'desc')->first();
        $opinion = Opinion::orderBy('id', 'desc')->first();
        $features = Features::orderBy('id', 'desc')->first();

        return view('welcome')->with('featured', $featured)->with('news', $news)->with('opinion', $opinion)->with('features', $features);
    }

    public function create()
    {
        return view('create_post');
    }

    public function featured($id,$category)
    {
        $news = News::find($id);
        $opinion = Opinion::find($id);
        $features = Features::find($id);

        switch ($category) {
            case 'news':
                $get_featured = $news;
                break;

            case 'opinion':
                $get_featured = $opinion;
                break;

            case 'features':
                $get_featured = $features;
                break;
        }

        $featured = new Featured;

        $featured->category_id = $get_featured->id;
        $featured->category = $get_featured->category;
        $featured->title = $get_featured->title;
        $featured->body = $get_featured->body;
        $featured->image = $get_featured->image;
        $featured->user = $get_featured->user;
        $featured->update = $get_featured->update;
        $featured->save();

        return redirect()->route('home');
    }
}
