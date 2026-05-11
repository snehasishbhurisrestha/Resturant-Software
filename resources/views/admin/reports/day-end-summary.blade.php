@extends('layouts.app')

@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">
        <div class="container-fluid ps-full-width-container" id="main_grid">
            <div class="row order-list export-btn-fixed-scroll">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-right">
                    <div class="ps-top-header-button-card">
                        <div class="order-1 text-left">
                            <h5 class="mb-2 mb-md-0">Day End Summary</h5>
                        </div>
                        <div class="order-2 button-flex">
                            <div class="btn-group ng-dropdown-wrap">
                                <a class="ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a class="dropdown-item" href="javascript:void(0)" onclick="remove();" tabindex="-1" role="menuitem">Remove</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-form-card">
                <div class="">
                    <div class="row" id="list">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden" id="show-message-div"></div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="">
                                <form name="day_end_search" id="day_end_search" method="post" action="">
                                    <div class="search_bar_loader_div" style="display: none;">
                                        <div class="search-title-card">
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
                                        <div class="serch-body mob-serch-body">
                                            <div class="ps-searchbar mobile-btn-container">
                                                <div class="ps-form-group calendar-icon">
                                                    <label for="start_date">Start Date</label>
                                                    <input name="data[RestaurantDailyStatastic][start_date]" value="11 Mar 2026 00:00:00" class="form-control set-calendar date" id="dataStartDate" autocomplete="off" type="text" readonly="readonly">
                                                </div>
                                                <div class="ps-form-group calendar-icon">
                                                    <label for="end_date">End Date</label>
                                                    <input name="data[RestaurantDailyStatastic][end_date]" value="10 Apr 2026 00:00:00" class="form-control set-calendar date" id="dataEndDate" autocomplete="off" type="text" readonly="readonly">
                                                </div>
                                                <input type="hidden" name="data[restaurant_id]" value="427275">
                                                <input type="hidden" name="data[current_page_url]" id="current_page_url" value="">
                                                <div class="button-wrapper">
                                                    <button type="submit" value="Search" name="search" class="ps-btn sm-btn primary-btn">Search</button>
                                                    <button class="show_all ps-btn ps-btn sm-btn grey-outline-btn" type="button">Show All</button>
                                                </div>
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
                                <div class="" id="day_end_grid_div" style="">
                                    <form name="day_end_list" id="day_end_list" method="post" action="https://billing.petpooja.com/orders/dayendsummary/" class="form_align">
                                        <div class="ps-table-wrapper dataTables_wrapper form-inline padding-zero table-responsive">
                                            <table class="ps-table table">
                                                <thead>
                                                    <tr>
                                                        <th class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_gal">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </th>
                                                        <th class="essential persist">Created Date</th>
                                                        <th class="essential">No. of Orders</th>
                                                        <th class="essential">Total&nbsp;(<span class="currency-icon rs-font-family">₹</span>)</th>
                                                        <th class="essential">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42671201]" value="42671201">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">9 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">27</td>
                                                        <td class="text-nowrap" data-title="Total">82418</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42671201');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42607466]" value="42607466">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">8 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">24</td>
                                                        <td class="text-nowrap" data-title="Total">54183</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42607466');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42543692]" value="42543692">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">7 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">28</td>
                                                        <td class="text-nowrap" data-title="Total">67403</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42543692');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42479814]" value="42479814">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">6 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">10</td>
                                                        <td class="text-nowrap" data-title="Total">22793</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42479814');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42415861]" value="42415861">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">5 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">54</td>
                                                        <td class="text-nowrap" data-title="Total">186038</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42415861');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42351738]" value="42351738">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">4 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">41</td>
                                                        <td class="text-nowrap" data-title="Total">123017</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42351738');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42287298]" value="42287298">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">3 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">30</td>
                                                        <td class="text-nowrap" data-title="Total">88565</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42287298');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42217335]" value="42217335">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">2 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">13</td>
                                                        <td class="text-nowrap" data-title="Total">42438</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42217335');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42153616]" value="42153616">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">1 Apr 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">20</td>
                                                        <td class="text-nowrap" data-title="Total">50834</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42153616');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42089565]" value="42089565">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">31 Mar 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">18</td>
                                                        <td class="text-nowrap" data-title="Total">51627</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42089565');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][42025800]" value="42025800">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">30 Mar 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">9</td>
                                                        <td class="text-nowrap" data-title="Total">23497</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('42025800');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][41961853]" value="41961853">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">29 Mar 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">33</td>
                                                        <td class="text-nowrap" data-title="Total">91173</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('41961853');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][41898006]" value="41898006">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">28 Mar 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">56</td>
                                                        <td class="text-nowrap" data-title="Total">177592</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('41898006');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][41834084]" value="41834084">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">27 Mar 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">27</td>
                                                        <td class="text-nowrap" data-title="Total">65101</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('41834084');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="ps-checkbox-group">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][41770229]" value="41770229">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <td class="text-nowrap text-bold" data-title="Created Date">26 Mar 2026</td>
                                                        <td class="text-nowrap text-bold" data-title="No. of Order">7</td>
                                                        <td class="text-nowrap" data-title="Total">13574</td>
                                                        <td class="action-btn-flex" data-title="Action">
                                                            <a class="table-actions last-tootltip iconBtn" href="javascript:void(0);" data-bs-toggle="tooltip" data-tooltip="View day end summary" data-html="true" onclick="day_end_view('41770229');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer bottom-pagination-sticky ps-table-footer">
                                            <div class="showing-records relative">
                                                <p>
                                                    Showing 1 to 15 of 30 records </p>
                                            </div>
                                            <div class="ps-pagination">
                                                <ul class="pagination float-right">
                                                    <li class="active page-item"><a>1</a></li>
                                                    <li class="page-item"><a href="/day_end/dayenddetail/page:2">2</a></li>
                                                    <li class="page-item"><a href="/day_end/dayenddetail/page:2" rel="next">Next</a></li>
                                                    <li class="page-item"><a href="/day_end/dayenddetail/page:2" rel="last">Last</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <input type="hidden" value="427275" name="restaurant_id" id="restaurant_id">
                                        <input type="hidden" value="" name="action" id="action">
                                    </form>
                                    <input type="hidden" value="https://billing.petpooja.com/day_end/dayenddetail/" name="current_url" id="current_url">
                                    <input type="hidden" value="30" name="total_records" id="total_records">
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