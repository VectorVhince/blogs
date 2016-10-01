@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 show_post">
            
            <h2>{{ $post->post_title }} </h2>
            <br>
            <p>{{ $post->post_body }}</p> 
            <br>
            <h3>Author: <b>{{ $post->post_author }}</b></h3> 
            <br>
            <h5>Posted By: {{ $post->post_created }}</h5>
            <br>
            <h6>{{ $post->created_at }}</h6>
        </div>

        <div class="col-md-3">
            <form action="{{ route('posts.destroy', $post->id) }}"  method="POST">
                {!! method_field('DELETE') !!}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger pull-right">Delete</button>
                <a href="{{ route('posts.edit', $post->id) }}"><button type="button" class="btn btn-primary pull-right">Edit</button></a>
            </form>
        </div>
    </div>
</div>
@endsection
