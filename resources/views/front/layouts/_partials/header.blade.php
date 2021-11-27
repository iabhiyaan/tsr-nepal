<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Southern Rock</title>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/lightbox.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/style.css')}}">
         {{-- <link rel="icon" href="{{asset('images/main/'.$dashboard_composer->logo)}}" type="image/gif"> --}}
         <link rel="icon" href="{{asset('images/tsr-logo.png')}}" type="image/gif">
        <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/responsive.css')}}">
        <style media="screen">
        .footer-fixed .tradingview-widget-container {
          position: fixed;
          bottom: 0;
          background-color: #383839;
          height: auto !important;
        }
        </style>

        @stack('styles')
    </head>
    <body>

        <header>
            <div class="top-head">
                <div class="container">
                    <div class="row">
                        <a class="logo" href="/"><img src="{{asset('images/main/'.$dashboard_composer->logo)}}"></a>
                        <!-- <a href="#" class="top-ad-section">
                            <img src="/assets/front/images/nlic-feb18.gif">
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="main-head" id="main-header">
                 <div id="menu_area" class="menu-area">
                    <div class="container">
                        <div class="row">

                          @include('front.layouts._partials.dynamicnav')


<!-- comment begins -->
                        {{--
                            <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon1"></span>
                                <span class="navbar-toggler-icon2"></span>
                                <span class="navbar-toggler-icon3"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                                        <!-- <li class="dropdown">
                                            <a class="dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Market</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                            </ul>
                                        </li> -->
                                        <li><a href="{{route('listPage', ['market'])}}">Market</a></li>
                                        <li><a href="{{route('listPage', ['news'])}}">News</a></li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Analysis</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a href="{{route('categoryListPage', ['analysis', 'fundamental'])}}">Fundamental</a></li>
                                                <li><a href="{{route('categoryListPage', ['analysis', 'technical'])}}">Technical</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Library</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a href="{{route('categoryListPage', ['library', 'story'])}}">Story</a></li>
                                                <li><a href="{{route('categoryListPage', ['library', 'stratigies'])}}">Stratigies</a></li>
                                                <li><a href="{{route('categoryListPage', ['library', 'tools'])}}">Tools</a></li>
                                                <li><a href="{{route('categoryListPage', ['library', 'finance-glosary'])}}">Finance glosary</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('tradingview')}}">Trading View</a></li>
                                        <!-- <li class="dropdown">
                                            <a class="dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Forum</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                            </ul>
                                        </li> -->
                                        <li><a href="{{route('forumList')}}">Forum</a></li>
                                        <li><a href="{{route('ipofpoList')}}">Ipo/Fpo</a></li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Media</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a href="{{route('dynamicPages', ['brocer'])}}">Brocer</a></li>
                                                <li><a href="{{route('videoList')}}">Video</a></li>
                                                <li><a href="{{route('dynamicPages', ['currency'])}}">Currency</a></li>
                                                <li><a href="{{route('dynamicPages', ['product'])}}">Product</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav> --}}

<!-- comment end -->


                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="blank-div"></div>

        <!-- header section ends -->
