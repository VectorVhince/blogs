<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;
use App\Post;
use App\News;
use App\Features;
use App\Humors;
use App\Sports;
use App\Editorials;
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
        $news_featured = News::where('featured', '=', '1');
        $editorial_featured = Editorials::where('featured', '=', '1');
        $opinion_featured = Opinion::where('featured', '=', '1');
        $feature_featured = Features::where('featured', '=', '1');
        $humor_featured = Humors::where('featured', '=', '1');
        $sports_featured = Sports::where('featured', '=', '1');

        $featured = $news_featured
        ->union($editorial_featured)
        ->union($opinion_featured)
        ->union($feature_featured)
        ->union($humor_featured)
        ->union($sports_featured)
        ->orderBy('updated_at', 'desc')
        ->take(7)->get();

        $news = News::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(5)->get();
        $news_first = News::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $opinions = Opinion::where('featured', '!=', '1')->orderBy('id', 'desc')->take(5)->get();
        $opinions_first = Opinion::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $features = Features::where('featured', '!=', '1')->orderBy('id', 'desc')->take(5)->get();
        $features_first = Features::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $humors = Humors::where('featured', '!=', '1')->orderBy('id', 'desc')->take(5)->get();
        $humors_first = Humors::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $sports = Sports::where('featured', '!=', '1')->orderBy('id', 'desc')->take(5)->get();
        $sports_first = Sports::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $editorials = Editorials::where('featured', '!=', '1')->orderBy('id', 'desc')->take(5)->get();
        $editorials_first = Editorials::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $announcements = Announcements::orderBy('id', 'desc')->take(8)->get();

        // dd($news_first);

        return view('welcome')
        ->with('featured', $featured)
        ->with('news', $news)
        ->with('opinions', $opinions)
        ->with('features', $features)
        ->with('humors', $humors)
        ->with('sports', $sports)
        ->with('news_first', $news_first)
        ->with('editorials', $editorials)
        ->with('opinions_first', $opinions_first)
        ->with('features_first', $features_first)
        ->with('humors_first', $humors_first)
        ->with('sports_first', $sports_first)
        ->with('editorials_first', $editorials_first)
        ->with('announcements', $announcements);
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

        $editorials = Editorials::where(function($query) use ($request) {
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

        $items = $news
        ->union($editorials)
        ->union($features)
        ->union($humors)
        ->union($opinion)
        ->union($sports)
        ->get();

        // dd($items);

        $search = $request->search;

        $count = $items->count();

        return view('search')
        ->with('items',$items)
        ->with('search',$search)
        ->with('count',$count);
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
