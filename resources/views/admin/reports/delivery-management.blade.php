@extends('layouts.app')

@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">
        <div class="container-fluid ps-full-width-container" id="main_grid">
            <div class="row ">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-right">
                    <div class="ps-top-header-button-card">
                        <div class="order-1 text-left">
                            <h5 class="mb-2 mb-md-0">Delivery Management</h5>
                        </div>
                        <div class="order-2 button-flex">
                            <span class="ps-btn sm-btn sync-code">Credit Remaining:<span class="rs-font-family"> ₹ </span>
                                <span class="typo-fill-red-color">0</span></span>
                            <span class="ps-btn sm-btn sync-code">Credit Purchase Till Now:<span class="rs-font-family"> ₹ </span><span class="typo-fill-red-color">0</span></span>
                            <div class="btn-group ng-dropdown-wrap">
                                <a class="ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" id="dropdownMenuBottomRight" data-bs-toggle="dropdown" aria-expanded="true">Export Excel</a>
                                <ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu">
                                    <li class="dropdown-item" role="presentation"><a href="javascript:void(0)" onclick="export_csv('https://billing.petpooja.com/orders/delivery_servies_export_csv/all',1)" tabindex="-1" role="menuitem">Export All</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-page-two">
                <div class="ps-form-card">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden" id="show-message-div">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="z-depth">
                                <!--search bar-->
                                <form name="payment_request_search" id="payment_request_search" method="post" action="">
                                    <div class="search_bar_loader_div" style="display: none;">
                                        <div class="border-left-thick search-title-card">
                                            <h6 class="search-title"><span class="expense-loader-list-txt wave-pre-loading"></span></h6>
                                            <a href="javascript:void(0)" class="order-2 dropdown-btm-icon line-height-1"><i class="fas wave-pre-loading"></i></a>
                                        </div>
                                    </div>
                                    <div class="search_bar_div" style="">
                                        <div class="search-title-card">
                                            <h6 class="search-title"><i class="fa fa-search"></i>Search</h6>
                                            <a href="javascript:void(0)" class="order-2"><i class="fas fa-chevron-down"></i></a>
                                        </div>
                                        <!--search bar-->
                                        <div class="card-body px-0 serch-body mob-serch-body pb-0 pt-0 ng-rounded-0">
                                            <div class="ps-searchbar mobile-btn-container mt-0 border-bottom-0 ng-rounded-0">
                                                <div class="ps-form-group calendar-icon">
                                                    <label class="" for="PaymentRequestStartdate">Start Date</label>
                                                    <input name="data[PaymentRequest][startdate]" value="" class="form-control set-calendar" autocomplete="off" type="text" id="PaymentRequestStartdate" readonly="readonly">
                                                </div>
                                                <!--Linked pickers datepicker input end -->
                                                <!-- End date and time picker -->
                                                <div class="ps-form-group calendar-icon">
                                                    <label class="" for="PaymentRequestEnddate">End Date</label>
                                                    <input name="data[PaymentRequest][enddate]" value="" class="form-control set-calendar" autocomplete="off" type="text" id="PaymentRequestEnddate" readonly="readonly">
                                                </div>
                                                <!--Linked pickers datepicker input end -->
                                                <div class="ps-form-group ps-select2-border">
                                                    <label>Select Provider</label>
                                                    <select name="data[PaymentRequest][provider_type]" class="select-simple form-control pp-select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" id="PaymentRequestProviderType" data-select2-id="PaymentRequestProviderType">
                                                        <option value="" data-select2-id="29">All</option>
                                                        <option value="96163">Adloggs_Rider</option>
                                                        <option value="220154">Borzo</option>
                                                        <option value="171215">Chowman Rider</option>
                                                        <option value="230474">Demo Delivery Chain</option>
                                                        <option value="267594">DoorDash Drive</option>
                                                        <option value="29034">DunzoB2B</option>
                                                        <option value="3204">Easymovr</option>
                                                        <option value="98841">Elemobility</option>
                                                        <option value="6625">GoYo</option>
                                                        <option value="3097">Grab</option>
                                                        <option value="31255">Iwingzy</option>
                                                        <option value="3406">Jugnoo</option>
                                                        <option value="29033">Lalamove</option>
                                                        <option value="60843">NowBike</option>
                                                        <option value="156111">Opoli Ezip</option>
                                                        <option value="2938">Parsel</option>
                                                        <option value="55371">PIDGE</option>
                                                        <option value="148684">Porter Delivery</option>
                                                        <option value="108044">Sendi</option>
                                                        <option value="41263">ShadowFax</option>
                                                        <option value="175426">Snowch Rider</option>
                                                        <option value="211919">Sukam&nbsp;Express Rider</option>
                                                        <option value="89266">Tookan_Rider</option>
                                                        <option value="182739">Uengage Delivery Chain</option>
                                                        <option value="3069">Zomato Xtreme</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="28" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-PaymentRequestProviderType-container"><span class="select2-selection__rendered" id="select2-PaymentRequestProviderType-container" role="textbox" aria-readonly="true" title="All">All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span><span class="pp-textfield-bar"></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <input type="hidden" name="data[restaurant_id]" value="427275">
                                                <input type="hidden" name="data[current_page_url]" id="current_page_url" value="">
                                                <div class="button-wrapper">
                                                    <button type="submit" value="Search" name="search" class="ps-btn sm-btn primary-btn">Search</button>
                                                    <button class="ps-btn ps-btn sm-btn grey-outline-btn show_all">Show All</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end search bar-->
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="card chart-card chart_div tabs-box-shadow chart-card-left-border border-0 m-0" style="">
                                            <div class="card-title border-radius-0">
                                                <div class="media-left">
                                                    <h5 class="mb-0">Last 7 Days Orders</h5>
                                                </div>
                                            </div>
                                            <div class="card-body show-chart">
                                                <div id="payment_request-pie" data-highcharts-chart="0" aria-hidden="false" role="region" aria-label="Chart. Highcharts interactive chart." style="overflow: hidden;">
                                                    <div id="highcharts-screen-reader-region-before-0" style="position: relative;" aria-hidden="false">
                                                        <div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                                            <p>Chart</p>
                                                            <div>Pie chart with 2 slices.</div>
                                                        </div>
                                                    </div>
                                                    <div aria-hidden="false" class="highcharts-announcer-container" style="position: relative;">
                                                        <div aria-hidden="false" aria-live="polite" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                        <div aria-hidden="false" aria-live="assertive" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                        <div aria-hidden="false" aria-live="polite" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                        <div aria-hidden="false" aria-live="polite" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                    </div>
                                                    <div id="highcharts-1182esg-0" dir="ltr" style="position: relative; overflow: hidden; width: 670px; height: 150px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none; padding: 0px;" class="highcharts-container " aria-hidden="false" tabindex="0">
                                                        <div aria-hidden="false" class="highcharts-a11y-proxy-container-before" style="top: 0px; left: 0px; white-space: nowrap; position: absolute;"></div><svg version="1.1" class="highcharts-root" style="font-family: Helvetica, Arial, sans-serif; font-size: 1rem;" xmlns="http://www.w3.org/2000/svg" width="670" height="150" viewBox="0 0 670 150" aria-hidden="false" aria-label="Interactive chart">
                                                            <desc aria-hidden="true">Created with Highcharts 11.4.8</desc>
                                                            <defs aria-hidden="true">
                                                                <filter id="highcharts-drop-shadow-0">
                                                                    <feDropShadow dx="1" dy="1" flood-color="#000000" flood-opacity="0.75" stdDeviation="2.5"></feDropShadow>
                                                                </filter>
                                                            </defs>
                                                            <rect fill="#ffffff" class="highcharts-background" filter="none" x="0" y="0" width="670" height="150" rx="0" ry="0" aria-hidden="true"></rect>
                                                            <rect fill="none" class="highcharts-plot-background" x="10" y="10" width="430" height="125" filter="none" aria-hidden="true"></rect>
                                                            <g class="highcharts-pane-group" data-z-index="0" aria-hidden="true"></g>
                                                            <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="0" x="10" y="10" width="430" height="125" aria-hidden="true"></rect>
                                                            <g class="highcharts-series-group" data-z-index="3" filter="none" aria-hidden="false">
                                                                <g class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(10,10) scale(1 1)" filter="none" aria-hidden="false" clip-path="none">
                                                                    <path fill="#75CEF1" d="M 214.99266776466698 43.000000746689935 A 0 0 0 0 1 214.99266776466698 43.000000746689935 A 36 36 0 0 1 214.99266776466698 43.000000746689935 A 0 0 0 0 1 214.99266776466698 43.000000746689935 L 214.99560065880019 57.40000044801396 A 0 0 0 0 1 214.99560065880019 57.40000044801396 A 21.6 21.6 0 0 0 214.99560065880019 57.40000044801396 A 0 0 0 0 1 214.99560065880019 57.40000044801396 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="No.of Orders, 0. Orders." style="outline: none;"></path>
                                                                    <path fill="#9D8FD1" d="M 214.99266776466698 43.000000746689935 A 0 0 0 0 1 214.99266776466698 43.000000746689935 A 36 36 0 0 1 214.99266776466698 43.000000746689935 A 0 0 0 0 1 214.99266776466698 43.000000746689935 L 214.99560065880019 57.40000044801396 A 0 0 0 0 1 214.99560065880019 57.40000044801396 A 21.6 21.6 0 0 0 214.99560065880019 57.40000044801396 A 0 0 0 0 1 214.99560065880019 57.40000044801396 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" opacity="1" stroke-linejoin="round" class="highcharts-point highcharts-color-1" tabindex="-1" role="img" aria-label="No. of Third Party Orders, 0. Orders." style="outline: none;"></path>
                                                                    <path fill="none" d="M 215 43 A 36 36 0 1 1 214.99980000000002 43.00000000055556 M 214.99988000000002 57.400000000333335 A 21.6 21.6 0 1 0 215 57.4" class="highcharts-empty-series" stroke-width="1" stroke="#cccccc"></path>
                                                                </g>
                                                                <g class="highcharts-markers highcharts-series-0 highcharts-pie-series" data-z-index="0.1" opacity="1" transform="translate(10,10) scale(1 1)" aria-hidden="true" clip-path="none"></g>
                                                            </g>
                                                            <g class="highcharts-exporting-group" data-z-index="3" aria-hidden="true">
                                                                <g class="highcharts-no-tooltip highcharts-button highcharts-contextbutton" stroke-linecap="round" style="cursor: pointer;" transform="translate(632,10)">
                                                                    <title>Chart context menu</title>
                                                                    <rect fill="#ffffff" class="highcharts-button-box" x="0.5" y="0.5" width="28" height="28" rx="2" ry="2" stroke="none" stroke-width="1"></rect>
                                                                    <path fill="#666666" d="M 8 9.5 L 22 9.5 M 8 14.5 L 22 14.5 M 8 19.5 L 22 19.5" class="highcharts-button-symbol" data-z-index="1" stroke="#666666" stroke-width="3"></path><text x="0" data-z-index="1" y="18.5" style="color: rgb(51, 51, 51); font-size: 0.8em; font-weight: normal; fill: rgb(51, 51, 51);"></text>
                                                                </g>
                                                            </g><text x="335" text-anchor="middle" class="highcharts-title" data-z-index="4" style="font-size: 1.2em; color: rgb(51, 51, 51); font-weight: bold; fill: rgb(51, 51, 51);" y="25" aria-hidden="true"></text><text x="335" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="24" aria-hidden="true"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="147" aria-hidden="true"></text>
                                                            <g class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-tracker" data-z-index="6" opacity="1" transform="translate(10,10) scale(1 1)" aria-hidden="true">
                                                                <path fill="none" class="highcharts-data-label-connector highcharts-color-0" stroke-width="1" stroke="#75CEF1" d="M 220 12.055555820465088 L 215 12.055555820465088 L 215 37 L 215 43"></path>
                                                                <path fill="none" class="highcharts-data-label-connector highcharts-color-1" stroke-width="1" stroke="#9D8FD1" d="M 271.0487246531636 37.166667461395264 L 215 37.166667461395264 L 215 37 L 215 43"></path>
                                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(225,0)"><text x="5" data-z-index="1" y="19" style="color: rgb(0, 0, 0); font-size: 14px; font-weight: bold; fill: rgb(0, 0, 0);">
                                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                                        </tspan>0
                                                                    </text></g>
                                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-1" data-z-index="1" filter="none" transform="translate(276,25)"><text x="5" data-z-index="1" y="19" style="color: rgb(0, 0, 0); font-size: 14px; font-weight: bold; fill: rgb(0, 0, 0);">
                                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                                        </tspan>0
                                                                    </text></g>
                                                            </g>
                                                            <g class="highcharts-legend highcharts-no-tooltip" data-z-index="7" transform="translate(452,10)" aria-hidden="true">
                                                                <rect fill="none" class="highcharts-legend-box" rx="0" ry="0" stroke="#999999" stroke-width="0" filter="none" x="0" y="0" width="208" height="57"></rect>
                                                                <g data-z-index="1">
                                                                    <g>
                                                                        <g class="highcharts-legend-item highcharts-pie-series highcharts-color-0" data-z-index="1" transform="translate(8,3)"><text x="14" text-anchor="start" data-z-index="2" style="color: rgb(77, 87, 93); cursor: pointer; font-size: 16px; text-decoration: none; font-weight: normal; fill: rgb(77, 87, 93);" y="21">No.of Orders</text>
                                                                            <rect x="0" y="13" rx="4.5" ry="4.5" width="9" height="9" fill="#75CEF1" class="highcharts-point" data-z-index="3"></rect>
                                                                        </g>
                                                                        <g class="highcharts-legend-item highcharts-pie-series highcharts-color-1" data-z-index="1" transform="translate(8,26)"><text x="14" y="21" text-anchor="start" data-z-index="2" style="color: rgb(77, 87, 93); cursor: pointer; font-size: 16px; text-decoration: none; font-weight: normal; fill: rgb(77, 87, 93);">No. of Third Party Orders</text>
                                                                            <rect x="0" y="13" rx="4.5" ry="4.5" width="9" height="9" fill="#9D8FD1" class="highcharts-point" data-z-index="3"></rect>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <div aria-hidden="false" class="highcharts-a11y-proxy-container-after" style="top: 0px; left: 0px; white-space: nowrap; position: absolute;">
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-zoom"></div>
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-navigator" role="region" aria-label="Axis zoom"></div>
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-legend" aria-label="Toggle series visibility, Chart" role="region">
                                                                <ul role="list">
                                                                    <li style="list-style: none;"><button class="highcharts-a11y-proxy-element" tabindex="-1" aria-pressed="true" aria-label="Show No.of Orders" style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 105.597px; height: 17.7778px; left: 460px; top: 20px;"></button></li>
                                                                    <li style="list-style: none;"><button class="highcharts-a11y-proxy-element" tabindex="-1" aria-pressed="true" aria-label="Show No. of Third Party Orders" style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 192.431px; height: 17.7778px; left: 460px; top: 43px;"></button></li>
                                                                </ul>
                                                            </div>
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-chartMenu"><button class="highcharts-a11y-proxy-element highcharts-no-tooltip" aria-label="View chart menu, Chart" aria-expanded="false" title="Chart context menu" style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 1px; height: 1px; left: -268px; top: -230px;"></button></div>
                                                        </div>
                                                    </div>
                                                    <div id="highcharts-screen-reader-region-after-0" aria-hidden="false" style="position: relative;">
                                                        <div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                                            <div id="highcharts-end-of-chart-marker-0" class="highcharts-exit-anchor" tabindex="0" aria-hidden="false">End of interactive chart.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card chart-card chart_loader_div tabs-box-shadow chart-card-left-border border-0" style="display: none;">
                                            <div class="card-title col-12 mb-0 border-radius-0">
                                                <div class="media-left pl-1">
                                                    <h4 class="widget-amt-loader wave-pre-loading"></h4>
                                                </div>
                                            </div>
                                            <div class="card-body show-chart">
                                                <div class="widget-amt-loader wave-pre-loading loder-card-height my-0"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="card chart-card chart_div tabs-box-shadow chart-card-left-border border-0 m-0" style="">
                                            <div class="card-title border-radius-0">
                                                <div class="media-left">
                                                    <h5 class="mb-0">Last 7 Days - Delivered Orders</h5>
                                                </div>
                                            </div>
                                            <div class="card-body show-chart">
                                                <div id="payment_request-bar" data-highcharts-chart="1" aria-hidden="false" role="region" aria-label="Chart. Highcharts interactive chart." style="overflow: hidden;">
                                                    <div id="highcharts-screen-reader-region-before-1" aria-hidden="false" style="position: relative;">
                                                        <div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                                            <p>Chart</p>
                                                            <div>Bar chart with 7 bars.</div>
                                                            <div>The chart has 1 X axis displaying categories. </div>
                                                            <div>The chart has 1 Y axis displaying values. Data ranges from -0.5 to 0.5.</div>
                                                        </div>
                                                    </div>
                                                    <div aria-hidden="false" class="highcharts-announcer-container" style="position: relative;">
                                                        <div aria-hidden="false" aria-live="polite" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                        <div aria-hidden="false" aria-live="assertive" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                        <div aria-hidden="false" aria-live="polite" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                        <div aria-hidden="false" aria-live="polite" aria-atomic="true" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;"></div>
                                                    </div>
                                                    <div id="highcharts-1182esg-3" dir="ltr" style="position: relative; overflow: hidden; width: 670px; height: 150px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none; padding: 0px;" class="highcharts-container " aria-hidden="false" tabindex="0">
                                                        <div aria-hidden="false" class="highcharts-a11y-proxy-container-before" style="top: 0px; left: 0px; white-space: nowrap; position: absolute;"></div><svg version="1.1" class="highcharts-root" style="font-family: Helvetica, Arial, sans-serif; font-size: 1rem;" xmlns="http://www.w3.org/2000/svg" width="670" height="150" viewBox="0 0 670 150" aria-hidden="false" aria-label="Interactive chart">
                                                            <desc aria-hidden="true">Created with Highcharts 11.4.8</desc>
                                                            <defs aria-hidden="true">
                                                                <filter id="highcharts-drop-shadow-1">
                                                                    <feDropShadow dx="1" dy="1" flood-color="#000000" flood-opacity="0.75" stdDeviation="2.5"></feDropShadow>
                                                                </filter>
                                                                <clipPath id="highcharts-1182esg-11-">
                                                                    <rect x="0" y="0" width="650" height="96" fill="none"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect fill="#ffffff" class="highcharts-background" filter="none" x="0" y="0" width="670" height="150" rx="0" ry="0" aria-hidden="true"></rect>
                                                            <rect fill="none" class="highcharts-plot-background" x="10" y="10" width="650" height="96" filter="none" aria-hidden="true"></rect>
                                                            <g class="highcharts-pane-group" data-z-index="0" aria-hidden="true"></g>
                                                            <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1" aria-hidden="true">
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 102.5 10 L 102.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 195.5 10 L 195.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 288.5 10 L 288.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 381.5 10 L 381.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 474.5 10 L 474.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 567.5 10 L 567.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 660.5 10 L 660.5 106" opacity="1"></path>
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 10.5 10 L 10.5 106" opacity="1"></path>
                                                            </g>
                                                            <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1" aria-hidden="true">
                                                                <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 10 58.5 L 660 58.5" opacity="1"></path>
                                                            </g>
                                                            <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="0" x="10" y="10" width="650" height="96" aria-hidden="true"></rect>
                                                            <g class="highcharts-axis highcharts-xaxis" data-z-index="2" aria-hidden="true">
                                                                <path fill="none" class="highcharts-axis-line" stroke="#333333" stroke-width="1" data-z-index="7" d="M 10 106.5 L 660 106.5"></path>
                                                            </g>
                                                            <g class="highcharts-axis highcharts-yaxis" data-z-index="2" aria-hidden="true">
                                                                <path fill="none" class="highcharts-axis-line" stroke="#333333" stroke-width="0" data-z-index="7" d="M 10 10 L 10 106"></path>
                                                            </g>
                                                            <g class="highcharts-series-group" data-z-index="3" filter="none" aria-hidden="false">
                                                                <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-color-0 highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(10,10) scale(1 1)" clip-path="url(#highcharts-1182esg-11-)" aria-hidden="false">
                                                                    <path fill="#75CEF1" d="M 27.5 48.5 L 66.5 48.5 A 3 3 0 0 1 66.5 48.5 L 66.5 48.5 A 0 0 0 0 1 66.5 48.5 L 66.5 48.5 A 0 0 0 0 1 27.5 48.5 L 27.5 48.5 A 3 3 0 0 1 27.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="4th Apr, 0.  ." style="outline: none;"></path>
                                                                    <path fill="#75CEF1" d="M 119.5 48.5 L 158.5 48.5 A 3 3 0 0 1 158.5 48.5 L 158.5 48.5 A 0 0 0 0 1 158.5 48.5 L 158.5 48.5 A 0 0 0 0 1 119.5 48.5 L 119.5 48.5 A 3 3 0 0 1 119.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="5th Apr, 0.  ." style="outline: none;"></path>
                                                                    <path fill="#75CEF1" d="M 212.5 48.5 L 251.5 48.5 A 3 3 0 0 1 251.5 48.5 L 251.5 48.5 A 0 0 0 0 1 251.5 48.5 L 251.5 48.5 A 0 0 0 0 1 212.5 48.5 L 212.5 48.5 A 3 3 0 0 1 212.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="6th Apr, 0.  ." style="outline: none;"></path>
                                                                    <path fill="#75CEF1" d="M 305.5 48.5 L 344.5 48.5 A 3 3 0 0 1 344.5 48.5 L 344.5 48.5 A 0 0 0 0 1 344.5 48.5 L 344.5 48.5 A 0 0 0 0 1 305.5 48.5 L 305.5 48.5 A 3 3 0 0 1 305.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="7th Apr, 0.  ." style="outline: none;"></path>
                                                                    <path fill="#75CEF1" d="M 398.5 48.5 L 437.5 48.5 A 3 3 0 0 1 437.5 48.5 L 437.5 48.5 A 0 0 0 0 1 437.5 48.5 L 437.5 48.5 A 0 0 0 0 1 398.5 48.5 L 398.5 48.5 A 3 3 0 0 1 398.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="8th Apr, 0.  ." style="outline: none;"></path>
                                                                    <path fill="#75CEF1" d="M 491.5 48.5 L 530.5 48.5 A 3 3 0 0 1 530.5 48.5 L 530.5 48.5 A 0 0 0 0 1 530.5 48.5 L 530.5 48.5 A 0 0 0 0 1 491.5 48.5 L 491.5 48.5 A 3 3 0 0 1 491.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="9th Apr, 0.  ." style="outline: none;"></path>
                                                                    <path fill="#75CEF1" d="M 584.5 48.5 L 623.5 48.5 A 3 3 0 0 1 623.5 48.5 L 623.5 48.5 A 0 0 0 0 1 623.5 48.5 L 623.5 48.5 A 0 0 0 0 1 584.5 48.5 L 584.5 48.5 A 3 3 0 0 1 584.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="10th Apr, 0.  ." style="outline: none;"></path>
                                                                </g>
                                                                <g class="highcharts-markers highcharts-series-0 highcharts-column-series highcharts-color-0" data-z-index="0.1" opacity="1" transform="translate(10,10) scale(1 1)" clip-path="none" aria-hidden="true"></g>
                                                            </g>
                                                            <g class="highcharts-exporting-group" data-z-index="3" aria-hidden="true">
                                                                <g class="highcharts-no-tooltip highcharts-button highcharts-contextbutton" stroke-linecap="round" style="cursor: pointer;" transform="translate(632,10)">
                                                                    <title>Chart context menu</title>
                                                                    <rect fill="#ffffff" class="highcharts-button-box" x="0.5" y="0.5" width="28" height="28" rx="2" ry="2" stroke="none" stroke-width="1"></rect>
                                                                    <path fill="#666666" d="M 8 9.5 L 22 9.5 M 8 14.5 L 22 14.5 M 8 19.5 L 22 19.5" class="highcharts-button-symbol" data-z-index="1" stroke="#666666" stroke-width="3"></path><text x="0" data-z-index="1" y="18.5" style="color: rgb(51, 51, 51); font-size: 0.8em; font-weight: normal; fill: rgb(51, 51, 51);"></text>
                                                                </g>
                                                            </g><text x="335" text-anchor="middle" class="highcharts-title" data-z-index="4" style="font-size: 1.2em; color: rgb(51, 51, 51); font-weight: bold; fill: rgb(51, 51, 51);" y="25" aria-hidden="true"></text><text x="335" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="24" aria-hidden="true"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="147" aria-hidden="true"></text>
                                                            <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7" aria-hidden="true"><text x="56.428571428568574" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">4th Apr</text><text x="149.2857142857186" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">5th Apr</text><text x="242.14285714285853" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">6th Apr</text><text x="334.9999999999986" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">7th Apr</text><text x="427.85714285713857" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">8th Apr</text><text x="520.7142857142885" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">9th Apr</text><text x="613.5714285714286" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">10th Apr</text></g>
                                                            <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7" aria-hidden="true"></g>
                                                        </svg>
                                                        <div aria-hidden="false" class="highcharts-a11y-proxy-container-after" style="top: 0px; left: 0px; white-space: nowrap; position: absolute;">
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-zoom"></div>
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-navigator" role="region" aria-label="Axis zoom"></div>
                                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-chartMenu"><button class="highcharts-a11y-proxy-element highcharts-no-tooltip" aria-label="View chart menu, Chart" aria-expanded="false" title="Chart context menu" style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 1px; height: 1px; left: -993px; top: -230px;"></button></div>
                                                        </div>
                                                        <div class="highcharts-axis-labels highcharts-yaxis-labels" aria-hidden="true" style="position: absolute; left: 0px; top: 0px; opacity: 1;"><span opacity="1" style="position: absolute; font-family: Helvetica, Arial, sans-serif; font-size: 0.8em; white-space: nowrap; margin-left: 0px; margin-top: 0px; color: rgb(51, 51, 51); cursor: default; transform: rotate(0deg); transform-origin: 0px 11px; text-overflow: clip; opacity: 1; left: -5px; top: 58px; visibility: inherit;"></span></div>
                                                    </div>
                                                    <div id="highcharts-screen-reader-region-after-1" aria-hidden="false" style="position: relative;">
                                                        <div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                                            <div id="highcharts-end-of-chart-marker-1" class="highcharts-exit-anchor" tabindex="0" aria-hidden="false">End of interactive chart.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card chart-card chart_loader_div tabs-box-shadow chart-card-left-border border-0" style="display: none;">
                                            <div class="card-title col-12 mb-0 border-radius-0">
                                                <div class="media-left pl-1">
                                                    <h4 class="widget-amt-loader wave-pre-loading"></h4>
                                                </div>
                                            </div>
                                            <div class="card-body show-chart">
                                                <div class="widget-amt-loader wave-pre-loading loder-card-height my-0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--table start-->
                                <div class="grid-loader" style="display: none;">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="wave-pre-loading"></th>
                                            </tr>
                                            <tr>
                                                <td class="wave-pre-loading"></td>
                                            </tr>
                                            <tr>
                                                <td class="wave-pre-loading"></td>
                                            </tr>
                                            <tr>
                                                <td class="wave-pre-loading"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="" id="payment_request_grid_div" style="">
                                    <div class="no-data-blank-state displayafterdetaildiv border-top-0" style="width:100%">
                                        <!--no table found blank state-->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center">
                                                <div class="image-wrapper">
                                                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="4" y="4" width="48" height="48" rx="24" fill="#FFECEE"></rect>
                                                        <path d="M37 37L32.65 32.65M35 27C35 31.4183 31.4183 35 27 35C22.5817 35 19 31.4183 19 27C19 22.5817 22.5817 19 27 19C31.4183 19 35 22.5817 35 27Z" stroke="#C52031" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <rect x="4" y="4" width="48" height="48" rx="24" stroke="#FFECEE" stroke-width="8"></rect>
                                                    </svg>
                                                </div>
                                                <h5 class="no-rcord-found-text mt-1 col-12">
                                                    No records OR Use petpooja enabled delivery system to track delivery </h5>
                                                <p>
                                                    We could not find what you searched for Try searching again
                                                </p>
                                            </div>
                                        </div><!-- end no table found blank state-->
                                    </div><!--end no data blank state--><input type="hidden" value="https://billing.petpooja.com/orders/deliveryserviceslist/" name="current_url" id="current_url">
                                    <input type="hidden" value="0" name="total_records" id="total_records">
                                </div>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection