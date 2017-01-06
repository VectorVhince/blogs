@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default bd-rad0 box-shadow">
                <div style="height: 20px;" class="bgc-red mg0"></div>
                <div class="panel-body pdh45">
                    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data" id="formSubmit" runat="server">
                        {{ csrf_field() }}
                        <div class="mgb20 text-center">
                            <span class="fs40">Add New Post</span>
                            <div style="height: 2px;" class="bgc-red mg0"></div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <select id="category" name="category" class="form-control mgb20 bd-rad0 box-shadow">
                                <option disabled selected>Select Category</option>
                                <option value="1">News</option>
                                <option value="6">Editorial</option>
                                <option value="2">Opinion</option>
                                <option value="3">Feature</option>
                                <option value="4">Humor</option>
                                <option value="5">Sports</option>
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
                            <label>Cover photo</label> (Minimum size: 863 x 400 px resolution)
                            <label class="checkbox-inline pull-right"><input type="checkbox" value="1" name="" id="featured">Mark featured</label>
                            <label class="checkbox-inline pull-right hidden"><input type="checkbox" value="0" name="featured" id="unfeatured" checked="checked">Unmark featured</label>
                            <input type="file" name="image" class="form-control mgb20 bd-rad0 box-shadow" id="imgInp" accept="image">
                            <img class="img-responsive hidden" id="blah" src="#" alt="your image" />
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
                        $('#formSubmit').attr('action','{{ route('feature.store') }}');
                        break;
                    case '4':
                        $('#formSubmit').attr('action','{{ route('humor.store') }}');
                        break;
                    case '5':
                        $('#formSubmit').attr('action','{{ route('sports.store') }}');
                        break;
                    case '6':
                        $('#formSubmit').attr('action','{{ route('editorial.store') }}');
                        break;
                }
            });
        });
    </script>

    <script type="text/javascript">
        var $uploadCrop;

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $uploadCrop = $('#imgInp').on('change', function(){
            $('#blah').removeClass('hidden');
            readURL(this);
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
            plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
            ],
            oninit : "setPlainText",
            menubar: false,
            statusbar: false,
            setup : function(ed){
                ed.on('init', function(){
                    this.getDoc().body.style.fontSize = '13px';
                    this.getDoc().body.style.fontFamily = 'Helvetica';
                    this.getDoc().body.style.color = '#555';
                });
            }
        });

        $('#featured').on('change', function(){
            if (this.checked) {
                $('#unfeatured').prop('checked', false);
                $('#unfeatured').attr('name', '');
                $(this).attr('name', 'featured');
            }
            else{
                $('#unfeatured').prop('checked', true);
                $('#unfeatured').attr('name', 'featured');
                $(this).attr('name', '');
            };            
        })
    </script>
@stop