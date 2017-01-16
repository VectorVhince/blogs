<div class="panel panel-default bd-rad0 box-shadow">
    <div style="height: 20px;" class="bgc-red mg0"></div>
    <div class="panel-body pd15">
        <div class="mgb20">
            <span class="fs25">Archive</span>
            <div style="height: 2px;" class="bgc-red mg0"></div>
        </div>

        @if(!$archive_year->isEmpty())
        <ul id="accordion1">
            @foreach($archive_year as $year => $posts)            
            <li class="pointer" data-toggle="collapse" data-parent="#accordion1" href="#collapse{{ $year }}">{{ $year }}</li>
            <div id="collapse{{ $year }}" class="collapse">
                <ul id="accordion{{ $year }}">                    
                    @foreach($archive_month as $month => $posts)
                    @if($month ==  $year)
                        <?php $month = explode('-', $month) ?>
                        <li class="pointer" data-toggle="collapse" data-parent="#accordion{{ $year }}" href="#collapse{{ $year }}{{ $month[1] }}">{{ $month[1] }}</li>

                        <ul id="collapse{{ $year }}{{ $month[1] }}" class="collapse">
                            @foreach($posts as $post)
                                <li><a href="{{ route('posts.show',$post->id) }}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    @endforeach                    
                </ul>
            </div>
            @endforeach
        </ul>
        @else
        <span class="text-center">Nothing posted yet.</span>
        @endif

    </div>
</div>