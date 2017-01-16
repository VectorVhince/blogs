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
                            <div class="col-sm-10">
                                <span class="fs40">The Angelite</span>
                            </div>
                            <div class="col-sm-2">
                                @if(Auth::user())
                                    @if(Auth::user()->role == 'superadmin')
                                    <div class="pointer" data-toggle="modal" data-target='#editor'><img src="{{ asset('img/edit.png') }}" class="img-circle ht50 pull-right" data-toggle="tooltip" data-placement="bottom" title="Edit"></div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>                                       
                    <div class="row">
                        <div class="col-md-12">
                            {!! $category->content !!}
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default bd-rad0 box-shadow">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pd15">
                    <div class="mgb20">
                        <span class="fs25">Members</span>
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
@include('partials.editor')
@endsection

@section('script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });
    </script>
    <script src="{{ asset('/js/tinymce-config.js') }}"></script>
@stop