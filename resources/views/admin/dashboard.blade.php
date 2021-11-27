@extends('admin.layouts.app')

@section('page_title')
Dashboard
@endsection

@section('content')

<div class="page-content fade-in-up">
  <form method="post" action="{{route('dashboard.save', $detail->id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT">

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">SEO Details</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div> -->
                    </div>
                </div>
                  @include('admin.layouts._partials.messages.info')
                <div class="ibox-body" style="display:none;">

                  <div class="form-group">
                      <label>Page Title</label>
                      <input class="form-control" type="text" name="page_title" value="{{$detail->page_title}}" placeholder="Enter Page Title">
                  </div>

                            <div class="form-group">
                                <label>Meta Title</label>
                                <input class="form-control" type="text" name="meta_title" value="{{$detail->meta_title}}" placeholder="Enter Meta Title">
                            </div>

                            <div class="form-group">
                                <label>Meta Description</label>
                                <input class="form-control" type="text" value="{{$detail->meta_description}}" name="meta_description" placeholder="Enter Meta Description">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" type="text" value="{{$detail->keyword}}" name="keyword" placeholder="Enter Keywords">
                            </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Social Media Links</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div> -->
                    </div>
                </div>
                  <!-- @include('admin.layouts._partials.messages.info') -->
                <div class="ibox-body" style="display:none;">

                  <div class="row">
                      <div class="col-sm-6 form-group">
                          <label>Facebook Link</label>
                          <input class="form-control" type="text" value="{{$detail->facebook}}" name="facebook" placeholder="Ente Facebook Link">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label>Youtube Link</label>
                          <input class="form-control" type="text" value="{{$detail->youtube}}" name="youtube" placeholder="Enter Youtube Link">
                      </div>
                      <div class="col-sm-6 form-group">
                          <label>Twitter Link</label>
                          <input class="form-control" type="text" value="{{$detail->twitter}}" name="twitter" placeholder="Enter Twitter Link">
                      </div>
                      <!-- <div class="col-sm-6 form-group">
                          <label>Linkedin Link</label>
                          <input class="form-control" type="text" value="{{$detail->linkedin}}" name="linkedin" placeholder="Enter Linkedin Link">
                      </div> -->
                      <div class="col-sm-6 form-group">
                          <label>Instagram Link</label>
                          <input class="form-control" type="text" value="{{$detail->instagram}}" name="instagram" placeholder="Enter Instagram Link">
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
                    <div class="ibox-title">Homepage Setups</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div> -->
                    </div>
                </div>

                <div class="ibox-body" style="display:none;">

              <div class="row">

                <!-- <div class="col-md-6 form-group">
                    <label>Latest Video Background Image</label>
                    <input class="form-control" type="file" name="latest_video_backgroundimage">
                    @if($detail->latest_video_backgroundimage)
                       <img src="{{asset('images/main/'. $detail->latest_video_backgroundimage)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                    @endif
                </div> -->

                              <div class="col-md-6 form-group">
                                  <label>Nepse Price</label>
                                  <input class="form-control" type="text" value="{{$detail->nepse_price}}" name="nepse_price" placeholder="Enter Nepse Price">
                              </div>
                              <div class="col-md-6 form-group">
                                  <label>Nepse Price Select Color</label>
                                  <select class="form-control" name="nepse_price_color">
                                    <option value="">--select one--</option>
                                    <option value="red" {{$detail->nepse_price_color == 'red' ? 'selected' : ''}}>Red</option>
                                    <!-- <option value="yellow" {{$detail->nepse_price_color == 'yellow' ? 'selected' : ''}}>Yellow</option> -->
                                    <option value="green" {{$detail->nepse_price_color == 'green' ? 'selected' : ''}}>Green</option>
                                  </select>
                              </div>

                              <div class="col-md-6 form-group">
                                  <label>Nepse Increase/Decrease Value</label>
                                  <input class="form-control" type="text" value="{{$detail->nepse_increase_value}}" name="nepse_increase_value" placeholder="Enter Nepse Increase/Decrease Value">
                              </div>

                              <div class="col-md-6 form-group">
                                  <label>Nepse Increase/Decrease In Percentage</label>
                                  <input class="form-control" type="text" value="{{$detail->nepse_persentage}}" name="nepse_persentage" placeholder="Enter Nepse Increase/Decrease In Percentage Value">
                              </div>


                            <div class="col-md-12 form-group">
                                <label>Homepage Main Title</label>
                                <input class="form-control" type="text" value="{{$detail->homepagemain_title}}" name="homepagemain_title" placeholder="Enter Homepage Main Link">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Homepage Main Image</label>
                                <input class="form-control" type="file" name="homepagemain_image">
                                @if($detail->homepagemain_image)
                                   <img src="{{asset('images/main/'. $detail->homepagemain_image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Homepage Main Description</label>
                                <textarea class="form-control" type="text" name="homepagemain_description" rows="8" cols="80">{{$detail->homepagemain_description}}</textarea>

                            </div>

                            <div class="col-md-12 form-group">
                                <label>Homepagemain Image Link</label>
                                <input class="form-control" type="text" value="{{$detail->homepagemain_image_link}}" name="homepagemain_image_link" placeholder="Enter Homepage Image Link">
                            </div>

                            <!-- <div class="col-md-6 form-group">
                                <label>Contactus Page Background Image</label>
                                <input class="form-control" type="file" name="contactus_banner_image">
                                @if($detail->contactus_banner_image)
                                   <img src="{{asset('images/main/'. $detail->contactus_banner_image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                @endif
                            </div> -->
{{--
                            <div class="col-md-6 form-group">
                                <label>Banner Product Image</label>
                                <input class="form-control" type="file" name="slogan_image">
                                @if($detail->slogan_image)
                                   <img src="{{asset('images/main/'. $detail->slogan_image)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                @endif
                            </div>

                            <!-- <div class="col-md-6 form-group">
                                <label>Background Image For Slogan Second Section</label>
                                <input class="form-control" type="file" name="slogan_imagesecond">
                                @if($detail->slogan_imagesecond)
                                   <img src="{{asset('images/main/'. $detail->slogan_imagesecond)}}" style="margin-top:12px; margin-bottom:12px;" height="120px" width="120px" alt="">
                                @endif
                            </div> -->

                            <div class="col-md-6 form-group">
                                <label>Product Name</label>
                                <input class="form-control" type="text" value="{{$detail->slogan_title}}" name="slogan_title" placeholder="Enter Product Name">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Testimonial Words</label>
                                <input class="form-control" type="text" value="{{$detail->testimonial_words}}" name="testimonial_words" placeholder="Enter Testimonial Words">
                            </div>

                           --}}

                            <!-- <div class="col-md-6 form-group">
                                <label>Slogan First Description</label>
                                <textarea class="form-control" name="sfdescription" rows="3">{{$detail->sfdescription}}</textarea>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Slogan Second</label>
                                <input class="form-control" type="text" value="{{$detail->slogansecond}}" name="slogansecond" placeholder="Enter Second Slogan">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Slogan Second Description</label>
                                <textarea class="form-control" name="ssdescription" rows="3">{{$detail->ssdescription}}</textarea>
                            </div> -->

                          </div>
                </div>
            </div>
        </div>

    </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Site Setting</div>

                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <!-- <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item">option 1</a>
                                        <a class="dropdown-item">option 2</a>
                                    </div> -->
                                </div>
                            </div>
                              <!-- @include('admin.layouts._partials.messages.info') -->
                            <div class="ibox-body" style="">

                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Site Name</label>
                                            <input class="form-control" type="text" name="site_name" value="{{$detail->site_name}}" placeholder="Enter Site name">
                                        </div>

                            {{--
                                        <div class="col-sm-6 form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" value="{{$detail->address}}" name="address" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" value="{{$detail->email}}" name="email" placeholder="Enter Email Address">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Telephone</label>
                                            <input class="form-control" type="text" value="{{$detail->telephone}}" name="telephone" placeholder="Enter Telephone">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" type="text" value="{{$detail->mobile}}" name="mobile" placeholder="Enter Mobile">
                                        </div>  --}}
                                        <!--<div class="col-sm-6 form-group">-->
                                        <!--    <label>Post Box</label>-->
                                        <!--    <input class="form-control" type="text" value="{{$detail->post_box}}" name="post_box" placeholder="Enter Post Box">-->
                                        <!--</div>-->
                                        <!-- <div class="col-sm-6 form-group">
                                            <label>Working Times</label>
                                            <input class="form-control" type="text" value="{{$detail->working_times}}" name="working_times" placeholder="Enter Working Times">
                                        </div> -->
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" placeholder="Enter Description" class="form-control" rows="3" cols="80">{{$detail->description}}</textarea>
                                    </div> -->

                                    <!--<div class="form-group">-->
                                    <!--    <label>Google Map</label>-->
                                    <!--    <input type="text" name="googlemap" placeholder="Enter Google Map Link" value="{{$detail->googlemap}}" class="form-control">-->
                                    <!--</div>-->

                                    <div class="row">

                                    <div class="col-sm-12 form-group">
                                      <label>Logo</label>
                                      <input type="file" id="fileUpload" name="logo" value="{{$detail->logo}}" class="form-control">
                                      <div id="wrapper" class="mt-2">
                                          <div id="image-holder">

                                            @if($detail->logo)
                                              <img src="{{asset('images/main/'.$detail->logo)}}" alt="" class="thumb-image" height="120px" width="120px">
                                            @endif

                                          </div>
                                      </div>
                                  </div>

                                {{--

                                  <div class="col-sm-6 form-group">
                                    <label>Contactus Banner Image</label>
                                    <input type="file" id="fileUpload2" name="contactus_image" value="{{$detail->contactus_image}}" class="form-control">
                                    <div id="wrapper" class="mt-2">
                                        <div id="image-holder2">

                                          @if($detail->contactus_image)
                                            <img src="{{asset('images/main/'.$detail->contactus_image)}}" alt="" class="thumb-image" height="120px" width="120px">
                                          @endif

                                        </div>
                                    </div>
                                </div>

                                --}}

                                  </div>

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

  <script>

    $(document).ready(function() {

      $("#fileUpload").on('change', function () {

        if (typeof (FileReader) != "undefined") {

         var image_holder = $("#image-holder");

         // $("#image-holder").siblings().remove();

         $("#image-holder").children().remove();

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


$("#fileUpload2").on('change', function () {

  if (typeof (FileReader) != "undefined") {

   var image_holder = $("#image-holder2");

   // $("#image-holder").siblings().remove();

   $("#image-holder2").children().remove();

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
