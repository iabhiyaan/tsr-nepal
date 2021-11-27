@extends('front.layouts.app')
@push('styles')
<link href="{{asset('/assets/admin/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
@endpush


@section('content')


        <section class="three-bloc-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 pl-0">

                      <!-- TradingView Widget BEGIN -->
                      <div class="tradingview-widget-container">
                          <div class="tradingview-widget-container__widget"></div>
                          <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text">Forex Rates</span></a> by TradingView</div>
                          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                            {
                              "width": 770,
                              "height": 400,
                              "currencies": [
                                "EUR",
                                "USD",
                                "JPY",
                                "GBP",
                                "CHF",
                                "AUD",
                                "CAD",
                                "NZD",
                                "CNY"
                              ],
                              "locale": "en"
                           }
                        </script>
                  </div>
                  <!-- TradingView Widget END -->

                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="latest-news-wrap">
                        <h2>Latest News</h2>
                       <ul class="two-block-scroll-wrapper">
                    @foreach(@$latestNews as $news)
                            <li><a href="{{route('detailsPage', ['news', @$news->slug])}}">{{@$news->title}}</a></li>
                    @endforeach

                       </ul>
                    </div>
                </div>
            </div>
          </div>
        </section>


        <section class="three-bloc-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0">

                      <!-- TradingView Widget BEGIN -->
                      <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                          <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">Cryptocurrency Markets</span></a> by TradingView</div>
                          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                          {
                            "width": 1105,
                            "height": 490,
                            "defaultColumn": "overview",
                            "screener_type": "crypto_mkt",
                            "displayCurrency": "USD",
                            "colorTheme": "light",
                            "locale": "en",
                            "isTransparent": false
                          }
                </script>
              </div>
              <!-- TradingView Widget END -->

                </div>
            </div>
          </div>
        </section>

        <section class="three-bloc-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 pl-0">

                            <div class="agm-section">

                              <h2>NEPSE</h2>
                            <div class="nepse-num-wrapper">
                              <span class="nepse-num" style="color:{{$dashboard_composer->nepse_price_color}}">{{$dashboard_composer->nepse_price}}</span>
                              <span class="nepse-num" style="color:{{$dashboard_composer->nepse_price_color}}">{{$dashboard_composer->nepse_increase_value}}</span>
                              <span class="nepse-num" style="color:{{$dashboard_composer->nepse_price_color}}">{{$dashboard_composer->nepse_persentage}}</span>
                            </div>

                              <p>Benchmark Index : Nepal Stock Exchange</p>

                                <table id="nepse-table-api">
                                  <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Max Price</th>
                                        <th>Min Price</th>
                                        <th>Closing Price</th>
                                        <th>No Of Transaction</th>
                                        <!-- <th>Traded Shares</th> -->

                                    </tr>
                                  </thead>

                                  <tbody>

                    @if(!empty(@$nepseRecord))
                        @foreach(@$nepseRecord as $nepse)
                                    <tr>
                                        <td>{{@$nepse['companyName']}}</td>
                                        <td>{{@$nepse['maxPrice']}}</td>
                                        <td>{{@$nepse['minPrice']}}</td>
                                        <td>{{@$nepse['closingPrice']}}</td>
                                        <td>{{@$nepse['noOfTransactions']}}</td>
                                        <!-- <td>{{@$nepse['tradedShares']}}</td> -->

                                    </tr>
                      @endforeach
                    @endif
                      </tbody>

                                </table>
                            </div>
                        </div>
                      <div class="col-lg-5 col-md-12 col-sm-12">
                                              <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                          <div class="tradingview-widget-container__widget"></div>
                          <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">Economic Calendar</span></a> by TradingView</div>
                          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                          {
                          "colorTheme": "light",
                          "isTransparent": false,
                          "width": "510",
                          "height": "600",
                          "locale": "en",
                          "importanceFilter": "-1,0,1",
                          "currencyFilter": "USD,AUD,CAD,CNY,EUR,INR,JPY,NZD,GBP,AED,TWD,CHF,DEM,SEK"
                        }
                          </script>
                        </div>
<!-- TradingView Widget END -->
                      </div>

                </div>
            </div>
          </div>
        </section>

        <!-- three block section ends -->

        <!-- two block section starts -->

        <section class="two-block-section">
            <div class="container">
                <div class="row">
                  <div class="col-lg-5 col-md-12 col-sm-12 pl-0">
                      <a href="{{$dashboard_composer->homepagemain_image_link}}" class="three-block-first-sec">
                         <figure style="background-image:url('{{asset('images/main/'.$dashboard_composer->homepagemain_image)}}')"></figure>
                         <div class="three-block-first-sec-title">
                             <h2>{{$dashboard_composer->homepagemain_title}}</h2>
                             <p>{{$dashboard_composer->homepagemain_description}}</p>
                         </div>
                      </a>
                  </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">

                      <!-- TradingView Widget BEGIN -->
                      <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                          <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Market Data</span></a> by TradingView</div>
                          <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js" async>
                          {
                            "width": 640,
                            "height": 450,
                            "symbolsGroups": [
                              {
                                "originalName": "Indices",
                                "symbols": [
                                  {
                                    "name": "OANDA:SPX500USD",
                                    "displayName": "S&P 500"
                                  },
                                  {
                                    "name": "OANDA:NAS100USD",
                                    "displayName": "Nasdaq 100"
                                  },
                                  {
                                    "name": "FOREXCOM:DJI",
                                    "displayName": "Dow 30"
                                  },
                                  {
                                    "name": "INDEX:NKY",
                                    "displayName": "Nikkei 225"
                                  },
                                  {
                                    "name": "INDEX:DEU30",
                                    "displayName": "DAX Index"
                                  },
                                  {
                                    "name": "OANDA:UK100GBP",
                                    "displayName": "FTSE 100"
                                  }
                                ],
                                "name": "Indices"
                              },
                              {
                                "originalName": "Commodities",
                                "symbols": [
                                  {
                                    "name": "COMEX:GC1!",
                                    "displayName": "Gold"
                                  },
                                  {
                                    "name": "OANDA:XAGUSD",
          "displayName": "Silver"
        },
        {
          "name": "TVC:USOIL",
          "displayName": "Crude Oil"
        },
        {
          "name": "OANDA:NATGASUSD",
          "displayName": "Natural Gas"
        },
        {
          "name": "OANDA:XCUUSD",
          "displayName": "Copper"
        },
        {
          "name": "ICEUS:KC1!",
          "displayName": "Coffee"
        },
        {
          "name": "PLATINUM",
          "displayName": "Platinum"
        },
        {
          "name": "NYMEX:UX1!",
          "displayName": "Uranium"
        }
      ],
      "name": "Commodities"
    },
    {
      "originalName": "Bonds",
      "symbols": [
        {
          "name": "CME:GE1!",
          "displayName": "Eurodollar"
        },
        {
          "name": "CBOT:ZN1!",
          "displayName": "U.S . 10YR"
        },
        {
          "name": "NYMEX:DEB1!",
          "displayName": "GERMAN 10YR"
        },
        {
          "name": "EUREX:FMIT1!",
          "displayName": "ITALY 10YR"
        },
        {
          "name": "SGX:JB1!",
          "displayName": "JAPAN 10YR"
        },
        {
          "name": "CME:6J1!",
          "displayName": "JAPANESE YEN FUTURES"
        }
      ],
      "name": "Bonds"
    },
    {
      "originalName": "Forex",
      "symbols": [
        {
          "name": "FX:EURUSD"
        },
        {
          "name": "FX:GBPUSD"
        },
        {
          "name": "FX:USDJPY"
        },
        {
          "name": "FX:USDCHF"
        },
        {
          "name": "FX:AUDUSD"
        },
        {
          "name": "FX:USDCAD"
        },
        {
          "name": "FX_IDC:USDNPR",
          "displayName": "US DOLLAR VS NEPALI RUPEE"
        }
      ],
      "name": "Forex"
    }
  ],
  "locale": "en"
}
  </script>
</div>

      </div>

      </div>
            </div>
        </section>

        <!-- two block section ends -->

        <!-- two block video section starts -->

        <section class="two-block-video-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="market-news-title">Share Market News</div>
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="two-block-news-wrapper">

                                    <a href="{{route('detailsPage', ['news', @$news->slug])}}">
                                        <figure style="background-image: url('{{asset('images/main/'.@$latestHomepageNews->first()->main_image)}}')"></figure>
                                        <div class="two-block-news-content">
                                            <h3>{{@$latestHomepageNews->first()->title}}</h3>
                                            <span>{{\Carbon\Carbon::parse(@$latestHomepageNews->first()->created_at)->format('M d,Y')}}</span>
                                            <p>{{str_limit(@$latestHomepageNews->shift()->short_description, 100)}}</p>
                                        </div>
                                    </a>


                                    <a href="{{route('detailsPage', ['news', @$news->slug])}}">
                                        <figure style="background-image: url('{{asset('images/main/'.@$latestHomepageNews->first()->main_image)}}')"></figure>
                                        <div class="two-block-news-content">
                                            <h3>{{@$latestHomepageNews->first()->title}}</h3>
                                            <span>{{\Carbon\Carbon::parse(@$latestHomepageNews->first()->created_at)->format('M d,Y')}}</span>
                                            <p>{{str_limit(@$latestHomepageNews->shift()->short_description, 100)}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="two-block-section-small-news">

                              @foreach(@$latestHomepageNews as $latestNews)
                                    <a class="small-news-wrapper" href="{{route('detailsPage', ['news', @$latestNews->slug])}}">
                                        <figure style="background-image: url('{{asset('images/main/'.@$latestNews->main_image)}}')"></figure>
                                        <div class="two-block-small-news-content">
                                            <h3>{{@$latestNews->title}}</h3>
                                            <span>{{\Carbon\Carbon::parse(@$latestNews->created_at)->format('M d,Y')}}</span>
                                            <p>{{str_limit(@$latestNews->short_description, 100)}}</p>
                                        </div>
                                    </a>
                            @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="exclusive-news-wrapper">
                            <h2>Exclusive News</h2>

                      @foreach(@$exclusiveNewsList as $exclusive)
                            <a href="{{route('detailsPage', ['news', @$exclusive->slug])}}">
                                <h3>{{@$exclusive->title}}</h3>
                                <div class="date-time-wrap"><span>{{\Carbon\Carbon::parse(@$exclusive->created_at)->format('Y-m-d')}}</span><p class="time-wrap"><i class="fa fa-clock-o" aria-hidden="true"></i>{{\Carbon\Carbon::parse(@$exclusive->created_at)->format('h:i')}}</p></div>
                                <p>{{@$exclusive->short_description}}</p>
                            </a>
                      @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- two block section ends -->

        <!-- four block section starts -->

        <section class="four-block-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="four-block-first-sec">
                            <a class="four-block-first-sec-wrapper" href="{{route('detailsPage', ['news', @$newArticle->slug])}}">
                                <span class="section-title four-block-first-sec-news-title">{{@$newArticle->articletype->title}}</span>
                                <figure style="background-image: url('{{asset('images/main/'.@$newArticle->main_image)}}')"></figure>
                                <div class="first-section-content">
                                    <h3>{{@$newArticle->title}}</h3>
                                    <div class="first-sec-date-wrap"><span>{{\Carbon\Carbon::parse(@$newArticle->created_at)->format('M d,Y')}}</span><p><i class="fa fa-clock-o" aria-hidden="true"></i>{{\Carbon\Carbon::parse(@$newArticle->created_at)->format('h:i')}}</p></div>
                                    <p>{{str_limit(@$newArticle->short_description, 200)}}</p>
                                </div>
                            </a>
                            <a class="four-block-first-sec-wrapper" href="{{route('detailsPage', ['market', @$latestMarket->slug])}}">
                                <span class="section-title four-block-first-sec-news-title">Market</span>
                                <figure style="background-image: url('{{asset('images/main/'.@$latestMarket->main_image)}}')"></figure>
                                <div class="first-section-content">
                                    <h3>{{@$latestMarket->title}}</h3>
                                    <div class="first-sec-date-wrap"><span>{{\Carbon\Carbon::parse(@$latestMarket->created_at)->format('M d,Y')}}</span><p><i class="fa fa-clock-o" aria-hidden="true"></i>{{\Carbon\Carbon::parse(@$latestMarket->created_at)->format('h:i')}}</p></div>
                                    <p>{{str_limit(@$latestMarket->short_description, 200)}}</p>
                                </div>
                            </a>
                            <!-- <div class="first-section-link" href="#">
                                <div class="first-section-link-content">
                                    <h3>Как растопить холодную войну</h3>
                                    <span>Мария Минина</span>
                                </div>
                                <div class="facebook-link">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <span>fb.com/m.minina</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
          @if(@$homepageAnalysis)
                        <a class="four-block-second-section" href="{{route('detailsPage', ['analysis', @$homepageAnalysis->slug])}}">
                        <span class="section-title four-block-news-title">Analysis</span>
                            <figure style="background-image:url('{{asset('images/main/'.@$homepageAnalysis->main_image)}}')"></figure>
                            <div class="second-section-content">
                                <h3> {{@$homepageAnalysis->title}} </h3>
                            </div>
                        </a>
          @endif

                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a class="interview-section" href="{{route('detailsPage', ['news', @$news->slug])}}">
                            <span class="section-title">{{@$interviewArticle->articletype->title}}</span>
                            <figure style="background-image:url('{{asset('images/main/'.@$interviewArticle->main_image)}}')"></figure>
                            <div class="interview-content">
                                <h4>{{@$interviewArticle->title}}</h4>
                                <div class="interview-date"><span>{{\Carbon\Carbon::parse(@$interviewArticle->created_at)->format('M d,Y')}}</span><p><i class="fa fa-clock-o" aria-hidden="true"></i>{{\Carbon\Carbon::parse(@$interviewArticle->created_at)->format('h:i')}}</p></div>
                                <p>{{str_limit(@$interviewArticle->short_description, 200)}} </p>
                            </div>
                        </a>
                        <a class="interview-section" href="{{route('detailsPage', ['news', @$news->slug])}}">
                            <span class="section-title ipo-title">{{@$iponewsArticle->articletype->title}}</span>
                            <figure style="background-image:url('{{asset('images/main/'.@$iponewsArticle->main_image)}}')"></figure>
                            <div class="interview-content">
                                <h4>{{@$iponewsArticle->title}}</h4>
                                <div class="interview-date"><span>{{\Carbon\Carbon::parse(@$iponewsArticle->created_at)->format('M d,Y')}}</span><p><i class="fa fa-clock-o" aria-hidden="true"></i>{{\Carbon\Carbon::parse(@$iponewsArticle->created_at)->format('h:i')}}</p></div>
                                <p>{{str_limit(@$iponewsArticle->short_description, 200)}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="four-block-table">
                            <h3>Local Index</h3>
                            <table class="table table-dark table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Unit</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach(@$commodities as $data)
                                <tr>
                                    <td>{{@$data->name}}</td>
                                    <td>{{@$data->unit}}</td>
                                </tr>
                            @endforeach

                                </tbody>
                            </table>


                            <!-- <iframe src="https://www.widgets.investing.com/live-commodities?theme=darkTheme" width="100%" height="100%" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe><div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;">Powered by <a href="https://www.investing.com?utm_source=WMT&amp;utm_medium=referral&amp;utm_campaign=LIVE_COMMODITIES&amp;utm_content=Footer%20Link" target="_blank" rel="nofollow">Investing.com</a></div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


@endsection

@push('scripts')
<!-- <script src="{{asset('/assets/admin/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"> </script> -->
<script src="{{asset('/assets/admin/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $('#nepse-table-api').DataTable({
            pageLength: 100,

        });
    })
</script>


@endpush
