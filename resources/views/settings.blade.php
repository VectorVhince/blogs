@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-8">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                <div class="row">
                    <div class="col-md-4">
                        <img src="http://static8.comicvine.com/uploads/scale_small/11/113509/4693444-6164752601-ben_a.jpg" class="img-circle img-thumbnail img-respnsive">  
                    </div>
                    <div class="col-md-8">
                        <span class="fs40 dp-bl">{{ Auth::user()->name }}</span>
                        <span class="dp-bl">{{ Auth::user()->username }}</span>
                        <span class="dp-bl">{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                <div class="fs40">
                    Recent Posts
                </div>
            </div>
        </div>
    </div>
</div>
@endsection