@extends('layouts.app')

@section('content')


<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">
        <div class="inner-page-two">
            <div class="">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 hidden" id="show-message-div">

                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="tab-marg clearfix">
                            <div class="">
                                <!-- Nav tabs -->
                                <div class="ps-nav-wrapper">
                                    <ul class="nav nav-tabs ps-nav" role="tablist">
                                        <li class="nav-item"><a class="nav-link ajax_load_url" href="{{route('admin.all.orders')}}" data-active="left_order_list">Order</a></li>

                                        <li class="nav-item active"><a class="nav-link ajax_load_url" href="{{route('admin.advance.orders')}}" data-active="left_order_list">Advance Order</a></li>
                                    </ul>
                                </div> <!-- Tab panes -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card z-depth border-0 ng-rounded-btm-rl cumulative_item_report_div">
                    <!-- Bar chart Section Start -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 chart_div px-0" style="">
                        <div class="card tabs-box-shadow chart-card chart-card-left-border border-0 m-0">
                            <div class="card-title d-flex align-items-center border-bottom-0 cursor-pointer show-chart-click chart-icon-arrow" onclick="showchart();">
                                <div class="media-left">
                                    <span class="charticon-wrap">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                            <defs>
                                                <style>
                                                    .cls-1,
                                                    .cls-3 {
                                                        fill: #589dfe;
                                                    }

                                                    .cls-1 {
                                                        stroke: #707070;
                                                    }

                                                    .cls-2 {
                                                        chart_icon: url(#chart_icon);
                                                    }
                                                </style>
                                                <clipPath id="chart_icon">
                                                    <rect id="Rectangle_5734" data-name="Rectangle 5734" class="cls-1" width="24" height="24" transform="translate(13596 5617)"></rect>
                                                </clipPath>
                                            </defs>
                                            <g id="Mask_Group_8" data-name="Mask Group 8" class="cls-2" transform="translate(-13596 -5617)">
                                                <path id="insights_FILL0_wght400_GRAD0_opsz48" class="cls-3" d="M3.786,23.677a1.721,1.721,0,0,1-1.263-.523,1.786,1.786,0,0,1,0-2.526,1.721,1.721,0,0,1,1.263-.523q.128,0,.255.013a2.433,2.433,0,0,1,.332.064l5.1-5.1a2.432,2.432,0,0,1-.064-.332Q9.4,14.62,9.4,14.493a1.786,1.786,0,0,1,3.049-1.263,1.721,1.721,0,0,1,.523,1.263q0,.051-.077.587L15.7,17.886a2.432,2.432,0,0,1,.332-.064q.128-.013.255-.013t.255.013a2.432,2.432,0,0,1,.332.064L20.956,13.8a2.432,2.432,0,0,1-.064-.332q-.013-.128-.013-.255A1.786,1.786,0,1,1,22.665,15q-.128,0-.255-.013a2.432,2.432,0,0,1-.332-.064L18,19.008a2.432,2.432,0,0,1,.064.332q.013.128.013.255a1.786,1.786,0,1,1-3.572,0q0-.128.013-.255a2.432,2.432,0,0,1,.064-.332L11.771,16.2a2.432,2.432,0,0,1-.332.064q-.128.013-.255.013-.051,0-.587-.077L5.5,21.3a2.432,2.432,0,0,1,.064.332q.013.128.013.255a1.786,1.786,0,0,1-1.786,1.786ZM5.062,12.4l-.51-1.123-1.123-.51,1.123-.51.51-1.123.51,1.123,1.123.51-1.123.51Zm11.226-1.3L15.5,9.416l-1.684-.791L15.5,7.834l.791-1.684.791,1.684,1.684.791-1.684.791Z" transform="translate(13594.774 5614.086)"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <div class="media-left">
                                    <h5 class="mb-0">Last 15 Days Orders<a href="javascript:void(0);" id="showhidechart">(View Chart)</a>
                                        <img src="https://d12wf4nrgjmvr4.cloudfront.net/images/chevron_down.svg" alt="chevrondown.svg" class="fa fa-caret-down">
                                    </h5>
                                </div>
                            </div>
                            <div class="card-body show-chart hidden border-top" style="">
                                <div id="order-bar" data-highcharts-chart="0" aria-hidden="false" role="region" aria-label="Chart. Highcharts interactive chart." style="overflow: hidden;">
                                    <div id="highcharts-screen-reader-region-before-0" aria-hidden="false" style="position: relative;">
                                        <div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                            <p>Chart</p>
                                            <div>Bar chart with 15 bars.</div>
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
                                    <div id="highcharts-hfrf7r0-0" dir="ltr" style="position: relative; overflow: hidden; width: 1403px; height: 150px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none; padding: 0px;" class="highcharts-container " aria-hidden="false" tabindex="0">
                                        <div aria-hidden="false" class="highcharts-a11y-proxy-container-before" style="top: 0px; left: 0px; white-space: nowrap; position: absolute;"></div><svg version="1.1" class="highcharts-root" style="font-family: Helvetica, Arial, sans-serif; font-size: 1rem;" xmlns="http://www.w3.org/2000/svg" width="1403" height="150" viewBox="0 0 1403 150" aria-hidden="false" aria-label="Interactive chart">
                                            <desc aria-hidden="true">Created with Highcharts 11.4.8</desc>
                                            <defs aria-hidden="true">
                                                <filter id="highcharts-drop-shadow-0">
                                                    <feDropShadow dx="1" dy="1" flood-color="#000000" flood-opacity="0.75" stdDeviation="2.5"></feDropShadow>
                                                </filter>
                                                <clipPath id="highcharts-hfrf7r0-16-">
                                                    <rect x="0" y="0" width="1352" height="96" fill="none"></rect>
                                                </clipPath>
                                            </defs>
                                            <rect fill="#ffffff" class="highcharts-background" filter="none" x="0" y="0" width="1403" height="150" rx="0" ry="0" aria-hidden="true"></rect>
                                            <rect fill="none" class="highcharts-plot-background" x="41" y="10" width="1352" height="96" filter="none" aria-hidden="true"></rect>
                                            <g class="highcharts-pane-group" data-z-index="0" aria-hidden="true"></g>
                                            <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1" aria-hidden="true">
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 131.5 10 L 131.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 221.5 10 L 221.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 311.5 10 L 311.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 401.5 10 L 401.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 491.5 10 L 491.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 581.5 10 L 581.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 671.5 10 L 671.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 762.5 10 L 762.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 852.5 10 L 852.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 942.5 10 L 942.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 1032.5 10 L 1032.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 1122.5 10 L 1122.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 1212.5 10 L 1212.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 1302.5 10 L 1302.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 1393.5 10 L 1393.5 106" opacity="1"></path>
                                                <path fill="none" stroke="#e6e6e6" stroke-width="0" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 41.5 10 L 41.5 106" opacity="1"></path>
                                            </g>
                                            <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1" aria-hidden="true">
                                                <path fill="none" stroke="#e6e6e6" stroke-width="1" stroke-dasharray="none" data-z-index="1" class="highcharts-grid-line" d="M 41 58.5 L 1393 58.5" opacity="1"></path>
                                            </g>
                                            <rect fill="none" class="highcharts-plot-border" data-z-index="1" stroke="#cccccc" stroke-width="0" x="41" y="10" width="1352" height="96" aria-hidden="true"></rect>
                                            <g class="highcharts-axis highcharts-xaxis" data-z-index="2" aria-hidden="true">
                                                <path fill="none" class="highcharts-axis-line" stroke="#333333" stroke-width="1" data-z-index="7" d="M 41 106.5 L 1393 106.5"></path>
                                            </g>
                                            <g class="highcharts-axis highcharts-yaxis" data-z-index="2" aria-hidden="true">
                                                <path fill="none" class="highcharts-axis-line" stroke="#333333" stroke-width="0" data-z-index="7" d="M 41 10 L 41 106"></path>
                                            </g>
                                            <g class="highcharts-series-group" data-z-index="3" filter="none" aria-hidden="false">
                                                <g class="highcharts-series highcharts-series-0 highcharts-column-series highcharts-color-0 highcharts-tracker" data-z-index="0.1" opacity="1" transform="translate(41,10) scale(1 1)" clip-path="url(#highcharts-hfrf7r0-16-)" aria-hidden="false">
                                                    <path fill="#75CEF1" d="M 26.5 48.5 L 64.5 48.5 A 3 3 0 0 1 64.5 48.5 L 64.5 48.5 A 0 0 0 0 1 64.5 48.5 L 64.5 48.5 A 0 0 0 0 1 26.5 48.5 L 26.5 48.5 A 3 3 0 0 1 26.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="26th Mar, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 116.5 48.5 L 154.5 48.5 A 3 3 0 0 1 154.5 48.5 L 154.5 48.5 A 0 0 0 0 1 154.5 48.5 L 154.5 48.5 A 0 0 0 0 1 116.5 48.5 L 116.5 48.5 A 3 3 0 0 1 116.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="27th Mar, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 206.5 48.5 L 244.5 48.5 A 3 3 0 0 1 244.5 48.5 L 244.5 48.5 A 0 0 0 0 1 244.5 48.5 L 244.5 48.5 A 0 0 0 0 1 206.5 48.5 L 206.5 48.5 A 3 3 0 0 1 206.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="28th Mar, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 296.5 48.5 L 334.5 48.5 A 3 3 0 0 1 334.5 48.5 L 334.5 48.5 A 0 0 0 0 1 334.5 48.5 L 334.5 48.5 A 0 0 0 0 1 296.5 48.5 L 296.5 48.5 A 3 3 0 0 1 296.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="29th Mar, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 386.5 48.5 L 424.5 48.5 A 3 3 0 0 1 424.5 48.5 L 424.5 48.5 A 0 0 0 0 1 424.5 48.5 L 424.5 48.5 A 0 0 0 0 1 386.5 48.5 L 386.5 48.5 A 3 3 0 0 1 386.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="30th Mar, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 477.5 48.5 L 515.5 48.5 A 3 3 0 0 1 515.5 48.5 L 515.5 48.5 A 0 0 0 0 1 515.5 48.5 L 515.5 48.5 A 0 0 0 0 1 477.5 48.5 L 477.5 48.5 A 3 3 0 0 1 477.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="31st Mar, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 567.5 48.5 L 605.5 48.5 A 3 3 0 0 1 605.5 48.5 L 605.5 48.5 A 0 0 0 0 1 605.5 48.5 L 605.5 48.5 A 0 0 0 0 1 567.5 48.5 L 567.5 48.5 A 3 3 0 0 1 567.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="1st Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 657.5 48.5 L 695.5 48.5 A 3 3 0 0 1 695.5 48.5 L 695.5 48.5 A 0 0 0 0 1 695.5 48.5 L 695.5 48.5 A 0 0 0 0 1 657.5 48.5 L 657.5 48.5 A 3 3 0 0 1 657.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="2nd Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 747.5 48.5 L 785.5 48.5 A 3 3 0 0 1 785.5 48.5 L 785.5 48.5 A 0 0 0 0 1 785.5 48.5 L 785.5 48.5 A 0 0 0 0 1 747.5 48.5 L 747.5 48.5 A 3 3 0 0 1 747.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="3rd Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 837.5 48.5 L 875.5 48.5 A 3 3 0 0 1 875.5 48.5 L 875.5 48.5 A 0 0 0 0 1 875.5 48.5 L 875.5 48.5 A 0 0 0 0 1 837.5 48.5 L 837.5 48.5 A 3 3 0 0 1 837.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="4th Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 927.5 48.5 L 965.5 48.5 A 3 3 0 0 1 965.5 48.5 L 965.5 48.5 A 0 0 0 0 1 965.5 48.5 L 965.5 48.5 A 0 0 0 0 1 927.5 48.5 L 927.5 48.5 A 3 3 0 0 1 927.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="5th Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 1017.5 48.5 L 1055.5 48.5 A 3 3 0 0 1 1055.5 48.5 L 1055.5 48.5 A 0 0 0 0 1 1055.5 48.5 L 1055.5 48.5 A 0 0 0 0 1 1017.5 48.5 L 1017.5 48.5 A 3 3 0 0 1 1017.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="6th Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 1108.5 48.5 L 1146.5 48.5 A 3 3 0 0 1 1146.5 48.5 L 1146.5 48.5 A 0 0 0 0 1 1146.5 48.5 L 1146.5 48.5 A 0 0 0 0 1 1108.5 48.5 L 1108.5 48.5 A 3 3 0 0 1 1108.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="7th Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 1198.5 48.5 L 1236.5 48.5 A 3 3 0 0 1 1236.5 48.5 L 1236.5 48.5 A 0 0 0 0 1 1236.5 48.5 L 1236.5 48.5 A 0 0 0 0 1 1198.5 48.5 L 1198.5 48.5 A 3 3 0 0 1 1198.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="8th Apr, 0.  ." style="outline: none;"></path>
                                                    <path fill="#75CEF1" d="M 1288.5 48.5 L 1326.5 48.5 A 3 3 0 0 1 1326.5 48.5 L 1326.5 48.5 A 0 0 0 0 1 1326.5 48.5 L 1326.5 48.5 A 0 0 0 0 1 1288.5 48.5 L 1288.5 48.5 A 3 3 0 0 1 1288.5 48.5 Z" stroke="#ffffff" stroke-width="1" opacity="1" filter="none" class="highcharts-point highcharts-color-0" tabindex="-1" role="img" aria-label="9th Apr, 0.  ." style="outline: none;"></path>
                                                </g>
                                                <g class="highcharts-markers highcharts-series-0 highcharts-column-series highcharts-color-0" data-z-index="0.1" opacity="1" transform="translate(41,10) scale(1 1)" clip-path="none" aria-hidden="true"></g>
                                            </g>
                                            <g class="highcharts-exporting-group" data-z-index="3" aria-hidden="true">
                                                <g class="highcharts-no-tooltip highcharts-button highcharts-contextbutton" stroke-linecap="round" style="cursor: pointer;" transform="translate(1365,10)">
                                                    <title>Chart context menu</title>
                                                    <rect fill="#ffffff" class="highcharts-button-box" x="0.5" y="0.5" width="28" height="28" rx="2" ry="2" stroke="none" stroke-width="1"></rect>
                                                    <path fill="#666666" d="M 8 9.5 L 22 9.5 M 8 14.5 L 22 14.5 M 8 19.5 L 22 19.5" class="highcharts-button-symbol" data-z-index="1" stroke="#666666" stroke-width="3"></path><text x="0" data-z-index="1" y="18.5" style="color: rgb(51, 51, 51); font-size: 0.8em; font-weight: normal; fill: rgb(51, 51, 51);"></text>
                                                </g>
                                            </g><text x="702" text-anchor="middle" class="highcharts-title" data-z-index="4" style="font-size: 1.2em; color: rgb(51, 51, 51); font-weight: bold; fill: rgb(51, 51, 51);" y="25" aria-hidden="true"></text><text x="702" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="24" aria-hidden="true"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color: rgb(102, 102, 102); font-size: 0.8em; fill: rgb(102, 102, 102);" y="147" aria-hidden="true"></text>
                                            <g class="highcharts-data-labels highcharts-series-0 highcharts-column-series highcharts-color-0 highcharts-tracker" data-z-index="6" opacity="1" transform="translate(41,10) scale(1 1)" aria-hidden="true">
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(37,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(127,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(217,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(307,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(397,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(488,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(578,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(668,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(758,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(848,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(938,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(1028,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(1119,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(1209,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                                <g class="highcharts-label highcharts-data-label highcharts-data-label-color-0" data-z-index="1" filter="none" transform="translate(1299,26)"><text x="5" data-z-index="1" y="16" style="color: rgb(102, 102, 102); font-size: 0.7em; font-weight: normal; fill: rgb(102, 102, 102);">
                                                        <tspan class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">0<tspan x="5" dy="0">&ZeroWidthSpace;</tspan>
                                                        </tspan>0
                                                    </text></g>
                                            </g>
                                            <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7" aria-hidden="true"><text x="86.06666666666334" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">26th Mar</text><text x="176.20000000000334" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">27th Mar</text><text x="266.3333333333333" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">28th Mar</text><text x="356.46666666666334" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">29th Mar</text><text x="446.6000000000033" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">30th Mar</text><text x="536.7333333333332" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">31st Mar</text><text x="626.8666666666633" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">1st Apr</text><text x="717.0000000000033" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">2nd Apr</text><text x="807.1333333333333" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">3rd Apr</text><text x="897.2666666666632" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">4th Apr</text><text x="987.4000000000332" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">5th Apr</text><text x="1077.5333333333333" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">6th Apr</text><text x="1167.6666666666333" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">7th Apr</text><text x="1257.8000000000334" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">8th Apr</text><text x="1347.9333333333334" text-anchor="middle" transform="translate(0,0)" style="color: rgb(51, 51, 51); cursor: default; font-size: 0.8em; fill: rgb(51, 51, 51);" y="133" opacity="1">9th Apr</text></g>
                                            <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7" aria-hidden="true"></g>
                                        </svg>
                                        <div aria-hidden="false" class="highcharts-a11y-proxy-container-after" style="top: 0px; left: 0px; white-space: nowrap; position: absolute;">
                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-zoom"></div>
                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-navigator" role="region" aria-label="Axis zoom"></div>
                                            <div class="highcharts-a11y-proxy-group highcharts-a11y-proxy-group-chartMenu"><button class="highcharts-a11y-proxy-element highcharts-no-tooltip" aria-label="View chart menu, Chart" aria-expanded="false" title="Chart context menu" style="border-width: 0px; background-color: transparent; cursor: pointer; outline: none; opacity: 0.001; z-index: 999; overflow: hidden; padding: 0px; margin: 0px; display: block; position: absolute; width: 1px; height: 1px; left: -272px; top: -255px;"></button></div>
                                        </div>
                                        <div class="highcharts-axis-labels highcharts-yaxis-labels" aria-hidden="true" style="position: absolute; left: 0px; top: 0px; opacity: 1;"><span opacity="1" style="position: absolute; font-family: Helvetica, Arial, sans-serif; font-size: 0.8em; white-space: nowrap; margin-left: 0px; margin-top: 0px; color: rgb(51, 51, 51); cursor: default; transform: rotate(0deg); transform-origin: 16px 11px; text-overflow: clip; opacity: 1; left: 10px; top: 52px; visibility: inherit;"><span class="rs-font-family">₹ </span> 0</span></div>
                                    </div>
                                    <div id="highcharts-screen-reader-region-after-0" aria-hidden="false" style="position: relative;">
                                        <div aria-hidden="false" style="position: absolute; width: 1px; height: 1px; overflow: hidden; white-space: nowrap; clip: rect(1px, 1px, 1px, 1px); margin-top: -3px; opacity: 0.01;">
                                            <div id="highcharts-end-of-chart-marker-0" class="highcharts-exit-anchor" tabindex="0" aria-hidden="false">End of interactive chart.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 chart_loader_div px-0" style="display: none;">
                        <div class="card tabs-box-shadow chart-card chart-card-left-border border-0 m-0">
                            <div class="card-title d-flex align-items-center border-bottom-0">
                                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12 px-0">
                                    <span class="charticon-wrap wave-pre-loading"></span>
                                    <h3 class="chart-loader-title wave-pre-loading"></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bar chart Section End -->

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card border-0 mb-0">
                                <!--search bar-->
                                <form name="order_search" id="order_search" method="post" action="">
                                    <div class="clearfix ng-search-bar search_bar_loader_div" style="display: none;">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <div class="wave-pre-loading"></div>
                                            </div>
                                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-12">
                                                <div class="wave-pre-loading"></div>
                                            </div>
                                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-12">
                                                <div class="wave-pre-loading"></div>
                                            </div>
                                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-12">
                                                <div class="wave-pre-loading"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="search_bar_loader_div" style="display: none;">
                                        <div class="search-title-card">
                                            <h6 class="search-title"><span class="expense-loader-list-txt wave-pre-loading"></span></h6>
                                            <a href="javascript:void(0)" class="order-2 dropdown-btm-icon line-height-1"><i class="fas wave-pre-loading"></i></a>
                                        </div>
                                    </div>
                                    <div class="search_bar_div" style="">
                                        <div class="search-title-card">
                                            <h6 class="search-title"><i class="fa fa-search pr-2"></i>Search</h6>
                                            <a href="javascript:void(0)" class="order-2"><i class="fas fa-chevron-down"></i></a>
                                        </div>
                                        <!--search bar-->
                                        <div class="serch-body mob-serch-body">
                                            <div class="ps-searchbar mobile-btn-container">
                                                <!-- Start date and time picker -->
                                                <div class="ps-form-group calendar-icon">
                                                    <label for="OrderStartdate">Start Date</label>
                                                    <input name="data[Order][startdate]" value="9 Apr 2026 02:30:00" class="form-control set-calendar datetime" id="OrderStartdate" autocomplete="off" type="text" readonly="readonly">

                                                </div>

                                                <div class="ps-form-group calendar-icon">
                                                    <label for="OrderEnddate">End Date</label>
                                                    <input name="data[Order][enddate]" value="10 Apr 2026 02:30:00" class="form-control set-calendar datetime" id="OrderEnddate" autocomplete="off" type="text" readonly="readonly">
                                                </div>
                                                <div class="ps-form-group">
                                                    <label class="" for="CustomerName">Customer Name</label>
                                                    <input name="data[Order][customer_name]" value="" class="form-control" maxlength="50" type="text" id="OrderCustomerName">
                                                </div>
                                                <div class="ps-form-group">
                                                    <label class="" for="CustomerPhone">Customer Phone</label>
                                                    <input name="data[Order][customer_phone]" value="" class="form-control" maxlength="20" type="text" id="OrderCustomerPhone">
                                                </div>
                                                <div class="ps-form-group ps-select2-border">
                                                    <label>All Order Type</label>
                                                    <select name="data[Order][order_type]" id="order_type" tabindex="-1" aria-hidden="true" class="select-simple form-control pp-select2 select2-hidden-accessible" data-select2-id="order_type">
                                                        <option value="" data-select2-id="8">All</option>
                                                        <option value="1">Delivery</option>
                                                        <option value="2">Pick Up</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="7" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-order_type-container"><span class="select2-selection__rendered" id="select2-order_type-container" role="textbox" aria-readonly="true" title="All">All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span><span class="pp-textfield-bar"></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <div class="ps-form-group ps-select2-border">
                                                    <label>&nbsp;</label>
                                                    <select name="data[Order][total1]" id="total1" class="select-simple form-control pp-select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" data-select2-id="total1">
                                                        <option value="1" data-select2-id="12">=</option>
                                                        <option value="2">&gt;</option>
                                                        <option value="3">&lt;</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="11" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-total1-container"><span class="select2-selection__rendered" id="select2-total1-container" role="textbox" aria-readonly="true" title="=">=</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span><span class="pp-textfield-bar"></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                </div>
                                                <div class="ps-form-group">
                                                    <label class="" for="CustomerTotal">Grand Total</label>
                                                    <input name="data[Order][total]" value="" class="form-control" maxlength="50" type="text" id="OrderTotal">
                                                </div>

                                                <div class="float-left button-wrapper">
                                                    <button type="submit" value="Search" name="search" class="ps-btn sm-btn primary-btn">Search</button>
                                                    <button class="show_all ps-btn ps-btn sm-btn grey-outline-btn" value="Show All" name="Show All">Show All</button>
                                                </div>

                                                <input type="hidden" name="data[restaurant_id]" value="427275">
                                                <input type="hidden" name="data[current_page_url]" id="current_page_url" value="">
                                            </div>
                                        </div>
                                        <!--end search bar-->
                                    </div>
                                </form>
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
                                <div class="" id="order_grid_div" style="">
                                    <div class="table-responsive grid-loader" style="display:none;">
                                        <div class="col-12 p-0 px-3 mt-2">
                                            <div class="d-flex justify-content-between mt-3">
                                                <div class="wave-pre-loading order-1 py-3">&nbsp;</div>
                                            </div>
                                            <table class="table table-striped table-mc-red ng-table-divided border-0 p-md-1 mb-0 mb-md-2">
                                                <tbody>
                                                    <tr class="sorting-link loader-tr-thead">

                                                    </tr>
                                                    <tr>
                                                        <th class="wave-pre-loading td-loader"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="wave-pre-loading td-loader"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="wave-pre-loading td-loader"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="wave-pre-loading td-loader"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                                                    No Record Found </h5>
                                                <p>
                                                    We could not find what you searched for Try searching again
                                                </p>
                                            </div>
                                        </div><!-- end no table found blank state-->
                                    </div><!--end no data blank state--><input type="hidden" value="https://billing.petpooja.com/orders/advanceordlist/" name="current_url" id="current_url">
                                    <input type="hidden" value="0" name="total_records" id="total_records">

                                    <script>
                                        $(document).ready(function() {
                                            $("#total_sale").text('0');
                                        });
                                    </script>
                                </div><!--end table-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection