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
                                <span class="fs40">Reports</span>
                            </div>
                        </div>
                        <div style="height: 2px;" class="bgc-red mg0"></div>
                    </div>
                    @if(!$reports->isEmpty())
                    @foreach($reports as $report)
                    <a href="{{ route('posts.show',$report->post_id) }}" class="fc-black">
                        <div class="bg-blue-hover pd10">
                            <div class="row mgb20">
                                <div class="col-md-12">
                                    <span class="dp-bl fs15 mgb20">{{ ucfirst($report->type) }}</span>
                                    @if($report->type == 'post')
                                    <p class="mgl20">{{ $report->post_title }}</p>
                                    @else
                                    <p class="mgl20">{{ $report->comment_title }}</p>
                                    @endif
                                    <p class="mgl20">{{ $report->message }}</p>                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="pointer" data-toggle="tooltip" title="{{ date_format($report->created_at, 'F d, Y g:i a') }}">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($report->created_at))->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div style="height: 1px;" class="bgc-gray mgv20"></div>
                    @endforeach
                    @else
                    No reports yet.
                    @endif
                    
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection