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
                                <span class="fs40">Humor</span>
                            </div>
                            <div class="col-sm-4 col-sm-offset-2 mgt10">
                            <form action="{{ route('humor.sortBy') }}" method="get">
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
                    @if(!$humors->isEmpty())
                    @foreach($humors as $humor)
                    <a href="{{ route('humor.show', $humor->id) }}" class="fc-black">
                        <div class="bg-blue-hover pdb10">
                            <div class="row mgb20">
                                <div class="col-md-12">
                                    <span class="dp-bl fs25 fc-red">{{ $humor->title }}</span>
                                    <span class="text-muted">Author: </span>{{ $humor->user }} <span class="text-muted mgl10">Posted: </span>{{ date_format($humor->created_at, 'F d, Y') }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('/img/uploads/' . $humor->image) }}" class="img-responsive img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    {{ strip_tags(substr($humor->body,0,400)) }}...
                                </div>
                            </div>
                        </div>
                    </a>
                    <div style="height: 1px;" class="bgc-gray mgv20"></div>
                    @endforeach
                    @else
                    Nothing posted.
                    @endif
                    {{ $humors->links() }}
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