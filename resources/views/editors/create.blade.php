@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <form action="{{ route('editors.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <span class="fs40 fc-gold mgb5">Post your editors</span>
                <div class="form-group{{ $errors->has('editors_title') ? ' has-error' : '' }}">
                    <input type="text" name="editors_title" class="form-control mgb5" placeholder="Title" value="{{ old('editors_title') }}" autofocus>
                    @if ($errors->has('editors_title'))
                        <span class="help-block"><strong>{{ $errors->first('editors_title') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('editors_body') ? ' has-error' : '' }}">
                    <textarea name="editors_body" class="form-control mgb5" rows="10" placeholder="Content"></textarea>
                    @if ($errors->has('editors_body'))
                        <span class="help-block"><strong>{{ $errors->first('editors_body') }}</strong></span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('editors_img') ? ' has-error' : '' }}">
                    <input type="file" name="editors_img" class="form-control mgb5">
                    @if ($errors->has('editors_img'))
                        <span class="help-block"><strong>{{ $errors->first('editors_img') }}</strong></span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
