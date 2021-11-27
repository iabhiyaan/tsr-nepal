@extends('front.layouts.app')

@section('content')

    <section class="page-breadcrumb">
      <!-- it was hidden -->
        <div class="page-section" style="display: block; background-image: url('{{asset('images/main/'.$detail->image)}}');">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12  ">
                        <div class="breadcrumb text-center">
                            <div class="section-titleBar white-headline text-center">
                                <h3>{{$detail->title}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-path">
            <div class="container">
                <div class="row">
                    <ul>
                        <li class="home-bread"><a href="/">Home</a></li>
                        <li class="home-bread"><a href="">{{$detail->title}}</a></li>
                        <!-- <li>Forum Detail</li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-page-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="left-box">
                        <!--Blog Single-->
                        <div class="single-blog-post">

                            <!-- <div class="img-holder"><img src="{{asset('images/main/'.$detail->main_image)}}" alt="Awesome Image">
                        </div> -->
                            <!-- <a href="#"> <h4>{{$detail->title}}</h4></a> -->


                                {!! $detail->description !!}


                        </div>

                        <!--Blog Single ends-->
                    </div>
                </div>

                <!-- <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="right-box">

                        <div class="single-sidebar-widget">
                            <div class="post-widget">
                                <div class="title">
                                    <h4>Latest News</h4>
                                    <div class="decor-line"></div>
                                </div>
                                <ul>

                                    <li>
                                        <div class="icon-box">
                                            <img src="" alt="Awesome Image">
                                        </div>
                                        <div class="text-box">
                                            <h5>
                                                <a href=""></a>
                                            </h5>
                                            <span></span>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>

                </div> -->
            </div>
            <!-- End row -->
        </div>
    </section>

  @endsection
