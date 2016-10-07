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

        return view('welcome')->with('featured', $featured);
    }

    public function create()
    {
        return view('create_post');
    }

    public function featured($id,$category)
    {
        $news = News::find($id);
        $features = Features::find($id);
        $opinion = Opinion::find($id);

        switch ($category) {
            case $news->category:
                $get_featured = $news;
                break;

            case $features->category:
                $get_featured = $features;
                break;

            case $opinion->category:
                $get_featured = $opinion;
                break;
        }

        $featured = new Featured;

        $featured->title = $get_featured->title;
        $featured->body = $get_featured->body;
        $featured->image = $get_featured->image;
        $featured->user = $get_featured->user;
        $featured->update = $get_featured->update;
        $featured->save();

        return redirect()->route('home');
    }
}
