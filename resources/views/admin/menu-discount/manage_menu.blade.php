@extends('layouts.app')
@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">

        <div class="container-fluid page-head mb-0 ng-border-bottom ">
            <div class="page-sub-header">
                <div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="ps-breadcrumb breadcrumb page-head-nav">
                            <li class="breadcrumb-item ps-page-item ps-pt7">
                                <a class="ps-page-link" href="https://billing.petpooja.com/users/dashboard/">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="home">
                                            <path id="Vector" d="M10.0002 1.66663L0.833496 10.6558L1.77916 11.5831L2.64384 10.7352V18.3333H8.66265V12.431H11.3377V18.3333H17.3565V10.7352L18.2212 11.5831L19.1668 10.6558L16.019 7.56887V4.56139H14.6815V6.25726L10.0002 1.66663ZM10.0002 3.52132L16.019 9.42357V17.0217H12.6752V11.1194H7.32514V17.0217H3.98135V9.42357L10.0002 3.52132Z" fill="#646464"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                            <li class="breadcrumb-item ps-page-item"><a class="menu-breadcrums-title" href="https://menu.petpooja.com/menus/menu_management">Menu Management</a></li>
                            <li class="breadcrumb-item ps-page-item page-title-breadcrumb"><a class="menu-breadcrums-title" href="https://menu.petpooja.com/menus/menu_new/all">All In One Menu</a></li>
                            <li class="ps-page-item breadcrumb-item active"></li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex justify-content-end gap-5">
                    <a class="ps-btn sm-btn grey-outline-btn float-right back-btn header-back" href="https://menu.petpooja.com/menus/menu_management"><i class="fa fa-angle-left"></i> Back</a>
                    <a class="ps-btn sm-btn grey-outline-btn only-icon-btn back-btn mob-menu-back-btn" href="https://menu.petpooja.com/menus/menu_management"><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0"> <!-- div container start for navigator menu-->
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
                                    <a class="dropdown-item d-flex switch_menu_drop tagmanagerboxes" data-eventlabel="Base Menu" href="{{route('categories.manage.menu.list')}}" data-id="-1" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-is-migrated="0">
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
                        <li class=" "><a href="{{route('items.category.list')}}" class="nav-link">Categories</a></li>
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
            <div class="container-fluid ps-full-width-container">
                <div class="page-card-body">
                    <div class="ps-menu-and-dis-card ">
                        <div class="">
                            <a class="card-link all_menu_li tagmanagerboxes menu-new-card-new" href="{{route('categories.manage.menu.list')}}" data-eventlabel="Base Menu" data-id="-1" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-ismigrated="0">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="card-icon-avg">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.22407 12H7.97925C7.29178 12 6.73444 11.4427 6.73444 10.7552V9.80423C6.73444 8.09834 7.69826 6.53884 9.22407 5.77593V12ZM9.22407 12V15.7344M12.9585 10.7552V15.7344M12.9585 10.7552C13.9898 10.7552 14.8257 9.64054 14.8257 8.26556C14.8257 6.89058 13.9898 5.77593 12.9585 5.77593C11.9273 5.77593 11.0913 6.89058 11.0913 8.26556C11.0913 9.64054 11.9273 10.7552 12.9585 10.7552ZM21.6722 22H6.73444C4.67195 22 3 20.2866 3 18.2241V2H17.9378V18.2241M21.6722 22C19.6097 22 17.9378 20.2866 17.9378 18.2241M21.6722 22V18.2241H17.9378M6.73444 18.2241H14.2033" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5>
                                                    Base Menu</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a class="card-link all_menu_li tagmanagerboxes menu-new-card-new" href="javascript:void(0)" data-eventlabel="Home Delivery" data-id="1" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-ismigrated="0">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="card-icon-avg">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.96888 11.14H5.8195C3.98618 11.14 2.5 12.6262 2.5 14.4595V17.364H10.7988M9.96888 11.14V15.3606C9.96888 16.112 10.2674 16.8327 10.7988 17.364M9.96888 11.14H2.5V10.3101C2.5 9.39347 3.24311 8.65035 4.15975 8.65035H9.96888C10.6564 8.65035 11.2137 9.20766 11.2137 9.89517C11.2137 10.5827 10.6564 11.14 9.96888 11.14ZM10.7988 17.364H14.2012M16.3133 17.364C16.2905 17.4993 16.2759 17.6373 16.2759 17.779C16.2759 19.154 17.3906 20.2686 18.7656 20.2686C20.1406 20.2686 21.2552 19.154 21.2552 17.779C21.2552 17.6373 21.2406 17.4993 21.2179 17.364M3.78216 17.364C3.75942 17.4993 3.74481 17.6373 3.74481 17.779C3.74481 19.154 4.85946 20.2686 6.23444 20.2686C7.60946 20.2686 8.72407 19.154 8.72407 17.779C8.72407 17.6373 8.7095 17.4993 8.68676 17.364M19.1805 9.06529H15.861M19.1805 9.06529V14.0445C19.1805 15.8779 17.6943 17.364 15.861 17.364M19.1805 9.06529C19.868 9.06529 20.4253 8.50799 20.4253 7.82048C20.4253 7.13297 19.868 6.57567 19.1805 6.57567H15.861M15.861 9.06529V14.6785C15.861 15.8158 15.2185 16.8555 14.2012 17.364M15.861 9.06529V6.57567M14.2012 17.364H15.861M15.861 17.364H22.5V16.9491C22.5 15.1158 21.0138 13.6296 19.1805 13.6296M15.861 6.57567V5.74579C15.861 5.05828 15.3037 4.50098 14.6162 4.50098H13.3714M2.5 14.8744H4.57469" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5>
                                                    Home Delivery</h5>
                                                <!-- <div class="">
                                                    <div class="btn card-item-btn report-view-btn online_partner_li m-0 p-0 border-0 march-btn-menu">Tap to Manage </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a class="card-link all_menu_li tagmanagerboxes menu-new-card-new" href="javascript:void(0)" data-eventlabel="Parcel" data-id="2" data-ordertype="" data-mapped-id="" data-partner-identifier="" data-partner-restaurant-area-id="" data-group-category-id="" data-ismigrated="0">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="card-icon-avg">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.2927 5.98535H18.0184C17.6154 5.98535 17.2376 5.8776 16.9122 5.68937C16.2509 5.30685 15.806 4.59185 15.806 3.77296C15.806 2.5511 16.7965 1.56057 18.0184 1.56057C19.2402 1.56057 20.2308 2.5511 20.2308 3.77296V4.65791C20.2308 7.75526 18.4609 11.3393 18.4609 15.1004V22.003M18.0626 1.56055H4.25733C3.03547 1.56055 2.04494 2.55108 2.04494 3.77294C2.04494 4.59183 2.48985 5.30683 3.15114 5.68935C3.47654 5.87758 3.85437 5.98533 4.25733 5.98533H7.62016M4.1164 5.89683C3.6379 9.17117 2.00073 11.6048 2.00073 15.1004V20.6756C2.00073 21.6531 2.79312 22.4455 3.77064 22.4455H18.3724L21.3799 19.8781C21.7739 19.5418 22.0007 19.0499 22.0007 18.532V12.0915C22.0007 7.48975 20.0981 3.06497 20.0981 3.06497M13.3724 1.56057C12.1505 1.56057 11.16 2.5511 11.16 3.77296V9.52517H7.62016V3.77296C7.62016 2.5511 8.6107 1.56057 9.83255 1.56057" stroke="black" stroke-width="1.5" stroke-miterlimit="10"></path>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5>
                                                    Parcel</h5>
                                                <!-- <div class="">
                                                    <div class="btn card-item-btn report-view-btn online_partner_li m-0 p-0 border-0 march-btn-menu">Tap to Manage </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <a class="card-link all_menu_li tagmanagerboxes menu-new-card-new" href="javascript:void(0)" data-eventlabel="Dine In" data-id="3" data-ordertype="3" data-mapped-id="929202" data-partner-identifier="G Section" data-partner-restaurant-area-id="929202" data-group-category-id="0" data-ismigrated="0">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="card-icon-avg">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20.814 13.7332L21.9763 7.81281C22.1092 7.13821 21.67 6.48365 20.9954 6.35083C20.3209 6.21805 19.6664 6.65713 19.5336 7.33161L18.7667 11.2436H17.2512C16.2169 11.2436 15.3783 12.0821 15.3783 13.1165V13.7332M20.814 13.7332H15.3783M20.814 13.7332L21.2289 17.6751M15.3783 13.7332L14.9634 17.6751M3.18602 13.7332L2.0237 7.81281C1.89084 7.13821 2.33001 6.48365 3.00461 6.35083C3.67913 6.21805 4.33357 6.65713 4.46643 7.33161L5.23332 11.2436H6.74879C7.78315 11.2436 8.62169 12.0821 8.62169 13.1165V13.7332M3.18602 13.7332H8.62169M3.18602 13.7332L2.77109 17.6751M8.62169 13.7332L9.03664 17.6751M8.18258 8.50472H15.8174M12 8.50472V17.6748" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <div class="media-body">
                                                <h5>
                                                    Dine In</h5>
                                                <!-- <div class="">
                                                    <div class="btn card-item-btn report-view-btn online_partner_li m-0 p-0 border-0 march-btn-menu">Tap to Manage </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection