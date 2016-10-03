@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center wd100P mgb20">
        <span class="fc-gold f-ul fs45">EDITOR'S NOTE</span>
    </div>
    <div class="row mgh0">
        <div class="col-md-4">
            <div class="bgc-lbrown pdv15 text-center">
                <span class="fc-gold fs30 mgb20">ARCHIVE FOR EDITOR'S NOTE</span>
                <ul class="list-unstyled text-left">
                    <li class="fs25 pd15 fc-gold pdl30">2013</li>
                    <li class="fs25 pd15 fc-gold pdl30">2014</li>
                    <li class="fs25 pd15 fc-gold pdl30">2015</li>
                    <li class="fs25 pd15 fc-gold pdl30 bgc-white">2016</li>
                </ul>                
            </div>
        </div>
        <div class="col-md-8 bgc-lbrown mgh0">
        @if($editors->isEmpty())
        <div class="alert alert-danger mgt20">
          <strong>Danger!</strong> No editor's notes posted.
        </div>
        @else
            @foreach($editors as $editor)
            <a href="{{ route('editors.show',$editor->id) }}">
                <div class="row bdb-black pdv30 pdh30 bgc-white-hover transition">
                    <div class="col-sm-5 pdl0">
                        <img src="{{ asset('img/uploads/' . $editor->editors_img) }}" class="img-responsive">
                    </div>
                    <div class="col-sm-7 pdr0">
                        <span class="dp-bl fc-black fs25 wwrap">{{ $editor->editors_title }}</span>
                        <span class="dp-bl fc-black mgv15">Posted by: {{ $editor->editor_user }} | {{ date_format($editor->created_at, 'F d, Y') }}</span>
                        <p class="wwrap fc-black">{{ $editor->editors_body }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        @endif
        </div>
    </div>
</div>
@if(Auth::user())
<div class="button-container">
    <a href="{{ route('editors.create') }}"><button class="btn btn-primary">Add</button></a>
</div>
@endif
@stop
