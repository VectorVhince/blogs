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
                        <div class="col-md-9 roleHover" data-id="{{ $user->id }}">
                            {{ ucfirst($user->role) }} <span class="dp0 pointer roleBtn{{ $user->id }}" data-toggle="tooltip" title="Edit"><img src="{{ asset('img/edit.png') }}" class="ht25"></span>
                            <form action="{{ route('update.role',$user->id) }}" method="post" id="roleForm" class="hidden">
                                {{ csrf_field() }}
                                {{ method_field('patch') }}
                                <div class="box-shadow wd200">
                                    <select class="form-control bd-rad0 mgv10" name="role" onchange="this.form.submit()">
                                        <option selected disabled>{{ ucfirst($user->role) }}</option>
                                        <option value="superadmin">Superadmin</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Position</label>
                        </div>
                        <div class="col-md-9">
                            {{ $user->position }} <span class="dp-il pointer" data-toggle="tooltip" title="Edit"><img src="{{ asset('img/edit.png') }}" class="ht25"></span>
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

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        var roleId = $('.roleHover').data('id');

        $('.roleHover').on('mouseenter', function(){
            $('.roleBtn' + roleId).show();
        }).on('mouseleave', function(){
            $('.roleBtn' + roleId).hide();
        });
    });
    </script>
@stop