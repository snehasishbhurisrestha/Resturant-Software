@extends('layouts.app')
@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">

        <div id="main_grid_header">
            <div class="container-fluid page-head mb-0 py-1 ng-border-bottom">
                <div class="page-sub-header">
                    <div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="ps-breadcrumb breadcrumb page-head-nav">
                                <li class="breadcrumb-item ps-page-item ps-pt7"><a href="https://billing.petpooja.com/users/dashboard/" class="ajax_load_url ps-page-link" data-active="left_dashboard"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="home">
                                                <path id="Vector" d="M10.0002 1.66663L0.833496 10.6558L1.77916 11.5831L2.64384 10.7352V18.3333H8.66265V12.431H11.3377V18.3333H17.3565V10.7352L18.2212 11.5831L19.1668 10.6558L16.019 7.56887V4.56139H14.6815V6.25726L10.0002 1.66663ZM10.0002 3.52132L16.019 9.42357V17.0217H12.6752V11.1194H7.32514V17.0217H3.98135V9.42357L10.0002 3.52132Z" fill="#646464"></path>
                                            </g>
                                        </svg></a></li>
                                <li class="breadcrumb-item ps-page-item"><a href="https://menu.petpooja.com/menus/menu_new/all">Menu</a></li>
                                <li class="breadcrumb-item ps-page-item page-title-breadcrumb">Category Management</li>
                                <li class="ps-page-item breadcrumb-item active"></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex justify-content-end gap-5">
                        <a class="ps-btn sm-btn grey-outline-btn float-right back-btn header-back ajax_load_url my-1" id="cancel" href="https://menu.petpooja.com/menus/menu_new/all" data-active="left_dashboard"><i class="fa fa-angle-left"></i> Back</a>
                        <a class="ps-btn sm-btn grey-outline-btn only-icon-btn float-right back-btn mob-menu-back-btn ajax_load_url m-0" href="https://menu.petpooja.com/menus/menu_new/all" data-active="left_dashboard"><i class="fas fa-long-arrow-alt-left"></i></a>
                    </div>
                </div>

            </div>
            <div class="container-fluid px-0">
                <div class="menu-filter-scroll clearfix mobile-menu new-overlay-open  border-radius-0">
                    <div class="overlay"></div>
                    <div class="horizontal-tabs-buttons clearfix ng-tab-wrap blue-bg-tab my-0 ng-border-bottom">
                        <label for="show-menu" class="show-menu">Items Menu<span><i class="fas fa-chevron-circle-down"></i></span>
                            <div class="lines"></div>
                        </label>
                        <input type="checkbox" id="show-menu">
                        <ul role="tablist" class="nav nav-tabs text-center" id="menu_navigator_grid">
                            <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small d-none ps-custom-pos" title="Close" id="close-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
                                    <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                                </svg>
                            </button>
                            <!--<a id="items_navigator" style="">Items</a>-->
                            <li data-bs-toggle="dropdown" class=" ">
                                <div class="menuitem-dropdown dropdown w-100 ng-dropdown-wrap ps-menu-items-drop psdrop-hover-col">
                                    <div class="dropdown-toggle" type="button">
                                        <a id="items_navigator" style="" class="nav-link">Items
                                            <svg height="12" viewBox="0 0 96 96" fill="#373737">
                                                <title></title>
                                                <path d="M81.8457,25.3876a6.0239,6.0239,0,0,0-8.45.7676L48,56.6257l-25.396-30.47a5.999,5.999,0,1,0-9.2114,7.6879L43.3943,69.8452a5.9969,5.9969,0,0,0,9.2114,0L82.6074,33.8431A6.0076,6.0076,0,0,0,81.8457,25.3876Z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu scrollbar" id="style-thin">
                                        <a class="dropdown-item d-flex switch_menu_drop tagmanagerboxes" data-eventlabel="Base Menu" href="javascript:void(0)" data-id="-1" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-is-migrated="0">
                                            <p class="mb-0">Base Menu</p>
                                        </a>
                                        <a class="dropdown-item d-flex switch_menu_drop tagmanagerboxes" data-eventlabel="Home Delivery" href="javascript:void(0)" data-id="1" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-is-migrated="0">
                                            <p class="mb-0">Home Delivery</p>
                                        </a>
                                        <a class="dropdown-item d-flex switch_menu_drop tagmanagerboxes" data-eventlabel="Parcel" href="javascript:void(0)" data-id="2" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-is-migrated="0">
                                            <p class="mb-0">Parcel</p>
                                        </a>
                                        <a class="dropdown-item d-flex switch_menu_drop tagmanagerboxes" data-eventlabel="Dine In" href="javascript:void(0)" data-id="3" data-ordertype="3" data-mapped-id="929202" data-partner-identifier="G Section" data-partner-restaurant-area-id="929202" data-group-category-id="0" data-is-migrated="0">
                                            <p class="mb-0">Dine In</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class=" active"><a href="https://menu.petpooja.com/items/category_list/" class="nav-link">Categories</a></li>
                            <li class=" "><a href="https://menu.petpooja.com/items/variation_list/" class="nav-link">Variants</a></li>
                            <li class=" "><a href="https://menu.petpooja.com/items/addon_list/" class="nav-link">Addons</a></li>
                            <li class=" "><a href="https://menu.petpooja.com/menus/res_tables_list/" class="nav-link">Tables/Areas</a></li>
                            <li class=" "><a href="https://menu.petpooja.com/items/tax_list/" class="nav-link">Taxes</a></li>
                            <li class=""><a href="https://menu.petpooja.com/items/discount_list/" class="nav-link">Discounts</a></li>
                        </ul>
                    </div>
                </div>
                <form id="switch_menu_new" method="post" action="https://menu.petpooja.com/menus/menu_item_list_new">
                    <input type="hidden" name="data[Item][client_id]" id="client_id_val">
                    <input type="hidden" name="data[Item][mapped_res_id]" id="mapped_res_id_val">
                    <input type="hidden" name="data[Item][client_order_type]" id="client_order_type_val">
                    <input type="hidden" name="data[Item][restaurant_area_id]" id="restaurant_area_id_val">
                    <input type="hidden" name="data[Item][client_identifier]" id="client_identifier_val">
                    <input type="hidden" name="data[Item][group_category_id]" id="group_category_id_val">
                    <input type="hidden" name="data[Item][is_migrated]" id="is_migrated_val">
                </form>
                <script>
                    $(".show-menu").click(function() {
                        $("#menu_navigator_grid").slideDown();
                        $(".overlay").addClass("overlay-open");
                    });
                    $('#close-btn').click(function() {
                        $('#menu_navigator_grid').slideUp();
                        $('#menu_navigator_grid').hide();
                        $(".overlay").removeClass("overlay-open");
                        event.stopPropagation();
                    })
                    $('.overlay').click(function() {
                        $('#menu_navigator_grid').slideUp();
                        $('#menu_navigator_grid').hide();
                        $(".overlay").removeClass("overlay-open");
                        event.stopPropagation();
                    })
                    $(".switch_menu_drop").bind("click", function() {
                        $(".switch_menu_drop").removeClass("active");
                        $(this).addClass("active");
                        $(this).find("input").prop("checked", "checked");

                        var partner_id = $(this).attr("data-id");
                        if (partner_id != -1) {
                            $('#client_id_val').val(partner_id);

                            if ($(this).attr("data-mapped-id")) {
                                var data_mappedid = $(this).attr("data-mapped-id");
                                $('#mapped_res_id_val').val(data_mappedid);

                                var data_order_type = $(this).attr("data-ordertype");
                                $('#client_order_type_val').val(data_order_type);

                                var data_restaurant_area_id = $(this).attr("data-partner-restaurant-area-id");
                                $('#restaurant_area_id_val').val(data_restaurant_area_id);

                                var data_group_category_id = $(this).attr("data-group-category-id");
                                $('#group_category_id_val').val(data_group_category_id);

                                var partner_identifier = $(this).attr("data-partner-identifier");
                                $('#client_identifier_val').val(partner_identifier);

                                var data_is_migrated = $(this).attr("data-is-migrated");
                                $('#is_migrated_val').val(data_is_migrated);
                            } else {
                                if (partner_id > 0 && partner_id <= 3) {
                                    $('#mapped_res_id_val').val(0);
                                    $('#restaurant_area_id_val').val(0);
                                    $('#group_category_id_val').val(0);
                                    $('#client_identifier_val').val('');
                                    $('#client_order_type_val').val('');
                                    $('#is_migrated_val').val(0);
                                }
                            }
                        } else {
                            $('#client_id_val').val(0);
                            $('#mapped_res_id_val').val(0);
                            $('#restaurant_area_id_val').val(0);
                            $('#group_category_id_val').val(0);
                            $('#client_identifier_val').val('');
                            $('#client_order_type_val').val('');
                            $('#is_migrated_val').val(0);
                        }
                        $('#switch_menu_new').submit();
                    });
                </script>
            </div>
        </div>

        <div class="container-fluid ps-full-width-container" id="main_grid">
            <div class="row mx-0">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                    <div class="ps-top-header-button-card">
                        <div class="order-1"></div>
                        <div class="order-2 button-flex">
                            <a class="ps-btn primary-btn sm-btn add-btn-font" id="add_category" href="{{route('items.category.add')}}" onclick="show_add_edit_form();">Add Category</a>
                            <div class="btn-group ng-dropdown-wrap">
                                <a class="ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" id="dropdownMenuBottomRight" data-bs-toggle="dropdown" aria-expanded="true">Action </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('Y');" tabindex="-1" role="menuitem">Active</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('N');" tabindex="-1" role="menuitem">Inactive</a></li>

                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('OnlineOrder','Expose to online orders');" tabindex="-1" role="menuitem">Update Expose to online orders</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('UpdateDinein','Dine In Order Type');" tabindex="-1" role="menuitem">Update Dine In Order Type</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('UpdateDel','Delivery Order Type');" tabindex="-1" role="menuitem">Update Delivery Order Type</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('UpdatePickup','Pickup Order Type');" tabindex="-1" role="menuitem">Update Pick Up Order Type</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('InCaptain','Expose to Captain');" tabindex="-1" role="menuitem">Update Expose to Captain</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="active_inactive('DineQR','Dinein QR');" tabindex="-1" role="menuitem">Update Dinein QR</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="p_category_timings()" tabindex="-1" role="menuitem">Update Timings</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="remove_category_timings()" tabindex="-1" role="menuitem">Remove Timings</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="update_category_images()" tabindex="-1" role="menuitem">Update Images</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="remove_cate_vari_addon('RM');" tabindex="-1" role="menuitem">Remove Category</a></li>
                                </ul>
                            </div>

                            <div class="btn-group category ng-dropdown-wrap">
                                <a class="ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" id="dropdownMenuBottomRight" data-bs-toggle="dropdown" aria-expanded="true"><svg class="mr-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
                                        <defs>
                                            <style>
                                                .cls-51,
                                                .cls-53 {
                                                    fill: #373737;
                                                }

                                                .cls-51 {
                                                    stroke: #707070;
                                                }

                                                .cls-52 {
                                                    clip-path: url(#clip-path55);
                                                }
                                            </style>
                                            <clipPath id="clip-path55">
                                                <rect id="Rectangle_6983" data-name="Rectangle 6983" class="cls-51" width="16" height="16" transform="translate(-18013 -16177)"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="Mask_Group_177" data-name="Mask Group 177" class="cls-52" transform="translate(18013 16177)">
                                            <path id="Union_68" data-name="Union 68" class="cls-53" d="M7.259,11.768a.652.652,0,0,1,.026-.919l.813-.768H5.59a.65.65,0,1,1,0-1.3H8.105l-.818-.768a.65.65,0,1,1,.89-.947l2.008,1.885a.642.642,0,0,1,.205.473s0,0,0,0,0,0,0,0a.648.648,0,0,1-.265.524L8.18,11.795a.651.651,0,0,1-.921-.026Zm-6.609.186A.65.65,0,0,1,0,11.3V.652A.65.65,0,0,1,.651,0H7.785a.653.653,0,0,1,.442.174l1.943,1.8a.653.653,0,0,1,.209.477V6.834a.65.65,0,1,1-1.3,0v-4.1L7.529,1.3H1.3v9.353H4.467a.65.65,0,1,1,0,1.3ZM2.426,8.723a.65.65,0,0,1,0-1.3H4.168a.65.65,0,1,1,0,1.3Zm0-2.521a.65.65,0,0,1,0-1.3H7.448a.65.65,0,0,1,0,1.3Zm0-2.52a.651.651,0,0,1,0-1.3H7.448a.651.651,0,0,1,0,1.3Z" transform="translate(-18010.195 -16174.986)"></path>
                                        </g>
                                    </svg><span class="mobile-display-none">Export/Import</span> </a>
                                <ul id="td_export_excel" class="dropdown-menu">
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="export_csv('https://menu.petpooja.com/items/category_export_csv/all', 1)" tabindex="-1" role="menuitem">Export Category</a></li>
                                    <li class="dropdown-item"><a href="javascript:void(0)" onclick="category_import_box()" tabindex="-1" role="menuitem1">Import Category</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 hidden" id="show-message-div"></div>
            </div>
            <div class="ps-form-card">
                <div class="">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="tab-marg clearfix">
                                <div class="nav-tabing-loader" style="display: none;">
                                    <ul class="content-loader-list nav nav-tabs">
                                        <li role="presentation">
                                            <h3 class="widget-amt-loader wave-pre-loading"></h3>
                                        </li>
                                        <li role="presentation">
                                            <h3 class="widget-amt-loader wave-pre-loading"></h3>
                                        </li>
                                        <li role="presentation">
                                            <h3 class="widget-amt-loader wave-pre-loading"></h3>
                                        </li>
                                        <li role="presentation">
                                            <h3 class="widget-amt-loader wave-pre-loading"></h3>
                                        </li>
                                    </ul>
                                </div>
                                <div class="detail-page-tabing nav-tabing-data" style="">
                                    <!-- Nav tabs -->
                                    <div class="ps-nav-wrapper">
                                        <ul role="tablist" class="nav nav-tabs ps-nav">
                                            <li class="nav-item  "><a href="https://menu.petpooja.com/items/parent_category_list/" class="nav-link ajax_load_url" data-active="left_category_list">Parent Category</a></li>
                                            <li class="nav-item active"><a href="https://menu.petpooja.com/items/category_list/" class="nav-link ajax_load_url" data-active="left_category_list">Category</a></li>

                                            <li class="nav-item "><a href="https://menu.petpooja.com/items/group_list/" class="nav-link ajax_load_url" data-active="left_category_list">Grouping</a></li>
                                            <li class="nav-item "><a href="https://menu.petpooja.com/items/menu_type_list/" class="nav-link ajax_load_url" data-active="left_category_list">Menu Configuration</a></li>
                                            <li class="nav-item "><a href="https://menu.petpooja.com/items/tag_list/" class="nav-link ajax_load_url" data-active="left_tag_list">Tags</a></li>
                                        </ul>
                                    </div>
                                    <!-- Tab panes -->
                                </div>
                            </div>

                            <div class="clearfix">
                                <form name="category_search" id="category_search" method="post" action="">
                                    <div class="clearfix ng-search-bar search_bar_loader_div" style="display: none;">
                                        <div class="row my-2">
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12">
                                                <h3 class="online-form-loader wave-pre-loading"></h3>
                                            </div>
                                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-12">
                                                <h3 class="online-form-loader wave-pre-loading"></h3>
                                            </div>
                                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-12">
                                                <h3 class="online-form-loader wave-pre-loading"></h3>
                                            </div>
                                            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-12">
                                                <h3 class="online-form-loader wave-pre-loading"></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-searchbar mobile-btn-container search_bar_div" style="">
                                        <div class="ps-form-group">
                                            <label class="" for="CategoryName">Category name</label>
                                            <input name="data[Category][name]" value="" class="form-control" maxlength="50" type="text" id="CategoryName">
                                        </div>
                                        <div class="ps-form-group ps-select2-border">
                                            <label class="" for="groupCategory">Group Category</label>
                                            <select class="form-control pp-select2 select2-hidden-accessible" name="group_category" id="group_category" data-select2-id="group_category" tabindex="-1" aria-hidden="true">
                                                <option value="0" selected="selected" data-select2-id="2">All</option>
                                                <option value="299059">Beverage</option>
                                                <option value="295534">Food Menu</option>
                                                <option value="295535">Bar Menu</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-group_category-container"><span class="select2-selection__rendered" id="select2-group_category-container" role="textbox" aria-readonly="true" title="All">All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span><span class="pp-textfield-bar"></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>

                                        <input type="hidden" name="data[restaurant_id]" value="427275">
                                        <input type="hidden" name="data[current_page_url]" id="current_page_url" value="">

                                        <div class="button-wrapper">
                                            <button type="submit" value="Search" name="search" class="ps-btn sm-btn primary-btn">Search</button>
                                            <button class="ps-btn ps-btn sm-btn grey-outline-btn show_all" type="">Show All</button>
                                            <a href="javascript:void(0);" class="ps-btn sm-btn primary-btn" id="update_rank">Update Rank</a>
                                            <a href="javascript:void(0);" class="ps-btn sm-btn primary-btn" style="display: none;" id="save_rank">Save</a>
                                        </div>
                                    </div>
                                    <p class="help-block mx-3 mb-3">
                                        Note: Please arrange category sequence/rank from the category section using import/export sheet. </p>
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
                                <div class="" id="category_grid_div" style="">

                                    <form name="category_list" id="category_list" method="post" action="https://menu.petpooja.com/items/catlist/" class="form_align">
                                        <div class="ps-table-wrapper dataTables_wrapper table-responsive">
                                            <table class="ps-table table">
                                                <thead>
                                                    <tr class="sorting-link">
                                                        <th class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" name="select_rows" class="select_rows" data-tableid="dt_gal">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </th>
                                                        <th class="essential persist table-name-width">
                                                            Name
                                                        </th>
                                                        <th class="essential persist">
                                                            Online Display Name
                                                        </th>
                                                        <th class="essential persist text-center">
                                                            Rank
                                                        </th>
                                                        <th class="essential persist text-center">
                                                            Status
                                                        </th>
                                                        <th class="essential">
                                                            Created
                                                        </th>
                                                        <th class="essential">
                                                            Modified
                                                        </th>
                                                        <th class="essential">Image</th>
                                                        <th class="essential">Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="rank-9408548" class="drag-tr-wrap menu_tr_9408548">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408548]" value="9408548" chk_itmid="9408548">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408548]" value="Dessert">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Dessert <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Dessert</td>
                                                        <td data-title="Rank" data-id="9408548" class="text-center rank_label">3</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408548"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status0" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo0" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo0" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408548');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408548)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408549" class="drag-tr-wrap menu_tr_9408549">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408549]" value="9408549" chk_itmid="9408549">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408549]" value="Add On">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Add On <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Add On</td>
                                                        <td data-title="Rank" data-id="9408549" class="text-center rank_label">7</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408549"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status1" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo1" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo1" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408549');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408549)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408551" class="drag-tr-wrap menu_tr_9408551">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408551]" value="9408551" chk_itmid="9408551">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408551]" value="Continental Main Course">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Continental Main Course <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Continental Main Course</td>
                                                        <td data-title="Rank" data-id="9408551" class="text-center rank_label">28</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408551"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status2" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo2" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo2" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408551');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408551)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408552" class="drag-tr-wrap menu_tr_9408552">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408552]" value="9408552" chk_itmid="9408552">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408552]" value="Asian Main Course">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Asian Main Course <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Asian Main Course</td>
                                                        <td data-title="Rank" data-id="9408552" class="text-center rank_label">45</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408552"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status3" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo3" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo3" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408552');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408552)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408550" class="drag-tr-wrap menu_tr_9408550">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408550]" value="9408550" chk_itmid="9408550">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408550]" value="Indian Main Course">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Indian Main Course <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Indian Main Course</td>
                                                        <td data-title="Rank" data-id="9408550" class="text-center rank_label">52</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408550"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status4" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo4" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo4" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408550');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408550)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408553" class="drag-tr-wrap menu_tr_9408553">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408553]" value="9408553" chk_itmid="9408553">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408553]" value="Sushi Rolls">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Sushi Rolls <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Sushi Rolls</td>
                                                        <td data-title="Rank" data-id="9408553" class="text-center rank_label">73</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408553"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status5" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo5" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo5" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408553');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408553)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408554" class="drag-tr-wrap menu_tr_9408554">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408554]" value="9408554" chk_itmid="9408554">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408554]" value="From The Pizza Oven">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            From The Pizza Oven <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">From The Pizza Oven</td>
                                                        <td data-title="Rank" data-id="9408554" class="text-center rank_label">82</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408554"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status6" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo6" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo6" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408554');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408554)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408555" class="drag-tr-wrap menu_tr_9408555">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408555]" value="9408555" chk_itmid="9408555">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408555]" value="Indian Small Bites">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Indian Small Bites <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Indian Small Bites</td>
                                                        <td data-title="Rank" data-id="9408555" class="text-center rank_label">92</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408555"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status7" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo7" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo7" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408555');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408555)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408556" class="drag-tr-wrap menu_tr_9408556">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408556]" value="9408556" chk_itmid="9408556">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408556]" value="Continental Small Bites">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Continental Small Bites <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Continental Small Bites</td>
                                                        <td data-title="Rank" data-id="9408556" class="text-center rank_label">98</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408556"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status8" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo8" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo8" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408556');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408556)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408557" class="drag-tr-wrap menu_tr_9408557">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408557]" value="9408557" chk_itmid="9408557">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408557]" value="Asian Small Bites">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Asian Small Bites <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Asian Small Bites</td>
                                                        <td data-title="Rank" data-id="9408557" class="text-center rank_label">117</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408557"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status9" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo9" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo9" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408557');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408557)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408558" class="drag-tr-wrap menu_tr_9408558">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408558]" value="9408558" chk_itmid="9408558">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408558]" value="From The Tandoor">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            From The Tandoor <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">From The Tandoor</td>
                                                        <td data-title="Rank" data-id="9408558" class="text-center rank_label">132</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408558"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status10" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo10" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo10" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408558');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408558)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408559" class="drag-tr-wrap menu_tr_9408559">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408559]" value="9408559" chk_itmid="9408559">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408559]" value="Soup">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Soup <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Soup</td>
                                                        <td data-title="Rank" data-id="9408559" class="text-center rank_label">141</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408559"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status11" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo11" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo11" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408559');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408559)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408560" class="drag-tr-wrap menu_tr_9408560">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408560]" value="9408560" chk_itmid="9408560">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408560]" value="Salad">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Salad <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Salad</td>
                                                        <td data-title="Rank" data-id="9408560" class="text-center rank_label">147</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408560"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status12" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo12" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo12" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408560');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408560)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408561" class="drag-tr-wrap menu_tr_9408561">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408561]" value="9408561" chk_itmid="9408561">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408561]" value="Mocktails">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Mocktails <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Mocktails</td>
                                                        <td data-title="Rank" data-id="9408561" class="text-center rank_label">157</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408561"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status13" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo13" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo13" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408561');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408561)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408563" class="drag-tr-wrap menu_tr_9408563">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408563]" value="9408563" chk_itmid="9408563">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408563]" value="Shooters">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Shooters <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Shooters</td>
                                                        <td data-title="Rank" data-id="9408563" class="text-center rank_label">178</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408563"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status14" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo14" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo14" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408563');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408563)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408562" class="drag-tr-wrap menu_tr_9408562">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408562]" value="9408562" chk_itmid="9408562">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408562]" value="Beverages">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Beverages <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Beverages</td>
                                                        <td data-title="Rank" data-id="9408562" class="text-center rank_label">189</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408562"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status15" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo15" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo15" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408562');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408562)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408564" class="drag-tr-wrap menu_tr_9408564">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408564]" value="9408564" chk_itmid="9408564">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408564]" value="Cocktail">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Cocktail <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Cocktail</td>
                                                        <td data-title="Rank" data-id="9408564" class="text-center rank_label">217</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408564"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status16" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo16" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo16" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408564');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408564)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408565" class="drag-tr-wrap menu_tr_9408565">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408565]" value="9408565" chk_itmid="9408565">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408565]" value="Apperitifs">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Apperitifs <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Apperitifs</td>
                                                        <td data-title="Rank" data-id="9408565" class="text-center rank_label">222</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408565"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status17" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo17" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo17" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408565');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408565)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408566" class="drag-tr-wrap menu_tr_9408566">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408566]" value="9408566" chk_itmid="9408566">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408566]" value="Liquer">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Liquer <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Liquer</td>
                                                        <td data-title="Rank" data-id="9408566" class="text-center rank_label">226</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408566"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status18" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo18" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo18" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408566');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408566)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408567" class="drag-tr-wrap menu_tr_9408567">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408567]" value="9408567" chk_itmid="9408567">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408567]" value="Red Wine">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Red Wine <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Red Wine</td>
                                                        <td data-title="Rank" data-id="9408567" class="text-center rank_label">232</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408567"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status19" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo19" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo19" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408567');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408567)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408568" class="drag-tr-wrap menu_tr_9408568">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408568]" value="9408568" chk_itmid="9408568">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408568]" value="White Wine">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            White Wine <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">White Wine</td>
                                                        <td data-title="Rank" data-id="9408568" class="text-center rank_label">236</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408568"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status20" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo20" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo20" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408568');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408568)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408569" class="drag-tr-wrap menu_tr_9408569">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408569]" value="9408569" chk_itmid="9408569">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408569]" value="Rose Wine">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Rose Wine <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Rose Wine</td>
                                                        <td data-title="Rank" data-id="9408569" class="text-center rank_label">239</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408569"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status21" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo21" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo21" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408569');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408569)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408570" class="drag-tr-wrap menu_tr_9408570">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408570]" value="9408570" chk_itmid="9408570">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408570]" value="Sparking &amp; Champagne">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Sparking &amp; Champagne <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Sparking &amp; Champagne</td>
                                                        <td data-title="Rank" data-id="9408570" class="text-center rank_label">242</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408570"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status22" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo22" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo22" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408570');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408570)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408571" class="drag-tr-wrap menu_tr_9408571">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408571]" value="9408571" chk_itmid="9408571">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408571]" value="Tequila">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Tequila <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Tequila</td>
                                                        <td data-title="Rank" data-id="9408571" class="text-center rank_label">245</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408571"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status23" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo23" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo23" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408571');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408571)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408572" class="drag-tr-wrap menu_tr_9408572">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408572]" value="9408572" chk_itmid="9408572">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408572]" value="Cognac &amp; Brandy">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Cognac &amp; Brandy <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Cognac &amp; Brandy</td>
                                                        <td data-title="Rank" data-id="9408572" class="text-center rank_label">249</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408572"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status24" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo24" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo24" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408572');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408572)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408573" class="drag-tr-wrap menu_tr_9408573">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408573]" value="9408573" chk_itmid="9408573">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408573]" value="Gin">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Gin <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Gin</td>
                                                        <td data-title="Rank" data-id="9408573" class="text-center rank_label">261</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408573"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status25" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo25" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo25" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408573');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408573)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408574" class="drag-tr-wrap menu_tr_9408574">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408574]" value="9408574" chk_itmid="9408574">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408574]" value="Inhouse Gin &amp; Tonic">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Inhouse Gin &amp; Tonic <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Inhouse Gin &amp; Tonic</td>
                                                        <td data-title="Rank" data-id="9408574" class="text-center rank_label">266</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408574"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status26" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo26" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo26" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408574');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408574)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408575" class="drag-tr-wrap menu_tr_9408575">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408575]" value="9408575" chk_itmid="9408575">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408575]" value="Vodka">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Vodka <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Vodka</td>
                                                        <td data-title="Rank" data-id="9408575" class="text-center rank_label">274</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408575"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status27" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo27" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo27" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408575');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408575)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408576" class="drag-tr-wrap menu_tr_9408576">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408576]" value="9408576" chk_itmid="9408576">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408576]" value="Beer On Taps">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Beer On Taps <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Beer On Taps</td>
                                                        <td data-title="Rank" data-id="9408576" class="text-center rank_label">294</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408576"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status28" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo28" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo28" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408576');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408576)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408577" class="drag-tr-wrap menu_tr_9408577">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408577]" value="9408577" chk_itmid="9408577">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408577]" value="Bottle Beer">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Bottle Beer <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Bottle Beer</td>
                                                        <td data-title="Rank" data-id="9408577" class="text-center rank_label">303</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408577"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status29" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo29" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo29" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408577');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408577)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408578" class="drag-tr-wrap menu_tr_9408578">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408578]" value="9408578" chk_itmid="9408578">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408578]" value="Singlemalt">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Singlemalt <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Singlemalt</td>
                                                        <td data-title="Rank" data-id="9408578" class="text-center rank_label">311</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408578"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status30" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo30" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo30" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408578');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408578)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408579" class="drag-tr-wrap menu_tr_9408579">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408579]" value="9408579" chk_itmid="9408579">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408579]" value="Bourbon, Irish &amp; Tennesse">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Bourbon, Irish &amp; Tennesse <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Bourbon, Irish &amp; Tennesse</td>
                                                        <td data-title="Rank" data-id="9408579" class="text-center rank_label">315</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408579"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status31" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo31" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo31" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408579');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408579)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408580" class="drag-tr-wrap menu_tr_9408580">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408580]" value="9408580" chk_itmid="9408580">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408580]" value="Whiskey Scotch">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Whiskey Scotch <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Whiskey Scotch</td>
                                                        <td data-title="Rank" data-id="9408580" class="text-center rank_label">325</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408580"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status32" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo32" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo32" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408580');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408580)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9408581" class="drag-tr-wrap menu_tr_9408581">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9408581]" value="9408581" chk_itmid="9408581">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9408581]" value="Rum">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            Rum <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">Rum</td>
                                                        <td data-title="Rank" data-id="9408581" class="text-center rank_label">330</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">17 Feb 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9408581"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status33" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo33" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo33" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9408581');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9408581)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9542612" class="drag-tr-wrap menu_tr_9542612">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9542612]" value="9542612" chk_itmid="9542612">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9542612]" value="11 party course">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            11 party course <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name">11 party course</td>
                                                        <td data-title="Rank" data-id="9542612" class="text-center rank_label">331</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">10 Mar 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9542612"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status34" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo34" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo34" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9542612');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9542612)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr id="rank-9542779" class="drag-tr-wrap menu_tr_9542779">
                                                        <td class="ps-checkbox-group" width="1%">
                                                            <label class="ps-checkbox-container no-text">
                                                                <input type="checkbox" class="row_sel" name="data[row_sel][9542779]" value="9542779" chk_itmid="9542779">
                                                                <span class="ps-checkmark"> </span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" class="row_sel" name="data[cat_name][9542779]" value="11 PARTY BAR MENU">
                                                        <td class="text-nowrap text-bold" data-title="Name">
                                                            11 PARTY BAR MENU <br>
                                                            <font size="1" class="help-block"></font>
                                                        </td>
                                                        <td data-title="Online Display Name"></td>
                                                        <td data-title="Rank" data-id="9542779" class="text-center rank_label">332</td>
                                                        <td class="text-center text-nowrap" data-title="Status"><span class="text-nowrap ps-label sm-label success-label">Active</span></td>


                                                        <td class="text-nowrap text-bold" data-title="Created">10 Mar 2026 </td>
                                                        <td class="text-nowrap text-bold" data-title="Modified">10 Mar 2026 </td>
                                                        <td class="action-btn-flex" data-title="Image">
                                                            <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                    <div class="btn-file vertical-align-bottom cat_img_upload_btn iconBtn " data-item-id="9542779"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H19C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19V15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            <path d="M17 8L12 3M12 3L7 8M12 3L12 15" stroke="#646464" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></div>
                                                                </div>
                                                                <span id="gpupload_msg_status35" class="gpupload_msg_status"></span>
                                                                <div class="p-2">
                                                                    <ul class="upload-image-text" id="image_preview_main_ui_logo35" style="margin:0px;">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <span id="gppicture_error_logo35" class="error gppicture_error_logo" style="display: none;"></span>
                                                        </td>
                                                        <td class="action-btn-flex" data-title="Actions">
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" onclick="show_add_edit_form('no', '9542779');" id="edit" data-bs-toggle="tooltip" data-tooltip="Edit" data-html="true" class="iconBtn table-actions">
                                                                    <span class="edit-square-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></span>
                                                                </a>

                                                                <a id="show_change" data-tooltip="Show changes" class="iconBtn" onclick="show_changes(9542779)" href="javascript:void(0);">
                                                                    <span class="book-line-icon order-detail table-actions"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                            <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                            <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                        </svg></span>
                                                                </a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer bottom-pagination-sticky ps-table-footer">
                                            <div class="showing-records relative">
                                                <p>
                                                    Showing 1 to 36 of 36 records </p>
                                            </div>
                                            <div class="ps-pagination" style="display: none;">
                                                <ul class="pagination float-right">
                                                </ul>
                                            </div>
                                        </div>

                                        <input type="hidden" name="data[action]" id="action">
                                        <input type="hidden" name="data[sortable_position]" id="sortable_position">
                                        <input type="hidden" name="data[cur_rest]" id="cur_rest" value="427275">
                                    </form>
                                    <style>
                                        .img-success {
                                            background-color: rgba(46, 204, 70, 0.2) !important;
                                        }
                                    </style>
                                    <script type="text/javascript">
                                        $(document).off('click', '.show_schedule');
                                        $(document).on('click', '.show_schedule', function() {
                                            var category_id = $(this).attr('data-catid');
                                            show_timeschedule('Category', category_id);
                                        });

                                        function show_changes(id, logs_from = 0) {
                                            $.fancybox.open({
                                                afterShow: function() {
                                                    if ($.trim($(".fancybox-slide").html()) == "9") {
                                                        window.location.reload(true);
                                                    }
                                                },
                                                src: site_url + 'menus/item_changes/' + id,
                                                type: "ajax",
                                                ajax: {
                                                    settings: {
                                                        cache: false,
                                                        type: "POST",
                                                        data: {
                                                            'current_restaurant': $('#cur_rest').val(),
                                                            'logs_of': logs_from,
                                                            'module': 'categories'
                                                        }
                                                    }
                                                }
                                            });
                                        }

                                        $(document).ready(function() {
                                            $('#update_rank').off('click');
                                            $('#update_rank').on('click', function() {
                                                $('.rank_label').each(function(indx, element) {
                                                    let value = $(element).text();
                                                    let id = $(element).attr('data-id');
                                                    var input = $('<input type="text" class="text-center numberonly" maxlength="5" style="border-color:var(--clr-dark4)" data-id="' + id + '" value="' + value + '" name="category_rank[]" />');
                                                    $(this).text('').append(input);
                                                    $(this).attr('style', 'width:10%');
                                                });

                                                $('#save_rank').show();
                                                $(this).hide();

                                                $('.numberonly').bind('keyup paste keydown', function() {
                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                });
                                            });

                                            $('.cat_img_upload_btn').on('click', function() {
                                                $.fancybox.open({
                                                    afterShow: function() {
                                                        if ($.trim($(".fancybox-content").text()) == "9" || $.trim($(".fancybox-inner").html()) == "9") {
                                                            location.reload();
                                                            return false;
                                                        }
                                                    },
                                                    afterClose: function() {},
                                                    src: site_url + 'menus/category_image_edit_popup/' + $(this).attr('data-item-id'),
                                                    type: "ajax",
                                                    ajax: {
                                                        settings: {
                                                            cache: false,
                                                            data: {
                                                                fancybox: true
                                                            }
                                                        }
                                                    },
                                                    helpers: {
                                                        overlay: {
                                                            locked: false
                                                        }
                                                    },
                                                });
                                            });
                                        });
                                    </script>
                                    <style>
                                        input:focus {
                                            outline: none;
                                        }
                                    </style>
                                    <input type="hidden" value="https://menu.petpooja.com/items/catlist/" name="current_url" id="current_url">
                                    <input type="hidden" value="36" name="total_records" id="total_records">
                                    <script type="text/javascript" src="https://menu.petpooja.com/structure_new/js/pagination.1754915729.js"></script>
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