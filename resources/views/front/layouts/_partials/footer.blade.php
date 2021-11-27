

<!-- scroll to top arrow -->


<a id="button"></a>


<!-- footer section starts -->

       <footer>
           <div class="container">
               <div class="row">

                   <div class="col-lg-6">
                       <div class="footer-logo-section">
                           <a class="footer-logo" href="/"><img src="{{asset('images/main/'.$dashboard_composer->logo)}}"></a>
                           <p>Copyright © <?php echo date('Y') ?> The Southern Rock, Inc. All rights reserved.</p>
                           <span>By using this site you agree to the<a href="{{route('dynamicPages', ['terms-of-service'])}}">Terms Of Service,</a><a href="{{route('dynamicPages', ['privacy-policy'])}}">Privacy Policy.</a></span>
                           <div class="footer-media">
                               <a href="{{$dashboard_composer->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                               <a href="{{$dashboard_composer->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                               <a href="{{$dashboard_composer->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                               <a href="{{$dashboard_composer->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                               <!-- <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a> -->
                           </div>
                       </div>
                   </div>

                   @foreach($footerdata_composer->where('parent', 0)->take(2) as $footerNavi)
                          <div class="col-lg-3 col-md-6 col-sm-12">
                               <div class="footer-block">
                                  <h2>{{$footerNavi->name}}</h2>
                                  <ul class="footer-links">
                                    @php
                                      $submenus = $footerdata_composer->where('parent', $footerNavi->id);
                                    @endphp
                                    @foreach($submenus as $submen)
                                      <li><a href="{{route('dynamicNav', [$submen->slug])}}">{{$submen->name}}</a></li>
                                    @endforeach
                                      <!-- <li><a href="#">Moving Average</a></li>
                                      <li><a href="#">180 Days Avg Price</a></li>
                                      <li><a href="#">Pivot Analysis</a></li>
                                      <li><a href="#">Weekly Market Analysis</a></li>
                                      <li><a href="#">Top Comapanies in Nepal</a></li> -->
                                  </ul>
                               </div>
                          </div>
                   @endforeach
               </div>
           </div>
           <!-- TradingView Widget BEGIN -->
           <div class="footer-fixed">
                <div class="tradingview-widget-container">
                 <div class="tradingview-widget-container__widget"></div>
                 <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Ticker Tape</span></a> by TradingView</div>
                 <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                 {
                 "symbols": [
                   {
                     "title": "S&P 500",
                     "proName": "OANDA:SPX500USD"
                   },
                   {
                     "title": "Nasdaq 100",
                     "proName": "OANDA:NAS100USD"
                   },
                   {
                     "title": "EUR/USD",
                     "proName": "FX_IDC:EURUSD"
                   },
                   {
                     "title": "BTC/USD",
                     "proName": "BITSTAMP:BTCUSD"
                   },
                   {
                     "title": "ETH/USD",
                     "proName": "BITSTAMP:ETHUSD"
                   }
                 ],
                 "colorTheme": "dark",
                 "isTransparent": true,
                 "displayMode": "adaptive",
                 "locale": "en"
               }
                 </script>
               </div>
             </div>

       </footer>


       <script src="{{asset('assets/front/js/jquery-3.4.1.min.js')}}"></script>
       <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
       <script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
       <script src="{{asset('assets/front/js/lightbox.min.js')}}"></script>
       <script src="{{asset('assets/front/js/custom.js')}}"></script>

       @stack('scripts')
    </body>
   </body>
</html>
