
<nav class="navbar navbar-light navbar-expand-lg mainmenu">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon1"></span>
    <span class="navbar-toggler-icon2"></span>
    <span class="navbar-toggler-icon3"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


          @foreach($parentNavigation_composer as $key => $navigation)
                        @php
                          $submenu = $navigation_composer->where('parent', $navigation->id)
                        @endphp
                      @if($navigation->parent == 0 && $submenu->count() == 0)
                        <li>
                          <a href="{{route('dynamicNav', [$navigation->slug])}}">{{$navigation->name}}</a>
                        </li>
                      @else


                      @if($navigation->parent == 0)
                      <li class="dropdown">
                          <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$navigation->name}}</a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($submenu as $key => $menu)
                              <li><a href="{{route('dynamicNav', [$menu->slug])}}">{{$menu->name}}</a></li>
                            @endforeach
                          </ul>
                      </li>

                    @endif
                      @endif

                  @endforeach




            <!-- <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li> -->
            <!-- <li class="dropdown">
                <a class="dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Market</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                </ul>
            </li> -->

            <!-- <li class="dropdown">
                <a class="dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Forum</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                </ul>
            </li> -->

        </ul>
    </div>
</nav>






<!-- backup -->







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
</nav>

--}}
