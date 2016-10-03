@extends('layouts.app')

@section('title') Home @stop

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-lg-6">
	    	<div class="tile-group">
		    	<img src="{{ asset('/img/uploads/default.jpg') }}" class="tile-img">
		    	<div class="tile-content text-center">
		    		<span class="fs40 fc-gold dp-bl wwrap">Marketing Bazaar Kicks Off SBA Days 2016</span>
		    		<span class="fs20 fc-white dp-bl mgt5">by: The Angelite</span>
		    	</div>
	    	</div>
	    </div>
	    <div class="col-lg-6">
		    @if($posts->isEmpty())
	    	@else
		    <div class="row">
	    	@foreach($posts as $post)
	    		<a href="{{ route('posts.show', $post->id) }}" class="fc-black">
			    	<div class="col-md-6 mgb30">
			    		<div class="tile-group-sm">
							<img src="{{ asset('img/uploads/' . $post->post_img) }}" class="tile-img">
					    	<div class="tile-content-sm text-center">
					    		<span class="fs25 fc-gold dp-bl wwrap">{{ $post->post_title }}</span>
					    		<span class="fs15 fc-white dp-bl mgt5">by: {{ $post->post_user }}</span>
					    	</div>
				    	</div>
			    	</div>
		    	</a>
		    @endforeach
		    </div>
		    @endif
	    </div>
	</div>
	<div class="row mgt29 mgb30">
	    <div class="col-lg-6">
	    	<div class="tile-group-long bgc-lbrown">
	    		<span class="dp-bl fc-gold fs25 pd5">News</span>
	    		<div class="mgb20">
			    	<img src="{{ asset('/img/uploads/default.jpg') }}" class="img-responsive">
	    		</div>
		    	<div class="tile-content-long">
		    		<div class="bdl-gold mgh15 pdh15 dp-bl wwrap">
			    		<span class="fs25">asdfghjkl; jhfkldshfjkhsd fsdjk fhskldjfh slkdjf shdlfjkshdfjklh sdjklf hsdjklfh sdjkl</span>
		    		</div>
		    		<div class="dp-bl mgt20">
		    			<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 30, 2016</span>
		    		</div>
		    		<div class="dp-bl mgt20 text-left pdb15">
		    			<p class="fs15 pdh15 wwrap">hdfgb shdfb sdkfhb sdhfb skdfhb sdkfhbdskjfbsdfhb sdkjfbdsjkf bsdkfh bsdhf bsdkfhbsdkfhbds hfbsdhb sjd fbjsd bfjsdh bfds bfsjd bfjsdh bfjsdbf jksbdjk asdhfgsdhufgsdjfgisdhufgidsjfgsidh gfiu</p>
		    		</div>
		    		@if($news->isEmpty())
			    	@else
		    		@foreach($news as $new)
		    		<a href="{{ route('news.show', $new->id) }}" class="fc-black">
	    				<div class="row mgv20 pd15 mgh0 bgc-gray">
	    					<div class="col-sm-4">
								<img src="{{ asset('img/uploads/' . $new->news_img) }}" class="img-responsive">
	    					</div>
	    					<div class="col-sm-8">
	    						<div class="dp-bl mgb10">
	    							<span class="fc-gold fs15 pdh15">by: {{ $new->news_user }}</span> | <span class="fs15 pdh15">{{ date_format($new->created_at, 'F d, Y') }}</span>
	    						</div>
	    						<div class="dp-bl fs25">
	    							<span>{{ $new->news_title }}</span>
	    						</div>
	    					</div>
	    				</div>
	    			</a>
    				@endforeach
    				@endif
		    	</div>
	    	</div>
	    </div>
	    <div class="col-lg-6">
	    	@if($opinions->isEmpty())
	    	@else
		    <div class="row bgc-lbrown mgb30 mgh0 f-shadow">
		    	<span class="dp-bl fc-gold fs25 pd5">Opinion</span>
		    	@foreach($opinions as $opinion)
	    		<a href="{{ route('opinion.show', $opinion->id) }}" class="fc-black">
			    	<div class="row pd15">
				    	<div class="col-md-4 pdb15">
							<img src="{{ asset('img/uploads/' . $opinion->opinion_img) }}" class="img-responsive">
				    	</div>
				    	<div class="col-md-8 pdl0">
				    		<div class="bdl-gold pdh15 dp-bl wwrap">
					    		<span class="fs25">{{ $opinion->opinion_title }}</span>
					    		<div class="mgh15 mgv10">
					    			<span class="fc-gold fs15 pdh15">by: {{ $opinion->opinion_user }}</span> | <span class="fs15 pdh15">{{ date_format($opinion->created_at, 'F d, Y') }}</span>
					    		</div>
					    		<p class="fs15 wwrap">{{ substr($opinion->opinion_body, 0, 100) }}</p>
				    		</div>
				    	</div>
			    	</div>
		    	</a>
		    	@endforeach
		    </div>
		    @endif
		    @if($features->isEmpty())
	    	@else
		    <div class="row bgc-lbrown mgb30 mgh0 f-shadow">
		    	<span class="dp-bl fc-gold fs25 pd5">Features</span>
		    	@foreach($features as $feature)
	    		<a href="{{ route('features.show', $feature->id) }}" class="fc-black">
			    	<div class="row pd15">
				    	<div class="col-md-4 pdb15">
							<img src="{{ asset('img/uploads/' . $feature->features_img) }}" class="img-responsive">
				    	</div>
				    	<div class="col-md-8 pdl0">
				    		<div class="bdl-gold pdh15 dp-bl wwrap">
					    		<span class="fs25">{{ $feature->features_title }}</span>
					    		<div class="mgh15 mgv10">
					    			<span class="fc-gold fs15 pdh15">by: {{ $feature->features_user }}</span> | <span class="fs15 pdh15">{{ date_format($feature->created_at, 'F d, Y') }}</span>
					    		</div>
					    		<p class="fs15 wwrap">{{ substr($feature->features_body, 0, 100) }}</p>
				    		</div>
				    	</div>
			    	</div>
		    	</a>
		    	@endforeach
		    </div>
		    @endif
		    @if($editors->isEmpty())
	    	@else
		    <div class="row bgc-lbrown mgb30 mgh0 f-shadow">
		    	<span class="dp-bl fc-gold fs25 pd5">Editor's Notes</span>
		    	@foreach($editors as $editor)
	    		<a href="{{ route('editors.show', $editor->id) }}" class="fc-black">
			    	<div class="row pd15">
				    	<div class="col-md-4 pdb15">
							<img src="{{ asset('img/uploads/' . $editor->editors_img) }}" class="img-responsive">
				    	</div>
				    	<div class="col-md-8 pdl0">
				    		<div class="bdl-gold pdh15 dp-bl wwrap">
					    		<span class="fs25">{{ $editor->editors_title }}</span>
					    		<div class="mgh15 mgv10">
					    			<span class="fc-gold fs15 pdh15">by: {{ $editor->editors_user }}</span> | <span class="fs15 pdh15">{{ date_format($editor->created_at, 'F d, Y') }}</span>
					    		</div>
					    		<p class="fs15 wwrap">{{ substr($editor->editors_body, 0, 100) }}</p>
				    		</div>
				    	</div>
			    	</div>
		    	</a>
		    	@endforeach
		    </div>
		    @endif
	    </div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="row bgc-lbrown mgb30 mgh0">
		    	<span class="dp-bl fc-gold fs25 pd5">Golden Guardians</span>
		    	<div class="col-md-4 pdb15">
					<img src="{{ asset('/img/uploads/default.jpg') }}" class="img-responsive">
		    	</div>
		    	<div class="col-md-8 pdl0">
		    		<div class="bdl-gold pdh15 dp-bl wwrap">
			    		<span class="fs25">asdfghjkl; jhfkldshfjkhsd fsdjk fhskldjfh</span>
			    		<div class="mgh15 mgv10">
			    			<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 29, 2016</span>
			    		</div>
			    		<p class="fs15 wwrap">hdfgb shdfb sdkfhb sdhfb skdfhb sdkfhbdskjfbsdfhb sdkjfbdsjkf bsdkfh bsdhf bsdkfhbsdkfhbds hfbsdhb sjd fbjsd bfjsdh bfds bfsjd bfjsdh bfjsdbf jksbdjk asdhfgsdhufgsdjfgisdhufgidsjfgsidh gfiu</p>
		    		</div>
		    	</div>
		    	<div class="col-md-4 pdb15">
					<img src="{{ asset('/img/uploads/default.jpg') }}" class="img-responsive">
		    	</div>
		    	<div class="col-md-8 pdl0">
		    		<div class="bdl-gold pdh15 dp-bl wwrap">
			    		<span class="fs25">asdfghjkl; jhfkldshfjkhsd fsdjk fhskldjfh</span>
			    		<div class="mgh15 mgv10">
			    			<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 29, 2016</span>
			    		</div>
			    		<p class="fs15 wwrap">hdfgb shdfb sdkfhb sdhfb skdfhb sdkfhbdskjfbsdfhb sdkjfbdsjkf bsdkfh bsdhf bsdkfhbsdkfhbds hfbsdhb sjd fbjsd bfjsdh bfds bfsjd bfjsdh bfjsdbf jksbdjk asdhfgsdhufgsdjfgisdhufgidsjfgsidh gfiu</p>
		    		</div>
		    	</div>
		    </div>
		</div>
		<div class="col-lg-6">
			<div class="row bgc-lbrown mgb30 mgh0">
		    	<span class="dp-bl fc-gold fs25 pd5">Announcements</span>
		    </div>
		</div>
	</div>
</div>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.tile-group').height($('.tile-group').width());
		$('.tile-group-sm').height($('.tile-group-sm').width());
	});
</script>
@stop