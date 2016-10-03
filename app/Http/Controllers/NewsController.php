<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\NewsComment;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newss = News::orderBy('id', 'desc')->get();

        return view('news.index')->with('news', $newss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
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
            'news_title' => 'required|max:255',
            'news_body' => 'required',
            'news_img' => 'required',
        ]);

        $fileName = time() . '.' . $request->file('news_img')->getClientOriginalExtension();

        if ($request->hasFile('news_img')) {
            $request->file('news_img')->move(public_path('img/uploads'), $fileName);
        }

        $news = new News; 

        $news->news_title = $request->news_title;
        $news->news_body = $request->news_body;
        $news->news_img = $fileName;
        $news->news_user = Auth::user()->name;
        $news->news_update = Auth::user()->name;
        $news->save();

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
        return view('news.show')->with('news', $news)->with('comments', $comments);
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
        $this->validate($request, [
            'news_title' => 'required|max:255',
            'news_body' => 'required',
        ]);
        $news = News::find($id);


        if ($request->hasFile('news_img')) {
            $fileName = time() . '.' . $request->file('news_img')->getClientOriginalExtension();
            $request->file('news_img')->move(public_path('img/uploads'), $fileName);
            $news->news_img = $fileName;
        }

        $news->news_title = $request->news_title;
        $news->news_body = $request->news_body;
        $news->news_update = Auth::user()->name;
        $news->update();
        
        return redirect()->route('news.show',$news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();

        return redirect()->route('news.index');    
    }

    public function newsComment(Request $request, $id) {
        $this->validate($request, [
            'comment_name' => 'required',
            'comment_email' => 'required',
            'comment_dept' => 'required',
            'comment_message' => 'required'
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
}
