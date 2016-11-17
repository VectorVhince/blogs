@extends('layouts.app')

@section('title') Home @stop

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/unslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/unslider-dots.css') }}">
@stop

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          @if(!$featured->isEmpty())
            <div id="slider">
              <ul>
                @foreach($featured as $feature)
                <li>                
                  <div class="tile-group bd-rad10 mgb20 box-shadow">
                  <img src="{{ asset('img/uploads/' . $feature->image) }}" class="tile-img">
                    <div class="tile-content text-center">
                      <span class="fs40 fc-white dp-bl wwrap">{{ $feature->title }}</span>
                      <span class="fs20 fc-white dp-bl mgt5">by: {{ $feature->user }}</span>
                      <p class="fc-white mgt20">{{ substr($feature->body,0,200) }}... <a href="{{ route($feature->category . '.show', $feature->category_id) }}" class="fc-gold">See More</a></p>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          @else
            <div class="tile-group bd-rad10 bgc-lbrown mgb20 box-shadow">
              <div class="text-center">
                <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                <a href="{{ url('create') }}" class="fc-gold">
                  Click here to create.
                </a>
              </div>
            </div>
          @endif
        </div>

        <div class="col-md-4">
            @if(isset($news))
            <a href="{{ route('news.show', $news->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad10 mgb20 box-shadow">
              <img src="{{ asset('img/uploads/' . $news->image) }}" class="tile-img">
                <div class="tile-content-sm text-center">
                  <span class="fs25 fc-white dp-bl wwrap">{{ $news->title }}</span>
                  <span class="fs15 fc-white dp-bl mgt5">by: {{ $news->user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ url('create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad10 bgc-lbrown mgb20 box-shadow">
                <div class="text-center">
                  <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                  <a href="{{ url('create') }}" class="fc-gold">
                    Click here to create.
                  </a>
                </div>
              </div>
            </a>
            @endif
            @if(isset($opinion))
            <a href="{{ route('opinion.show', $opinion->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad10 mgb20 box-shadow">
              <img src="{{ asset('img/uploads/' . $opinion->image) }}" class="tile-img">
                <div class="tile-content-sm text-center">
                  <span class="fs25 fc-white dp-bl wwrap">{{ $opinion->title }}</span>
                  <span class="fs15 fc-white dp-bl mgt5">by: {{ $opinion->user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ url('create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad10 mgb20 bgc-lbrown box-shadow">
                <div class="text-center">
                  <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                  <a href="{{ url('create') }}" class="fc-gold">
                    Click here to create.
                  </a>
                </div>
              </div>
            </a>
            @endif
        </div>
    </div>    

    <div class="row">
      <div class="col-md-4">
        @if(isset($features))
          <a href="{{ route('features.show', $features->id) }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 box-shadow">
            <img src="{{ asset('img/uploads/' . $features->image) }}" class="tile-img">
              <div class="tile-content-sm text-center">
                <span class="fs25 fc-white dp-bl wwrap">{{ $features->title }}</span>
                <span class="fs15 fc-white dp-bl mgt5">by: {{ $features->user }}</span>
              </div>
            </div>
          </a>
          @else
          <a href="{{ url('create') }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 bgc-lbrown box-shadow">
              <div class="text-center">
                <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                <a href="{{ url('create') }}" class="fc-gold">
                  Click here to create.
                </a>
              </div>
            </div>
          </a>
          @endif
      </div>

      <div class="col-md-4">
        @if(isset($humors))
          <a href="{{ route('humors.show', $humors->id) }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 box-shadow">
            <img src="{{ asset('img/uploads/' . $humors->image) }}" class="tile-img">
              <div class="tile-content-sm text-center">
                <span class="fs25 fc-white dp-bl wwrap">{{ $humors->title }}</span>
                <span class="fs15 fc-white dp-bl mgt5">by: {{ $humors->user }}</span>
              </div>
            </div>
          </a>
          @else
          <a href="{{ url('create') }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 bgc-lbrown box-shadow">
              <div class="text-center">
                <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                <a href="{{ url('create') }}" class="fc-gold">
                  Click here to create.
                </a>
              </div>
            </div>
          </a>
          @endif
      </div>

      <div class="col-md-4">
        @if(isset($sports))
          <a href="{{ route('sports.show', $sports->id) }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 box-shadow">
            <img src="{{ asset('img/uploads/' . $sports->image) }}" class="tile-img">
              <div class="tile-content-sm text-center">
                <span class="fs25 fc-white dp-bl wwrap">{{ $sports->title }}</span>
                <span class="fs15 fc-white dp-bl mgt5">by: {{ $sports->user }}</span>
              </div>
            </div>
          </a>
          @else
          <a href="{{ url('create') }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 bgc-lbrown box-shadow">
              <div class="text-center">
                <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                <a href="{{ url('create') }}" class="fc-gold">
                  Click here to create.
                </a>
              </div>
            </div>
          </a>
          @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        @if(isset($artworks))
          <a href="{{ route('artworks.show', $artworks->id) }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 box-shadow">
            <img src="{{ asset('img/uploads/' . $artworks->image) }}" class="tile-img">
              <div class="tile-content-sm text-center">
                <span class="fs25 fc-white dp-bl wwrap">{{ $artworks->title }}</span>
                <span class="fs15 fc-white dp-bl mgt5">by: {{ $artworks->user }}</span>
              </div>
            </div>
          </a>
          @else
          <a href="{{ url('create') }}" class="fc-black">
            <div class="tile-group-sm bd-rad10 mgb20 bgc-lbrown box-shadow">
              <div class="text-center">
                <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                <a href="{{ url('create') }}" class="fc-gold">
                  Click here to create.
                </a>
              </div>
            </div>
          </a>
          @endif
      </div>
      <div class="col-md-8">
        <div class="tile-group-wide bgc-lbrown bd-rad10 mgb20 box-shadow">
            <div class="text-center pd15">
              <span class="fs25 fc-white dp-bl wwrap">Announcements</span>
                <ol class="text-left">
                  @foreach($announcements as $announcement)
                    <li>{{ $announcement->body }}</li>
                  @endforeach
                </ol>
            </div>
          </div>
      </div>
    </div>
  </div>
@stop

@section('script')
  <script type="text/javascript" src="{{ asset('/js/unslider.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {      
      $('#slider').unslider({
        autoplay:true,
        speed:1000,
        delay:7000,
        nav: false,
        arrows:{
          prev:'<a class="unslider-arrow prev fs40 fc-red lh1 f-shadow"><i class="glyphicon glyphicon-chevron-left"></i></a>',
          next:'<a class="unslider-arrow next fs40 fc-red lh1 f-shadow"><i class="glyphicon glyphicon-chevron-right"></i></a>'
        }
      });
      $('.tile-content').on('mouseenter',function(){
        $('#slider').data('unslider').stop();
      }).on('mouseleave',function(){
        $('#slider').data('unslider').start();
      });
    });
  </script>
@stop