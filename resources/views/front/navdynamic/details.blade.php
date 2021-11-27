@extends('front.layouts.app')

@section('content')

    <section class="page-breadcrumb">
        <div class="page-section" style="background-image:url('{{asset('images/main/'.$detail->banner_image)}}')">
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
                        <li class="home-bread"><a href="{{route('dynamicNav', [$detail->getSlugFromNavigation()])}}">{{$info['pageName']}}</a></li>
                        <li>{{$info['pageName']}} Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-page-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="left-box">
                        <!--Blog Single-->
                        <div class="single-blog-post">
                            <div class="img-holder"><img src="{{asset('images/main/'.$detail->main_image)}}" alt="Awesome Image">
                            </div>
                            <a href="#"> <h4>{{$detail->title}}</h4></a>
                            <ul class="meta list-inline">
                                <li><a href="#"><i class="fa fa-user"></i> Posted By : {{@$detail->author}}</a></li>
                            </ul>

                            <div class="wrapper-for-ckeditor-description">

                              {!! $detail->description !!}

                            </div>


                            <div class="author-box">
                                <!--Post Share Box-->
                                <!-- <div class="share-box">
                                    <div class="social-box pull-right">
                                        <ul class="list-inline social">
                                            <li>
                                                <div class="fb-share-button fb_iframe_widget" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="large" data-mobile-iframe="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=692183977832781&amp;container_width=46&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button_count&amp;locale=en_US&amp;mobile_iframe=true&amp;sdk=joey&amp;size=large"><span style="vertical-align: bottom; width: 107px; height: 28px;"><iframe name="f69c818dcbadc2" title="fb:share_button Facebook Social Plugin" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" style="border: medium none; visibility: visible; width: 107px; height: 28px;" src="https://web.facebook.com/v3.2/plugishare_button.php?app_id=692183977832781&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D44%23cb%3Df3642f7eb6d020e%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff2d316c96075e8e%26relation%3Dparent.parent&amp;container_width=46&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button_count&amp;locale=en_US&amp;mobile_iframe=true&amp;sdk=joey&amp;size=large" class="" width="1000px" height="1000px" frameborder="0"></iframe></span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->


                                <!--Comments Area ends-->
                                <!-- Comments Form -->

                                <!-- Comments Form ends-->
                            </div>
                        </div>

                        <!--Blog Single ends-->
                    </div>
                </div>





                <!-- Sidebar Page Container-->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="right-box">

                        <div class="single-sidebar-widget">
                            <div class="post-widget">
                                <div class="title">
                                    <h4>Latest News</h4>
                                    <div class="decor-line"></div>
                                </div>
                                <ul>

              @foreach($latestRelated as $related)
                                    <li>
                                        <div class="icon-box">
                                            <img src="{{asset('images/main/'. $related->main_image)}}" alt="Awesome Image">
                                        </div>
                                        <div class="text-box">
                                            <h5>
                                                <a href="{{route('dynamicNav', [$related->getSlugFromNavigation(), $related->slug])}}">{{$related->title}}</a>
                                            </h5>
                                            <span>{{\Carbon\Carbon::parse($related->created_at)->format('d M.')}}</span>
                                        </div>
                                    </li>
              @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Page Container ends-->
                </div>
            </div>
            <!-- End row -->
        </div>
    </section>

  @endsection
