@extends('layouts.app')

@section('title') Home @stop

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8">
          @if(isset($post_featured))
          <a href="{{ route('posts.show', $post_featured->id) }}" class="fc-black">
            <div class="tile-group bd-rad5 box-shadow mgb20">
            <img src="{{ asset('img/uploads/' . $post_featured->post_img) }}" class="tile-img">
              <div class="tile-content text-center">
                <span class="fs40 fc-gold dp-bl wwrap">{{ $post_featured->post_title }}</span>
                <span class="fs20 fc-white dp-bl mgt5">by: {{ $post_featured->post_user }}</span>
              </div>
            </div>
          </a>
          @else
          <a href="{{ route('posts.create') }}" class="fc-black">
            <div class="tile-group bd-rad5 box-shadow bgc-lbrown mgb20">
              <div class="tile-content text-center">
                <span class="fc-black dp-bl mgt5">Nothing posted.</span>
              </div>
            </div>
          </a>
          @endif
        </div>

        <div class="col-md-4">
            @if(isset($post_featured))
            <a href="{{ route('posts.show', $post_featured->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow mgb20">
              <img src="{{ asset('img/uploads/' . $post_featured->post_img) }}" class="tile-img">
                <div class="tile-content text-center">
                  <span class="fs40 fc-gold dp-bl wwrap">{{ $post_featured->post_title }}</span>
                  <span class="fs20 fc-white dp-bl mgt5">by: {{ $post_featured->post_user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ route('posts.create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow bgc-lbrown mgb20">
                <div class="tile-content text-center">
                  <span class="fc-black dp-bl wwrap">Nothing posted.</span>
                </div>
              </div>
            </a>
            @endif
            @if(isset($post_featured))
            <a href="{{ route('posts.show', $post_featured->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow mgb20">
              <img src="{{ asset('img/uploads/' . $post_featured->post_img) }}" class="tile-img">
                <div class="tile-content text-center">
                  <span class="fs40 fc-gold dp-bl wwrap">{{ $post_featured->post_title }}</span>
                  <span class="fs20 fc-white dp-bl mgt5">by: {{ $post_featured->post_user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ route('posts.create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow bgc-lbrown mgb20">
                <div class="tile-content text-center">
                  <span class="fc-black dp-bl wwrap">Nothing posted.</span>
                </div>
              </div>
            </a>
            @endif
        </div>
    </div>    


    <div class="row">
        <div class="col-md-4">
          @if(isset($post_featured))
            <a href="{{ route('posts.show', $post_featured->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow mgb20">
              <img src="{{ asset('img/uploads/' . $post_featured->post_img) }}" class="tile-img">
                <div class="tile-content text-center">
                  <span class="fs40 fc-gold dp-bl wwrap">{{ $post_featured->post_title }}</span>
                  <span class="fs20 fc-white dp-bl mgt5">by: {{ $post_featured->post_user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ route('posts.create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow bgc-lbrown mgb20">
                <div class="tile-content text-center">
                  <span class="fc-black dp-bl wwrap">Nothing posted.</span>
                </div>
              </div>
            </a>
            @endif
        </div>
        <div class="col-md-4">
          @if(isset($post_featured))
            <a href="{{ route('posts.show', $post_featured->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow mgb20">
              <img src="{{ asset('img/uploads/' . $post_featured->post_img) }}" class="tile-img">
                <div class="tile-content text-center">
                  <span class="fs40 fc-gold dp-bl wwrap">{{ $post_featured->post_title }}</span>
                  <span class="fs20 fc-white dp-bl mgt5">by: {{ $post_featured->post_user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ route('posts.create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow bgc-lbrown mgb20">
                <div class="tile-content text-center">
                  <span class="fc-black dp-bl wwrap">Nothing posted.</span>
                </div>
              </div>
            </a>
            @endif
        </div>
        <div class="col-md-4">
          @if(isset($post_featured))
            <a href="{{ route('posts.show', $post_featured->id) }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow mgb20">
              <img src="{{ asset('img/uploads/' . $post_featured->post_img) }}" class="tile-img">
                <div class="tile-content text-center">
                  <span class="fs40 fc-gold dp-bl wwrap">{{ $post_featured->post_title }}</span>
                  <span class="fs20 fc-white dp-bl mgt5">by: {{ $post_featured->post_user }}</span>
                </div>
              </div>
            </a>
            @else
            <a href="{{ route('posts.create') }}" class="fc-black">
              <div class="tile-group-sm bd-rad5 box-shadow bgc-lbrown mgb20">
                <div class="tile-content text-center">
                  <span class="fc-black dp-bl wwrap">Nothing posted.</span>
                </div>
              </div>
            </a>
            @endif
        </div>         
    </div>
  </div>
@stop