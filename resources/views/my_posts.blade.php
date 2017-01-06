@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default bd-rad0 box-shadow panel-bg">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <div class="mgb20">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="fs40">My Posts</span>
                            </div>
                            <div class="col-sm-4 col-sm-offset-2 mgt10">
                            <form action="{{ route('myposts.sortBy',Auth::user()->id) }}" method="get">
                                <select class="form-control input-sm" name="key" onchange="this.form.submit()">
                                    <option disabled selected>Sort By</option>
                                    <option value="date">Date</option>
                                    <option value="name">Name</option>
                                    <!-- <option value="3">Popularity</option> -->
                                </select>
                            </form>
                            </div>
                        </div>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    @foreach($users as $user)
                        {{$user->title}}
                    @endforeach
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection