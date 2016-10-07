@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-9">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                <div class="col-md-8 mgb40">
                    <span class="fs40">{{ $news->title }}</span>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('news.destroy',$news->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                        <div class="btn-group">
                            <a href="{{ route('featured',[$news->id,$news->category]) }}" class="btn btn-default">Feature</a>
                            <a href="{{ route('news.edit',$news->id) }}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
                <img src="{{ asset('/img/uploads/' . $news->image) }}" class="img-responsive mgb40">
                <p>{{ $news->body }}</p>
                <div>
                    <span class="text-muted">Author: {{ $news->user }}</span> | <span class="text-muted">{{ date_format($news->created_at, 'F d Y') }}</span>
                </div>
            </div>
        </div>        
    </div>
    <div class="col-lg-3">
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
    </div>
</div>
@endsection