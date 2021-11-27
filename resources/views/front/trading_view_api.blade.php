@extends('front.layouts.app')

@section('content')

<section class="blog-listing-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <!-- TradingView Widget BEGIN -->
                  <div class="tradingview-widget-container">
                      <div id="tradingview_7c799"></div>
                      <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
                      <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                      <script type="text/javascript">
                        new TradingView.widget(
                          {
                          "width":1000,
                          "height": 610,
                          "symbol": "NASDAQ:AAPL",
                          "interval": "D",
                          "timezone": "Etc/UTC",
                          "theme": "Light",
                          "style": "1",
                          "locale": "en",
                          "toolbar_bg": "#f1f3f6",
                          "enable_publishing": false,
                          "allow_symbol_change": true,
                          "container_id": "tradingview_7c799"
                              }
                          );
                      </script>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12">
                <!-- TradingView Widget BEGIN -->
                <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                      <div class="tradingview-widget-container__widget"></div>
                      <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Market Data</span></a> by TradingView</div>
                      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                      {
                      "colorTheme": "light",
                        "dateRange": "12m",
                        "showChart": true,
                        "locale": "en",
                        "largeChartUrl": "",
                        "isTransparent": false,
                        "width": "400",
                        "height": "660",
                        "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
                        "plotLineColorFalling": "rgba(33, 150, 243, 1)",
                        "gridLineColor": "rgba(233, 233, 234, 1)",
                        "scaleFontColor": "rgba(120, 123, 134, 1)",
                        "belowLineFillColorGrowing": "rgba(33, 150, 243, 0.12)",
                        "belowLineFillColorFalling": "rgba(33, 150, 243, 0.12)",
                        "symbolActiveColor": "rgba(33, 150, 243, 0.12)",
                        "tabs": [
                          {
                            "title": "Indices",
                            "symbols": [
                              {
                                "s": "OANDA:SPX500USD",
                                "d": "S&P 500"
                              },
                              {
                                "s": "OANDA:NAS100USD",
                                "d": "Nasdaq 100"
                              },
                              {
                                "s": "FOREXCOM:DJI",
                                "d": "Dow 30"
                              },
                              {
                                "s": "INDEX:NKY",
                                "d": "Nikkei 225"
                              },
                              {
                                "s": "INDEX:DEU30",
                                "d": "DAX Index"
                              },
                              {
                                "s": "OANDA:UK100GBP",
                                "d": "FTSE 100"
                              }
                            ],
                            "originalTitle": "Indices"
                          },
                          {
                            "title": "Commodities",
                            "symbols": [
                              {
                                "s": "CME_MINI:ES1!",
                                "d": "E-Mini S&P"
                              },
                              {
                                "s": "CME:6E1!",
                                "d": "Euro"
                              },
                              {
                                "s": "COMEX:GC1!",
                                "d": "Gold"
                              },
                              {
                                "s": "NYMEX:CL1!",
                                "d": "Crude Oil"
                              },
                              {
                                "s": "NYMEX:NG1!",
                                "d": "Natural Gas"
                              },
                              {
                                "s": "CBOT:ZC1!",
                                "d": "Corn"
                              }
                            ],
                            "originalTitle": "Commodities"
                          },
                          {
                            "title": "Bonds",
                            "symbols": [
                              {
                                "s": "CME:GE1!",
                                "d": "Eurodollar"
                              },
                              {
                                "s": "CBOT:ZB1!",
                                "d": "T-Bond"
                              },
                              {
                                "s": "CBOT:UB1!",
                                "d": "Ultra T-Bond"
                              },
                              {
                                "s": "EUREX:FGBL1!",
                                "d": "Euro Bund"
                              },
                              {
                                "s": "EUREX:FBTP1!",
                                "d": "Euro BTP"
                              },
                              {
                                "s": "EUREX:FGBM1!",
                                "d": "Euro BOBL"
                              }
                            ],
                            "originalTitle": "Bonds"
                          },
                          {
                            "title": "Forex",
                            "symbols": [
                              {
                                "s": "FX:EURUSD"
                              },
                              {
                                "s": "FX:GBPUSD"
                              },
                              {
                                "s": "FX:USDJPY"
                              },
                              {
                                "s": "FX:USDCHF"
                              },
                              {
                                "s": "FX:AUDUSD"
                              },
                              {
                                "s": "FX:USDCAD"
                              }
                            ],
                            "originalTitle": "Forex"
                          }
                        ]
                        }
                        </script>
                    </div>
                </div>
            </div>
        <div>
    </div>
</section>

@endsection
