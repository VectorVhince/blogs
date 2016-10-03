@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- <span class="fs40 fc-gold mgb5">Post your post</span> -->
                <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                    <input type="text" name="post_title" class="form-control mgb5" placeholder="Title" value="{{ old('post_title') }}" autofocus>
                    @if ($errors->has('post_title'))
                        <span class="help-block"><strong>{{ $errors->first('post_title') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                    <textarea name="post_body" class="form-control mgb5" rows="10" placeholder="Content"></textarea>
                    @if ($errors->has('post_body'))
                        <span class="help-block"><strong>{{ $errors->first('post_body') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('post_img') ? ' has-error' : '' }}">
                    <input type="file" name="post_img" class="form-control mgb5">
                    @if ($errors->has('post_img'))
                        <span class="help-block"><strong>{{ $errors->first('post_img') }}</strong></span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
