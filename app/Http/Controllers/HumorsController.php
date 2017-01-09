<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Humors;
use App\HumorsComment;
use Auth;
use Image;
use App\Page;

class HumorsController extends Controller
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
        $humors = Humors::orderBy('id', 'desc')->paginate(10);
        $category = Page::where('category','fromweb')->first();

        return view('humor.index')->with('humors', $humors)->with('category',$category);
    }

    public function sortBy(Request $request)
    {
        switch ($request->key) {
            case 'date':
                $humors = Humors::orderBy('created_at', 'desc')->paginate(10);
                return view('humor.index')->with('humors', $humors);
                break;

            case 'name':
                $humors = Humors::orderBy('title', 'asc')->paginate(10);
                return view('humor.index')->with('humors', $humors);
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
            'title' => 'required|max:255|unique:humors,title',
            'body' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
        ]);

        $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();

        if ($request->hasFile('image')) {
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
        }

        $humors = new Humors; 

        $humors->user_id = Auth::user()->id;
        $humors->title = $request->title;
        $humors->body = $request->body;
        $humors->image = $fileName;
        $humors->user = Auth::user()->name;
        $humors->update = Auth::user()->name;
        $humors->featured = $request->featured;
        $humors->save();

        $request->session()->flash('alert-success', 'Post was successfully created!');
        return redirect()->route('humor.show',$humors->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $humors = Humors::find($id);
        $comments = Humors::find($id)->humorsComments;
        $stories = Humors::get();
        if (Humors::all()->count() <= 2) {
            $stories = Humors::where('id', '!=', $humors->id)->get();
        }
        else if (Humors::all()->count() > 2) {
            $stories = Humors::where('id', '!=', $humors->id)->get()->random(2);
        }

        return view('humor.show')->with('humors', $humors)->with('comments', $comments)->with('stories', $stories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $humors = Humors::find($id);

        return view('humor.edit')->with('humors', $humors);
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
        $humors = Humors::find($id);
        $this->validate($request, [
            'title' => 'required|max:255|unique:humors,title,'.$humors->id,
            'body' => 'required',
            'image' => 'mimes:jpeg,png,gif',
        ]);
        

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(863, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/uploads/' . $fileName));
            $humors->image = $fileName;
        }

        $humors->title = $request->title;
        $humors->body = $request->body;
        $humors->update = Auth::user()->name;
        $humors->update();
        
        $request->session()->flash('alert-success', 'Post was successfully edited!');
        return redirect()->route('humor.show',$humors->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Humors::find($id)->delete();

        $request->session()->flash('alert-danger', 'Post was successfully deleted!');
        return redirect()->route('humor.index');    
    }

    public function humorsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        $humors = Humors::find($id);

        $comment = new HumorsComment;
        $comment->humors_id = $humors->id;
        $comment->comment_name = $request->comment_name;
        $comment->comment_email = $request->comment_email;
        $comment->comment_dept = $request->comment_dept;
        $comment->comment_message = $request->comment_message;
        $comment->save();

        return redirect()->route('humor.show',$humors->id);
    }

    public function featured(Request $request, $id) {
        $humors = Humors::find($id);
        $humors->featured = '1';
        $humors->update();

        $request->session()->flash('alert-success', 'Post was successfully featured!');
        return redirect()->route('home');        
    }

    public function unfeatured(Request $request, $id) {
        $humors = Humors::find($id);
        $humors->featured = '0';
        $humors->update();

        $request->session()->flash('alert-danger', 'Post was successfully unfeatured!');
        return redirect()->route('home');        
    }
}
