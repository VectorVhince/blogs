@extends('layouts.app')

@section('title') Home @stop

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-lg-6">
	    	<div class="tile-group">
		    	<img src="{{ asset('/img/400x400.png') }}" class="tile-img">
		    	<div class="tile-content text-center">
		    		<span class="fs40 fc-gold dp-bl wwrap">Marketing Bazaar Kicks Off SBA Days 2016</span>
		    		<span class="fs20 fc-white dp-bl mgt5">by: The Angelite</span>
		    	</div>
	    	</div>
	    </div>
	    <div class="col-lg-6">
		    <div class="row">
		    	<div class="col-md-6">
		    		<div class="tile-group-sm">
				    	<img src="{{ asset('/img/400x400.png') }}" class="tile-img">
				    	<div class="tile-content-sm text-center">
				    		<span class="fs25 fc-gold dp-bl wwrap">Marketing Bazaar Kicks Off SBA Days 2016</span>
				    		<span class="fs15 fc-white dp-bl mgt5">by: The Angelite</span>
				    	</div>
			    	</div>
		    	</div>
		    	<div class="col-md-6">
		    		<div class="tile-group-sm">
				    	<img src="{{ asset('/img/400x400.png') }}" class="tile-img">
				    	<div class="tile-content-sm text-center">
				    		<span class="fs25 fc-gold dp-bl wwrap">Marketing Bazaar Kicks Off SBA Days 2016</span>
				    		<span class="fs15 fc-white dp-bl mgt5">by: The Angelite</span>
				    	</div>
			    	</div>
		    	</div>
		    </div>
		    <div class="row mgt29">
		    	<div class="col-md-6">
		    		<div class="tile-group-sm">
				    	<img src="{{ asset('/img/400x400.png') }}" class="tile-img">
				    	<div class="tile-content-sm text-center">
				    		<span class="fs25 fc-gold dp-bl wwrap">Marketing Bazaar Kicks Off SBA Days 2016</span>
				    		<span class="fs15 fc-white dp-bl mgt5">by: The Angelite</span>
				    	</div>
			    	</div>
		    	</div>
		    	<div class="col-md-6">
		    		<div class="tile-group-sm">
				    	<img src="{{ asset('/img/400x400.png') }}" class="tile-img">
				    	<div class="tile-content-sm text-center">
				    		<span class="fs25 fc-gold dp-bl wwrap">Marketing Bazaar Kicks Off SBA Days 2016</span>
				    		<span class="fs15 fc-white dp-bl mgt5">by: The Angelite</span>
				    	</div>
			    	</div>
		    	</div>
		    </div>
	    </div>
	</div>
	<div class="row mgt29 mgb30">
	    <div class="col-lg-6">
	    	<div class="tile-group-long bgc-lbrown">
	    		<span class="dp-bl fc-gold fs25 pd5">News</span>
		    	<img src="{{ asset('/img/400x400.png') }}" class="tile-img-wide mgt35 img-responsive">
		    	<div class="tile-content-long">
		    		<div class="bdl-gold mgh15 pdh15 dp-bl wwrap">
			    		<span class="fs25">asdfghjkl; jhfkldshfjkhsd fsdjk fhskldjfh slkdjf shdlfjkshdfjklh sdjklf hsdjklfh sdjkl</span>
		    		</div>
		    		<div class="dp-bl mgt20">
		    			<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 30, 2016</span>
		    		</div>
		    		<div class="dp-bl mgt20 text-left">
		    			<p class="fs15 pdh15 wwrap">hdfgb shdfb sdkfhb sdhfb skdfhb sdkfhbdskjfbsdfhb sdkjfbdsjkf bsdkfh bsdhf bsdkfhbsdkfhbds hfbsdhb sjd fbjsd bfjsdh bfds bfsjd bfjsdh bfjsdbf jksbdjk asdhfgsdhufgsdjfgisdhufgidsjfgsidh gfiu</p>
		    		</div>
    				<div class="row mgv20 pd15 mgh0 bgc-gray">
    					<div class="col-sm-4">
    						<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
    					</div>
    					<div class="col-sm-8">
    						<div class="dp-bl mgb10">
    							<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 29, 2016</span>
    						</div>
    						<div class="dp-bl fs25">
    							<span>Karen Davila inspires future media practitioners</span>
    						</div>
    					</div>
    				</div>
    				<div class="row mgv20 pd15 mgh0 bgc-gray">
    					<div class="col-sm-4">
    						<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
    					</div>
    					<div class="col-sm-8">
    						<div class="dp-bl mgb10">
    							<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 29, 2016</span>
    						</div>
    						<div class="dp-bl fs25">
    							<span>Karen Davila inspires future media practitioners</span>
    						</div>
    					</div>
    				</div>
    				<div class="row mgv20 pd15 mgh0 bgc-gray">
    					<div class="col-sm-4">
    						<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
    					</div>
    					<div class="col-sm-8">
    						<div class="dp-bl mgb10">
    							<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 29, 2016</span>
    						</div>
    						<div class="dp-bl fs25">
    							<span>Karen Davila inspires future media practitioners</span>
    						</div>
    					</div>
    				</div>
		    	</div>
	    	</div>
	    </div>
	    <div class="col-lg-6">
		    <div class="row bgc-lbrown mgb30 mgh0">
		    	<span class="dp-bl fc-gold fs25 pd5">Opinion</span>
		    	@foreach($opinions as $opinion)
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
		    	@endforeach
		    </div>
		    <div class="row bgc-lbrown mgb30 mgh0">
		    	<span class="dp-bl fc-gold fs25 pd5">Features</span>
		    	<div class="col-md-4 pdb15">
					<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
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
		    	<div class="col-md-12 pdb15">
		    		<div class="bdl-gold pdh15 dp-bl wwrap">
			    		<span class="fs25">asdfghjkl; jhfkldshfjkhsd fsdjk fhskldjfh</span>
			    		<div class="mgh15 mgv10">
			    			<span class="fc-gold fs15 pdh15">by: The Angelite</span> | <span class="fs15 pdh15">July 29, 2016</span>
			    		</div>
			    		<p class="fs15 wwrap">hdfgb shdfb sdkfhb sdhfb skdfhb sdkfhbdskjfbsdfhb sdkjfbdsjkf bsdkfh bsdhf bsdkfhbsdkfhbds hfbsdhb sjd fbjsd bfjsdh bfds bfsjd bfjsdh bfjsdbf jksbdjk asdhfgsdhufgsdjfgisdhufgidsjfgsidh gfiu</p>
		    		</div>
		    	</div>
		    </div>
		    <div class="row bgc-lbrown mgb30 mgh0">
		    	<span class="dp-bl fc-gold fs25 pd5">Editor's Note</span>
		    	<div class="col-md-4 pdb15">
					<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
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
		    	<div class="col-md-12 pdb15">
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
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="row bgc-lbrown mgb30 mgh0">
		    	<span class="dp-bl fc-gold fs25 pd5">Editor's Note</span>
		    	<div class="col-md-4 pdb15">
					<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
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
					<img src="{{ asset('/img/400x400.png') }}" class="img-responsive">
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