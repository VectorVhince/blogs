@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="{{ route('posts.create')}}"><button class="btn btn-primary pull-right">Add</button></a>
        
        @foreach($posts as $post)
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{ $post->post_title }}</h3></div>
                <div class="panel-body">
                    
                    {{ substr($post->post_body, 0, 300) }}... <a href="{{ route('posts.show',$post->id) }}" class="pull-right">See more</a>
                    <h5>Author: <b>{{ $post->post_author}}</h5></b>
                </div>
                <div class="panel-footer">
                    <h6 class="pull-right">Posted by: Admin <b>{{ $post->post_created }}</b></h6>
                    <h6>{{ $post->created_at }}</h6>
                </div>             
            </div>
        </div>
        @endforeach
    </div>
@endsection
