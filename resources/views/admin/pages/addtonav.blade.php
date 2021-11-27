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


                <form method="post" action="{{route('navigationStore')}}" enctype="multipart/form-data">
                  @csrf

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="ibox">
                                          <div class="ibox-head">
                                              <div class="ibox-title">Add Into Navigation Bar</div>

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

                                          <!-- <h3>Category Details</h3> -->
                                          <div class="ibox-body" style="">

                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label>Name</label>
                                                    <input class="form-control" readonly name="name" value="{{$page->title}}" type="text" placeholder="Enter Navigation Name">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Slug</label>
                                                    <input class="form-control" readonly name="slug" value="{{$page->slug}}" type="text" placeholder="Enter Navigation Slug">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <!-- <label>Identifier</label> -->
                                                    <input class="form-control" name="identifier" value="{{$page->identifier}}" type="hidden" placeholder="Enter Navigation Identifier">
                                                </div>

                                                <input type="hidden" name="type" value="single_page">
                                            </div>


                                            <div class="form-group">
                                              <label for="">Select One</label>
                                                <select class="form-control" name="parent">
                                                    <option value="">--select one--</option>
                                                    <option value="0">Set As Parent</option>
                                                  @foreach($navigation as $nav)
                                                    <option value="{{$nav->id}}">{{$nav->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>


                                                <br>

                                                  <div class="form-group">
                                                      <button class="btn btn-default" name="page_name" value="pages" type="submit">Submit</button>
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
