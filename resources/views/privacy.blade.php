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
                            <div class="col-sm-10">
                                <span class="fs40">Privacy Policy</span>
                            </div>
                            <div class="col-sm-2">
                                @if(Auth::user())
                                    @if(Auth::user()->role == 'superadmin')
                                    <div class="pointer" data-toggle="modal" data-target='#editor'><img src="{{ asset('img/edit.png') }}" class="img-responsive img-circle ht50 pull-right" data-toggle="tooltip" data-placement="bottom" title="Edit"></div>
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