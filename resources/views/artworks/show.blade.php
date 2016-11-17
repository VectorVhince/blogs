@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-8">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                <div class="col-md-8 mgb40">
                    <span class="fs40">{{ $artworks->title }}</span>
                </div>
                <div class="col-md-4">
                @if (Auth::user())
                    <form action="{{ route('artworks.destroy',$artworks->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                        <ul class="list-inline">
                            <li class="pd0"><a href="{{ route('featured',[$artworks->id,$artworks->category]) }}"><img src="{{ asset('/img/featured.png') }}" class="ht60"></a></li>
                            <li class="pd0"><a href="{{ route('artworks.edit',$artworks->id) }}"><img src="{{ asset('/img/edit.png') }}" class="ht60"></a></li>
                            <li class="pd0"><button type="submit" class="bgc0 bd0 pd0"><img src="{{ asset('/img/delete.png') }}" class="ht60"></button></li>
                        </ul>
                    </form>
                @endif
                </div>
                <img src="{{ asset('/img/uploads/' . $artworks->image) }}" class="img-responsive mgb40">
                <p>{{ $artworks->body }}</p>
                <div>
                    <span class="text-muted">Author: {{ $artworks->user }}</span> | <span class="text-muted">{{ date_format($artworks->created_at, 'F d Y') }}</span>
                </div>
            </div>
        </div>
        <div class="panel panel-default bd-rad0 box-shadow mgt40">
            <div class="panel-body pd45">  
                <form action="{{ route('artworks.comment',$artworks->id) }}" method="post" enctype="multipart/form-data" id="formSubmit">
                    {{ csrf_field() }}
                    <div class="mgb40">
                        <span class="fs40">Leave a comment</span>
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
                        <textarea name="comment_message" class="form-control mgb20 bd-rad0 box-shadow" placeholder="Message">{{ old('comment_message') }}</textarea>
                        @if ($errors->has('comment_message'))
                            <span class="help-block"><strong>{{ $errors->first('comment_message') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center mgt40">
                        <div class="form-inline">
                            <button type="submit" class="btn btn-success bd-rad0 fs20">Post</button>
                            <button type="reset" class="btn btn-danger bd-rad0 fs20">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd15">
                <div class="mgb30">
                    <span class="fs25">BLOG ARCHIVE</span>
                </div>
                <ul class="list-unstyled">
                    <li data-toggle="collapse" href="#2016"><span class="caret"></span> 2016
                        <div id="2016" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2016" href="#2016J"><span class="caret"></span> January
                                    <div id="2016J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2016" href="#2016F"><span class="caret"></span> February
                                    <div id="2016F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2016" href="#2016M"><span class="caret"></span> March
                                    <div id="2016M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li data-toggle="collapse" href="#2015"><span class="caret"></span> 2015
                        <div id="2015" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2015" href="#2015J"><span class="caret"></span> January
                                    <div id="2015J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2015" href="#2015F"><span class="caret"></span> February
                                    <div id="2015F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2015" href="#2015M"><span class="caret"></span> March
                                    <div id="2015M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li data-toggle="collapse" href="#2014"><span class="caret"></span> 2014
                        <div id="2014" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2014" href="#2014J"><span class="caret"></span> January
                                    <div id="2014J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2014" href="#2014F"><span class="caret"></span> February
                                    <div id="2014F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2014" href="#2014M"><span class="caret"></span> March
                                    <div id="2014M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li data-toggle="collapse" href="#2013"><span class="caret"></span> 2013
                        <div id="2013" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2013" href="#2013J"><span class="caret"></span> January
                                    <div id="2013J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2013" href="#2013F"><span class="caret"></span> February
                                    <div id="2013F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2013" href="#2013M"><span class="caret"></span> March
                                    <div id="2013M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>                        
                </ul>
            </div>
        </div>
        <div class="panel panel-default bd-rad0 box-shadow mgt40">
            <div class="panel-body pd15">
                <span class="dp-bl fs25">RECENT COMMENTS</span>
                <hr class="mgb20">
                @foreach($comments as $comment)
                    <div class="mgb20 pd15">
                        <span class="dp-bl fs20 mgb10">{{ $comment->comment_name }} of {{ $comment->comment_dept }}</span>
                        <p class="mgl20">{{ $comment->comment_message }}</p>
                        <div class="text-right">
                            <span class="text-muted">- {{ date_format($comment->created_at, 'F d, Y') }}</span>
                        </div>
                    </div>
                    <hr class="mgb20">
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection