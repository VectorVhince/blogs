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
                            <div class="col-sm-12">
                                <span class="fs40">Members</span>
                            </div>
                        </div>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    @if(!$users->isEmpty())
                    @foreach($users as $user)
                    <div class="row">
                        <div class="col-md-3">
                            <label>Name</label>
                        </div>
                        <div class="col-md-9">
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Role</label>
                        </div>
                        <div class="col-md-9">
                            {{ ucfirst($user->role) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Position</label>
                        </div>
                        <div class="col-md-9">
                            {{ $user->position }}
                        </div>
                    </div>
                    <div style="height: 1px;" class="bgc-gray mgv20"></div>
                    @endforeach
                    @else
                    No members.
                    @endif
                    
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection