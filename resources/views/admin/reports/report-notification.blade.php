@extends('layouts.app')

@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">
        <div class="container-fluid ps-full-width-container" id="main_grid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-right report-notification">
                    <div class="ps-top-header-button-card">
                        <div class="order-1 text-left">
                            <h5 class="mb-2 mb-md-0">Report Notification</h5>
                        </div>
                        <div class="order-2 button-flex">
                            <a class="ps-btn primary-btn sm-btn add-btn-font" id="add_notification" href="javascript:void(0);" onclick="show_add_edit_form();">Add Report Notification</a>
                            <div class="btn-group ng-dropdown-wrap ml-2">
                                <a class="ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" id="dropdownMenuBottomRight" data-bs-toggle="dropdown" aria-expanded="true">Action</a>
                                <ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item" role="presentation"><a href="javascript:void(0)" onclick="active_inactive('N');" tabindex="-1" role="menuitem">Inactive</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden" id="show-message-div"></div>
            </div>
            <div class="ps-form-card">
                <div class="">


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="">
                                <form name="report_notification_search" id="report_notification_search" method="post" action="" class="hidden">
                                    <div class="ps-searchbar mobile-btn-container mt-0 border-bottom-0 ng-rounded-0">
                                        <input type="hidden" name="data[restaurant_id]" value="427275">
                                        <input type="hidden" name="data[current_page_url]" id="current_page_url" value="">
                                        <div class="button-wrapper">
                                            <button type="submit" value="Search" name="search" class="ps-btn sm-btn primary-btn">Search</button>
                                            <button class="ps-btn sm-btn grey-outline-btn ml-2 show_all" type="button">Show All</button>
                                        </div>
                                    </div>
                                </form>
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
                                <div class="table-responsive" id="report_notification_grid_div" style="">
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
                                    </div><!--end no data blank state--><input type="hidden" value="https://billing.petpooja.com/custom_reports/report_noti/" name="current_url" id="current_url">
                                    <input type="hidden" value="0" name="total_records" id="total_records">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection