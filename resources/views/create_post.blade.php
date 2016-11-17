@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-9">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd45">
                <form action="" method="post" enctype="multipart/form-data" id="formSubmit">
                    {{ csrf_field() }}
                    <div class="mgb40">
                        <span class="fs40">Add New Post</span>
                    </div>
                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <select id="category" name="category" class="form-control mgb20 bd-rad0 box-shadow">
                            <option disabled selected>Select Category</option>
                            <option value="1">News</option>
                            <option value="2">Opinion</option>
                            <option value="3">Features</option>
                            <option value="4">Humor</option>
                            <option value="5">Sports</option>
                            <option value="6">Artwork</option>
                        </select>
                        @if ($errors->has('category'))
                            <span class="help-block"><strong>{{ $errors->first('category') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <input type="text" name="title" class="form-control mgb20 bd-rad0 box-shadow" placeholder="Title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <textarea name="body" class="form-control mgb20 bd-rad0 box-shadow ht500" placeholder="Content">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="help-block"><strong>{{ $errors->first('body') }}</strong></span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <input type="file" name="image" class="form-control mgb20 bd-rad0 box-shadow">
                        @if ($errors->has('image'))
                            <span class="help-block"><strong>{{ $errors->first('image') }}</strong></span>
                        @endif
                    </div>
                    <div class="col-md-4 col-md-offset-4 text-center mgt40">
                        <div class="form-inline">
                            <button type="submit" class="btn btn-success bd-rad0 fs20">Publish</button>
                            <button type="reset" class="btn btn-danger bd-rad0 fs20">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default bd-rad0 box-shadow">
            <div class="panel-body pd15">
                <div class="mgb30">
                    <span class="fs25">BLOG ARCHIVE</span>
                </div>
                <ul class="list-unstyled">
                    <li data-toggle="collapse" href="#2016"><span class="caret"></span> 2016
                        <div id="2016" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2016" href="#2016J"><span class="caret"></span> January
                                    <div id="2016J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2016" href="#2016F"><span class="caret"></span> February
                                    <div id="2016F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2016" href="#2016M"><span class="caret"></span> March
                                    <div id="2016M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li data-toggle="collapse" href="#2015"><span class="caret"></span> 2015
                        <div id="2015" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2015" href="#2015J"><span class="caret"></span> January
                                    <div id="2015J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2015" href="#2015F"><span class="caret"></span> February
                                    <div id="2015F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2015" href="#2015M"><span class="caret"></span> March
                                    <div id="2015M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li data-toggle="collapse" href="#2014"><span class="caret"></span> 2014
                        <div id="2014" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2014" href="#2014J"><span class="caret"></span> January
                                    <div id="2014J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2014" href="#2014F"><span class="caret"></span> February
                                    <div id="2014F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2014" href="#2014M"><span class="caret"></span> March
                                    <div id="2014M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li data-toggle="collapse" href="#2013"><span class="caret"></span> 2013
                        <div id="2013" class="collapse">
                            <ul class="list-unstyled mgl20">
                                <li data-toggle="collapse" data-parent="#2013" href="#2013J"><span class="caret"></span> January
                                    <div id="2013J" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2013" href="#2013F"><span class="caret"></span> February
                                    <div id="2013F" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                                <li data-toggle="collapse" data-parent="#2013" href="#2013M"><span class="caret"></span> March
                                    <div id="2013M" class="collapse">
                                        <ul class="list-unstyled mgl20">
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                            <li>Lorem ipsum</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>                        
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#category').on('change', function(){
                switch ($(this).val()) {
                    case '1':
                        $('#formSubmit').attr('action','{{ route('news.store') }}');
                        break;
                    case '2':
                        $('#formSubmit').attr('action','{{ route('opinion.store') }}');
                        break;
                    case '3':
                        $('#formSubmit').attr('action','{{ route('features.store') }}');
                        break;
                    case '4':
                        $('#formSubmit').attr('action','{{ route('humors.store') }}');
                        break;
                    case '5':
                        $('#formSubmit').attr('action','{{ route('sports.store') }}');
                        break;
                    case '6':
                        $('#formSubmit').attr('action','{{ route('artworks.store') }}');
                        break;
                }
            });
        });
    </script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
        function setPlainText() {
            var ed = tinyMCE.get('textarea');

            ed.pasteAsPlainText = true;  

            //adding handlers crossbrowser
            if (tinymce.isOpera || /Firefox\/2/.test(navigator.userAgent)) {
                ed.onKeyDown.add(function (ed, e) {
                    if (((tinymce.isMac ? e.metaKey : e.ctrlKey) && e.keyCode == 86) || (e.shiftKey && e.keyCode == 45))
                        ed.pasteAsPlainText = true;
                });
            } else {            
                ed.onPaste.addToTop(function (ed, e) {
                    ed.pasteAsPlainText = true;
                });
            }
        };

        tinymce.init({ 
            selector:'textarea',
            plugins: "autoresize paste",
            toolbar: "bold italic numlist bullist indent outdent",
            oninit : "setPlainText",
            menubar: false,
            statusbar: false,
            force_br_newlines : true,
            force_p_newlines : false,
            forced_root_block : '',
            setup : function(ed){
                ed.on('init', function(){
                    this.getDoc().body.style.fontSize = '13px';
                    this.getDoc().body.style.fontFamily = 'Helvetica';
                    this.getDoc().body.style.color = '#555';
                });
            }
        });
    </script>
@stop