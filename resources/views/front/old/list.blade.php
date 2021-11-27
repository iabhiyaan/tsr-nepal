@extends('front.layouts.app')

@section('content')

<section class="blog-listing-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <div class="listing-wrap">


          @foreach($lists as $list)
                    <a class="listing-link-wrap row" href="{{route('detailsPage', [$info['tablename'], $list->slug])}}">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <figure class="listing-image" style="background-image:url('{{asset('images/main/'.$list->main_image)}}')"></figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="listing-content">
                                <h2>{{$list->title}}</h2>
                                <span>{{\Carbon\Carbon::parse($list->created_at)->format('M d, Y')}}</span>
                                <p>{{$list->short_description}}</p>
                            </div>
                        </div>
                    </a>
          @endforeach



                    <!-- <a class="listing-link-wrap row" href="#">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <figure class="listing-image" style="background-image:url(images/market3.jpg)"></figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="listing-content">
                                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident dicta facere odio aspernatur laboriosam maiores quia dolore quae atque hic.</h2>
                                <span>January 5,2020</span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam nostrum culpa quia sed quisquam! Officiis, nihil tenetur nisi quo explicabo quia et odit, amet maxime totam quod facere molestiae velit corporis. Voluptates eum repudiandae non voluptatem maxime, nemo deleniti minima nisi laboriosam alias dignissimos officiis odit illo adipisci consequatur architecto?</p>
                            </div>
                        </div>
                    </a> -->
                    <!-- <a class="listing-link-wrap row" href="#">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <figure class="listing-image" style="background-image:url(images/market2.jpg)"></figure>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="listing-content">
                                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident dicta facere odio aspernatur laboriosam maiores quia dolore quae atque hic.</h2>
                                <span>January 5,2020</span>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam nostrum culpa quia sed quisquam! Officiis, nihil tenetur nisi quo explicabo quia et odit, amet maxime totam quod facere molestiae velit corporis. Voluptates eum repudiandae non voluptatem maxime, nemo deleniti minima nisi laboriosam alias dignissimos officiis odit illo adipisci consequatur architecto?</p>
                            </div>
                        </div>
                    </a> -->
                </div>
                <ul class="pagination">
                  <!-- <li> -->
                      {{$lists->links()}}
                  <!-- </li> -->

                    <!-- <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li> -->
                </ul>
            </div>
        <div>
    </div>
</section>

@endsection
