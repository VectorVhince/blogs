@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-9">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                @foreach($items as $item)
                <div class="row mgb20">
                    <div class="col-md-12">
                        <span class="dp-bl fs25 fc-red">{{ $item->title }}</span>
                        <span class="text-muted">Author: {{ $item->user }}</span> | <span class="text-muted">{{ date_format($item->created_at, 'F d Y') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('/img/uploads/' . $item->image) }}" class="img-responsive">
                    </div>
                    <div class="col-md-8">
                        <p>{{ substr($item->body,0,400) }}...  <a href="{{ route('news.show', $item->id) }}" class="fc-gold">See More</a></p>
                    </div>
                </div>
                <hr>
                @endforeach
                {{ $items->links() }}
            </div>
        </div>        
    </div>
</div>
@endsection