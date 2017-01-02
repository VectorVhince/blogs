<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;
use App\Post;
use App\News;
use App\Features;
use App\Humors;
use App\Sports;
use App\Artworks;
use App\Featured;
use App\Announcements;
use Auth;
use App\User;

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
        $humors = Humors::orderBy('id', 'desc')->first();
        $sports = Sports::orderBy('id', 'desc')->first();
        $artworks = Artworks::orderBy('id', 'desc')->first();
        $announcements = Announcements::orderBy('id', 'desc')->take(8)->get();

        return view('welcome')->with('featured', $featured)->with('news', $news)->with('opinion', $opinion)->with('features', $features)->with('humors', $humors)->with('sports', $sports)->with('artworks', $artworks)->with('announcements', $announcements);
    }

    public function create()
    {
        return view('create_post');
    }

    public function createAnnouncement()
    {
        return view('create_announcement');
    }

    public function storeAnnouncement(Request $request)
    {
        $announcements = new Announcements;
        $announcements->create($request->all());
        return redirect()->route('home');
    }

    public function featured(Request $request, $id,$category)
    {
        $news = News::find($id);
        $opinion = Opinion::find($id);
        $features = Features::find($id);
        $humors = Humors::find($id);
        $sports = Sports::find($id);
        $artworks = Artworks::find($id);

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

            case 'humors':
                $get_featured = $humors;
                break;

            case 'sports':
                $get_featured = $sports;
                break;

            case 'artworks':
                $get_featured = $artworks;
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

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        if (Auth::guest()) {
            if ($request->search == "iamadmin") {
                return view('auth.login');
            }
        }

        $news = News::where(function($query) use ($request) {
            if ($search=$request->get('search')) {
                $query->orWhere('title', 'like', '%' . $search . '%');
                $query->orWhere('body', 'like', '%' . $search . '%');
                $query->orWhere('user', 'like', '%' . $search . '%');
            }
        });

        $artworks = Artworks::where(function($query) use ($request) {
            if ($search=$request->get('search')) {
                $query->orWhere('title', 'like', '%' . $search . '%');
                $query->orWhere('body', 'like', '%' . $search . '%');
                $query->orWhere('user', 'like', '%' . $search . '%');
            }
        });

        $features = Features::where(function($query) use ($request) {
            if ($search=$request->get('search')) {
                $query->orWhere('title', 'like', '%' . $search . '%');
                $query->orWhere('body', 'like', '%' . $search . '%');
                $query->orWhere('user', 'like', '%' . $search . '%');
            }
        });

        $humors = Humors::where(function($query) use ($request) {
            if ($search=$request->get('search')) {
                $query->orWhere('title', 'like', '%' . $search . '%');
                $query->orWhere('body', 'like', '%' . $search . '%');
                $query->orWhere('user', 'like', '%' . $search . '%');
            }
        });

        $opinion = Opinion::where(function($query) use ($request) {
            if ($search=$request->get('search')) {
                $query->orWhere('title', 'like', '%' . $search . '%');
                $query->orWhere('body', 'like', '%' . $search . '%');
                $query->orWhere('user', 'like', '%' . $search . '%');
            }
        });

        $sports = Sports::where(function($query) use ($request) {
            if ($search=$request->get('search')) {
                $query->orWhere('title', 'like', '%' . $search . '%');
                $query->orWhere('body', 'like', '%' . $search . '%');
                $query->orWhere('user', 'like', '%' . $search . '%');
            }
        });

        $items = $news->union($artworks)->union($features)->union($humors)->union($opinion)->union($sports)->get();

        // dd($items);

        $search = $request->search;

        $count = $items->count();

        return view('search')->with('items',$items)->with('search',$search)->with('count',$count);
    }

    public function settings()
    {
        return view('settings');
    }

    public function myPosts()
    {
        return view('my_posts');
    }
}
