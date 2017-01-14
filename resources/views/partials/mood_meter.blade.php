<div class="panel panel-default bd-rad0 box-shadow">
    <div style="height: 20px;" class="bgc-red mg0"></div>
    <div class="panel-body pd15">
        <div class="mgb20">
            <div class="row">
                <div class="col-sm-12">
                    <span class="fs25">How does this story make you feel?</span>
                </div>
            </div>
            <div style="height: 2px;" class="bgc-red mg0"></div>
        </div>
        <form action="{{ route('mood.store',$post->id) }}" method="post">
          {{ csrf_field() }}
          <ul class="list-inline">
            <li><button type="submit" name="mood" value="happy" class="bgc0 bd0" data-toggle="tooltip" title="Happy"><img src="{{ asset('/img/emoticons/shout.png') }}" class="ht35"> {{ $happy }}</button></li>
            <li><button type="submit" name="mood" value="love" class="bgc0 bd0" data-toggle="tooltip" title="Love"><img src="{{ asset('/img/emoticons/love.png') }}" class="ht35"> {{ $love }}</button></li>
            <li><button type="submit" name="mood" value="shocked" class="bgc0 bd0" data-toggle="tooltip" title="Shocked"><img src="{{ asset('/img/emoticons/startle.png') }}" class="ht35"> {{ $shocked }}</button></li>
            <li><button type="submit" name="mood" value="angry" class="bgc0 bd0" data-toggle="tooltip" title="Angry"><img src="{{ asset('/img/emoticons/fire.png') }}" class="ht35"> {{ $angry }}</button></li>
            </ul>
        </form>
    </div>
</div>