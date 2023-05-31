@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>{{ get_greetings() . auth()->user()->name }}</h3>
@stop

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->





                <div class="row">
                    <!--============================ View for Non-Admin ============================-->

                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-primary">
                            <a href="#" class="d-none d-md-block info-box-icon bg-primary elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Account Balance"><i class="fa fa-money"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">Balance</span>
                                <span class="info-box-number lead">
                                    $0.00 </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-danger">
                            <a href="#" class="d-none d-md-block info-box-icon bg-danger elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Profit Return"><i class="fa fa-money"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">Profit Return</span>
                                <span class="info-box-number lead">
                                    $0.00 </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-6 col-sm-3 col-md-4">
                        <div class="info-box shadow p-3 bg-teal">
                            <a href="#" class="d-none d-md-block info-box-icon bg-teal elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bonus"><i
                                    class="fa fa-money"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">Bonus</span>
                                <span class="info-box-number lead">
                                    $0.00 </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-warning">
                            <a href="#" class="d-none d-md-block info-box-icon bg-warning elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bonus"><i
                                    class="fa fa-money"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Deposit</span>
                                <span class="info-box-number lead">
                                    $0.00 </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-success">
                            <a href="#" class="d-none d-md-block info-box-icon  elevation-1" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Bonus"><i
                                    class="fa fa-money"></i></a>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Withdrawal</span>
                                <span class="info-box-number lead">
                                    $0.00 </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-6 col-sm-3 col-md-4 d-none d-md-block ">
                        <div class="info-box shadow p-3 bg-navy">
                            <a href="/deposit" class="d-none d-md-block info-box-icon bg-navy  elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Deposits"><i class="fa fa-exchange"></i></a>

                            <div class="info-box-content">
                                <span class="info-box-text">Deposit</span>
                                <span class="info-box-number lead">
                                    0
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-6 col-sm-3 col-md-4 d-none d-md-block ">
                        <div class="info-box shadow p-3  bg-info">
                            <a href="/withdrawal" class=" d-none d-md-block info-box-icon bg-info elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Withdrawal"><i class="fa fa-exchange"></i></a>

                            <div class="info-box-content">
                                <span class="info-box-text">Withdrawal</span>
                                <span class="info-box-number lead">
                                    0
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-secondary">
                            <a href="/subscribe" class="d-none d-md-block info-box-icon  bg-secondary elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Withdrawal"><i class="fa fa-credit-card"></i></a>

                            <div class="info-box-content">
                                <span class="info-box-text">Subscription</span>
                                <span class="info-box-number lead">
                                    Not subscribed
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-12 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3  bg-info">
                            <a href="#" class="d-none d-md-block info-box-icon bg-info elevation-1"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Notification"><i class="fa fa-bullhorn"></i></a>

                            <div class="info-box-content">
                                <span class="info-box-text">Notification</span>
                                <span class="info-box-number lead">
                                    Account is active
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <!-- /.col -->
                    <!-- Financial Charts  -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="width: 100%; height: 46px;">
                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                            src="https://s.tradingview.com/embed-widget/ticker-tape/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%2C%7B%22description%22%3A%22LTC%2FUSD%22%2C%22proName%22%3A%22LITECOIN%22%7D%2C%7B%22description%22%3A%22XRP%2FUSD%22%2C%22proName%22%3A%22BITSTAMP%3AXRPUSD%22%7D%2C%7B%22description%22%3A%22ETH%2FXBT%22%2C%22proName%22%3A%22KRAKEN%3AETHXBT%22%7D%5D%2C%22colorTheme%22%3A%22dark%22%2C%22isTransparent%22%3Afalse%2C%22largeChartUrl%22%3A%22%22%2C%22displayMode%22%3A%22adaptive%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A46%2C%22utm_source%22%3A%22app.24legitstockoptionstading.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22ticker-tape%22%2C%22page-uri%22%3A%22app.24legitstockoptionstading.com%2F%22%7D"
                            style="box-sizing: border-box; display: block; height: 46px; width: 100%;"></iframe>

                        <style>
                            .tradingview-widget-copyright {
                                font-size: 13px !important;
                                line-height: 32px !important;
                                text-align: center !important;
                                vertical-align: middle !important;
                                /* @mixin sf-pro-display-font; */
                                font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
                                color: #9db2bd !important;
                            }

                            .tradingview-widget-copyright .blue-text {
                                color: #2962FF !important;
                            }

                            .tradingview-widget-copyright a {
                                text-decoration: none !important;
                                color: #9db2bd !important;
                            }

                            .tradingview-widget-copyright a:visited {
                                color: #9db2bd !important;
                            }

                            .tradingview-widget-copyright a:hover .blue-text {
                                color: #1E53E5 !important;
                            }

                            .tradingview-widget-copyright a:active .blue-text {
                                color: #1848CC !important;
                            }

                            .tradingview-widget-copyright a:visited .blue-text {
                                color: #2962FF !important;
                            }
                        </style>
                    </div>
                    <!-- TradingView Widget END -->
                    <div class="col-lg-12 col-xs-11 p-0 mb-3">
                        <div class="card bg-white p-0">
                            <div class="card-header bg-white">
                                BTC/USD Chart
                            </div>
                            <div class="card-body p-0">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div id="tradingview_e8bea">
                                        <div id="tradingview_8d42c-wrapper"
                                            style="position: relative;box-sizing: content-box;width: 100%;height: 500px;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;">
                                            <div
                                                style="width: 100%;height: 500px;background: transparent;padding: 0 !important;">
                                                <iframe id="tradingview_8d42c"
                                                    src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_8d42c&amp;symbol=COINBASE%3ABTCUSD&amp;interval=D&amp;hidesidetoolbar=0&amp;symboledit=1&amp;saveimage=1&amp;toolbarbg=f1f3f6&amp;studies=%5B%5D&amp;theme=dark&amp;style=1&amp;timezone=Etc%2FUTC&amp;withdateranges=1&amp;showpopupbutton=1&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;showpopupbutton=1&amp;locale=en&amp;utm_source=app.24legitstockoptionstading.com&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=COINBASE%3ABTCUSD"
                                                    style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;"
                                                    frameborder="0" allowtransparency="true" scrolling="no"
                                                    allowfullscreen=""></iframe></div>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "height": 500,
                                            "width": "100%",
                                            "symbol": "COINBASE:BTCUSD",
                                            "interval": "D",
                                            "timezone": "Etc/UTC",
                                            "theme": "dark",
                                            "style": "1",
                                            "locale": "en",
                                            "toolbar_bg": "#f1f3f6",
                                            "withdateranges": true,
                                            "hide_side_toolbar": false,
                                            "allow_symbol_change": true,
                                            "show_popup_button": true,
                                            "popup_width": "1000",
                                            "popup_height": "650",
                                            "container_id": "tradingview_e8bea"
                                        });
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xs-11 p-0 mb-3">
                        <div class="card bg-white p-0">
                            <div class="card-header bg-white">
                                Live Trading
                            </div>
                            <div class="card-body">
                                <form class="form" method="POST"
                                    action="https://app.24legitstockoptionstading.com/trade">
                                    <input type="hidden" name="_token"
                                        value="6X7YC1WS0SBZTiSQMVKD7jhir0NDfawF7wiluyEj">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <select id="inputState" name="type" class="form-control ">
                                                <option value="cryptocurrency" selected="">Cryptocurrency</option>
                                                <option value="forex">Forex</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Currency Pair</label>
                                            <input type="text" class="form-control " id="currency_pair"
                                                name="currency_pair" placeholder="Enter currency-pair example: BTC/ETH">
                                        </div>
                                        <!--<div class="form-group col-md-6">-->
                                        <!--  <label for="inputAddress">Amount</label>-->
                                        <!--  <input type="text" class="form-control " id="amount" name="amount" placeholder="Enter amount example: 1000">-->
                                        <!--  -->
                                        <!--</div>-->
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Lot Size</label>
                                            <input type="text" class="form-control " id="lot_size" name="lot_size"
                                                placeholder="Enter lot size">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Entry price</label>
                                            <input type="text" class="form-control " id="entry_price"
                                                name="entry_price" placeholder="Enter entry price">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Stop Loss</label>
                                            <input type="text" class="form-control " id="stop_loss" name="stop_loss"
                                                placeholder="Enter stop loss">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Take Profit</label>
                                            <input type="text" class="form-control " id="take_profit"
                                                name="take_profit" placeholder="Enter take profit">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputAddress">Select Action</label>
                                            <select id="inputState" name="action" class="form-control ">
                                                <option value="buy" selected="">BUY</option>
                                                <option value="sell">SELL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success col-md-12">Execute
                                                    Trade</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <h5 class="text-center text-primary">Recent Trading History</h5>
                            <div class="table-responsive no-padding">
                                <table class="table table-hover table-borderless table-striped px-2">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Trading Type</th>
                                            <th>Currency Pair</th>
                                            <th>Trading Action</th>
                                            <th>Entry Price</th>
                                            <th>Stop Loss</th>
                                            <th>Take Profit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center h6">No Recent Trade Activity</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xs-11 p-0 mb-3">
                        <div class="card bg-white p-0">
                            <div class="card-header bg-white">
                                Forex-Cross-Rates Chart
                                <!-- <span class="pull-right"><a href="/subscribed-users" class=" text-white hover-danger">View all</a></span> -->
                            </div>
                            <div class="card-body p-0">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container" style="width: 100%; height: 400px;">
                                    <iframe scrolling="no" allowtransparency="true" frameborder="0"
                                        src="https://s.tradingview.com/embed-widget/forex-cross-rates/?locale=en#%7B%22width%22%3A%22100%25%22%2C%22height%22%3A400%2C%22currencies%22%3A%5B%22BTC%22%2C%22EUR%22%2C%22USD%22%2C%22JPY%22%2C%22GBP%22%2C%22CHF%22%2C%22AUD%22%2C%22CAD%22%2C%22NZD%22%2C%22CNY%22%2C%22TRY%22%2C%22SEK%22%2C%22NOK%22%5D%2C%22isTransparent%22%3Afalse%2C%22colorTheme%22%3A%22dark%22%2C%22utm_source%22%3A%22app.24legitstockoptionstading.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22forex-cross-rates%22%2C%22page-uri%22%3A%22app.24legitstockoptionstading.com%2F%22%7D"
                                        style="box-sizing: border-box; display: block; height: 400px; width: 100%;"></iframe>
                                    <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text">Forex Rates</span></a> by TradingView</div> -->

                                    <style>
                                        .tradingview-widget-copyright {
                                            font-size: 13px !important;
                                            line-height: 32px !important;
                                            text-align: center !important;
                                            vertical-align: middle !important;
                                            /* @mixin sf-pro-display-font; */
                                            font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto, Ubuntu, sans-serif !important;
                                            color: #9db2bd !important;
                                        }

                                        .tradingview-widget-copyright .blue-text {
                                            color: #2962FF !important;
                                        }

                                        .tradingview-widget-copyright a {
                                            text-decoration: none !important;
                                            color: #9db2bd !important;
                                        }

                                        .tradingview-widget-copyright a:visited {
                                            color: #9db2bd !important;
                                        }

                                        .tradingview-widget-copyright a:hover .blue-text {
                                            color: #1E53E5 !important;
                                        }

                                        .tradingview-widget-copyright a:active .blue-text {
                                            color: #1848CC !important;
                                        }

                                        .tradingview-widget-copyright a:visited .blue-text {
                                            color: #2962FF !important;
                                        }
                                    </style>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                    </div>

                    <!-- Financial Charts  -->
                </div>
            </div>

        </section>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
