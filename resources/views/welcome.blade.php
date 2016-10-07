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
                      <p class="fc-white mgt20">{{ substr($feature->body,0,200) }}... <a href="{{ route('news.show', $feature->id) }}" class="fc-gold">See More</a></p>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          @else
            <div class="tile-group bd-rad10 bgc-lbrown mgb20 box-shadow">
              <div class="tile-content text-center">
                <a href="{{ route('posts.create') }}" class="fc-gold">
                  <span class="fc-black dp-bl mgt5">Nothing posted.</span>
                </a>
              </div>
            </div>
          @endif
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
      $('#slider').on('mouseenter',function(){
        $(this).data('unslider').stop();
      }).on('mouseleave',function(){
        $(this).data('unslider').start();
      });
    });
  </script>
@stop