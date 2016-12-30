<footer class="bgc-lbrown">
    <div style="height: 10px;" class="bgc-red mg0"></div>
	<div class="container">
		<div class="row mgv20">
			<div class="col-lg-6">
				<div style="row">
                    <div class="col-md-1 pdh0">
                        <img src="{{ asset('/img/TheAngelite.png') }}" style="height: 40px;">                
                    </div>
                    <div class="col-md-11 pdh0 mgt10">
                        <span class="dp-bl fc-red fs20"  style="font-family: arongrotesque">
                            THE ANGELITE
                        </span>
                    </div>
                </div>
                <div class="row">
                	<div class="col-lg-12">
						@if (Auth::guest())<a href="{{ url('/login') }}">@endif
						<span class="fc-black text-shadow">&#169; 2016 The Angelite. All rights reserved.</span>
						@if (Auth::guest())</a>@endif
                	</div>
                </div>
			</div>
			<div class="col-lg-6">
				<div style="font-family: Source Sans Pro;">
					<span class="fc-red fs15">SOCIAL MEDIA</span>
					<div style="border-left: solid 1px rgba(0,0,0,.3); padding-left: 10px;">
						<ul class="list-unstyled">
							<li><a href="#" class="fc-black fs12">Facebook</a></li>
							<li><a href="#" class="fc-black fs12">Twitter</a></li>
							<li><a href="#" class="fc-black fs12">Instagram</a></li>
							<li><a href="#" class="fc-black fs12">Google</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>