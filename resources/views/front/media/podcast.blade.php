@extends('front.layouts.app')

@section('content')



<section class="page-breadcrumb">
   <div class="page-section">
       <div class="breadcumb-overlay"></div>
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12 col-12 text-center">
                   <div class="breadcrumb ">
                       <div class="section-titleBar white-headline ">
                           <h3>Podcast Gallery</h3>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="nav-path">
       <div class="container">
           <div class="row text-center">
               <ul>
                   <li class="home-bread"><a href="/">Home</a></li>
                   <li>Podcast Gallery</li>
               </ul>
           </div>
       </div>
   </div>
</section>
<section class="video_gallery">
   <div class="container">
       <div class="row">
           <!-- <div class="col-lg-6 col-md-6 col-12 main_video">
               <div class="height_manage">
                   <iframe  src="https://www.youtube.com/embed/9mWdw-09dso" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </h2>
               </div>
           </div> -->
           <!-- <div class="col-lg-6 col-md-6 col-12 side_video">
               <div class="row">

                   <div class="col-lg-6 col-md-6 col-12 m_b25">
                       <div class="height_manage">
                           <iframe  src="https://www.youtube.com/embed/9mWdw-09dso" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </h2>
                       </div>
                   </div>

               </div>
           </div> -->
           <div class="col-lg-12 col-md-12 col-12 p_t70">
               <div class="row">
                   <div class="col-12 all_video_list">
                       <h1>All Podcast</h1>
                   </div>

                @foreach($lists as $list)
                <div class="col-lg-3 col-md-4 col-12 listing_video m_b25">
                    <div class="height_manage podcast">
                      <iframe src="{{$list->link}}" scrolling="auto" width="100%" frameborder="0"
                      height="980px" allowtransparency="no" allowfullscreen="allowfullscreen"
                      style="margin: -80px 0 -400px 0;"></iframe>
                    </div>
                </div>


                   <!-- <div style="overflow: hidden;">
                      <iframe src="{{$list->link}}" scrolling="auto" width="100%" frameborder="0"
                      height="980px" allowtransparency="no" allowfullscreen="allowfullscreen"
                      style="margin: -80px 0 -400px 0;"></iframe>
                    </div> -->
              @endforeach
               </div>
           </div>

           <ul class="pagination">

             {{$lists->links()}}

           </ul>

       </div>
   </div>
</section>



@endsection
