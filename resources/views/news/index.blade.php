@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default bd-rad0 box-shadow panel-bg">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <div class="mgb20">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="fs40">News</span>
                            </div>
                            <div class="col-sm-4 col-sm-offset-2 mgt10">
                            <form action="{{ route('news.sortBy') }}" method="get">
                                <select class="form-control input-sm" name="key" onchange="this.form.submit()">
                                    <option disabled selected>Sort By</option>
                                    <option value="date">Date</option>
                                    <option value="name">Name</option>
                                    <!-- <option value="3">Popularity</option> -->
                                </select>
                            </form>
                            </div>
                        </div>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    @if(!$news->isEmpty())
                    @foreach($news as $new)
                    <div class="row mgb20">
                        <div class="col-md-12">
                            <a href="{{ route('news.show', $new->id) }}"><span class="dp-bl fs25 fc-red">{{ $new->title }}</span></a>
                            <span class="text-muted">Author: </span>{{ $new->user }} <span class="text-muted mgl10">Posted: </span>{{ date_format($new->created_at, 'F d, Y') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/img/uploads/' . $new->image) }}" class="img-responsive">
                        </div>
                        <div class="col-md-8">
                            {{ strip_tags(substr($new->body,0,400)) }}...
                        </div>
                    </div>
                    <div style="height: 1px;" class="bgc-gray mgv20"></div>
                    @endforeach
                    @else
                    Nothing posted.
                    @endif
                    {{ $news->links() }}
                </div>
            </div>        
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default bd-rad0 box-shadow">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pd15">
                    <div class="mgb20">
                        <span class="fs25">Weather News</span>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    <a href="http://www.accuweather.com/en/ph/angeles-city/265317/weather-forecast/265317" class="aw-widget-legal"></a>
                    <div id="awcc1482909407673" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awcc1482909407673"></div>
                    <script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
                </div>
            </div>
            @include('partials.archive')
        </div>
    </div>
</div>
@endsection