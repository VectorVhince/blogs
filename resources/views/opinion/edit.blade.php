@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <form action="{{ route('opinion.update',$opinion->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <span class="fs40 fc-gold mgb5">Update your Opinion</span>
                <div class="form-group{{ $errors->has('opinion_title') ? ' has-error' : '' }}">
                    <input type="text" name="opinion_title" class="form-control mgb5" placeholder="Title" value="{{ $opinion->opinion_title }}" autofocus>
                    @if ($errors->has('opinion_title'))
                        <span class="help-block"><strong>{{ $errors->first('opinion_title') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('opinion_body') ? ' has-error' : '' }}">
                    <textarea name="opinion_body" class="form-control mgb5" rows="10" placeholder="Content">{{ $opinion->opinion_body }}</textarea>
                    @if ($errors->has('opinion_body'))
                        <span class="help-block"><strong>{{ $errors->first('opinion_body') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('opinion_img') ? ' has-error' : '' }}">
                    <input type="file" name="opinion_img" class="form-control mgb5">
                    @if ($errors->has('opinion_img'))
                        <span class="help-block"><strong>{{ $errors->first('opinion_img') }}</strong></span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
