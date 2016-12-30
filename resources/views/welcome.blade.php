@extends('layouts.app')

@section('title') Home @stop

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
@stop

@section('content')
  <div class="container">
    <div class="panel panel-default bd-rad0 box-shadow panel-bg">
      <div class="row">
        <div class="col-lg-9 pdr0">
          <div class="swiper-container gallery-images">
            <div class="swiper-wrapper">
                @foreach($featured as $feature)
                <div class="swiper-slide">
                  <img src="{{ asset('img/uploads/' . $feature->image) }}" class="img-responsive">
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>        
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>          
          </div>
        </div>
        <div class="col-lg-3 pdl0">
          <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                @foreach($featured as $feature)
                <div class="swiper-slide">
                  <img src="{{ asset('img/uploads/' . $feature->image) }}" class="img-responsive">
                </div>
                @endforeach
            </div>       
          </div>
        </div>
      </div>
      


      <div class="panel-body pdh45">



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
        lazyLoading: true,
    });

    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true,
        direction: 'horizontal',
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;
  });
</script>
@stop