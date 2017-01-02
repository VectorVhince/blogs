@extends('layouts.app')

@section('title') Home @stop

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
@stop

@section('content')
  <div class="container">
    @if(!$featured->isEmpty())
    <div class="panel panel-default bd-rad0 box-shadow panel-bg" style="background: transparent">
      <div class="row mg0">
        <div class="col-lg-9 pd0">
          <div class="swiper-container gallery-images">
            <div class="swiper-wrapper">
                @foreach($featured as $feature)
                <div class="swiper-slide">
                  <img src="{{ asset('img/uploads/' . $feature->image) }}" class="img-responsive" style="width: 100%;">
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>        
            <!-- <div class="swiper-button-prev"><span class="glyphicon glyphicon-chevron-left fs25"></span></div>
            <div class="swiper-button-next"><span class="glyphicon glyphicon-chevron-right fs25"></span></div> -->          
          </div>
        </div>
        <div class="col-lg-3 pd0">
          <div class="bgc-black-t ht400">
            <div class="row mg0">
              <div class="dp-bl fc-white fs20 pd10 bgc-red col-sm-8">
                LATEST TRENDS
              </div>
              <div class="col-sm-4">
                
              </div>
            </div>
            <div class="fc-white trending-panel">
              sdkljfbn sjkdfhgpdouifg ndfo'jk
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="panel panel-default bd-rad0 box-shadow panel-bg">
      <div class="row swiper-container">
        <div class="col-lg-12 text-center pdv200">
          <span class="fs25">Nothing posted.</span>
        </div>
      </div>
    </div>      
    @endif

    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20">News</div>
          <div class="panel-body">
            @if(!$news->isEmpty())
            @foreach($news as $new)
            <div class="row">
              <div class="col-md-4">
                <a href="{{ route('news.show', $new->id) }}" class="fc-black">
                  <span class="fs17 dp-bl"><b>{{ $new->title }}</b></span>
                  <div class="tile-img-container mgv10">
                    <img src="{{ asset('img/uploads/' . $new->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  {{ strip_tags(substr($new->body,0,100)) }}...
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('news.index') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @endforeach
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>  

        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20">Editorial</div>
          <div class="panel-body">
            <div class="row">
            @if(!$artworks->isEmpty())
            @foreach($artworks as $artwork)
              <div class="col-md-4">
                <a href="{{ route('artworks.show', $artwork->id) }}" class="fc-black">
                  <span class="fs17 dp-bl"><b>{{ $artwork->title }}</b></span>
                  <div class="tile-img-container mgv10">
                    <img src="{{ asset('img/uploads/' . $artwork->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  {{ strip_tags(substr($artwork->body,0,100)) }}...
                </a>
              </div>
            @endforeach
            @else
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            @endif
            </div>
          </div>
        </div>      
      </div>
      <div class="col-lg-4">
        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20">Recent Comments</div>
          <div class="panel-body">
            
          </div>
        </div> 
      </div>
    </div>
  </div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>

<script>
  $(document).ready(function(){
    var galleryTop = new Swiper('.gallery-images', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 10000,
        loop: true,
        effect: 'fade',
        autoplayDisableOnInteraction: false,
        grabCursor: true,
        lazyLoading: true
    });
  });
</script>
@stop