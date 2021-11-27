@extends('admin.layouts.app')

@push('styles')
  <style media="screen">
    .line{
       width:100%;
       height: 1px;
       background-color: green;
    }
  </style>
@endpush

@section('content')


<div class="page-content fade-in-up">
  <form method="post" action="{{route('category.update', $detail->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">SEO Details</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                    </div>
                </div>
                  <!-- @include('admin.layouts._partials.messages.info') -->
                <div class="ibox-body" style="display:none;">

                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Page Title</label>
                              <input class="form-control" type="text" name="page_title" value="{{$detail->page_title}}" placeholder="Enter Page Title">
                          </div>
                            <div class="form-group col-md-6">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" value="{{$detail->meta_title}}" name="meta_title" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{$detail->meta_description}}" name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{$detail->keyword}}" name="keyword" placeholder="Enter Keywords">
                            </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Edit Category</div>

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

                              <div class="row">

                                  <div class="form-group col-md-6">
                                      <label>Title</label>
                                      <input class="form-control" name="name" value="{{$detail->name}}" type="text" placeholder="Enter Category Title">
                                  </div>

                                  <div class="form-group col-md-6">
                                      <label>Slug</label>
                                      <input class="form-control" name="slug" {{$detail->isExistsInNavigationTable() ? 'readonly' : ''}} value="{{$detail->slug}}" type="text" placeholder="Enter Category Slug">
                                  </div>
                              </div>
                        @if(auth()->user()->role == 'super_admin')
                              <div class="form-group">
                                  <label>Identifier (Developer Option)</label>
                                  <input class="form-control" name="identifier" value="{{$detail->identifier}}" type="text" placeholder="Enter Identifier">
                              </div>
                        @endif
                                  <!-- <div class="form-group">
                                      <label>Short Description</label>
                                      <textarea name="short_description" class="form-control" rows="3">{{$detail->short_description}}</textarea>
                                  </div>

                                  <div class="form-group">
                                      <label>Description</label>
                                      <textarea name="description" class="form-control" rows="8" cols="80">{{$detail->description}}</textarea>
                                  </div> -->



                                <div class="row">

                                  <div class="check-list col-md-4">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="published" type="checkbox" {{$detail->published == 'Yes' ? 'checked' : ''}}>
                                      <span class="input-span"></span>Publish</label>
                                  </div>

                                  <!-- <div class="check-list col-md-4">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="homepage" type="checkbox" {{$detail->homepage == 1 ? 'checked' : ''}}>
                                      <span class="input-span"></span>Show In HomePage</label>
                                  </div>
                                  <div class="check-list col-md-4 ">
                                      <label class="ui-checkbox ui-checkbox-primary">
                                      <input name="exclusive" type="checkbox" {{$detail->exclusive == 1 ? 'checked' : ''}}>
                                      <span class="input-span"></span>Exclusive News</label>
                                  </div> -->
                                </div>
                                  <br>
                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit">Submit</button>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>

                </form>
            </div>

@endsection

@push('scripts')

@include('admin.layouts._partials.ckeditorsetting')
@include('admin.layouts._partials.imagepreview')

<script>

$(document).ready(function() {

  $("#fileUpload1").on('change', function () {

    if (typeof (FileReader) != "undefined") {

     var image_holder = $("#image-holder1");

     // $("#image-holder").siblings().remove();

     $("#image-holder1").children().remove();

     var reader = new FileReader();
     reader.onload = function (e) {

         $("<img />", {
             "src": e.target.result,
             "class": "thumb-image",
             "width" : '50%'
         }).appendTo(image_holder);

     }
     image_holder.show();
     reader.readAsDataURL($(this)[0].files[0]);
 } else {
     alert("This browser does not support FileReader.");
 }
});

});

</script>

@endpush
