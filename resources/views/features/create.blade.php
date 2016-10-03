@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <form action="{{ route('features.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <span class="fs40 fc-gold mgb5">Post your features</span>
                <div class="form-group{{ $errors->has('features_title') ? ' has-error' : '' }}">
                    <input type="text" name="features_title" class="form-control mgb5" placeholder="Title" value="{{ old('features_title') }}" autofocus>
                    @if ($errors->has('features_title'))
                        <span class="help-block"><strong>{{ $errors->first('features_title') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('features_body') ? ' has-error' : '' }}">
                    <textarea name="features_body" class="form-control mgb5" rows="10" placeholder="Content"></textarea>
                    @if ($errors->has('features_body'))
                        <span class="help-block"><strong>{{ $errors->first('features_body') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('features_img') ? ' has-error' : '' }}">
                    <input type="file" name="features_img" class="form-control mgb5">
                    @if ($errors->has('features_img'))
                        <span class="help-block"><strong>{{ $errors->first('features_img') }}</strong></span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
