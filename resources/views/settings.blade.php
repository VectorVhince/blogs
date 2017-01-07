@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bd-rad0 box-shadow panel-bg">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <div class="mgb20">
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="fs40">Account Settings</span>
                            </div>
                        </div>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="dp-bl">Name:</label>
                        </div>
                        <div class="col-md-10">
                            <span class="dp-bl">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="dp-bl">Username:</label>
                        </div>
                        <div class="col-md-10">
                            <span class="dp-bl">{{ Auth::user()->username }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="dp-bl">Email Address:</label>
                        </div>
                        <div class="col-md-10">
                            <span class="dp-bl">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="dp-bl">Position:</label>
                        </div>
                        <div class="col-md-10">
                            <span class="dp-bl">{{ Auth::user()->position }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="dp-bl">Administraion:</label>
                        </div>
                        <div class="col-md-10">
                            <span class="dp-bl">{{ ucfirst(Auth::user()->role) }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="dp-bl">Password:</label>
                        </div>
                        <div class="col-md-10">
                            <span class="dp-bl"><a href="#">Change Password</a></span>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection