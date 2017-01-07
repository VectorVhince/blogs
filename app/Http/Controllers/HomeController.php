<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;
use App\News;
use App\Features;
use App\Humors;
use App\Sports;
use App\Editorials;
use App\Announcements;

use App\OpinionComment;
use App\NewsComment;
use App\FeaturesComment;
use App\HumorsComment;
use App\SportsComment;
use App\EditorialsComment;

use App\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','createAnnouncement','storeAnnouncement','settings','myPosts','myPostsSortBy']]);
    }

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
        ->take(7)
        ->get();

        $news = News::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(3)->get();
        $news_first = News::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $opinions = Opinion::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(3)->get();
        $opinions_first = Opinion::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $features = Features::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(3)->get();
        $features_first = Features::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $humors = Humors::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(3)->get();
        $humors_first = Humors::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $sports = Sports::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(3)->get();
        $sports_first = Sports::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $editorials = Editorials::where('featured', '!=', '1')->orderBy('id', 'desc')->skip(1)->take(3)->get();
        $editorials_first = Editorials::where('featured', '!=', '1')->orderBy('id', 'desc')->first();
        $announcements = Announcements::orderBy('id', 'desc')->take(7)->get();

        // dd($news_first);

        $news_comments = NewsComment::orderBy('id', 'asc');
        $editorial_comments = EditorialsComment::orderBy('id', 'asc');
        $opinion_comments = OpinionComment::orderBy('id', 'asc');
        $feature_comments = FeaturesComment::orderBy('id', 'asc');
        $humor_comments = HumorsComment::orderBy('id', 'asc');
        $sports_comments = SportsComment::orderBy('id', 'asc');

        $recent_comments = $news_comments
        ->union($editorial_comments)
        ->union($opinion_comments)
        ->union($feature_comments)
        ->union($humor_comments)
        ->union($sports_comments)
        ->orderBy('created_at', 'desc')
        ->take(7)
        ->get();

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
        ->with('announcements', $announcements)
        ->with('recent_comments', $recent_comments);
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

    public function myPosts($id)
    {
        $news = User::find($id)->newsDate();
        $editorial = User::find($id)->editorialDate();
        $opinion = User::find($id)->opinionDate();
        $feature = User::find($id)->featureDate();
        $humor = User::find($id)->humorDate();
        $sports = User::find($id)->sportsDate();

        $users = $news->union($editorial)->union($feature)->union($opinion)->union($humor)->union($sports)->latest()->get();
        // dd($users);

        return view('my_posts')->with('users', $users);
    }

    public function myPostsSortBy(Request $request, $id)
    {
        switch ($request->key) {
            case 'date':
                $news = User::find($id)->newsDate();
                $editorial = User::find($id)->editorialDate();
                $opinion = User::find($id)->opinionDate();
                $feature = User::find($id)->featureDate();
                $humor = User::find($id)->humorDate();
                $sports = User::find($id)->sportsDate();

                $users = $news->union($editorial)->union($feature)->union($opinion)->union($humor)->union($sports)->latest()->get();

                return view('my_posts')->with('users', $users);
                break;

            case 'name':
                $news = User::find($id)->newsName();
                $editorial = User::find($id)->editorialName();
                $opinion = User::find($id)->opinionName();
                $feature = User::find($id)->featureName();
                $humor = User::find($id)->humorName();
                $sports = User::find($id)->sportsName();

                $users = $news->union($editorial)->union($feature)->union($opinion)->union($humor)->union($sports)->orderBy('title', 'asc')->get();

                return view('my_posts')->with('users', $users);
                break;
            
            default:
                # code...
                break;
        }
        
    }

    public function error() {
        return view('errors.503');
    }

    public function accounts() {
        $users = User::all();

        return view('accounts')->with('users',$users);
    }
}
