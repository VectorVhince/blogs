@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <form action="{{ route('news.update',$news->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <span class="fs40 fc-gold mgb5">Update your news</span>
                <div class="form-group{{ $errors->has('news_title') ? ' has-error' : '' }}">
                    <input type="text" name="news_title" class="form-control mgb5" placeholder="Title" value="{{ $news->news_title }}" autofocus>
                    @if ($errors->has('news_title'))
                        <span class="help-block"><strong>{{ $errors->first('news_title') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('news_body') ? ' has-error' : '' }}">
                    <textarea name="news_body" class="form-control mgb5" rows="10" placeholder="Content">{{ $news->news_body }}</textarea>
                    @if ($errors->has('news_body'))
                        <span class="help-block"><strong>{{ $errors->first('news_body') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('news_img') ? ' has-error' : '' }}">
                    <input type="file" name="news_img" class="form-control mgb5">
                    @if ($errors->has('news_img'))
                        <span class="help-block"><strong>{{ $errors->first('news_img') }}</strong></span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
