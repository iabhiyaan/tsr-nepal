@extends('front.layouts.app')


@section('content')

<section class="blog-detail-page">
    <div class="container">
        <div class="row">
          <div class="col-lg-1 col-md-1 col-12">

          </div>
            <div class="col-lg-10 col-md-8 col-12">
                <div class="blog-detail-wrapper">
                    <figure style="background-image:url('{{asset('images/main/' . $details->main_image)}}')"></figure>
                    <div class="date-wrapper">
                        <p>By:<span>{{$details->author}}</span></p><span>{{\Carbon\Carbon::parse($details->created_at)->format('d M Y')}}</span>
                    </div>
                    <div class="blog-detail-content">
                        <h3>{{$details->title}}</h3>
                        {!! $details->description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-12">
                <!-- <div class="blog-sidebar">
                    <a class="blog-sidebar-link" href="blog-detail.php">
                        <figure style="background-image:url(/assets/front/images/market2.jpg)">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </figure>
                        <span>5 Feb 2020</span>
                        <h4>A Guide About Driving In Australia For International Students</h4>
                    </a>
                    <a class="blog-sidebar-link" href="blog-detail.php">
                        <figure style="background-image:url(images/market3.jpg)">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </figure>
                        <span>5 Feb 2020</span>
                        <h4>A Guide About Driving In Australia For International Students</h4>
                    </a>
                    <a class="blog-sidebar-link" href="blog-detail.php">
                        <figure style="background-image:url(images/first-image.jpg)">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </figure>
                        <span>5 Feb 2020</span>
                        <h4>A Guide About Driving In Australia For International Students</h4>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</section>


@endsection
