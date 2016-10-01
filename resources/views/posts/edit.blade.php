@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" >
                    {{ csrf_field() }}
                    {!! method_field('PATCH') !!}
                        <label>Title:</label>
                        <input type="text" class="form-control" name="post_title" placeholder="Title" value="{{ $post->post_title }}">
                        <label>Article:</label>    
                        <textarea class="form-control" name="post_body" placeholder="Article">{{ $post->post_body }}</textarea>
                        <label>Author:</label>
                        <input type="text" class="form-control" name="post_author" placeholder="Author" value="{{ $post->post_author}}">

                        <input type="hidden" name="post_created" value="{{ Auth::user()->name }}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
