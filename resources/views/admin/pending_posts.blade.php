@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default bd-rad0 box-shadow panel-bg">
                <div class="bgc-red mg0 fc-white fs20 pdv5 pdh45 box-arrow2">
                  {{ ucfirst($post->category) }}
                </div>
                <div class="panel-body pdh45">
                    <div class="row mgb40">
                        <div class="col-md-10">
                            <span class="fs40">{{ $post->title }}</span>
                            <div class="dp-bl">
                                <span class="text-muted">Author: </span>{{ $post->user }} <span class="text-muted mgl10">Posted: </span>{{ date_format($post->created_at, 'F d, Y') }}
                            </div>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{ asset('/img/uploads/' . $post->image) }}" class="img-responsive mgb40">
                        </div>
                    </div>
                    <div class="row mgb20">
                        <div class="col-lg-12">
                            {!! $post->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<div id="modal3" class="modal fade bs-example-modal-sm pdt200" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content text-center pd15">

      <span>Unmark this featured?</span>
      <div class="row mgt20">
          <a href="{{ route('posts.unfeatured',$post->id) }}"><button type="button" class="btn btn-danger btn-sm">Yes</button></a>
          <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
      </div>

    </div>
  </div>
</div>
@endsection