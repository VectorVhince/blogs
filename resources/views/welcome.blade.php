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
            @if(isset($news_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <a href="{{ route('news.show', $news_first->id) }}" class="fc-black">
                  <div class="mgv10">
                    <img src="{{ asset('img/uploads/' . $news_first->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <span class="fs17 dp-bl"><b>{{ $news_first->title }}</b></span>
                </a>
              </div>
              <div class="col-md-6 mgv10">
              @foreach($news as $new)
              <a href="{{ route('news.show', $new->id) }}" class="fc-black dp-bl">
                <span class="fs17 dp-bl"><b>{{ $new->title }}</b></span>
              </a>
              <hr>
              @endforeach
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
            @if(isset($editorials_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <a href="{{ route('editorial.show', $editorials_first->id) }}" class="fc-black">
                  <div class="mgv10">
                    <img src="{{ asset('img/uploads/' . $editorials_first->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <span class="fs17 dp-bl"><b>{{ $editorials_first->title }}</b></span>
                </a>
              </div>
              <div class="col-md-6 mgv10">
              @foreach($editorials as $editorial)
              <a href="{{ route('editorial.show', $editorial->id) }}" class="fc-black dp-bl">
                <span class="fs17 dp-bl"><b>{{ $editorial->title }}</b></span>
              </a>
              <hr>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('editorial.index') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
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
          <div class="bgc-red pd5 fc-white fs20">Opinion</div>
          <div class="panel-body">
            @if(isset($opinions_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <a href="{{ route('opinion.show', $opinions_first->id) }}" class="fc-black">
                  <div class="mgv10">
                    <img src="{{ asset('img/uploads/' . $opinions_first->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <span class="fs17 dp-bl"><b>{{ $opinions_first->title }}</b></span>
                </a>
              </div>
              <div class="col-md-6 mgv10">
              @foreach($opinions as $opinion)
              <a href="{{ route('opinion.show', $opinion->id) }}" class="fc-black dp-bl">
                <span class="fs17 dp-bl"><b>{{ $opinion->title }}</b></span>
              </a>
              <hr>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('opinion.index') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
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
          <div class="bgc-red pd5 fc-white fs20">Feature</div>
          <div class="panel-body">
            @if(isset($features_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <a href="{{ route('feature.show', $features_first->id) }}" class="fc-black">
                  <div class="mgv10">
                    <img src="{{ asset('img/uploads/' . $features_first->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <span class="fs17 dp-bl"><b>{{ $features_first->title }}</b></span>
                </a>
              </div>
              <div class="col-md-6 mgv10">
              @foreach($features as $feature)
              <a href="{{ route('feature.show', $feature->id) }}" class="fc-black dp-bl">
                <span class="fs17 dp-bl"><b>{{ $feature->title }}</b></span>
              </a>
              <hr>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('feature.index') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
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
          <div class="bgc-red pd5 fc-white fs20">Humor</div>
          <div class="panel-body">
            @if(isset($humors_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <a href="{{ route('humor.show', $humors_first->id) }}" class="fc-black">
                  <div class="mgv10">
                    <img src="{{ asset('img/uploads/' . $humors_first->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <span class="fs17 dp-bl"><b>{{ $humors_first->title }}</b></span>
                </a>
              </div>
              <div class="col-md-6 mgv10">
              @foreach($humors as $humor)
              <a href="{{ route('humor.show', $humor->id) }}" class="fc-black dp-bl">
                <span class="fs17 dp-bl"><b>{{ $humor->title }}</b></span>
              </a>
              <hr>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('humor.index') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
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
          <div class="bgc-red pd5 fc-white fs20">Sports</div>
          <div class="panel-body">
            @if(isset($sports_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <a href="{{ route('sports.show', $sports_first->id) }}" class="fc-black">
                  <div class="mgv10">
                    <img src="{{ asset('img/uploads/' . $sports_first->image) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <span class="fs17 dp-bl"><b>{{ $sports_first->title }}</b></span>
                </a>
              </div>
              <div class="col-md-6 mgv10">
              @foreach($sports as $sport)
              <a href="{{ route('sports.show', $sport->id) }}" class="fc-black dp-bl">
                <span class="fs17 dp-bl"><b>{{ $sport->title }}</b></span>
              </a>
              <hr>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('sports.index') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
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
        autoplay: 7000,
        loop: true,
        effect: 'fade',
        autoplayDisableOnInteraction: false,
        grabCursor: true,
        lazyLoading: true
    });
  });
</script>
@stop