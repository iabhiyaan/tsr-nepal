@extends('admin.layouts.app')

@section('content')


<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Create Video</div>

                                <div class="ibox-tools">

                                </div>
                            </div>
                            @if (count($errors) > 0)
                          	<div class="alert alert-danger">
                          		<ul>
                          			@foreach($errors->all() as $error)
                          			<li>{{$error}}</li>
                          			@endforeach
                          		</ul>
                          	</div>
                          	@endif

                            <div class="ibox-body" style="">
                                <form method="post" action="{{route('video.store')}}" enctype="multipart/form-data">
                                  @csrf

                                  <!-- <div class="form-group">
                                      <label>Title</label>
                                      <input class="form-control" name="title" value="{{old('title')}}" type="text" placeholder="Enter Title">
                                  </div> -->

                                  <div class="form-group">
                                      <label>Link</label>
                                      <input class="form-control" name="link" value="{{old('link')}}" type="text" placeholder="Enter Link">
                                  </div>

                                <div class="row">


                                  <div class="col-md-6 check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox">
                                      <span class="input-span"></span>Publish</label>
                                  </div>

                                  <!-- <div class="col-md-6 check-list">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="homepage" type="checkbox">
                                      <span class="input-span"></span>Display In HomePage</label>
                                  </div> -->
                                </div>


                                  <br>

                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>



            </div>

@endsection

@push('scripts')

<script type="text/javascript" src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/ckeditor/ckfinder/ckfinder.js')}}"></script>


<script>

   var options = {
   filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
   filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
   filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
   filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
 };


CKEDITOR.replace('description', options);
   CKEDITOR.config.height = 200;
   CKEDITOR.config.colorButton_colors = 'CF5D4E,454545,FFF,CCC,DDD,CCEAEE,66AB16';
   CKEDITOR.config.colorButton_enableMore = true;
   CKEDITOR.config.floatpanel = true;
   CKEDITOR.config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Outdent,Indent,CreateDiv,BidiLtr,BidiRtl,Language,PageBreak,Font,Styles,Format,Maximize,ShowBlocks,About';

</script>


@endpush
