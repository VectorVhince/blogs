@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default bd-rad0 box-shadow panel-bg">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <div class="row mgb40">
                        <div class="col-md-10">
                            <span class="fs40">{{ $news->title }}</span>
                            <div class="dp-bl">
                                <span class="text-muted">Author: </span>{{ $news->user }} <span class="text-muted mgl10">Posted: </span>{{ date_format($news->created_at, 'F d, Y') }}
                            </div>
                        </div>
                        <div class="col-md-2">
                        @if (Auth::user())
                            @if (Auth::user()->id == $news->user_id)
                                <form action="{{ route('news.destroy',$news->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <div class="dropdown" style="float: right;">
                                    <a class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1">
                                        <div class="icon-circle text-center pdt10 mgt5">
                                            <span class="glyphicon glyphicon-th-list fs25 fc-white"></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu2" aria-labelledby="dropdownMenu1">
                                        <div class="box-arrow1"></div>
                                        <li><a href="{{ route('featured',[$news->id,$news->category]) }}"><img src="{{ asset('/img/featured.png') }}" class="ht20"> Make this featured</a></li>
                                        <li><a href="{{ route('news.edit',$news->id) }}"><img src="{{ asset('/img/edit.png') }}" class="ht20"> Edit</a></li>
                                        <li><a href="#!"><button type="submit" class="bgc0 bd0 pd0"><img src="{{ asset('/img/delete.png') }}" class="ht20"> Delete</button></a></li>
                                    </ul>
                                </div>
                                </form>
                            @endif
                        @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{ asset('/img/uploads/' . $news->image) }}" class="img-responsive mgb40">
                        </div>
                    </div>
                    <div class="row mgb20">
                        <div class="col-lg-12">
                            {!! $news->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default bd-rad0 box-shadow">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pd15">
                    <div class="mgb20">
                        <span class="fs25">Outside News</span>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                </div>
            </div>
            @include('partials.archive')     
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default bd-rad0 box-shadow mgt40">
            <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <div>
                        <span class="fs25">Comments</span>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    @if(!$comments->isEmpty())
                    @foreach($comments as $comment)
                        <div class="mgv20 pdh15 bdrl1-gray">
                            <span class="dp-bl fs20 mgb5">{{ $comment->comment_name }}, {{ $comment->comment_dept }}</span>
                            <span class="dp-bl fs12 text-muted mgb20">{{ date_format($comment->created_at, 'F d, Y') }}</span>
                            <p class="mgl20">{{ $comment->comment_message }}</p>
                        </div>
                    @endforeach
                    @else
                    <div class="mv20">
                        <span class="fs12">Be the first to comment</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default bd-rad0 box-shadow mgt40">
            <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pd15">
                    <form action="{{ route('news.comment',$news->id) }}" method="post" enctype="multipart/form-data" id="formSubmit">
                        {{ csrf_field() }}
                        <div class="mgb20">
                            <span class="fs25">Leave a comment</span>
                            <div style="height: 2px;" class="bgc-red mg0"></div>
                        </div>
                        <div class="form-group{{ $errors->has('comment_name') ? ' has-error' : '' }}">
                            <input type="text" name="comment_name" class="form-control mgb20 bd-rad0 box-shadow" placeholder="Name" value="{{ old('comment_name') }}">
                            @if ($errors->has('comment_name'))
                                <span class="help-block"><strong>{{ $errors->first('comment_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('comment_email') ? ' has-error' : '' }}">
                            <input type="email" name="comment_email" class="form-control mgb20 bd-rad0 box-shadow" placeholder="Email Address" value="{{ old('comment_email') }}">
                            @if ($errors->has('comment_email'))
                                <span class="help-block"><strong>{{ $errors->first('comment_email') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('comment_dept') ? ' has-error' : '' }}">
                            <input type="text" name="comment_dept" class="form-control mgb20 bd-rad0 box-shadow" placeholder="College Department" value="{{ old('comment_dept') }}">
                            @if ($errors->has('comment_dept'))
                                <span class="help-block"><strong>{{ $errors->first('comment_dept') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('comment_message') ? ' has-error' : '' }}">
                            <textarea name="comment_message" class="form-control mgb20 bd-rad0 box-shadow" rows="8" placeholder="Message">{{ old('comment_message') }}</textarea>
                            @if ($errors->has('comment_message'))
                                <span class="help-block"><strong>{{ $errors->first('comment_message') }}</strong></span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right mgt20">
                                <div class="form-inline">
                                    <button type="submit" class="btn btn-success bd-rad0 btn-sm">Post</button>
                                    <button type="reset" class="btn btn-danger bd-rad0 btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection