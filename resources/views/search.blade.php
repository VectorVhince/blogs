@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default bd-rad0 box-shadow">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <span>Search results for: <b>{{ $search }}</b> <br>Found: <b>{{ $count }}</b></span>
                    <div style="height: 2px;" class="bgc-red mg0 mgv20"></div>
                    @foreach($items as $item)
                    <div class="row mgb20">
                        <div class="col-md-12">
                            <a href="{{ route('news.show', $item->id) }}"><span class="dp-bl fs25 fc-red">{{ $item->title }}</span></a>{{ $item->category }}
                            <span class="text-muted">Author: </span>{{ $item->user }} <span class="text-muted mgl10">Posted: </span>{{ date_format($item->created_at, 'F d, Y') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/img/uploads/' . $item->image) }}" class="img-responsive">
                        </div>
                        <div class="col-md-8">
                            {{ strip_tags(substr($item->body,0,400)) }}...
                        </div>
                    </div>
                    <div style="height: 1px;" class="bgc-gray mgv20"></div>
                    @endforeach
                    {{-- $items->links() --}}
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection