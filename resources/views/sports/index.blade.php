@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-8">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                <div class="mgb40">
                    <span class="fs40">SPORTS</span>
                </div>
                @if(!$sports->isEmpty())
                @foreach($sports as $sport)
                <div class="row mgb20">
                    <div class="col-md-12">
                        <span class="dp-bl fs25 fc-red">{{ $sport->title }}</span>
                        <span class="text-muted">Author: {{ $sport->user }}</span> | <span class="text-muted">{{ date_format($sport->created_at, 'F d Y') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('/img/uploads/' . $sport->image) }}" class="img-responsive">
                    </div>
                    <div class="col-md-8">
                        <p>{{ substr($sport->body,0,400) }}...  <a href="{{ route('sports.show', $sport->id) }}" class="fc-gold">See More</a></p>
                    </div>
                </div>
                <hr>
                @endforeach
                @else
                Nothing posted.
                @endif
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
    </div>
</div>
@endsection