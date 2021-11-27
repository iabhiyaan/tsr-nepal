<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/images/main/'.$dashboard_composer->logo)}}" class="rounded" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div>
            </div>
        </div>
        <ul class="side-menu metismenu">

            <li class="heading">Menu</li>
            <li>
                <a href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-globe"></i>
                <span class="nav-label">Site Setting</span></a>
            </li>

            <li>
              <a href="{{route('navigation.list')}}">
                 <i class="sidebar-item-icon fa fa-wrench"></i>
                <span class="nav-label">Navigation</span>
              </a>
            </li>

            <li>
                <a href="{{route('openpress.index')}}"><i class="sidebar-item-icon fa fa-globe"></i>
                  <span class="nav-label">Open Press</span></a>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Category</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('category.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Category
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Category
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">All Article</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('allarticles.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Allarticle
                        </a>
                    </li>
                    <li>
                        <a href="{{route('allarticles.index')}}">
                            <span class="fa fa-circle-o"></span>
                            Lists
                        </a>
                    </li>

                </ul>
            </li>


            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Video</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('video.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Video
                        </a>
                    </li>
                    <li>
                        <a href="{{route('video.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Video
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Podcast</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('podcast.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Podcast
                        </a>
                    </li>
                    <li>
                        <a href="{{route('podcast.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Podcast
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Commodity</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('commodity.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Commodity
                        </a>
                    </li>
                    <li>
                        <a href="{{route('commodity.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Commodity
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="sidebar-item-icon fa fa-sitemap"></i>
                    <span class="nav-label">Pages</span>
                    <i class="fa fa-angle-left arrow"></i>
                </a>
                <ul class="nav-2-level collapse">

           @if(auth()->user()->role == 'super_admin')
                    <li>
                        <a href="{{route('pages.create')}}">
                            <span class="fa fa-plus"></span>
                            Add Pages
                        </a>
                    </li>
          @endif
                    <li>
                        <a href="{{route('pages.index')}}">
                            <span class="fa fa-circle-o"></span>
                            All Pages
                        </a>
                    </li>

                </ul>
            </li>

            <?php /*

                <li>
                    <a href="javascript:;">
                        <i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Article</span>
                        <i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('article.create')}}">
                                <span class="fa fa-plus"></span>
                                Add Article
                            </a>
                        </li>
                        <li>
                            <a href="{{route('article.index')}}">
                                <span class="fa fa-circle-o"></span>
                                All Article
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Forum</span>
                        <i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('forum.create')}}">
                                <span class="fa fa-plus"></span>
                                Add Forum
                            </a>
                        </li>
                        <li>
                            <a href="{{route('forum.index')}}">
                                <span class="fa fa-circle-o"></span>
                                All Forum
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Library</span>
                        <i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('library.create')}}">
                                <span class="fa fa-plus"></span>
                                Add Library
                            </a>
                        </li>
                        <li>
                            <a href="{{route('library.index')}}">
                                <span class="fa fa-circle-o"></span>
                                All Library
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Ipo/Fpo</span>
                        <i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('ipofpo.create')}}">
                                <span class="fa fa-plus"></span>
                                Add IpoFpo
                            </a>
                        </li>
                        <li>
                            <a href="{{route('ipofpo.index')}}">
                                <span class="fa fa-circle-o"></span>
                                All IpoFpo
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Analysis</span>
                        <i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('analysis.create')}}">
                                <span class="fa fa-plus"></span>
                                Add Analysis
                            </a>
                        </li>
                        <li>
                            <a href="{{route('analysis.index')}}">
                                <span class="fa fa-circle-o"></span>
                                All Analysis
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;">
                        <i class="sidebar-item-icon fa fa-sitemap"></i>
                        <span class="nav-label">Market</span>
                        <i class="fa fa-angle-left arrow"></i>
                    </a>
                    <ul class="nav-2-level collapse">
                        <li>
                            <a href="{{route('market.create')}}">
                                <span class="fa fa-plus"></span>
                                Add Market
                            </a>
                        </li>
                        <li>
                            <a href="{{route('market.index')}}">
                                <span class="fa fa-circle-o"></span>
                                All Market
                            </a>
                        </li>

                    </ul>
                </li>

              */?>


        </ul>
    </div>
</nav>
