@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                    {{ csrf_field() }}

                        <div class="form-group" >
                          <label>Category:</label>
                          <select class="form-control" type="text" name="post_category">
                            <option value="news">News</option>
                            <option value="sports">Sports</option>
                            <option value="features">Features</option>
                            <option value="editorial">Editorial</option>
                            <option value="artworks">Artworks</option>
                          </select>
                        </div>

                        <label>Title:</label>
                        <input type="text" class="form-control" name="post_title" placeholder="Title">
                        <label>Article:</label>    
                        <textarea class="form-control" name="post_body" placeholder="Article"></textarea>
                        <label>Author:</label>
                        <input type="text" class="form-control" name="post_author" placeholder="Author">
                        <input type="hidden" name="post_created" value="{{ Auth::user()->name }}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
