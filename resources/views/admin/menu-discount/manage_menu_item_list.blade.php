@extends('layouts.app')
@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">

        <div id="menu_breadcum">
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
                            <li data-bs-toggle="dropdown" class="active ">
                                <div class="menuitem-dropdown dropdown w-100 ng-dropdown-wrap ps-menu-items-drop psdrop-hover-col">
                                    <div class="dropdown-toggle" type="button">
                                        <a id="items_navigator" style="" class="nav-link">Items
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class=" "><a href="{{route('items.category.list')}}" class="nav-link">Categories</a></li>
                            <li class=" "><a href="" class="nav-link">Variants</a></li>
                            <li class=" "><a href="" class="nav-link">Addons</a></li>
                            <li class=" "><a href="" class="nav-link">Tables/Areas</a></li>
                            <li class=" "><a href="" class="nav-link">Taxes</a></li>
                            <li class=""><a href="" class="nav-link">Discounts</a></li>
                        </ul>
                    </div>
                </div>
                <form id="switch_menu_new" method="post" action="">
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

            <div class=" menu-grid-container mt-0" id="otherOutlet">
                <div class="container-fluid  ps-full-width-container">
                    <div class="row">



                        <div class="col-12">
                            <div class="menu-item-flex">
                                <div id="menu_scrollspy" class="order-1 " style="height: 695px;">
                                    <div class="sidenav menu_scrollspy_nav ng-rounded-10 real-menu ps-nav-wrapper " id="mySidenav">
                                        <div class="sidebar-top-header">
                                            <div class="ps-form-group ps-select2-border  " id="categoryContent">
                                                <h6 class=" pointer">Categories</h6>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="help-block mb-0">
                                                    <span>Hide empty categories</span>
                                                </div>
                                                <div class="ps-toggle-group">
                                                    <div class="ps-toggle mb-0 no-text pl-3 deactivate-switch">
                                                        <input type="checkbox" name="r_e_cat_chk" id="r_e_cat_chk" class="custom-control-input wi-20 modify" value="1"> <label class="custom-control-label font-italic" for="r_e_cat_chk"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ps-form-group ps-select2-border base-manu pb-15">
                                                <select name="data[Group][group_category_id]" class="dropdown-menu category-select2 select2-hidden-accessible" aria-hidden="true" onchange="getCategoryItems(this.value)" aria-labelledby="dropdownMenuButton" id="GroupGroupCategoryId" tabindex="-1" data-select2-id="GroupGroupCategoryId" style="">
                                                    <option value="all" selected="selected" data-select2-id="8">All</option>
                                                    <option value="299059">Beverage</option>
                                                    <option value="295534">Food Menu</option>
                                                    <option value="295535">Bar Menu</option>
                                                    <option value="other">Others</option>
                                                </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="7" style="width: 320px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-GroupGroupCategoryId-container"><span class="select2-selection__rendered" id="select2-GroupGroupCategoryId-container" role="textbox" aria-readonly="true" title="All">All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <ul class="custom_scroll ps-vertical-nav pt-0 border-radius-0 ui-sortable" id="menu_grid_sortable">
                                            <li class="nav-item menu-mobile-cat-sticky row align-items-center m-0 d-md-none" style="">
                                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 p-0">
                                                    <a class="nav-link " href="javascript:void(0);">
                                                        <p>Select Category</p>
                                                    </a>
                                                </div>
                                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0">
                                                    <div class="close-sidebar-cat-menu">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="15" viewBox="0 0 20 20">
                                                            <defs>
                                                                <clipPath id="clip-path66">
                                                                    <rect id="Rectangle_927" data-name="Rectangle 927" width="20" height="20" transform="translate(-2446.63 5209.74)" fill="#373737"></rect>
                                                                </clipPath>
                                                                <clipPath id="clip-path-2">
                                                                    <rect id="Rectangle_925" data-name="Rectangle 925" width="15.886" height="15.834" fill="#373737"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="Mask_Group_11" data-name="Mask Group 11" transform="translate(2446.63 -5209.74)" clip-path="url(#clip-path66)">
                                                                <g id="Group_407" data-name="Group 407" transform="translate(-2444.736 5211.986)">
                                                                    <g id="Group_405" data-name="Group 405" clip-path="url(#clip-path-2)">
                                                                        <path id="Path_17915" data-name="Path 17915" d="M15.7,14.753a.633.633,0,1,1-.893.9L7.943,8.81,1.08,15.649a.633.633,0,1,1-.893-.9l6.86-6.836L.187,1.082a.633.633,0,1,1,.893-.9L7.943,7.024,14.807.185a.633.633,0,1,1,.893.9L8.84,7.917Z" transform="translate(0 0)" fill="#373737"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block li-active" id="rank-9408548" data-id="9408548" data-name="Dessert">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag active ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408548, '')">
                                                        <p>Dessert</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408549" data-id="9408549" data-name="Add On">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408549, '')">
                                                        <p>Add On</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408551" data-id="9408551" data-name="Continental Main Course">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408551, '')">
                                                        <p>Continental Main Course</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408552" data-id="9408552" data-name="Asian Main Course">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408552, '')">
                                                        <p>Asian Main Course</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408550" data-id="9408550" data-name="Indian Main Course">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408550, '')">
                                                        <p>Indian Main Course</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408553" data-id="9408553" data-name="Sushi Rolls">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408553, '')">
                                                        <p>Sushi Rolls</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408554" data-id="9408554" data-name="From The Pizza Oven">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408554, '')">
                                                        <p>From The Pizza Oven</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408555" data-id="9408555" data-name="Indian Small Bites">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408555, '')">
                                                        <p>Indian Small Bites</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408556" data-id="9408556" data-name="Continental Small Bites">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408556, '')">
                                                        <p>Continental Small Bites</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408557" data-id="9408557" data-name="Asian Small Bites">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408557, '')">
                                                        <p>Asian Small Bites</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408558" data-id="9408558" data-name="From The Tandoor">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408558, '')">
                                                        <p>From The Tandoor</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408559" data-id="9408559" data-name="Soup">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408559, '')">
                                                        <p>Soup</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408560" data-id="9408560" data-name="Salad">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408560, '')">
                                                        <p>Salad</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408561" data-id="9408561" data-name="Mocktails">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408561, '')">
                                                        <p>Mocktails</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408563" data-id="9408563" data-name="Shooters">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408563, '')">
                                                        <p>Shooters</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408562" data-id="9408562" data-name="Beverages">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408562, '')">
                                                        <p>Beverages</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408564" data-id="9408564" data-name="Cocktail">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408564, '')">
                                                        <p>Cocktail</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408565" data-id="9408565" data-name="Apperitifs">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408565, '')">
                                                        <p>Apperitifs</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408566" data-id="9408566" data-name="Liquer">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408566, '')">
                                                        <p>Liquer</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408567" data-id="9408567" data-name="Red Wine">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408567, '')">
                                                        <p>Red Wine</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408568" data-id="9408568" data-name="White Wine">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408568, '')">
                                                        <p>White Wine</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408569" data-id="9408569" data-name="Rose Wine">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408569, '')">
                                                        <p>Rose Wine</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408570" data-id="9408570" data-name="Sparking &amp; Champagne">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408570, '')">
                                                        <p>Sparking &amp; Champagne</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408571" data-id="9408571" data-name="Tequila">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408571, '')">
                                                        <p>Tequila</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408572" data-id="9408572" data-name="Cognac &amp; Brandy">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408572, '')">
                                                        <p>Cognac &amp; Brandy</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408573" data-id="9408573" data-name="Gin">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408573, '')">
                                                        <p>Gin</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408574" data-id="9408574" data-name="Inhouse Gin &amp; Tonic">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408574, '')">
                                                        <p>Inhouse Gin &amp; Tonic</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408575" data-id="9408575" data-name="Vodka">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408575, '')">
                                                        <p>Vodka</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408576" data-id="9408576" data-name="Beer On Taps">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408576, '')">
                                                        <p>Beer On Taps</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408577" data-id="9408577" data-name="Bottle Beer">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408577, '')">
                                                        <p>Bottle Beer</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408578" data-id="9408578" data-name="Singlemalt">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408578, '')">
                                                        <p>Singlemalt</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408579" data-id="9408579" data-name="Bourbon, Irish &amp; Tennesse">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408579, '')">
                                                        <p>Bourbon, Irish &amp; Tennesse</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408580" data-id="9408580" data-name="Whiskey Scotch">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408580, '')">
                                                        <p>Whiskey Scotch</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9408581" data-id="9408581" data-name="Rum">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9408581, '')">
                                                        <p>Rum</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9542612" data-id="9542612" data-name="11 party course">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9542612, '')">
                                                        <p>11 party course</p>
                                                    </a></div>
                                            </li>
                                            <li class="nav-item cate_rank align-items-center listrs rankupdate-icon d-block" id="rank-9542779" data-id="9542779" data-name="11 PARTY BAR MENU">
                                                <div class=""><a data-scroll="" class="nav-link moving-section handle_drag ui-sortable-handle" href="javascript:void(0);" onclick="category_wise_item(9542779, '')">
                                                        <p>11 PARTY BAR MENU</p>
                                                    </a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" menu-right-sidebar ml-0 order-2" id="menu-category-card">
                                    <div id="main" class="menu-category-right-card">
                                        <div class="row mx-0">

                                        </div>
                                        <div class="alert my-3 alert-danger menu-alert-wrap d-none" style=""> <!-- Manish use of this block? -->
                                            <h6 class="d-flex align-items-center gap-7 error-text-title">
                                                <span class=""><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_15_4717)">
                                                            <path d="M12.5 7.49996L7.50001 12.5M7.50001 7.49996L12.5 12.5M18.3333 9.99996C18.3333 14.6023 14.6024 18.3333 10 18.3333C5.39763 18.3333 1.66667 14.6023 1.66667 9.99996C1.66667 5.39759 5.39763 1.66663 10 1.66663C14.6024 1.66663 18.3333 5.39759 18.3333 9.99996Z" stroke="#D92D20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_15_4717">
                                                                <rect width="20" height="20" fill="white"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg></span>
                                                Tax Configuration Error: Item Pending Order-wise Tax Setup
                                            </h6>
                                            <div class="ps-table-wrapper ps-alert-table-wrap table-responsive my-3">
                                                <table class="alert-table-inner">
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-600">SGST</td>
                                                            <td>2.5</td>
                                                            <td>Percentage</td>
                                                            <td>Forward Tax</td>
                                                            <td class="text-center"><span class="ps-label lg-label success-label">Active</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-600">CGST</td>
                                                            <td>2.5</td>
                                                            <td>Fixed</td>
                                                            <td>Backward Tax</td>
                                                            <td class="text-center"><span class="ps-label lg-label success-label">Active</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="ng-card-wrap listing-ul-card-wrap my-3">
                                                <div class="ng-card-body">
                                                    <p class="mb-2 pb-1 gap-15">The below item(s) found without tax. <span class="fw-600">(10 Items)</span></p>
                                                    <p class="mb-0 fw-600">
                                                        <span class="category-list-item">Trst, Pav, Spiced Almonds, Keto Roasted Almonds, Paneer Khichdi, Trst, Pav, Spiced Almonds, Keto Roasted Almonds, Paneer Khichdi, Spiced Almonds, Keto Roasted Almonds, Paneer Khichdi, Trst,</span><span>+150</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="ng-card-wrap listing-ul-card-wrap my-3">
                                                <div class="ng-card-body">
                                                    <p class="mb-2 gap-15"><span class="fw-600">Delicious Pizza →</span> price,Item Price cannot be 0 if pricing combination is empty</p>
                                                    <p class="mb-2 gap-15"><span class="fw-600">Tasty Pizza →</span> price,Item Price cannot be 0 if pricing combination is empty</p>
                                                    <p class="mb-2 gap-15"><span class="fw-600">Mouthwatering Pizza →</span> price,Item Price cannot be 0 if pricing combination is empty</p>
                                                    <p class="mb-2 gap-15"><span class="fw-600">Savory Pizza →</span> price,Item Price cannot be 0 if pricing combination is empty</p>

                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="vgi-help-text">Please assign a valid tax group to this item so it can be shown correctly on Zomato.</span>
                                                <span class="vgi-help-text d-none">Please update the price of each item to be more than ₹0 so it can appear on Zomato.</span>
                                                <span class="vgi-help-text d-none">Go to Marketplace → Zomato Configuration → GST Status → Mark as Unregistered</span>
                                                <a class="ps-btn sm-btn primary-btn ml-2" href="javascript:void(0);">Update Tax</a>
                                            </div>
                                        </div>
                                        <div class="alert my-3 alert-success menu-alert-wrap d-none" style="">
                                            <h6 class="d-flex align-items-center gap-7 success-text-title">
                                                <span class=""><svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <g clip-path="url(#clip0_39_1372)">
                                                            <path d="M6.24984 9.99996L8.74984 12.5L13.7498 7.49996M18.3332 9.99996C18.3332 14.6023 14.6022 18.3333 9.99984 18.3333C5.39746 18.3333 1.6665 14.6023 1.6665 9.99996C1.6665 5.39759 5.39746 1.66663 9.99984 1.66663C14.6022 1.66663 18.3332 5.39759 18.3332 9.99996Z" stroke="#039855" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_39_1372">
                                                                <rect width="20" height="20" fill="white"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg> </span>
                                                Tax Configured : Itemwise
                                            </h6>
                                            <div class="ps-table-wrapper ps-alert-table-wrap table-responsive my-3">
                                                <table class="alert-table-inner">
                                                    <tbody>
                                                        <tr>
                                                            <td class="fw-600">SGST</td>
                                                            <td>2.5</td>
                                                            <td>Percentage</td>
                                                            <td>Forward Tax</td>
                                                            <td class="text-center"><span class="ps-label lg-label success-label">Active</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fw-600">CGST</td>
                                                            <td>2.5</td>
                                                            <td>Fixed</td>
                                                            <td>Backward Tax</td>
                                                            <td class="text-center"><span class="ps-label lg-label success-label">Active</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="vgi-help-text">Please check the applicable taxes for Non-Restaurant and MRP items before you push the menu online.</span>
                                                <a class="ps-btn sm-btn primary-btn ml-2" href="javascript:void(0);">Push Menu</a>
                                            </div>
                                        </div>
                                        <div class="alert my-3 alert-danger warning-alert-wrap menu-alert-wrap d-none" style="">
                                            <h6 class="d-flex align-items-center gap-7 warning-text-title">
                                                <span class=""><svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <g clip-path="url(#clip0_39_2124)">
                                                            <path d="M10.0001 6.66666V9.99999M10.0001 13.3333H10.0084M18.3334 9.99999C18.3334 14.6024 14.6025 18.3333 10.0001 18.3333C5.39771 18.3333 1.66675 14.6024 1.66675 9.99999C1.66675 5.39762 5.39771 1.66666 10.0001 1.66666C14.6025 1.66666 18.3334 5.39762 18.3334 9.99999Z" stroke="#D9A541" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_39_2124">
                                                                <rect width="20" height="20" fill="white"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg></span>
                                                Swiggy menu validation : Mismatched Veg/Non-Veg tags
                                            </h6>
                                            <p class="warning-sub-text-title">Some items are Mismatch found between item content and food type tag</p>
                                            <div class="d-flex align-items-center gap-12 cat-item-listing-wrap pr-15">
                                                <div class="order-1 col-lg-6 col-md-6 col-12">
                                                    <p>Non-Veg Items Marked as Veg <span class="fw-600">(3 Categories)</span></p>
                                                    <p class="mb-0 fw-600 listing-p">
                                                        <span class="list-item">Chicken Biryani, Fish Curry, Mutton Rogan Josh, Chicken Biryani, Fish Curry, Mutton Rogan Josh</span>+50
                                                    </p>
                                                </div>
                                                <div class="order-2 col-lg-6 col-md-6 col-12">
                                                    <p>Veg Items Marked as Non-Veg <span class="fw-600">(2 Items)</span></p>
                                                    <p class="mb-0 fw-600 listing-p">
                                                        <span class="list-item">Veg Pulao, Aloo Gobi, Veg Pulao, Aloo Gobi,Veg Pulao, Aloo Gobi, Veg Pulao, Aloo Gobi, Veg Pulao, Aloo Gobi</span>+50
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-3">
                                                <span class="vgi-help-text">Please update the tag to Veg so customers are not confused..</span>
                                                <div class="">
                                                    <a class="ps-btn sm-btn grey-outline-btn" href="javascript:void(0);">Update Items</a>
                                                    <a class="ps-btn sm-btn primary-btn ml-2" href="javascript:void(0);">Proceed Anyway</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="list">
                                            <script>
                                                var NON_VEG_ITEMS = ["chicken", "murgh", "mutton", "non veg", "non-veg", "fish", "prawn", "lobster", "crab", "gosht", "zinga", "bacon", "bait", "bakra", "bangda", "banguda", "barishali", "basa", "beef", "bheja", "bhekti", "bhetki", "bistec", "bombil", "bombli", "boti", "brisket", "buntut", "calamari", "calbasu", "carmieen", "carnitas", "carnivora", "carp", "catfish", "catla", "chiken", "chingri", "chooza", "chop", "chops", "churrasco", "chuza", "clam", "cod", "crayfish", "dolmades", "dory", "duck", "eel", "galinha", "garoupa", "ghost", "grouper", "gurda", "gyro", "haggis", "ham", "herring", "hilsa", "ilish", "kaldereta", "kaleji", "kalmi", "karimeen", "katla", "keftedes", "kekda", "kingfish", "kokoretsi", "kombdi", "kukkad", "lamb", "lavraki", "loin", "maas", "machhi", "mackerel", "maguro", "mahi", "mandeli", "meat", "meatball", "meshwi", "murg", "murghi", "murgir", "musallam", "mussallam", "mussel", "muttbiriyani", "muttton", "nalli", "nonveg", "nonvegetarian", "octopus", "ostrich", "oyster", "paplet", "pastrami", "paya", "pescado", "pollo", "pomfret", "pork", "prawans", "prawns", "prosciutto", "quail", "raan", "rawas", "rawon", "rendang", "ribs", "rohu", "rongpuri", "salami", "salmon", "scallions", "scallop", "sea_food", "seabass", "seafood", "shorshe", "shrimp", "sirloin", "snapper", "solefish", "sorse", "squid", "steak", "surmai", "tangdi", "tangri", "tawook", "tenderloin", "tilapia", "trout", "tuna", "turkey", "unagi", "urchin", "veal", "venison", "whitebait", "wings", "khichda", "blt", "pepperoni", "murga", "irachi", "kozi", "jhinga", "leg", "kallumakkaya", "mussels", "wagyu", "pigeon", "brain", "deer", "kozhi", "sausage", "tenderlion", "boneless", "buff", "naati Koli", "fillet", "liver", "chorizo", "natukodi", "natu", "natuKoti", "bangada", "machh", "maach", "john dory", "nethilly", "nethili", "naatukozhi", "proscuitto", "rabbit", "teetar", "kharoda", "kharode", "kharora", "vaankozhi", "Goose", "bombayduck", "yellowtail", "mombar", "bommidala", "bommidaala", "bommidaila", "endu chepala", "meen", "katapona", "kata pona", "kodi kura", "macher", "maacher", "machher", "pabda", "pheasant", "anchovy", "machli", "patanga", "frog", "chepala", "mangsho", "ghosht", "telapia", "macchi", "gushtaba", "makanek", "kouju", "vanjaram", "soujouk", "modso", "haleem", "erachi", "nihari", "natholi", "bangude", "macchli", "chemmeen", "chemeen", "tangadi", "parshe", "winglet", "boothai", "sardine", "nattu", "kibbeh", "rogan", "buthai", "breast", "kekada", "khedaka", "alfam", "angus", "kobe", "thigh", "rooster", "yakitori", "kolambi", "broiler", "ladyfish", "shellfish", "cuttlefish", "swordfish", "belanji", "bhangda", "bhuthai", "bondas", "chonak", "croaker", "goat", "bakri", "hilsha", "kaada", "koddai", "kokkar", "koduvai", "koonthal", "mackarel", "shark", "spleen", "chembally", "royyala", "royyalla", "barrah", "batair", "beckty", "betki", "chest", "camel", "carnivorous", "chingudi", "chital", "dajaj", "eeral", "sheep", "shoulder", "illish", "jheenga", "kalamari", "kamju", "kanava", "karandi", "koramenu", "laham", "lahem", "parindey", "marwai", "rajugari", "samundari", "seabream", "shimpli", "sirlion", "tangari", "tisrya", "poultry", "cattle", "non-veg"];
                                                var EGG_ITEMS = ["egg", "anda"];
                                                var REST_TYPE = 'R';
                                                var is_gst_tag_mandatory = '1';
                                            </script>
                                            <div id="filter_result" class="container-fluid px-0">
                                                <div class="base-menu-button-card  ">
                                                    <div id="msgkiosk">
                                                        <div class="alert alert-success mt-10 mb-2" id="msgkioskfolder" style="display:none;"></div>
                                                    </div>
                                                    <div class="alert alert-success menu-alert-wrap my-3" id="msg" style="display:none;"></div>
                                                    <div id="displayMessage" class="alert alert-success menu-alert-wrap my-3" style="display:none;"></div>
                                                    <div id="displayMessagePcCount" class="alert menu-alert-wrap alert-success my-3" style="display:none;"></div>
                                                    <div class=" ps-top-header-button-card justify-content-between base-menu-row flex-wrap">
                                                        <div class="order-1 button-flex py-1">
                                                            <div class="d-inline-block mobile-display-block">
                                                                <button id="side-cat-wrap" class="ps-btn ps-btn only-icon-btn sm-btn grey-outline-btn openNav search-me-new menu-category-icon open material align-middle" data-tooltip="Hide categories">
                                                                    <i class="back-arrow-icon material-icons"><svg class="btn-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></i>
                                                                    <i class="material-icons menu-icon-top"><svg class="btn-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M3 12H21M3 6H21M3 18H21" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg></i>
                                                                </button>
                                                            </div> <a class="ps-btn ps-btn sm-btn grey-outline-btn search-me d-inline-flex"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#373737">
                                                                    <defs>
                                                                        <clipPath id="search-icon">
                                                                            <rect id="Rectangle_5739" data-name="Rectangle 5739" width="20" height="20" transform="translate(-3687 8534)" fill="#373737"></rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                    <g id="Mask_Group_27" data-name="Mask Group 27" transform="translate(3687 -8534)" clip-path="url(#search-icon)">
                                                                        <g id="Group_6536" data-name="Group 6536" transform="translate(-4220.299 8134.5)">
                                                                            <path id="Union_19" data-name="Union 19" d="M46.3-2498.131l-3.86-5.044a5.476,5.476,0,0,1-2.642.675,5.5,5.5,0,0,1-5.5-5.5,5.5,5.5,0,0,1,5.5-5.5,5.5,5.5,0,0,1,5.5,5.5,5.484,5.484,0,0,1-1.653,3.931l3.846,5.027a.75.75,0,0,1-.139,1.051.752.752,0,0,1-.455.155A.751.751,0,0,1,46.3-2498.131ZM35.8-2508a4,4,0,0,0,4,4,4,4,0,0,0,4-4,4,4,0,0,0-4-4A4.005,4.005,0,0,0,35.8-2508Z" transform="translate(502.701 2915.5)" fill="#373737"></path>
                                                                        </g>
                                                                    </g>
                                                                </svg> Search</a>
                                                            <div class="d-inline-block ng-dropdown-wrap">
                                                                <a class="search_action_list_menu ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" data-bs-toggle="dropdown">Action </a>
                                                                <ul class="dropdown-menu action-new-2" id="search_action_list">
                                                                    <li class="dropdown-item"><input type="text" placeholder="Search" autocomplete="off" id="action_search_input" autofocus="off" onkeyup="action_filter_function('action_search_input','search_action_list')"></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('Y');">Available</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('OnlineOrder','Online Availability');">Update Online Availability</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive_areas_new('427275');">Active/Inactive Areas</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('V');">Mark As Veg</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('NV');">Mark As Non Veg</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('EI');">Mark As Egg Item</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="remove_item();">Remove Items</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('FavItem',' Favorite from Item ');">Update Favorite Item</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('IgnrTax','Ignore Tax');">Update Ignore Tax</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('IgnrDis','Ignore Discount');">Update Ignore Discount</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('IgnrPckg','Ignore Packing Charge (Online)');">Update Ignore Packing Charge (Online)</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('SwgRecomd','Swiggy recommended');">Update Swiggy recommended</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('DSP');">Disable Swiggy POP Items</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('InCaptain','Expose in Captain');">Update in Captain</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('QntPop','Quantity Popup');">Update Quantity Popup</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('InKiosk','Expose in Kiosk');">Update in Kiosk</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('DineQR','Dine In QR');">Update Dinein QR</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('PickupQR','Pick Up QR');">Update Pickup QR</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('MOOS');">Mark Out of Stock</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('MIS');">Mark In Stock</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('MDND');">Mark Do Not Track</a></li>
                                                                    <li class="dropdown-item d-flex"> <a href="javascript:void(0);" id="mrp_fancy_box">Update MRP tag</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="remove_item_nutrition();">Remove Nutrition Data</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" data-current_restaurant="427275" onclick="return remove_item_image()" id="remove_item_image">Remove Image(s) </a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="active_inactive('RS');">Remove Serve(s)</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" data-current_restaurant="427275" onclick="open_action_popup('UpdateDinein','Dine In Order Type');" id="UpdateDinein">Update Dine In Order Type</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" data-current_restaurant="427275" onclick="open_action_popup('UpdateDel','Delivery Order Type');" id="UpdateDel">Update Delivery Order Type</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" data-current_restaurant="427275" onclick="open_action_popup('UpdatePickup','Pickup Order Type');" id="UpdatePickup">Update Pick Up Order Type</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" data-current_restaurant="427275" onclick="open_action_popup('UpdateGoodsService','Update service/goods Tag');" id="UpdateGoodsService">Update service/goods tag</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" data-current_restaurant="427275" onclick="open_action_popup('SelfRecipeItem','Create Self Item Recipe');" id="SelfRecipeItem">Create Self Item Recipe</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_update_image_popup(427275);">Update Image</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" id="ZomatoTag" data-current_restaurant="427275" onclick="open_action_popup('ZomatoTag','Zomato Tags');">Apply Zomato Tags</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" aria-expanded="true" onclick="assign_addongroups_popup(427275)" data-tooltip="Assign Addon Group(s)">Assign Addon Group(s)</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" onclick="open_action_popup('OpenItem','Open Item');">Update Open Item</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" data-current_restaurant="427275" onclick="return update_item_timings()" id="update_item_timings">Update Item Timings </a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" data-c_res="427275" onclick="return remove_item_variations()" id="remove_item_variations">Remove Variation(s)</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="d-inline-block ng-dropdown-wrap"><a class="ps-btn sm-btn grey-outline-btn add-btn-dropdown dropdown-toggle dropdown" data-bs-toggle="dropdown" aria-expanded="true"> Quick Actions </a>
                                                                <ul class="dropdown-menu action-quick-new" id="quick_action_list">
                                                                    <li class="dropdown-item"><input type="text" placeholder="Search" id="quick_action_input" autocomplete="off" autofocus="off" onkeyup="action_filter_function('quick_action_input','quick_action_list')"></li>
                                                                    <li class="dropdown-item"><a target="_blank" class="ext_disabled generate_barcode">Generate Barcode</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" onclick="return upload_menu_item(427275,1)" aria-expanded="true" data-bs-toggle="tooltip" id="update_menu_popup">Update Base Menu</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" aria-expanded="true" id="update_item_rank" onclick="update_item_rank(427275)">Update Item Rank/Order</a></li>
                                                                    <li class="dropdown-item"><a href="https://menu.petpooja.com/admins/switch_itemareawise_price/427275/1">Area-wise bulk sheet</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" aria-expanded="true" id="update_item_packingcharge" onclick="update_item_packingcharge(427275)">Update Item Packing Charge</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" id="nutrition_import_menu" data-client-id="" data-client-identifier="" data-mapped-res-id="">Update Nutrition Data</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" id="restore_records_menu">Recently Deleted</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" aria-expanded="true" id="update_kiosk_item_price_status" onclick="update_kiosk_item_price_status(427275)" data-tooltip="Update Kiosk Item Price/Status">Update Kiosk Item Price/Status</a></li>
                                                                    <li class="dropdown-item"><a href="https://menu.petpooja.com/items_preference/instructions/427275" aria-expanded="true">Preparation Steps <span class="ps-label sm-label read-label ml-2">New</span> </a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" class="" id="item_increase_reduce_price_popup" update_flag="1" onclick="item_increase_reduce_price_popup(427275,0)">Increase/Reduce Price</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" aria-expanded="true" onclick="download_base_menu_popup(427275)" data-tooltip="Download Base Menu">Download Base Menu [Backup]</a></li>
                                                                    <li class="dropdown-item"><a href="javascript:void(0);" aria-expanded="true" onclick="exp_imp_item_variation_sheet(427275)" data-tooltip="Replace Item Variation(s)">Replace Item Variation(s)</a></li>
                                                                </ul>
                                                            </div><button type="button" data-tooltip="Publish Offline Orders Images" class="ps-btn sm-btn only-icon-btn grey-outline-btn publishkiosk"><svg class="btn-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.4995 13.5002L20.9995 3.00017M10.6271 13.8282L13.2552 20.5862C13.4867 21.1816 13.6025 21.4793 13.7693 21.5662C13.9139 21.6415 14.0862 21.6416 14.2308 21.5664C14.3977 21.4797 14.5139 21.1822 14.7461 20.5871L21.3364 3.69937C21.5461 3.16219 21.6509 2.8936 21.5935 2.72197C21.5437 2.57292 21.4268 2.45596 21.2777 2.40616C21.1061 2.34883 20.8375 2.45364 20.3003 2.66327L3.41258 9.25361C2.8175 9.48584 2.51997 9.60195 2.43326 9.76886C2.35809 9.91354 2.35819 10.0858 2.43353 10.2304C2.52043 10.3972 2.81811 10.513 3.41345 10.7445L10.1715 13.3726C10.2923 13.4196 10.3527 13.4431 10.4036 13.4794C10.4487 13.5115 10.4881 13.551 10.5203 13.5961C10.5566 13.647 10.5801 13.7074 10.6271 13.8282Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg></button><a class="ps-btn primary-btn sm-btn mr-1" id="save_all_item">Save</a>
                                                        </div>
                                                        <div class="order-2 py-1">
                                                            <div class="">
                                                                <div class="milist-col-right-wrap button-flex">
                                                                    <div class="rankwiselist top-0">
                                                                        <input type="checkbox" name="rankwiselist" class="rankwiselist-checkbox" id="sortbyrankswitch">
                                                                        <label class="rankwiselist-label mb-0" for="sortbyrankswitch">
                                                                            <span class="rankwiselist-inner"></span>
                                                                            <span class="rankwiselist-switch"></span>
                                                                        </label>
                                                                    </div><a class="ps-btn primary-btn sm-btn ps-tooltip" href="{{route('categories.add.menu')}}" id="add_item" data-tooltip="Add item(s) to Base menu"><svg width="20" height="20" viewBox="0 0 20 20">
                                                                            <defs>
                                                                                <clipPath id="clip-path">
                                                                                    <rect id="Rectangle_6124" data-name="Rectangle 6124" width="20" height="20" transform="translate(-3.49 -3.48)" fill="none"></rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                            <g id="add_3" transform="translate(3.49 3.48)" clip-path="url(#clip-path)">
                                                                                <g id="Path_19861" data-name="Path 19861">
                                                                                    <path id="Path_19863" data-name="Path 19863" d="M973.73,544.08a.66.66,0,0,1-.65.66h-5.21V550a.66.66,0,1,1-1.31,0v-5.21h-5.21a.66.66,0,0,1,0-1.31h5.21v-5.22a.66.66,0,0,1,1.31,0v5.22h5.21A.66.66,0,0,1,973.73,544.08Z" transform="translate(-960.7 -537.56)" fill="#fff"></path>
                                                                                </g>
                                                                            </g>
                                                                        </svg> Add Items</a>
                                                                    <div class="onoffswitch">
                                                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox " id="myonoffswitch" checked="checked">
                                                                        <label class="onoffswitch-label" for="myonoffswitch">
                                                                            <span class="onoffswitch-inner"></span>
                                                                            <span class="onoffswitch-switch"></span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-2">
                                                    <div class="MenuManagementaddMenu" id="">
                                                        <div id="search-detail" style="display:none;">
                                                            <form name="search" class="searchBox" id="search" method="post" action="https://menu.petpooja.com/menus/menu_item_list_new/all">
                                                                <div class="mb-2">
                                                                    <div class="ps-searchbar p-3 align-items-end">
                                                                        <div class="ps-form-group ">
                                                                            <label class="control-label ps-form-label" for="name">Name</label><input name="data[Item][name]" class="ps-input ps-base-input form-control pb-1" value="" maxlength="150" type="text" id="ItemName"><span class="pp-textfield-focused"></span>
                                                                        </div>
                                                                        <div class="ps-form-group ">
                                                                            <label class="control-label ps-form-label" for="online_display_name">Online Display Name</label><input name="data[Item][online_display_name]" class="ps-input ps-base-input form-control pb-1" value="" maxlength="150" type="text" id="ItemOnlineDisplayName"><span class="pp-textfield-focused"></span>
                                                                        </div>
                                                                        <div class="ps-form-group ">
                                                                            <label class="control-label ps-form-label" for="short_name">Shortcode</label><input name="data[Item][short_name]" class="ps-input ps-base-input form-control pb-1" value="" maxlength="20" type="text" id="ItemShortName"><span class="pp-textfield-focused"></span>
                                                                        </div>
                                                                        <div class="ps-form-group ">
                                                                            <label class="control-label ps-form-label" for="item_id">Item Id</label><input name="data[Item][item_id]" class="ps-input ps-base-input form-control numberonly pb-1" value="" maxlength="100" type="text" id="ItemItemId"><span class="pp-textfield-focused"></span>
                                                                        </div>
                                                                        <div class="ps-form-group ps-select2-border mb-0"><select name="data[Item][id_category]" class="select-simple form-control pp-select2 select2-hidden-accessible" aria-hidden="true" id="ItemIdCategory" data-select2-id="ItemIdCategory" tabindex="-1">
                                                                                <option value="" data-select2-id="10">Select Category</option>
                                                                                <option value="-1">Items without Category</option>
                                                                                <option value="9408548">Dessert</option>
                                                                                <option value="9408549">Add On</option>
                                                                                <option value="9408551">Continental Main Course</option>
                                                                                <option value="9408552">Asian Main Course</option>
                                                                                <option value="9408550">Indian Main Course</option>
                                                                                <option value="9408553">Sushi Rolls</option>
                                                                                <option value="9408554">From The Pizza Oven</option>
                                                                                <option value="9408555">Indian Small Bites</option>
                                                                                <option value="9408556">Continental Small Bites</option>
                                                                                <option value="9408557">Asian Small Bites</option>
                                                                                <option value="9408558">From The Tandoor</option>
                                                                                <option value="9408559">Soup</option>
                                                                                <option value="9408560">Salad</option>
                                                                                <option value="9408561">Mocktails</option>
                                                                                <option value="9408563">Shooters</option>
                                                                                <option value="9408562">Beverages</option>
                                                                                <option value="9408564">Cocktail</option>
                                                                                <option value="9408565">Apperitifs</option>
                                                                                <option value="9408566">Liquer</option>
                                                                                <option value="9408567">Red Wine</option>
                                                                                <option value="9408568">White Wine</option>
                                                                                <option value="9408569">Rose Wine</option>
                                                                                <option value="9408570">Sparking &amp; Champagne</option>
                                                                                <option value="9408571">Tequila</option>
                                                                                <option value="9408572">Cognac &amp; Brandy</option>
                                                                                <option value="9408573">Gin</option>
                                                                                <option value="9408574">Inhouse Gin &amp; Tonic</option>
                                                                                <option value="9408575">Vodka</option>
                                                                                <option value="9408576">Beer On Taps</option>
                                                                                <option value="9408577">Bottle Beer</option>
                                                                                <option value="9408578">Singlemalt</option>
                                                                                <option value="9408579">Bourbon, Irish &amp; Tennesse</option>
                                                                                <option value="9408580">Whiskey Scotch</option>
                                                                                <option value="9408581">Rum</option>
                                                                                <option value="9542612">11 party course</option>
                                                                                <option value="9542779">11 PARTY BAR MENU</option>
                                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="9" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ItemIdCategory-container"><span class="select2-selection__rendered" id="select2-ItemIdCategory-container" role="textbox" aria-readonly="true" title="Select Category">Select Category</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                                                        <div class="ps-form-group ps-select2-border mb-0"><select name="data[Item][item_filter]" class="select-simple form-control pp-select2 select2-hidden-accessible" aria-hidden="true" id="ItemItemFilter" data-select2-id="ItemItemFilter" tabindex="-1">
                                                                                <option value="" data-select2-id="12">Select Item type</option>
                                                                                <option value="1">Items with Variaton</option>
                                                                                <option value="2">Items with Addon</option>
                                                                                <option value="3">Items in Online Order</option>
                                                                                <option value="4">Items not in Online Order</option>
                                                                                <option value="5">Favorite Items</option>
                                                                                <option value="6">Combo Items</option>
                                                                                <option value="7">Items with Ignore Taxes</option>
                                                                                <option value="8">Items without Ignore Taxes</option>
                                                                                <option value="9">Items with Ignore Discount</option>
                                                                                <option value="10">Items without Ignore Discount</option>
                                                                                <option value="11">Items with Kiosk</option>
                                                                                <option value="12">Items without Kiosk</option>
                                                                                <option value="13">Items with Captain</option>
                                                                                <option value="14">Items without Captain</option>
                                                                                <option value="15">Items without Tag</option>
                                                                                <option value="16">Items with reduce price</option>
                                                                                <option value="17">Meal for one item without cuisine type</option>
                                                                                <option value="18">Swiggy recommended</option>
                                                                                <option value="19">Swiggy Pop Items</option>
                                                                                <option value="21">Item without Ho</option>
                                                                                <option value="22">Item With Ho</option>
                                                                                <option value="23">Items not in DineIn QR</option>
                                                                                <option value="27">Latest Added Item</option>
                                                                                <option value="28">Items with Ignore Packing Charge (Online)</option>
                                                                                <option value="29">Items Tagged as Good</option>
                                                                                <option value="30">Items Tagged as Service</option>
                                                                                <option value="31">MRP Tagged Items</option>
                                                                                <option value="33">Items Active in Basemenu</option>
                                                                                <option value="34">Items with Nutritional data</option>
                                                                                <option value="35">Items with description</option>
                                                                                <option value="36">Items without description</option>
                                                                                <option value="37">Petpooja Recommended</option>
                                                                                <option value="39">Item(s) without hsn code</option>
                                                                                <option value="40">Open item</option>
                                                                                <option value="41">Items with Schedule</option>
                                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="11" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ItemItemFilter-container"><span class="select2-selection__rendered" id="select2-ItemItemFilter-container" role="textbox" aria-readonly="true" title="Select Item type">Select Item type</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div><input type="hidden" name="data[Item][mapped_res_id]" id="mapped_res_id" class="input-xlarge" value="0"><input type="hidden" name="data[Item][client_order_type]" id="client_order_type" class="input-xlarge" value=""><input type="hidden" name="data[Item][restaurant_area_id]" id="restaurant_area_id" class="input-xlarge" value="0"><input type="hidden" name="data[Item][group_category_id]" id="group_category_id" class="input-xlarge" value="0"><input type="hidden" name="data[Item][client_id]" id="client_id" class="input-xlarge" value="0"><input type="hidden" name="data[Item][category_ids]" id="category_ids" class="input-xlarge" value="9408548"><input type="hidden" name="data[Item][client_identifier]" id="client_identifier" class="input-xlarge" value=""><input type="hidden" name="data[Item][item_status]" id="item_status" class="input-xlarge" value="true"><input type="hidden" name="data[Item][rank_wise_list]" id="rank_wise_list" class="input-xlarge" value="false"><input type="hidden" name="data[Item][item_publish]" id="item_publish" class="input-xlarge" value="false"><input type="hidden" name="data[Item][is_migrated]" id="is_migrated" class="input-xlarge" value="0"><input type="hidden" name="data[Item][r_e_cat]" id="r_e_cat" class="input-xlarge" value="0">
                                                                        <div class="button-wrapper" style="margin-top:0 !important">
                                                                            <button type="submit" value="Search" name="search" class="ps-btn sm-btn primary-btn ml-0">Search</button>
                                                                            <button class="ps-btn ps-btn sm-btn grey-outline-btn show_all_menu" type="button">Reset</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div><input type="hidden" name="data[Item][compare_type]" id="compare_type" value="M">
                                                        <form name="itemlist" id="itemlist" class="overflow-visible" method="post" action="https://menu.petpooja.com/menus/menu_item_list_new/"><input type="hidden" name="data[menu_date]" id="menu_date" value=""><input type="hidden" name="data[remove_item_ho_flag]" id="remove_item_ho_flag" value="1"><input id="serving_type" name="serving_type" type="hidden" value="1">
                                                            <div class="menu-item-list-border">
                                                                <div class="ps-table-wrapper table-responsive">
                                                                    <table class="ps-table table  ">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="essential persist table-checkbox-width ps-checkbox-group">
                                                                                    <center><label class="ps-checkbox-container mb-0">
                                                                                            <input type="checkbox" name="select_rows" id="select_rows" class="select_rows" data-tableid="dt_gal">
                                                                                            <span class="ps-checkmark"></span>
                                                                                        </label></center>
                                                                                </th>
                                                                                <th class="essential persist sort-by menu-name-cust-width" style="min-width:145px"> Name <span class="f_req">*</span>
                                                                                    <div class="search-name" style="display:none;"><span class="material-icons md-dark pp-sm seach-name-cancel" aria-hidden="true">close</span><input class="col-md-12 form-control" type="text" name="search_name" id="search_name" style="color:black !important;" tabindex="1" value=""></div>
                                                                                </th>
                                                                                <th width="11%" class="essential persist sort-by " style="min-width:120px">Short Code<span class="f_req">*</span>
                                                                                    <div class="search-name" style="display:none;"><span class="material-icons md-dark pp-sm seach-name-cancel" aria-hidden="true">close</span><input class="form-control" type="text" name="search_s_name" id="search_s_name" tabindex="1" style="color:black !important;" value=""></div>
                                                                                </th>
                                                                                <th width="13%" class="optional  ">Online Display Name<div class="search-name" style="display:none;"><span class="material-icons md-dark pp-sm seach-name-cancel" aria-hidden="true">close</span><input class="form-control" type="text" name="search_online_name" id="search_online_name" tabindex="1" style="color:black !important;" value=""></div>
                                                                                </th>
                                                                                <th class="essential persist sort-by" style="display:none;">Category <span class="f_req">*</span></th>
                                                                                <th class="essential persist sort-by" width="8%" style="min-width:85px">Price <span class="f_req">*</span></th>
                                                                                <th class="optional  ">Description</th>
                                                                                <th class="optional n-td text-center" style="display:none;">Available</th>
                                                                                <th class="essential persist text-center" width="5%">Image</th>
                                                                                <th class="essential persist n-td" width="16%">Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="ui-sortable">
                                                                            <tr id="tr_index_0" class="parent-tr-wrap menu_tr_1300706044  attr-veg " data-id="1300706044">
                                                                                <td class="pt-15 selection table-checkbox-width ps-checkbox-group">
                                                                                    <center><label class="ps-checkbox-container mb-0"> <input type="checkbox" class="row_sel" name="data[row_sel][1300706044]" chk_itmid="1300706044" data-var="0"> <span class="ps-checkmark"></span> </label></center>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="">
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="ps-form-group input-group align-items-center px-0 col-xl-11 mb-0 col-xl-12"><input name="data[Item][name][]" id="name_0" value="Tiramisu" maxlength="150" class="form-control  modify " tabindex="01" type="text" required="required">
                                                                                                <div class="input-group-append tooltip-wrap red align-items-baseline"><a data-bs-toggle="tooltip" data-tooltip="Add Variation" data-bs-placement="top" id="view" onclick="add_new_variation('1300706044',0,'Tiramisu','0','1','1')" href="javascript:void(0)"><strong class="v-plus-darkgrey">V+</strong></a> | <a data-bs-toggle="tooltip" data-tooltip="Expose in Online Order" data-bs-placement="top" href="javascript:void(0)"><strong>O</strong></a></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><span for="type" class="error" id="name_validation_0"></span>
                                                                                    <div class="d-flex justify-content-end"></div>
                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][short_name][]" id="shortname_0" maxlength="20" class="form-control modify " tabindex="02" type="text" value="1" required="required"><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="short_name_validation_0"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly   ">
                                                                                    <div class="ps-form-group mb-0 d-flex align-items-center">
                                                                                        <div><input name="data[Item][online_display_name][]" id="onlinedisplayname_0" maxlength="150" class="form-control modify online_item_name" tabindex="03" type="text" value=""><span class="pp-textfield-focused"></span>
                                                                                            <span for="type" class="error" id="online_display_name_validation_0"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly" style="display:none;" id="ps-select-parent">
                                                                                    <div class="ps-form-group ps-select2-border category-dropdown mb-0"><select name="data[Item][category_id][]" id="categoryid_0" class="modify form-control pp-select2 categoryid select2-hidden-accessible" tabindex="-1" onchange="handleCategoryChange(this)" data-key="0" required="required" data-select2-id="categoryid_0" aria-hidden="true">
                                                                                            <option value="">Select Category</option>
                                                                                            <option value="add_new">Add New Category</option>
                                                                                            <option value="9408548" selected="selected" data-select2-id="14">Dessert</option>
                                                                                            <option value="9408549">Add On</option>
                                                                                            <option value="9408551">Continental Main Course</option>
                                                                                            <option value="9408552">Asian Main Course</option>
                                                                                            <option value="9408550">Indian Main Course</option>
                                                                                            <option value="9408553">Sushi Rolls</option>
                                                                                            <option value="9408554">From The Pizza Oven</option>
                                                                                            <option value="9408555">Indian Small Bites</option>
                                                                                            <option value="9408556">Continental Small Bites</option>
                                                                                            <option value="9408557">Asian Small Bites</option>
                                                                                            <option value="9408558">From The Tandoor</option>
                                                                                            <option value="9408559">Soup</option>
                                                                                            <option value="9408560">Salad</option>
                                                                                            <option value="9408561">Mocktails</option>
                                                                                            <option value="9408563">Shooters</option>
                                                                                            <option value="9408562">Beverages</option>
                                                                                            <option value="9408564">Cocktail</option>
                                                                                            <option value="9408565">Apperitifs</option>
                                                                                            <option value="9408566">Liquer</option>
                                                                                            <option value="9408567">Red Wine</option>
                                                                                            <option value="9408568">White Wine</option>
                                                                                            <option value="9408569">Rose Wine</option>
                                                                                            <option value="9408570">Sparking &amp; Champagne</option>
                                                                                            <option value="9408571">Tequila</option>
                                                                                            <option value="9408572">Cognac &amp; Brandy</option>
                                                                                            <option value="9408573">Gin</option>
                                                                                            <option value="9408574">Inhouse Gin &amp; Tonic</option>
                                                                                            <option value="9408575">Vodka</option>
                                                                                            <option value="9408576">Beer On Taps</option>
                                                                                            <option value="9408577">Bottle Beer</option>
                                                                                            <option value="9408578">Singlemalt</option>
                                                                                            <option value="9408579">Bourbon, Irish &amp; Tennesse</option>
                                                                                            <option value="9408580">Whiskey Scotch</option>
                                                                                            <option value="9408581">Rum</option>
                                                                                            <option value="9542612">11 party course</option>
                                                                                            <option value="9542779">11 PARTY BAR MENU</option>
                                                                                        </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="13" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="04" aria-disabled="false" aria-labelledby="select2-categoryid_0-container"><span class="select2-selection__rendered" id="select2-categoryid_0-container" role="textbox" aria-readonly="true" title="Dessert">Dessert</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="category_id_validation_0"></span>
                                                                                    </div>
                                                                                    <input type="hidden" name="category_create[]" class="category_create" value="">

                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group input-group mb-0 side-pad-table"><input name="data[Item][price][]" id="price_0" value="199" maxlength="7" class="price form-control modify  no_variation pr_allow" tabindex="05" old_price="199" type="text" required="required">
                                                                                        <div class="input-group-append info-iocn-append"></div><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="price_validation_0"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][description][]" id="description_0" maxlength="1000" class="modify form-control item_description" tabindex="06" type="text" value="Classic Italian coffee-flavored dessert."><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="description_validation_0"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="ps-toggle-group text-center" style="display:none;">
                                                                                    <p class="ps-toggle m-0 pl-0 pb-10 "><input type="checkbox" name="data[Item][status][1300706044]" id="status_0" class="custom-control-input wi-20 modify  " tabindex="07" value="1" checked="checked"><label class="custom-control-label font-italic " for="status_0"></label></p>
                                                                                </td>
                                                                                <td class="menu-file-upload text-center" width="5%">
                                                                                    <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                                        <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                                            <div class="btn-file vertical-align-bottom gp_img_upload_popup iconBtn" data-item-id="1300706044"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                                                                <td id="essential" class="action-btn-flex">
                                                                                    <div class="d-flex align-items-center"><a class="ext_disabled sepV_a iconBtn " href="javascript:void(0)" onclick="show_details('1300706044')" data-tooltip="Item details">
                                                                                            <span class="show-eye-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M12.42 21.99H8.13818C3.85636 21.99 3 19.9911 3 15.9933V9.99665C3 5.4392 4.43013 4.19989 7.28182 4.01999" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V15" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M22.3749 19.4082C22.0469 18.5726 21.4809 17.8517 20.7471 17.3348C20.0132 16.8178 19.1439 16.5276 18.2467 16.5C17.3495 16.5276 16.4801 16.8178 15.7463 17.3348C15.0125 17.8517 14.4465 18.5726 14.1184 19.4082L14 19.685L14.1184 19.9618C14.4465 20.7974 15.0125 21.5183 15.7463 22.0352C16.4801 22.5522 17.3495 22.8424 18.2467 22.87C19.1439 22.8424 20.0132 22.5522 20.7471 22.0352C21.4809 21.5183 22.0469 20.7974 22.3749 19.9618L22.4933 19.685L22.3749 19.4082ZM18.2467 21.8083C17.8267 21.8083 17.4162 21.6838 17.067 21.4505C16.7178 21.2172 16.4457 20.8856 16.285 20.4976C16.1243 20.1096 16.0822 19.6826 16.1641 19.2708C16.2461 18.8589 16.4483 18.4805 16.7452 18.1836C17.0422 17.8866 17.4205 17.6844 17.8324 17.6025C18.2443 17.5205 18.6712 17.5626 19.0592 17.7233C19.4472 17.884 19.7788 18.1562 20.0122 18.5053C20.2455 18.8545 20.37 19.265 20.37 19.685C20.3694 20.248 20.1455 20.7877 19.7474 21.1857C19.3493 21.5838 18.8096 21.8077 18.2467 21.8083Z" fill="#646464"></path>
                                                                                                    <path d="M18.2459 21.0461C18.9976 21.0461 19.607 20.4367 19.607 19.685C19.607 18.9333 18.9976 18.3239 18.2459 18.3239C17.4942 18.3239 16.8848 18.9333 16.8848 19.685C16.8848 20.4367 17.4942 21.0461 18.2459 21.0461Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a  iconBtn " href="javascript:void(0)" onclick="update_items_details('1300706044')" data-tooltip="Update areawise price &amp; status">
                                                                                            <span class="update-areawise-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.09878 0.25007C5.14683 0.25009 5.19559 0.25011 5.24508 0.25011H14.7551C14.8045 0.25011 14.8533 0.25009 14.9014 0.25007C15.9181 0.24963 16.6178 0.24932 17.2072 0.45438C18.3201 0.84164 19.1842 1.73729 19.5547 2.86562C19.7507 3.46274 19.7505 4.17257 19.7501 5.22658C19.7501 5.27375 19.7501 5.32161 19.7501 5.37017V19.3743C19.7501 20.8395 18.0231 21.7118 16.8857 20.671C16.8062 20.5983 16.694 20.5983 16.6145 20.671L16.1314 21.1131C15.2032 21.9624 13.7969 21.9624 12.8688 21.1131C12.5138 20.7882 11.9864 20.7882 11.6314 21.1131C10.7032 21.9624 9.2969 21.9624 8.3688 21.1131C8.0138 20.7882 7.48637 20.7882 7.13138 21.1131C6.20319 21.9624 4.79694 21.9624 3.86875 21.1131L3.38566 20.671C3.30618 20.5983 3.19395 20.5983 3.11448 20.671C1.97705 21.7118 0.250073 20.8395 0.250073 19.3743V5.37017C0.250073 5.32161 0.250053 5.27375 0.250033 5.22658C0.249653 4.17258 0.249393 3.46274 0.445453 2.86562C0.815913 1.73729 1.68002 0.84164 2.79298 0.45438C3.3823 0.24932 4.08203 0.24963 5.09878 0.25007ZM5.24508 1.75011C4.024 1.75011 3.6034 1.7606 3.28593 1.87106C2.62655 2.1005 2.09919 2.63731 1.8706 3.33353C1.75951 3.67186 1.75007 4.11799 1.75007 5.37017V19.3743C1.75007 19.4933 1.80999 19.5661 1.88517 19.6009C1.92434 19.619 1.96264 19.6237 1.99456 19.6194C2.0227 19.6156 2.05911 19.6035 2.10185 19.5644C2.75453 18.9671 3.74561 18.9671 4.39828 19.5644L4.88138 20.0065C5.23637 20.3313 5.76377 20.3313 6.11875 20.0065C7.04694 19.1571 8.4532 19.1571 9.3814 20.0065C9.7364 20.3313 10.2638 20.3313 10.6188 20.0065C11.5469 19.1571 12.9532 19.1571 13.8814 20.0065C14.2364 20.3313 14.7638 20.3313 15.1188 20.0065L15.6019 19.5644C16.2545 18.9671 17.2456 18.9671 17.8983 19.5644C17.941 19.6035 17.9774 19.6156 18.0056 19.6194C18.0375 19.6237 18.0758 19.619 18.115 19.6009C18.1901 19.5661 18.2501 19.4934 18.2501 19.3743V5.37017C18.2501 4.118 18.2406 3.67186 18.1295 3.33353C17.9009 2.63731 17.3736 2.1005 16.7142 1.87106C16.3967 1.7606 15.9761 1.75011 14.7551 1.75011H5.24508ZM4.25007 6.50011C4.25007 6.0859 4.58585 5.75011 5.00007 5.75011H5.50007C5.91428 5.75011 6.25007 6.0859 6.25007 6.50011C6.25007 6.91433 5.91428 7.25011 5.50007 7.25011H5.00007C4.58585 7.25011 4.25007 6.91433 4.25007 6.50011ZM7.75007 6.50011C7.75007 6.0859 8.0859 5.75011 8.5001 5.75011H15.0001C15.4143 5.75011 15.7501 6.0859 15.7501 6.50011C15.7501 6.91433 15.4143 7.25011 15.0001 7.25011H8.5001C8.0859 7.25011 7.75007 6.91433 7.75007 6.50011ZM4.25007 10.0001C4.25007 9.58593 4.58585 9.25013 5.00007 9.25013H5.50007C5.91428 9.25013 6.25007 9.58593 6.25007 10.0001C6.25007 10.4143 5.91428 10.7501 5.50007 10.7501H5.00007C4.58585 10.7501 4.25007 10.4143 4.25007 10.0001ZM7.75007 10.0001C7.75007 9.58593 8.0859 9.25013 8.5001 9.25013H15.0001C15.4143 9.25013 15.7501 9.58593 15.7501 10.0001C15.7501 10.4143 15.4143 10.7501 15.0001 10.7501H8.5001C8.0859 10.7501 7.75007 10.4143 7.75007 10.0001ZM4.25007 13.5001C4.25007 13.0859 4.58585 12.7501 5.00007 12.7501H5.50007C5.91428 12.7501 6.25007 13.0859 6.25007 13.5001C6.25007 13.9143 5.91428 14.2501 5.50007 14.2501H5.00007C4.58585 14.2501 4.25007 13.9143 4.25007 13.5001ZM7.75007 13.5001C7.75007 13.0859 8.0859 12.7501 8.5001 12.7501H15.0001C15.4143 12.7501 15.7501 13.0859 15.7501 13.5001C15.7501 13.9143 15.4143 14.2501 15.0001 14.2501H8.5001C8.0859 14.2501 7.75007 13.9143 7.75007 13.5001Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a data-tooltip="Edit item" class="sepV_a ext_disabled iconBtn update_btn_menu_status" href="javascript:void(0);" id="edit" onclick="itemform('no', '1300706044');">
                                                                                            <span class="edit-square-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a iconBtn min-width-tooltip-130" href="javascript:void(0)" onclick="update_nutritions_items_details('1300706044')" data-tooltip="Update items nutrition info details">
                                                                                            <span class="update-nutritions-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a id="show_change" data-tooltip="Show changes" class="ext_disabled iconBtn " onclick="show_changes('1300706044')" href="javascript:void(0);">
                                                                                            <span class="book-line-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                                                </svg></span></a></div>
                                                                                </td><input type="hidden" name="data[Item][allow_variation][]" id="allowvariation_0" value="0"><input type="hidden" name="data[Item][allow_addon][]" id="allowaddon_0" value="0"><input type="hidden" name="data[Item][packing_charges][]" id="packing_charges_0" value="0"><input type="hidden" name="data[Item][desktop_order_type][]" id="desktop_order_type_0" value="1,2,3"><input type="hidden" name="data[Item][parent_id][]" id="parent_id_0" value="0"><input type="hidden" name="data[Item][id][]" id="id0" value="1300706044"><input type="hidden" name="data[Item][ho][]" id="ho0" value="0"><input type="hidden" name="data[Item][is_modify][]" id="ismodify_0" value="0"><input type="hidden" name="data[Item][ignore_taxes][]" id="ignore_taxes0" value="0"><input type="hidden" name="data[Item][ignore_discounts][]" id="ignore_discounts0" value="0"><input type="hidden" name="data[Item][addon_group_ids][]" id="addon_group_ids0" value=""><input type="hidden" name="data[Item][addon_based_on][]" id="addon_based_on0" value="0"><input type="hidden" name="data[Item][attributes][]" id="attributes_0" value="1,570"><input type="hidden" name="data[Item][days_id][]" id="days_id0" value="-1">
                                                                            </tr>
                                                                            <tr id="tr_index_1" class="parent-tr-wrap menu_tr_1300706045  attr-veg " data-id="1300706045">
                                                                                <td class="pt-15 selection table-checkbox-width ps-checkbox-group">
                                                                                    <center><label class="ps-checkbox-container mb-0"> <input type="checkbox" class="row_sel" name="data[row_sel][1300706045]" chk_itmid="1300706045" data-var="0"> <span class="ps-checkmark"></span> </label></center>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="">
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="ps-form-group input-group align-items-center px-0 col-xl-11 mb-0 col-xl-12"><input name="data[Item][name][]" id="name_1" value="Brownie With Ice Cream" maxlength="150" class="form-control  modify " tabindex="11" type="text" required="required">
                                                                                                <div class="input-group-append tooltip-wrap red align-items-baseline"><a data-bs-toggle="tooltip" data-tooltip="Add Variation" data-bs-placement="top" id="view" onclick="add_new_variation('1300706045',0,'Brownie With Ice Cream','0','1','1')" href="javascript:void(0)"><strong class="v-plus-darkgrey">V+</strong></a> | <a data-bs-toggle="tooltip" data-tooltip="Expose in Online Order" data-bs-placement="top" href="javascript:void(0)"><strong>O</strong></a></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><span for="type" class="error" id="name_validation_1"></span>
                                                                                    <div class="d-flex justify-content-end"></div>
                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][short_name][]" id="shortname_1" maxlength="20" class="form-control modify " tabindex="12" type="text" value="2" required="required"><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="short_name_validation_1"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly   ">
                                                                                    <div class="ps-form-group mb-0 d-flex align-items-center">
                                                                                        <div><input name="data[Item][online_display_name][]" id="onlinedisplayname_1" maxlength="150" class="form-control modify online_item_name" tabindex="13" type="text" value=""><span class="pp-textfield-focused"></span>
                                                                                            <span for="type" class="error" id="online_display_name_validation_1"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly" style="display:none;" id="ps-select-parent">
                                                                                    <div class="ps-form-group ps-select2-border category-dropdown mb-0"><select name="data[Item][category_id][]" id="categoryid_1" class="modify form-control pp-select2 categoryid select2-hidden-accessible" tabindex="-1" onchange="handleCategoryChange(this)" data-key="1" required="required" data-select2-id="categoryid_1" aria-hidden="true">
                                                                                            <option value="">Select Category</option>
                                                                                            <option value="add_new">Add New Category</option>
                                                                                            <option value="9408548" selected="selected" data-select2-id="16">Dessert</option>
                                                                                            <option value="9408549">Add On</option>
                                                                                            <option value="9408551">Continental Main Course</option>
                                                                                            <option value="9408552">Asian Main Course</option>
                                                                                            <option value="9408550">Indian Main Course</option>
                                                                                            <option value="9408553">Sushi Rolls</option>
                                                                                            <option value="9408554">From The Pizza Oven</option>
                                                                                            <option value="9408555">Indian Small Bites</option>
                                                                                            <option value="9408556">Continental Small Bites</option>
                                                                                            <option value="9408557">Asian Small Bites</option>
                                                                                            <option value="9408558">From The Tandoor</option>
                                                                                            <option value="9408559">Soup</option>
                                                                                            <option value="9408560">Salad</option>
                                                                                            <option value="9408561">Mocktails</option>
                                                                                            <option value="9408563">Shooters</option>
                                                                                            <option value="9408562">Beverages</option>
                                                                                            <option value="9408564">Cocktail</option>
                                                                                            <option value="9408565">Apperitifs</option>
                                                                                            <option value="9408566">Liquer</option>
                                                                                            <option value="9408567">Red Wine</option>
                                                                                            <option value="9408568">White Wine</option>
                                                                                            <option value="9408569">Rose Wine</option>
                                                                                            <option value="9408570">Sparking &amp; Champagne</option>
                                                                                            <option value="9408571">Tequila</option>
                                                                                            <option value="9408572">Cognac &amp; Brandy</option>
                                                                                            <option value="9408573">Gin</option>
                                                                                            <option value="9408574">Inhouse Gin &amp; Tonic</option>
                                                                                            <option value="9408575">Vodka</option>
                                                                                            <option value="9408576">Beer On Taps</option>
                                                                                            <option value="9408577">Bottle Beer</option>
                                                                                            <option value="9408578">Singlemalt</option>
                                                                                            <option value="9408579">Bourbon, Irish &amp; Tennesse</option>
                                                                                            <option value="9408580">Whiskey Scotch</option>
                                                                                            <option value="9408581">Rum</option>
                                                                                            <option value="9542612">11 party course</option>
                                                                                            <option value="9542779">11 PARTY BAR MENU</option>
                                                                                        </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="15" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="14" aria-disabled="false" aria-labelledby="select2-categoryid_1-container"><span class="select2-selection__rendered" id="select2-categoryid_1-container" role="textbox" aria-readonly="true" title="Dessert">Dessert</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="category_id_validation_1"></span>
                                                                                    </div>
                                                                                    <input type="hidden" name="category_create[]" class="category_create" value="">

                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group input-group mb-0 side-pad-table"><input name="data[Item][price][]" id="price_1" value="199" maxlength="7" class="price form-control modify  no_variation pr_allow" tabindex="15" old_price="199" type="text" required="required">
                                                                                        <div class="input-group-append info-iocn-append"></div><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="price_validation_1"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][description][]" id="description_1" maxlength="1000" class="modify form-control item_description" tabindex="16" type="text" value="Rich chocolate brownie served warm with a scoop of ice cream."><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="description_validation_1"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="ps-toggle-group text-center" style="display:none;">
                                                                                    <p class="ps-toggle m-0 pl-0 pb-10 "><input type="checkbox" name="data[Item][status][1300706045]" id="status_1" class="custom-control-input wi-20 modify  " tabindex="17" value="1" checked="checked"><label class="custom-control-label font-italic " for="status_1"></label></p>
                                                                                </td>
                                                                                <td class="menu-file-upload text-center" width="5%">
                                                                                    <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                                        <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                                            <div class="btn-file vertical-align-bottom gp_img_upload_popup iconBtn" data-item-id="1300706045"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                                                                <td id="essential" class="action-btn-flex">
                                                                                    <div class="d-flex align-items-center"><a class="ext_disabled sepV_a iconBtn " href="javascript:void(0)" onclick="show_details('1300706045')" data-tooltip="Item details">
                                                                                            <span class="show-eye-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M12.42 21.99H8.13818C3.85636 21.99 3 19.9911 3 15.9933V9.99665C3 5.4392 4.43013 4.19989 7.28182 4.01999" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V15" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M22.3749 19.4082C22.0469 18.5726 21.4809 17.8517 20.7471 17.3348C20.0132 16.8178 19.1439 16.5276 18.2467 16.5C17.3495 16.5276 16.4801 16.8178 15.7463 17.3348C15.0125 17.8517 14.4465 18.5726 14.1184 19.4082L14 19.685L14.1184 19.9618C14.4465 20.7974 15.0125 21.5183 15.7463 22.0352C16.4801 22.5522 17.3495 22.8424 18.2467 22.87C19.1439 22.8424 20.0132 22.5522 20.7471 22.0352C21.4809 21.5183 22.0469 20.7974 22.3749 19.9618L22.4933 19.685L22.3749 19.4082ZM18.2467 21.8083C17.8267 21.8083 17.4162 21.6838 17.067 21.4505C16.7178 21.2172 16.4457 20.8856 16.285 20.4976C16.1243 20.1096 16.0822 19.6826 16.1641 19.2708C16.2461 18.8589 16.4483 18.4805 16.7452 18.1836C17.0422 17.8866 17.4205 17.6844 17.8324 17.6025C18.2443 17.5205 18.6712 17.5626 19.0592 17.7233C19.4472 17.884 19.7788 18.1562 20.0122 18.5053C20.2455 18.8545 20.37 19.265 20.37 19.685C20.3694 20.248 20.1455 20.7877 19.7474 21.1857C19.3493 21.5838 18.8096 21.8077 18.2467 21.8083Z" fill="#646464"></path>
                                                                                                    <path d="M18.2459 21.0461C18.9976 21.0461 19.607 20.4367 19.607 19.685C19.607 18.9333 18.9976 18.3239 18.2459 18.3239C17.4942 18.3239 16.8848 18.9333 16.8848 19.685C16.8848 20.4367 17.4942 21.0461 18.2459 21.0461Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a  iconBtn " href="javascript:void(0)" onclick="update_items_details('1300706045')" data-tooltip="Update areawise price &amp; status">
                                                                                            <span class="update-areawise-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.09878 0.25007C5.14683 0.25009 5.19559 0.25011 5.24508 0.25011H14.7551C14.8045 0.25011 14.8533 0.25009 14.9014 0.25007C15.9181 0.24963 16.6178 0.24932 17.2072 0.45438C18.3201 0.84164 19.1842 1.73729 19.5547 2.86562C19.7507 3.46274 19.7505 4.17257 19.7501 5.22658C19.7501 5.27375 19.7501 5.32161 19.7501 5.37017V19.3743C19.7501 20.8395 18.0231 21.7118 16.8857 20.671C16.8062 20.5983 16.694 20.5983 16.6145 20.671L16.1314 21.1131C15.2032 21.9624 13.7969 21.9624 12.8688 21.1131C12.5138 20.7882 11.9864 20.7882 11.6314 21.1131C10.7032 21.9624 9.2969 21.9624 8.3688 21.1131C8.0138 20.7882 7.48637 20.7882 7.13138 21.1131C6.20319 21.9624 4.79694 21.9624 3.86875 21.1131L3.38566 20.671C3.30618 20.5983 3.19395 20.5983 3.11448 20.671C1.97705 21.7118 0.250073 20.8395 0.250073 19.3743V5.37017C0.250073 5.32161 0.250053 5.27375 0.250033 5.22658C0.249653 4.17258 0.249393 3.46274 0.445453 2.86562C0.815913 1.73729 1.68002 0.84164 2.79298 0.45438C3.3823 0.24932 4.08203 0.24963 5.09878 0.25007ZM5.24508 1.75011C4.024 1.75011 3.6034 1.7606 3.28593 1.87106C2.62655 2.1005 2.09919 2.63731 1.8706 3.33353C1.75951 3.67186 1.75007 4.11799 1.75007 5.37017V19.3743C1.75007 19.4933 1.80999 19.5661 1.88517 19.6009C1.92434 19.619 1.96264 19.6237 1.99456 19.6194C2.0227 19.6156 2.05911 19.6035 2.10185 19.5644C2.75453 18.9671 3.74561 18.9671 4.39828 19.5644L4.88138 20.0065C5.23637 20.3313 5.76377 20.3313 6.11875 20.0065C7.04694 19.1571 8.4532 19.1571 9.3814 20.0065C9.7364 20.3313 10.2638 20.3313 10.6188 20.0065C11.5469 19.1571 12.9532 19.1571 13.8814 20.0065C14.2364 20.3313 14.7638 20.3313 15.1188 20.0065L15.6019 19.5644C16.2545 18.9671 17.2456 18.9671 17.8983 19.5644C17.941 19.6035 17.9774 19.6156 18.0056 19.6194C18.0375 19.6237 18.0758 19.619 18.115 19.6009C18.1901 19.5661 18.2501 19.4934 18.2501 19.3743V5.37017C18.2501 4.118 18.2406 3.67186 18.1295 3.33353C17.9009 2.63731 17.3736 2.1005 16.7142 1.87106C16.3967 1.7606 15.9761 1.75011 14.7551 1.75011H5.24508ZM4.25007 6.50011C4.25007 6.0859 4.58585 5.75011 5.00007 5.75011H5.50007C5.91428 5.75011 6.25007 6.0859 6.25007 6.50011C6.25007 6.91433 5.91428 7.25011 5.50007 7.25011H5.00007C4.58585 7.25011 4.25007 6.91433 4.25007 6.50011ZM7.75007 6.50011C7.75007 6.0859 8.0859 5.75011 8.5001 5.75011H15.0001C15.4143 5.75011 15.7501 6.0859 15.7501 6.50011C15.7501 6.91433 15.4143 7.25011 15.0001 7.25011H8.5001C8.0859 7.25011 7.75007 6.91433 7.75007 6.50011ZM4.25007 10.0001C4.25007 9.58593 4.58585 9.25013 5.00007 9.25013H5.50007C5.91428 9.25013 6.25007 9.58593 6.25007 10.0001C6.25007 10.4143 5.91428 10.7501 5.50007 10.7501H5.00007C4.58585 10.7501 4.25007 10.4143 4.25007 10.0001ZM7.75007 10.0001C7.75007 9.58593 8.0859 9.25013 8.5001 9.25013H15.0001C15.4143 9.25013 15.7501 9.58593 15.7501 10.0001C15.7501 10.4143 15.4143 10.7501 15.0001 10.7501H8.5001C8.0859 10.7501 7.75007 10.4143 7.75007 10.0001ZM4.25007 13.5001C4.25007 13.0859 4.58585 12.7501 5.00007 12.7501H5.50007C5.91428 12.7501 6.25007 13.0859 6.25007 13.5001C6.25007 13.9143 5.91428 14.2501 5.50007 14.2501H5.00007C4.58585 14.2501 4.25007 13.9143 4.25007 13.5001ZM7.75007 13.5001C7.75007 13.0859 8.0859 12.7501 8.5001 12.7501H15.0001C15.4143 12.7501 15.7501 13.0859 15.7501 13.5001C15.7501 13.9143 15.4143 14.2501 15.0001 14.2501H8.5001C8.0859 14.2501 7.75007 13.9143 7.75007 13.5001Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a data-tooltip="Edit item" class="sepV_a ext_disabled iconBtn update_btn_menu_status" href="javascript:void(0);" id="edit" onclick="itemform('no', '1300706045');">
                                                                                            <span class="edit-square-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a iconBtn min-width-tooltip-130" href="javascript:void(0)" onclick="update_nutritions_items_details('1300706045')" data-tooltip="Update items nutrition info details">
                                                                                            <span class="update-nutritions-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a id="show_change" data-tooltip="Show changes" class="ext_disabled iconBtn " onclick="show_changes('1300706045')" href="javascript:void(0);">
                                                                                            <span class="book-line-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                                                </svg></span></a></div>
                                                                                </td><input type="hidden" name="data[Item][allow_variation][]" id="allowvariation_1" value="0"><input type="hidden" name="data[Item][allow_addon][]" id="allowaddon_1" value="0"><input type="hidden" name="data[Item][packing_charges][]" id="packing_charges_1" value="0"><input type="hidden" name="data[Item][desktop_order_type][]" id="desktop_order_type_1" value="1,2,3"><input type="hidden" name="data[Item][parent_id][]" id="parent_id_1" value="0"><input type="hidden" name="data[Item][id][]" id="id1" value="1300706045"><input type="hidden" name="data[Item][ho][]" id="ho1" value="0"><input type="hidden" name="data[Item][is_modify][]" id="ismodify_1" value="0"><input type="hidden" name="data[Item][ignore_taxes][]" id="ignore_taxes1" value="0"><input type="hidden" name="data[Item][ignore_discounts][]" id="ignore_discounts1" value="0"><input type="hidden" name="data[Item][addon_group_ids][]" id="addon_group_ids1" value=""><input type="hidden" name="data[Item][addon_based_on][]" id="addon_based_on1" value="0"><input type="hidden" name="data[Item][attributes][]" id="attributes_1" value="1,570"><input type="hidden" name="data[Item][days_id][]" id="days_id1" value="-1">
                                                                            </tr>
                                                                            <tr id="tr_index_2" class="parent-tr-wrap menu_tr_1300706046  attr-veg " data-id="1300706046">
                                                                                <td class="pt-15 selection table-checkbox-width ps-checkbox-group">
                                                                                    <center><label class="ps-checkbox-container mb-0"> <input type="checkbox" class="row_sel" name="data[row_sel][1300706046]" chk_itmid="1300706046" data-var="0"> <span class="ps-checkmark"></span> </label></center>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="">
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="ps-form-group input-group align-items-center px-0 col-xl-11 mb-0 col-xl-12"><input name="data[Item][name][]" id="name_2" value="Sarki Day'S Special" maxlength="150" class="form-control  modify " tabindex="21" type="text" required="required">
                                                                                                <div class="input-group-append tooltip-wrap red align-items-baseline"><a data-bs-toggle="tooltip" data-tooltip="Add Variation" data-bs-placement="top" id="view" onclick="add_new_variation('1300706046',0,'Sarki Day\'S Special','0','1','1')" href="javascript:void(0)"><strong class="v-plus-darkgrey">V+</strong></a> | <a data-bs-toggle="tooltip" data-tooltip="Expose in Online Order" data-bs-placement="top" href="javascript:void(0)"><strong>O</strong></a></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><span for="type" class="error" id="name_validation_2"></span>
                                                                                    <div class="d-flex justify-content-end"></div>
                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][short_name][]" id="shortname_2" maxlength="20" class="form-control modify " tabindex="22" type="text" value="3" required="required"><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="short_name_validation_2"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly   ">
                                                                                    <div class="ps-form-group mb-0 d-flex align-items-center">
                                                                                        <div><input name="data[Item][online_display_name][]" id="onlinedisplayname_2" maxlength="150" class="form-control modify online_item_name" tabindex="23" type="text" value=""><span class="pp-textfield-focused"></span>
                                                                                            <span for="type" class="error" id="online_display_name_validation_2"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly" style="display:none;" id="ps-select-parent">
                                                                                    <div class="ps-form-group ps-select2-border category-dropdown mb-0"><select name="data[Item][category_id][]" id="categoryid_2" class="modify form-control pp-select2 categoryid select2-hidden-accessible" tabindex="-1" onchange="handleCategoryChange(this)" data-key="2" required="required" data-select2-id="categoryid_2" aria-hidden="true">
                                                                                            <option value="">Select Category</option>
                                                                                            <option value="add_new">Add New Category</option>
                                                                                            <option value="9408548" selected="selected" data-select2-id="18">Dessert</option>
                                                                                            <option value="9408549">Add On</option>
                                                                                            <option value="9408551">Continental Main Course</option>
                                                                                            <option value="9408552">Asian Main Course</option>
                                                                                            <option value="9408550">Indian Main Course</option>
                                                                                            <option value="9408553">Sushi Rolls</option>
                                                                                            <option value="9408554">From The Pizza Oven</option>
                                                                                            <option value="9408555">Indian Small Bites</option>
                                                                                            <option value="9408556">Continental Small Bites</option>
                                                                                            <option value="9408557">Asian Small Bites</option>
                                                                                            <option value="9408558">From The Tandoor</option>
                                                                                            <option value="9408559">Soup</option>
                                                                                            <option value="9408560">Salad</option>
                                                                                            <option value="9408561">Mocktails</option>
                                                                                            <option value="9408563">Shooters</option>
                                                                                            <option value="9408562">Beverages</option>
                                                                                            <option value="9408564">Cocktail</option>
                                                                                            <option value="9408565">Apperitifs</option>
                                                                                            <option value="9408566">Liquer</option>
                                                                                            <option value="9408567">Red Wine</option>
                                                                                            <option value="9408568">White Wine</option>
                                                                                            <option value="9408569">Rose Wine</option>
                                                                                            <option value="9408570">Sparking &amp; Champagne</option>
                                                                                            <option value="9408571">Tequila</option>
                                                                                            <option value="9408572">Cognac &amp; Brandy</option>
                                                                                            <option value="9408573">Gin</option>
                                                                                            <option value="9408574">Inhouse Gin &amp; Tonic</option>
                                                                                            <option value="9408575">Vodka</option>
                                                                                            <option value="9408576">Beer On Taps</option>
                                                                                            <option value="9408577">Bottle Beer</option>
                                                                                            <option value="9408578">Singlemalt</option>
                                                                                            <option value="9408579">Bourbon, Irish &amp; Tennesse</option>
                                                                                            <option value="9408580">Whiskey Scotch</option>
                                                                                            <option value="9408581">Rum</option>
                                                                                            <option value="9542612">11 party course</option>
                                                                                            <option value="9542779">11 PARTY BAR MENU</option>
                                                                                        </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="17" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="24" aria-disabled="false" aria-labelledby="select2-categoryid_2-container"><span class="select2-selection__rendered" id="select2-categoryid_2-container" role="textbox" aria-readonly="true" title="Dessert">Dessert</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="category_id_validation_2"></span>
                                                                                    </div>
                                                                                    <input type="hidden" name="category_create[]" class="category_create" value="">

                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group input-group mb-0 side-pad-table"><input name="data[Item][price][]" id="price_2" value="200" maxlength="7" class="price form-control modify  no_variation pr_allow" tabindex="25" old_price="200" type="text" required="required">
                                                                                        <div class="input-group-append info-iocn-append"></div><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="price_validation_2"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][description][]" id="description_2" maxlength="1000" class="modify form-control item_description" tabindex="26" type="text" value="Chef's special dessert of the day."><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="description_validation_2"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="ps-toggle-group text-center" style="display:none;">
                                                                                    <p class="ps-toggle m-0 pl-0 pb-10 "><input type="checkbox" name="data[Item][status][1300706046]" id="status_2" class="custom-control-input wi-20 modify  " tabindex="27" value="1" checked="checked"><label class="custom-control-label font-italic " for="status_2"></label></p>
                                                                                </td>
                                                                                <td class="menu-file-upload text-center" width="5%">
                                                                                    <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                                        <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                                            <div class="btn-file vertical-align-bottom gp_img_upload_popup iconBtn" data-item-id="1300706046"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                                                                <td id="essential" class="action-btn-flex">
                                                                                    <div class="d-flex align-items-center"><a class="ext_disabled sepV_a iconBtn " href="javascript:void(0)" onclick="show_details('1300706046')" data-tooltip="Item details">
                                                                                            <span class="show-eye-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M12.42 21.99H8.13818C3.85636 21.99 3 19.9911 3 15.9933V9.99665C3 5.4392 4.43013 4.19989 7.28182 4.01999" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V15" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M22.3749 19.4082C22.0469 18.5726 21.4809 17.8517 20.7471 17.3348C20.0132 16.8178 19.1439 16.5276 18.2467 16.5C17.3495 16.5276 16.4801 16.8178 15.7463 17.3348C15.0125 17.8517 14.4465 18.5726 14.1184 19.4082L14 19.685L14.1184 19.9618C14.4465 20.7974 15.0125 21.5183 15.7463 22.0352C16.4801 22.5522 17.3495 22.8424 18.2467 22.87C19.1439 22.8424 20.0132 22.5522 20.7471 22.0352C21.4809 21.5183 22.0469 20.7974 22.3749 19.9618L22.4933 19.685L22.3749 19.4082ZM18.2467 21.8083C17.8267 21.8083 17.4162 21.6838 17.067 21.4505C16.7178 21.2172 16.4457 20.8856 16.285 20.4976C16.1243 20.1096 16.0822 19.6826 16.1641 19.2708C16.2461 18.8589 16.4483 18.4805 16.7452 18.1836C17.0422 17.8866 17.4205 17.6844 17.8324 17.6025C18.2443 17.5205 18.6712 17.5626 19.0592 17.7233C19.4472 17.884 19.7788 18.1562 20.0122 18.5053C20.2455 18.8545 20.37 19.265 20.37 19.685C20.3694 20.248 20.1455 20.7877 19.7474 21.1857C19.3493 21.5838 18.8096 21.8077 18.2467 21.8083Z" fill="#646464"></path>
                                                                                                    <path d="M18.2459 21.0461C18.9976 21.0461 19.607 20.4367 19.607 19.685C19.607 18.9333 18.9976 18.3239 18.2459 18.3239C17.4942 18.3239 16.8848 18.9333 16.8848 19.685C16.8848 20.4367 17.4942 21.0461 18.2459 21.0461Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a  iconBtn " href="javascript:void(0)" onclick="update_items_details('1300706046')" data-tooltip="Update areawise price &amp; status">
                                                                                            <span class="update-areawise-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.09878 0.25007C5.14683 0.25009 5.19559 0.25011 5.24508 0.25011H14.7551C14.8045 0.25011 14.8533 0.25009 14.9014 0.25007C15.9181 0.24963 16.6178 0.24932 17.2072 0.45438C18.3201 0.84164 19.1842 1.73729 19.5547 2.86562C19.7507 3.46274 19.7505 4.17257 19.7501 5.22658C19.7501 5.27375 19.7501 5.32161 19.7501 5.37017V19.3743C19.7501 20.8395 18.0231 21.7118 16.8857 20.671C16.8062 20.5983 16.694 20.5983 16.6145 20.671L16.1314 21.1131C15.2032 21.9624 13.7969 21.9624 12.8688 21.1131C12.5138 20.7882 11.9864 20.7882 11.6314 21.1131C10.7032 21.9624 9.2969 21.9624 8.3688 21.1131C8.0138 20.7882 7.48637 20.7882 7.13138 21.1131C6.20319 21.9624 4.79694 21.9624 3.86875 21.1131L3.38566 20.671C3.30618 20.5983 3.19395 20.5983 3.11448 20.671C1.97705 21.7118 0.250073 20.8395 0.250073 19.3743V5.37017C0.250073 5.32161 0.250053 5.27375 0.250033 5.22658C0.249653 4.17258 0.249393 3.46274 0.445453 2.86562C0.815913 1.73729 1.68002 0.84164 2.79298 0.45438C3.3823 0.24932 4.08203 0.24963 5.09878 0.25007ZM5.24508 1.75011C4.024 1.75011 3.6034 1.7606 3.28593 1.87106C2.62655 2.1005 2.09919 2.63731 1.8706 3.33353C1.75951 3.67186 1.75007 4.11799 1.75007 5.37017V19.3743C1.75007 19.4933 1.80999 19.5661 1.88517 19.6009C1.92434 19.619 1.96264 19.6237 1.99456 19.6194C2.0227 19.6156 2.05911 19.6035 2.10185 19.5644C2.75453 18.9671 3.74561 18.9671 4.39828 19.5644L4.88138 20.0065C5.23637 20.3313 5.76377 20.3313 6.11875 20.0065C7.04694 19.1571 8.4532 19.1571 9.3814 20.0065C9.7364 20.3313 10.2638 20.3313 10.6188 20.0065C11.5469 19.1571 12.9532 19.1571 13.8814 20.0065C14.2364 20.3313 14.7638 20.3313 15.1188 20.0065L15.6019 19.5644C16.2545 18.9671 17.2456 18.9671 17.8983 19.5644C17.941 19.6035 17.9774 19.6156 18.0056 19.6194C18.0375 19.6237 18.0758 19.619 18.115 19.6009C18.1901 19.5661 18.2501 19.4934 18.2501 19.3743V5.37017C18.2501 4.118 18.2406 3.67186 18.1295 3.33353C17.9009 2.63731 17.3736 2.1005 16.7142 1.87106C16.3967 1.7606 15.9761 1.75011 14.7551 1.75011H5.24508ZM4.25007 6.50011C4.25007 6.0859 4.58585 5.75011 5.00007 5.75011H5.50007C5.91428 5.75011 6.25007 6.0859 6.25007 6.50011C6.25007 6.91433 5.91428 7.25011 5.50007 7.25011H5.00007C4.58585 7.25011 4.25007 6.91433 4.25007 6.50011ZM7.75007 6.50011C7.75007 6.0859 8.0859 5.75011 8.5001 5.75011H15.0001C15.4143 5.75011 15.7501 6.0859 15.7501 6.50011C15.7501 6.91433 15.4143 7.25011 15.0001 7.25011H8.5001C8.0859 7.25011 7.75007 6.91433 7.75007 6.50011ZM4.25007 10.0001C4.25007 9.58593 4.58585 9.25013 5.00007 9.25013H5.50007C5.91428 9.25013 6.25007 9.58593 6.25007 10.0001C6.25007 10.4143 5.91428 10.7501 5.50007 10.7501H5.00007C4.58585 10.7501 4.25007 10.4143 4.25007 10.0001ZM7.75007 10.0001C7.75007 9.58593 8.0859 9.25013 8.5001 9.25013H15.0001C15.4143 9.25013 15.7501 9.58593 15.7501 10.0001C15.7501 10.4143 15.4143 10.7501 15.0001 10.7501H8.5001C8.0859 10.7501 7.75007 10.4143 7.75007 10.0001ZM4.25007 13.5001C4.25007 13.0859 4.58585 12.7501 5.00007 12.7501H5.50007C5.91428 12.7501 6.25007 13.0859 6.25007 13.5001C6.25007 13.9143 5.91428 14.2501 5.50007 14.2501H5.00007C4.58585 14.2501 4.25007 13.9143 4.25007 13.5001ZM7.75007 13.5001C7.75007 13.0859 8.0859 12.7501 8.5001 12.7501H15.0001C15.4143 12.7501 15.7501 13.0859 15.7501 13.5001C15.7501 13.9143 15.4143 14.2501 15.0001 14.2501H8.5001C8.0859 14.2501 7.75007 13.9143 7.75007 13.5001Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a data-tooltip="Edit item" class="sepV_a ext_disabled iconBtn update_btn_menu_status" href="javascript:void(0);" id="edit" onclick="itemform('no', '1300706046');">
                                                                                            <span class="edit-square-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a iconBtn min-width-tooltip-130" href="javascript:void(0)" onclick="update_nutritions_items_details('1300706046')" data-tooltip="Update items nutrition info details">
                                                                                            <span class="update-nutritions-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a id="show_change" data-tooltip="Show changes" class="ext_disabled iconBtn " onclick="show_changes('1300706046')" href="javascript:void(0);">
                                                                                            <span class="book-line-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                                                </svg></span></a></div>
                                                                                </td><input type="hidden" name="data[Item][allow_variation][]" id="allowvariation_2" value="0"><input type="hidden" name="data[Item][allow_addon][]" id="allowaddon_2" value="0"><input type="hidden" name="data[Item][packing_charges][]" id="packing_charges_2" value="0"><input type="hidden" name="data[Item][desktop_order_type][]" id="desktop_order_type_2" value="1,2,3"><input type="hidden" name="data[Item][parent_id][]" id="parent_id_2" value="0"><input type="hidden" name="data[Item][id][]" id="id2" value="1300706046"><input type="hidden" name="data[Item][ho][]" id="ho2" value="0"><input type="hidden" name="data[Item][is_modify][]" id="ismodify_2" value="0"><input type="hidden" name="data[Item][ignore_taxes][]" id="ignore_taxes2" value="0"><input type="hidden" name="data[Item][ignore_discounts][]" id="ignore_discounts2" value="0"><input type="hidden" name="data[Item][addon_group_ids][]" id="addon_group_ids2" value=""><input type="hidden" name="data[Item][addon_based_on][]" id="addon_based_on2" value="0"><input type="hidden" name="data[Item][attributes][]" id="attributes_2" value="1,570"><input type="hidden" name="data[Item][days_id][]" id="days_id2" value="-1">
                                                                            </tr>
                                                                            <tr id="tr_index_3" class="parent-tr-wrap menu_tr_1301324222  attr-veg " data-id="1301324222">
                                                                                <td class="pt-15 selection table-checkbox-width ps-checkbox-group">
                                                                                    <center><label class="ps-checkbox-container mb-0"> <input type="checkbox" class="row_sel" name="data[row_sel][1301324222]" chk_itmid="1301324222" data-var="0"> <span class="ps-checkmark"></span> </label></center>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="">
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="ps-form-group input-group align-items-center px-0 col-xl-11 mb-0 col-xl-12"><input name="data[Item][name][]" id="name_3" value="Ice Crem" maxlength="150" class="form-control  modify " tabindex="31" type="text" required="required">
                                                                                                <div class="input-group-append tooltip-wrap red align-items-baseline"><a data-bs-toggle="tooltip" data-tooltip="Add Variation" data-bs-placement="top" id="view" onclick="add_new_variation('1301324222',0,'Ice Crem','0','1','1')" href="javascript:void(0)"><strong class="v-plus-darkgrey">V+</strong></a> | <a data-bs-toggle="tooltip" data-tooltip="Expose in Online Order" data-bs-placement="top" href="javascript:void(0)"><strong>O</strong></a></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><span for="type" class="error" id="name_validation_3"></span>
                                                                                    <div class="d-flex justify-content-end"></div>
                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][short_name][]" id="shortname_3" maxlength="20" class="form-control modify " tabindex="32" type="text" value="ic" required="required"><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="short_name_validation_3"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly   ">
                                                                                    <div class="ps-form-group mb-0 d-flex align-items-center">
                                                                                        <div><input name="data[Item][online_display_name][]" id="onlinedisplayname_3" maxlength="150" class="form-control modify online_item_name" tabindex="33" type="text"><span class="pp-textfield-focused"></span>
                                                                                            <span for="type" class="error" id="online_display_name_validation_3"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly" style="display:none;" id="ps-select-parent">
                                                                                    <div class="ps-form-group ps-select2-border category-dropdown mb-0"><select name="data[Item][category_id][]" id="categoryid_3" class="modify form-control pp-select2 categoryid select2-hidden-accessible" tabindex="-1" onchange="handleCategoryChange(this)" data-key="3" required="required" data-select2-id="categoryid_3" aria-hidden="true">
                                                                                            <option value="">Select Category</option>
                                                                                            <option value="add_new">Add New Category</option>
                                                                                            <option value="9408548" selected="selected" data-select2-id="20">Dessert</option>
                                                                                            <option value="9408549">Add On</option>
                                                                                            <option value="9408551">Continental Main Course</option>
                                                                                            <option value="9408552">Asian Main Course</option>
                                                                                            <option value="9408550">Indian Main Course</option>
                                                                                            <option value="9408553">Sushi Rolls</option>
                                                                                            <option value="9408554">From The Pizza Oven</option>
                                                                                            <option value="9408555">Indian Small Bites</option>
                                                                                            <option value="9408556">Continental Small Bites</option>
                                                                                            <option value="9408557">Asian Small Bites</option>
                                                                                            <option value="9408558">From The Tandoor</option>
                                                                                            <option value="9408559">Soup</option>
                                                                                            <option value="9408560">Salad</option>
                                                                                            <option value="9408561">Mocktails</option>
                                                                                            <option value="9408563">Shooters</option>
                                                                                            <option value="9408562">Beverages</option>
                                                                                            <option value="9408564">Cocktail</option>
                                                                                            <option value="9408565">Apperitifs</option>
                                                                                            <option value="9408566">Liquer</option>
                                                                                            <option value="9408567">Red Wine</option>
                                                                                            <option value="9408568">White Wine</option>
                                                                                            <option value="9408569">Rose Wine</option>
                                                                                            <option value="9408570">Sparking &amp; Champagne</option>
                                                                                            <option value="9408571">Tequila</option>
                                                                                            <option value="9408572">Cognac &amp; Brandy</option>
                                                                                            <option value="9408573">Gin</option>
                                                                                            <option value="9408574">Inhouse Gin &amp; Tonic</option>
                                                                                            <option value="9408575">Vodka</option>
                                                                                            <option value="9408576">Beer On Taps</option>
                                                                                            <option value="9408577">Bottle Beer</option>
                                                                                            <option value="9408578">Singlemalt</option>
                                                                                            <option value="9408579">Bourbon, Irish &amp; Tennesse</option>
                                                                                            <option value="9408580">Whiskey Scotch</option>
                                                                                            <option value="9408581">Rum</option>
                                                                                            <option value="9542612">11 party course</option>
                                                                                            <option value="9542779">11 PARTY BAR MENU</option>
                                                                                        </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="19" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="34" aria-disabled="false" aria-labelledby="select2-categoryid_3-container"><span class="select2-selection__rendered" id="select2-categoryid_3-container" role="textbox" aria-readonly="true" title="Dessert">Dessert</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="category_id_validation_3"></span>
                                                                                    </div>
                                                                                    <input type="hidden" name="category_create[]" class="category_create" value="">

                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group input-group mb-0 side-pad-table"><input name="data[Item][price][]" id="price_3" value="99" maxlength="7" class="price form-control modify  no_variation pr_allow" tabindex="35" old_price="99" type="text" required="required">
                                                                                        <div class="input-group-append info-iocn-append"></div><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="price_validation_3"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][description][]" id="description_3" maxlength="1000" class="modify form-control item_description" tabindex="36" type="text" value=""><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="description_validation_3"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="ps-toggle-group text-center" style="display:none;">
                                                                                    <p class="ps-toggle m-0 pl-0 pb-10 "><input type="checkbox" name="data[Item][status][1301324222]" id="status_3" class="custom-control-input wi-20 modify  " tabindex="37" value="1" checked="checked"><label class="custom-control-label font-italic " for="status_3"></label></p>
                                                                                </td>
                                                                                <td class="menu-file-upload text-center" width="5%">
                                                                                    <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                                        <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                                            <div class="btn-file vertical-align-bottom gp_img_upload_popup iconBtn" data-item-id="1301324222"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                                                                <td id="essential" class="action-btn-flex">
                                                                                    <div class="d-flex align-items-center"><a class="ext_disabled sepV_a iconBtn " href="javascript:void(0)" onclick="show_details('1301324222')" data-tooltip="Item details">
                                                                                            <span class="show-eye-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M12.42 21.99H8.13818C3.85636 21.99 3 19.9911 3 15.9933V9.99665C3 5.4392 4.43013 4.19989 7.28182 4.01999" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V15" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M22.3749 19.4082C22.0469 18.5726 21.4809 17.8517 20.7471 17.3348C20.0132 16.8178 19.1439 16.5276 18.2467 16.5C17.3495 16.5276 16.4801 16.8178 15.7463 17.3348C15.0125 17.8517 14.4465 18.5726 14.1184 19.4082L14 19.685L14.1184 19.9618C14.4465 20.7974 15.0125 21.5183 15.7463 22.0352C16.4801 22.5522 17.3495 22.8424 18.2467 22.87C19.1439 22.8424 20.0132 22.5522 20.7471 22.0352C21.4809 21.5183 22.0469 20.7974 22.3749 19.9618L22.4933 19.685L22.3749 19.4082ZM18.2467 21.8083C17.8267 21.8083 17.4162 21.6838 17.067 21.4505C16.7178 21.2172 16.4457 20.8856 16.285 20.4976C16.1243 20.1096 16.0822 19.6826 16.1641 19.2708C16.2461 18.8589 16.4483 18.4805 16.7452 18.1836C17.0422 17.8866 17.4205 17.6844 17.8324 17.6025C18.2443 17.5205 18.6712 17.5626 19.0592 17.7233C19.4472 17.884 19.7788 18.1562 20.0122 18.5053C20.2455 18.8545 20.37 19.265 20.37 19.685C20.3694 20.248 20.1455 20.7877 19.7474 21.1857C19.3493 21.5838 18.8096 21.8077 18.2467 21.8083Z" fill="#646464"></path>
                                                                                                    <path d="M18.2459 21.0461C18.9976 21.0461 19.607 20.4367 19.607 19.685C19.607 18.9333 18.9976 18.3239 18.2459 18.3239C17.4942 18.3239 16.8848 18.9333 16.8848 19.685C16.8848 20.4367 17.4942 21.0461 18.2459 21.0461Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a  iconBtn " href="javascript:void(0)" onclick="update_items_details('1301324222')" data-tooltip="Update areawise price &amp; status">
                                                                                            <span class="update-areawise-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.09878 0.25007C5.14683 0.25009 5.19559 0.25011 5.24508 0.25011H14.7551C14.8045 0.25011 14.8533 0.25009 14.9014 0.25007C15.9181 0.24963 16.6178 0.24932 17.2072 0.45438C18.3201 0.84164 19.1842 1.73729 19.5547 2.86562C19.7507 3.46274 19.7505 4.17257 19.7501 5.22658C19.7501 5.27375 19.7501 5.32161 19.7501 5.37017V19.3743C19.7501 20.8395 18.0231 21.7118 16.8857 20.671C16.8062 20.5983 16.694 20.5983 16.6145 20.671L16.1314 21.1131C15.2032 21.9624 13.7969 21.9624 12.8688 21.1131C12.5138 20.7882 11.9864 20.7882 11.6314 21.1131C10.7032 21.9624 9.2969 21.9624 8.3688 21.1131C8.0138 20.7882 7.48637 20.7882 7.13138 21.1131C6.20319 21.9624 4.79694 21.9624 3.86875 21.1131L3.38566 20.671C3.30618 20.5983 3.19395 20.5983 3.11448 20.671C1.97705 21.7118 0.250073 20.8395 0.250073 19.3743V5.37017C0.250073 5.32161 0.250053 5.27375 0.250033 5.22658C0.249653 4.17258 0.249393 3.46274 0.445453 2.86562C0.815913 1.73729 1.68002 0.84164 2.79298 0.45438C3.3823 0.24932 4.08203 0.24963 5.09878 0.25007ZM5.24508 1.75011C4.024 1.75011 3.6034 1.7606 3.28593 1.87106C2.62655 2.1005 2.09919 2.63731 1.8706 3.33353C1.75951 3.67186 1.75007 4.11799 1.75007 5.37017V19.3743C1.75007 19.4933 1.80999 19.5661 1.88517 19.6009C1.92434 19.619 1.96264 19.6237 1.99456 19.6194C2.0227 19.6156 2.05911 19.6035 2.10185 19.5644C2.75453 18.9671 3.74561 18.9671 4.39828 19.5644L4.88138 20.0065C5.23637 20.3313 5.76377 20.3313 6.11875 20.0065C7.04694 19.1571 8.4532 19.1571 9.3814 20.0065C9.7364 20.3313 10.2638 20.3313 10.6188 20.0065C11.5469 19.1571 12.9532 19.1571 13.8814 20.0065C14.2364 20.3313 14.7638 20.3313 15.1188 20.0065L15.6019 19.5644C16.2545 18.9671 17.2456 18.9671 17.8983 19.5644C17.941 19.6035 17.9774 19.6156 18.0056 19.6194C18.0375 19.6237 18.0758 19.619 18.115 19.6009C18.1901 19.5661 18.2501 19.4934 18.2501 19.3743V5.37017C18.2501 4.118 18.2406 3.67186 18.1295 3.33353C17.9009 2.63731 17.3736 2.1005 16.7142 1.87106C16.3967 1.7606 15.9761 1.75011 14.7551 1.75011H5.24508ZM4.25007 6.50011C4.25007 6.0859 4.58585 5.75011 5.00007 5.75011H5.50007C5.91428 5.75011 6.25007 6.0859 6.25007 6.50011C6.25007 6.91433 5.91428 7.25011 5.50007 7.25011H5.00007C4.58585 7.25011 4.25007 6.91433 4.25007 6.50011ZM7.75007 6.50011C7.75007 6.0859 8.0859 5.75011 8.5001 5.75011H15.0001C15.4143 5.75011 15.7501 6.0859 15.7501 6.50011C15.7501 6.91433 15.4143 7.25011 15.0001 7.25011H8.5001C8.0859 7.25011 7.75007 6.91433 7.75007 6.50011ZM4.25007 10.0001C4.25007 9.58593 4.58585 9.25013 5.00007 9.25013H5.50007C5.91428 9.25013 6.25007 9.58593 6.25007 10.0001C6.25007 10.4143 5.91428 10.7501 5.50007 10.7501H5.00007C4.58585 10.7501 4.25007 10.4143 4.25007 10.0001ZM7.75007 10.0001C7.75007 9.58593 8.0859 9.25013 8.5001 9.25013H15.0001C15.4143 9.25013 15.7501 9.58593 15.7501 10.0001C15.7501 10.4143 15.4143 10.7501 15.0001 10.7501H8.5001C8.0859 10.7501 7.75007 10.4143 7.75007 10.0001ZM4.25007 13.5001C4.25007 13.0859 4.58585 12.7501 5.00007 12.7501H5.50007C5.91428 12.7501 6.25007 13.0859 6.25007 13.5001C6.25007 13.9143 5.91428 14.2501 5.50007 14.2501H5.00007C4.58585 14.2501 4.25007 13.9143 4.25007 13.5001ZM7.75007 13.5001C7.75007 13.0859 8.0859 12.7501 8.5001 12.7501H15.0001C15.4143 12.7501 15.7501 13.0859 15.7501 13.5001C15.7501 13.9143 15.4143 14.2501 15.0001 14.2501H8.5001C8.0859 14.2501 7.75007 13.9143 7.75007 13.5001Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a data-tooltip="Edit item" class="sepV_a ext_disabled iconBtn update_btn_menu_status" href="javascript:void(0);" id="edit" onclick="itemform('no', '1301324222');">
                                                                                            <span class="edit-square-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a iconBtn min-width-tooltip-130" href="javascript:void(0)" onclick="update_nutritions_items_details('1301324222')" data-tooltip="Update items nutrition info details">
                                                                                            <span class="update-nutritions-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a id="show_change" data-tooltip="Show changes" class="ext_disabled iconBtn " onclick="show_changes('1301324222')" href="javascript:void(0);">
                                                                                            <span class="book-line-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                                                </svg></span></a></div>
                                                                                </td><input type="hidden" name="data[Item][allow_variation][]" id="allowvariation_3" value="0"><input type="hidden" name="data[Item][allow_addon][]" id="allowaddon_3" value="0"><input type="hidden" name="data[Item][packing_charges][]" id="packing_charges_3" value="0"><input type="hidden" name="data[Item][desktop_order_type][]" id="desktop_order_type_3" value="2,3"><input type="hidden" name="data[Item][parent_id][]" id="parent_id_3" value="0"><input type="hidden" name="data[Item][id][]" id="id3" value="1301324222"><input type="hidden" name="data[Item][ho][]" id="ho3" value="0"><input type="hidden" name="data[Item][is_modify][]" id="ismodify_3" value="0"><input type="hidden" name="data[Item][ignore_taxes][]" id="ignore_taxes3" value="0"><input type="hidden" name="data[Item][ignore_discounts][]" id="ignore_discounts3" value="0"><input type="hidden" name="data[Item][addon_group_ids][]" id="addon_group_ids3" value="0"><input type="hidden" name="data[Item][addon_based_on][]" id="addon_based_on3" value="0"><input type="hidden" name="data[Item][attributes][]" id="attributes_3" value="1"><input type="hidden" name="data[Item][days_id][]" id="days_id3" value="-1">
                                                                            </tr>
                                                                            <tr id="tr_index_4" class="parent-tr-wrap menu_tr_1302293123  attr-veg " data-id="1302293123">
                                                                                <td class="pt-15 selection table-checkbox-width ps-checkbox-group">
                                                                                    <center><label class="ps-checkbox-container mb-0"> <input type="checkbox" class="row_sel" name="data[row_sel][1302293123]" chk_itmid="1302293123" data-var="0"> <span class="ps-checkmark"></span> </label></center>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="">
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="ps-form-group input-group align-items-center px-0 col-xl-11 mb-0 col-xl-12"><input name="data[Item][name][]" id="name_4" value="Moltan Lava Cake With Ice Cream And Chocolate" maxlength="150" class="form-control  modify " tabindex="41" type="text" required="required">
                                                                                                <div class="input-group-append tooltip-wrap red align-items-baseline"><a data-bs-toggle="tooltip" data-tooltip="Add Variation" data-bs-placement="top" id="view" onclick="add_new_variation('1302293123',0,'Moltan Lava Cake With Ice Cream And Chocolate','0','1','1')" href="javascript:void(0)"><strong class="v-plus-darkgrey">V+</strong></a> | <a data-bs-toggle="tooltip" data-tooltip="Expose in Online Order" data-bs-placement="top" href="javascript:void(0)"><strong>O</strong></a></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><span for="type" class="error" id="name_validation_4"></span>
                                                                                    <div class="d-flex justify-content-end"></div>
                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][short_name][]" id="shortname_4" maxlength="20" class="form-control modify " tabindex="42" type="text" value="mlc" required="required"><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="short_name_validation_4"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly   ">
                                                                                    <div class="ps-form-group mb-0 d-flex align-items-center">
                                                                                        <div><input name="data[Item][online_display_name][]" id="onlinedisplayname_4" maxlength="150" class="form-control modify online_item_name" tabindex="43" type="text"><span class="pp-textfield-focused"></span>
                                                                                            <span for="type" class="error" id="online_display_name_validation_4"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly" style="display:none;" id="ps-select-parent">
                                                                                    <div class="ps-form-group ps-select2-border category-dropdown mb-0"><select name="data[Item][category_id][]" id="categoryid_4" class="modify form-control pp-select2 categoryid select2-hidden-accessible" tabindex="-1" onchange="handleCategoryChange(this)" data-key="4" required="required" data-select2-id="categoryid_4" aria-hidden="true">
                                                                                            <option value="">Select Category</option>
                                                                                            <option value="add_new">Add New Category</option>
                                                                                            <option value="9408548" selected="selected" data-select2-id="22">Dessert</option>
                                                                                            <option value="9408549">Add On</option>
                                                                                            <option value="9408551">Continental Main Course</option>
                                                                                            <option value="9408552">Asian Main Course</option>
                                                                                            <option value="9408550">Indian Main Course</option>
                                                                                            <option value="9408553">Sushi Rolls</option>
                                                                                            <option value="9408554">From The Pizza Oven</option>
                                                                                            <option value="9408555">Indian Small Bites</option>
                                                                                            <option value="9408556">Continental Small Bites</option>
                                                                                            <option value="9408557">Asian Small Bites</option>
                                                                                            <option value="9408558">From The Tandoor</option>
                                                                                            <option value="9408559">Soup</option>
                                                                                            <option value="9408560">Salad</option>
                                                                                            <option value="9408561">Mocktails</option>
                                                                                            <option value="9408563">Shooters</option>
                                                                                            <option value="9408562">Beverages</option>
                                                                                            <option value="9408564">Cocktail</option>
                                                                                            <option value="9408565">Apperitifs</option>
                                                                                            <option value="9408566">Liquer</option>
                                                                                            <option value="9408567">Red Wine</option>
                                                                                            <option value="9408568">White Wine</option>
                                                                                            <option value="9408569">Rose Wine</option>
                                                                                            <option value="9408570">Sparking &amp; Champagne</option>
                                                                                            <option value="9408571">Tequila</option>
                                                                                            <option value="9408572">Cognac &amp; Brandy</option>
                                                                                            <option value="9408573">Gin</option>
                                                                                            <option value="9408574">Inhouse Gin &amp; Tonic</option>
                                                                                            <option value="9408575">Vodka</option>
                                                                                            <option value="9408576">Beer On Taps</option>
                                                                                            <option value="9408577">Bottle Beer</option>
                                                                                            <option value="9408578">Singlemalt</option>
                                                                                            <option value="9408579">Bourbon, Irish &amp; Tennesse</option>
                                                                                            <option value="9408580">Whiskey Scotch</option>
                                                                                            <option value="9408581">Rum</option>
                                                                                            <option value="9542612">11 party course</option>
                                                                                            <option value="9542779">11 PARTY BAR MENU</option>
                                                                                        </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="21" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="44" aria-disabled="false" aria-labelledby="select2-categoryid_4-container"><span class="select2-selection__rendered" id="select2-categoryid_4-container" role="textbox" aria-readonly="true" title="Dessert">Dessert</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="category_id_validation_4"></span>
                                                                                    </div>
                                                                                    <input type="hidden" name="category_create[]" class="category_create" value="">

                                                                                </td>
                                                                                <td class="publish_readonly  ">
                                                                                    <div class="ps-form-group input-group mb-0 side-pad-table"><input name="data[Item][price][]" id="price_4" value="225" maxlength="7" class="price form-control modify  no_variation pr_allow" tabindex="45" old_price="225" type="text" required="required">
                                                                                        <div class="input-group-append info-iocn-append"></div><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="price_validation_4"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="publish_readonly ">
                                                                                    <div class="ps-form-group mb-0"><input name="data[Item][description][]" id="description_4" maxlength="1000" class="modify form-control item_description" tabindex="46" type="text" value=""><span class="pp-textfield-focused"></span>
                                                                                        <span for="type" class="error" id="description_validation_4"></span>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="ps-toggle-group text-center" style="display:none;">
                                                                                    <p class="ps-toggle m-0 pl-0 pb-10 "><input type="checkbox" name="data[Item][status][1302293123]" id="status_4" class="custom-control-input wi-20 modify  " tabindex="47" value="1" checked="checked"><label class="custom-control-label font-italic " for="status_4"></label></p>
                                                                                </td>
                                                                                <td class="menu-file-upload text-center" width="5%">
                                                                                    <div class="controls white-label-controls d-flex justify-content-start align-items-center">
                                                                                        <div class="form-group custom-input mb-0 cursor-pointer uploadIcon">
                                                                                            <div class="btn-file vertical-align-bottom gp_img_upload_popup iconBtn" data-item-id="1302293123"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                                                                <td id="essential" class="action-btn-flex">
                                                                                    <div class="d-flex align-items-center"><a class="ext_disabled sepV_a iconBtn " href="javascript:void(0)" onclick="show_details('1302293123')" data-tooltip="Item details">
                                                                                            <span class="show-eye-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M12.42 21.99H8.13818C3.85636 21.99 3 19.9911 3 15.9933V9.99665C3 5.4392 4.43013 4.19989 7.28182 4.01999" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V15" stroke="#646464" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                    <path d="M22.3749 19.4082C22.0469 18.5726 21.4809 17.8517 20.7471 17.3348C20.0132 16.8178 19.1439 16.5276 18.2467 16.5C17.3495 16.5276 16.4801 16.8178 15.7463 17.3348C15.0125 17.8517 14.4465 18.5726 14.1184 19.4082L14 19.685L14.1184 19.9618C14.4465 20.7974 15.0125 21.5183 15.7463 22.0352C16.4801 22.5522 17.3495 22.8424 18.2467 22.87C19.1439 22.8424 20.0132 22.5522 20.7471 22.0352C21.4809 21.5183 22.0469 20.7974 22.3749 19.9618L22.4933 19.685L22.3749 19.4082ZM18.2467 21.8083C17.8267 21.8083 17.4162 21.6838 17.067 21.4505C16.7178 21.2172 16.4457 20.8856 16.285 20.4976C16.1243 20.1096 16.0822 19.6826 16.1641 19.2708C16.2461 18.8589 16.4483 18.4805 16.7452 18.1836C17.0422 17.8866 17.4205 17.6844 17.8324 17.6025C18.2443 17.5205 18.6712 17.5626 19.0592 17.7233C19.4472 17.884 19.7788 18.1562 20.0122 18.5053C20.2455 18.8545 20.37 19.265 20.37 19.685C20.3694 20.248 20.1455 20.7877 19.7474 21.1857C19.3493 21.5838 18.8096 21.8077 18.2467 21.8083Z" fill="#646464"></path>
                                                                                                    <path d="M18.2459 21.0461C18.9976 21.0461 19.607 20.4367 19.607 19.685C19.607 18.9333 18.9976 18.3239 18.2459 18.3239C17.4942 18.3239 16.8848 18.9333 16.8848 19.685C16.8848 20.4367 17.4942 21.0461 18.2459 21.0461Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a  iconBtn " href="javascript:void(0)" onclick="update_items_details('1302293123')" data-tooltip="Update areawise price &amp; status">
                                                                                            <span class="update-areawise-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.09878 0.25007C5.14683 0.25009 5.19559 0.25011 5.24508 0.25011H14.7551C14.8045 0.25011 14.8533 0.25009 14.9014 0.25007C15.9181 0.24963 16.6178 0.24932 17.2072 0.45438C18.3201 0.84164 19.1842 1.73729 19.5547 2.86562C19.7507 3.46274 19.7505 4.17257 19.7501 5.22658C19.7501 5.27375 19.7501 5.32161 19.7501 5.37017V19.3743C19.7501 20.8395 18.0231 21.7118 16.8857 20.671C16.8062 20.5983 16.694 20.5983 16.6145 20.671L16.1314 21.1131C15.2032 21.9624 13.7969 21.9624 12.8688 21.1131C12.5138 20.7882 11.9864 20.7882 11.6314 21.1131C10.7032 21.9624 9.2969 21.9624 8.3688 21.1131C8.0138 20.7882 7.48637 20.7882 7.13138 21.1131C6.20319 21.9624 4.79694 21.9624 3.86875 21.1131L3.38566 20.671C3.30618 20.5983 3.19395 20.5983 3.11448 20.671C1.97705 21.7118 0.250073 20.8395 0.250073 19.3743V5.37017C0.250073 5.32161 0.250053 5.27375 0.250033 5.22658C0.249653 4.17258 0.249393 3.46274 0.445453 2.86562C0.815913 1.73729 1.68002 0.84164 2.79298 0.45438C3.3823 0.24932 4.08203 0.24963 5.09878 0.25007ZM5.24508 1.75011C4.024 1.75011 3.6034 1.7606 3.28593 1.87106C2.62655 2.1005 2.09919 2.63731 1.8706 3.33353C1.75951 3.67186 1.75007 4.11799 1.75007 5.37017V19.3743C1.75007 19.4933 1.80999 19.5661 1.88517 19.6009C1.92434 19.619 1.96264 19.6237 1.99456 19.6194C2.0227 19.6156 2.05911 19.6035 2.10185 19.5644C2.75453 18.9671 3.74561 18.9671 4.39828 19.5644L4.88138 20.0065C5.23637 20.3313 5.76377 20.3313 6.11875 20.0065C7.04694 19.1571 8.4532 19.1571 9.3814 20.0065C9.7364 20.3313 10.2638 20.3313 10.6188 20.0065C11.5469 19.1571 12.9532 19.1571 13.8814 20.0065C14.2364 20.3313 14.7638 20.3313 15.1188 20.0065L15.6019 19.5644C16.2545 18.9671 17.2456 18.9671 17.8983 19.5644C17.941 19.6035 17.9774 19.6156 18.0056 19.6194C18.0375 19.6237 18.0758 19.619 18.115 19.6009C18.1901 19.5661 18.2501 19.4934 18.2501 19.3743V5.37017C18.2501 4.118 18.2406 3.67186 18.1295 3.33353C17.9009 2.63731 17.3736 2.1005 16.7142 1.87106C16.3967 1.7606 15.9761 1.75011 14.7551 1.75011H5.24508ZM4.25007 6.50011C4.25007 6.0859 4.58585 5.75011 5.00007 5.75011H5.50007C5.91428 5.75011 6.25007 6.0859 6.25007 6.50011C6.25007 6.91433 5.91428 7.25011 5.50007 7.25011H5.00007C4.58585 7.25011 4.25007 6.91433 4.25007 6.50011ZM7.75007 6.50011C7.75007 6.0859 8.0859 5.75011 8.5001 5.75011H15.0001C15.4143 5.75011 15.7501 6.0859 15.7501 6.50011C15.7501 6.91433 15.4143 7.25011 15.0001 7.25011H8.5001C8.0859 7.25011 7.75007 6.91433 7.75007 6.50011ZM4.25007 10.0001C4.25007 9.58593 4.58585 9.25013 5.00007 9.25013H5.50007C5.91428 9.25013 6.25007 9.58593 6.25007 10.0001C6.25007 10.4143 5.91428 10.7501 5.50007 10.7501H5.00007C4.58585 10.7501 4.25007 10.4143 4.25007 10.0001ZM7.75007 10.0001C7.75007 9.58593 8.0859 9.25013 8.5001 9.25013H15.0001C15.4143 9.25013 15.7501 9.58593 15.7501 10.0001C15.7501 10.4143 15.4143 10.7501 15.0001 10.7501H8.5001C8.0859 10.7501 7.75007 10.4143 7.75007 10.0001ZM4.25007 13.5001C4.25007 13.0859 4.58585 12.7501 5.00007 12.7501H5.50007C5.91428 12.7501 6.25007 13.0859 6.25007 13.5001C6.25007 13.9143 5.91428 14.2501 5.50007 14.2501H5.00007C4.58585 14.2501 4.25007 13.9143 4.25007 13.5001ZM7.75007 13.5001C7.75007 13.0859 8.0859 12.7501 8.5001 12.7501H15.0001C15.4143 12.7501 15.7501 13.0859 15.7501 13.5001C15.7501 13.9143 15.4143 14.2501 15.0001 14.2501H8.5001C8.0859 14.2501 7.75007 13.9143 7.75007 13.5001Z" fill="#646464"></path>
                                                                                                </svg></span>
                                                                                        </a><a data-tooltip="Edit item" class="sepV_a ext_disabled iconBtn update_btn_menu_status" href="javascript:void(0);" id="edit" onclick="itemform('no', '1302293123');">
                                                                                            <span class="edit-square-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M15 6L18 9M13 20H21M5 16L4 20L8 19L19.586 7.414C19.9609 7.03895 20.1716 6.53033 20.1716 6C20.1716 5.46967 19.9609 4.96106 19.586 4.586L19.414 4.414C19.0389 4.03906 18.5303 3.82843 18 3.82843C17.4697 3.82843 16.9611 4.03906 16.586 4.414L5 16Z" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a class="ext_disabled update-areawise-text sepV_a iconBtn min-width-tooltip-130" href="javascript:void(0)" onclick="update_nutritions_items_details('1302293123')" data-tooltip="Update items nutrition info details">
                                                                                            <span class="update-nutritions-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M13 3H7C5.89543 3 5 3.89543 5 5V10M13 3L19 9M13 3V8C13 8.55228 13.4477 9 14 9H19M19 9V19C19 20.1046 18.1046 21 17 21H10C7.79086 21 6 19.2091 6 17C6 14.7909 7.79086 13 10 13H13M13 13L10 10M13 13L10 16" stroke="#646464" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                                </svg></span>
                                                                                        </a><a id="show_change" data-tooltip="Show changes" class="ext_disabled iconBtn " onclick="show_changes('1302293123')" href="javascript:void(0);">
                                                                                            <span class="book-line-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                    <path d="M16 4.00201C18.175 4.01401 19.353 4.11101 20.121 4.87901C21 5.75801 21 7.17201 21 10V16C21 18.829 21 20.243 20.121 21.122C19.243 22 17.828 22 15 22H9C6.172 22 4.757 22 3.879 21.122C3 20.242 3 18.829 3 16V10C3 7.17201 3 5.75801 3.879 4.87901C4.647 4.11101 5.825 4.01401 8 4.00201" stroke="#646464" stroke-width="1.5"></path>
                                                                                                    <path d="M8 14H16M7 10.5H17M9 17.5H15" stroke="#646464" stroke-width="1.5" stroke-linecap="round"></path>
                                                                                                    <path d="M8 3.5C8 3.10218 8.15804 2.72064 8.43934 2.43934C8.72064 2.15804 9.10218 2 9.5 2H14.5C14.8978 2 15.2794 2.15804 15.5607 2.43934C15.842 2.72064 16 3.10218 16 3.5V4.5C16 4.89782 15.842 5.27936 15.5607 5.56066C15.2794 5.84196 14.8978 6 14.5 6H9.5C9.10218 6 8.72064 5.84196 8.43934 5.56066C8.15804 5.27936 8 4.89782 8 4.5V3.5Z" stroke="#646464" stroke-width="1.5"></path>
                                                                                                </svg></span></a></div>
                                                                                </td><input type="hidden" name="data[Item][allow_variation][]" id="allowvariation_4" value="0"><input type="hidden" name="data[Item][allow_addon][]" id="allowaddon_4" value="0"><input type="hidden" name="data[Item][packing_charges][]" id="packing_charges_4" value="0"><input type="hidden" name="data[Item][desktop_order_type][]" id="desktop_order_type_4" value="1,2,3"><input type="hidden" name="data[Item][parent_id][]" id="parent_id_4" value="0"><input type="hidden" name="data[Item][id][]" id="id4" value="1302293123"><input type="hidden" name="data[Item][ho][]" id="ho4" value="0"><input type="hidden" name="data[Item][is_modify][]" id="ismodify_4" value="0"><input type="hidden" name="data[Item][ignore_taxes][]" id="ignore_taxes4" value="0"><input type="hidden" name="data[Item][ignore_discounts][]" id="ignore_discounts4" value="0"><input type="hidden" name="data[Item][addon_group_ids][]" id="addon_group_ids4" value="0"><input type="hidden" name="data[Item][addon_based_on][]" id="addon_based_on4" value="0"><input type="hidden" name="data[Item][attributes][]" id="attributes_4" value="1"><input type="hidden" name="data[Item][days_id][]" id="days_id4" value="-1">
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="card-footer bottom-pagination-sticky ps-table-footer">
                                                                    <div class="showing-records relative">
                                                                        <p>
                                                                            Showing 1 to 5 of 5 records </p>
                                                                    </div>
                                                                    <div class="ps-pagination" style="display: none;">
                                                                        <ul class="pagination float-right">
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <ul class="list-group list-inline table-action-legend px-2 py-3 flex-wrap">
                                                                <li class="list-group-item">
                                                                    <strong class="product-color">O</strong>
                                                                    <span class="product-color">Expose in online order</span>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <strong class="product-color">V</strong>
                                                                    <span class="product-color">Item having Variation</span>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <strong class="product-color">A</strong>
                                                                    <span class="product-color">Addon details</span>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <strong class="product-color">C</strong>
                                                                    <span class="product-color">Set as combo</span>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <strong class="product-color">F</strong>
                                                                    <span class="product-color">Favourite Item</span>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <strong class="product-color">K</strong>
                                                                    <span class="product-color">Expose in kiosk order</span>
                                                                </li>
                                                            </ul><input type="hidden" name="data[action]" id="action" value="edit"><input type="hidden" name="data[change_status]" id="change_status"><input type="hidden" name="data[restaurant_for_copyitem]" id="restaurant_for_copyitem"><input type="hidden" name="data[menu_date_list]" id="menu_date_list" value=""><input type="hidden" name="data[publish_date]" id="publish_date" value=""><input type="hidden" name="data[current_restaurant]" id="current_restaurant" value="427275"><input type="hidden" name="data[item_variation]" id="item_variation" value=""><input type="hidden" name="data[item_addon]" id="item_addon" value=""><input type="hidden" name="data[restaurant_variation]" id="restaurant_variation" value=""><input type="hidden" name="data[restaurant_addon]" id="restaurant_addon" value=""><input type="hidden" name="data[restaurant_category]" id="restaurant_category" value="[]"><input type="hidden" name="data[is_from_admin]" id="is_from_admin" value="0">
                                                        </form>
                                                    </div>
                                                </div>
                                                <div id="update_tag_html"></div>
                                                <div id="remove_item_confirm_html" class="new-fancybox-wrapper ps-fancybox fancy-md popup-bg"></div>
                                                <div class="user_detail update-user-detail ps-fancybox new-fancybox-wrapper fancy-md popup-bg fancybox-content" id="foodpanda_popup_div" style="display: none;overflow-x: hidden;">
                                                    <div class="popup-container menu-update">
                                                        <div class="popup-header p-3">
                                                            <h5 class="ps-title">Menu Trigger <span id="lbl_res_name" style="display:none"></span></h5>
                                                        </div>
                                                        <div class="card-body new-fancybox-body ">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                                                                        <form name="trigger_foodpanda_form" id="trigger_foodpanda_form" method="POST" class="form-horizontal triggerMenuPopup ps-table-wrapper table-responsive"><input type="hidden" name="data[current_restaurant]" id="current_restaurant" value="427275"><input type="hidden" name="data[client_id]" id="client_id" value="0">
                                                                            <div class="control-group">No third party mapped to trigger menu.</div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="popup-footer text-right">
                                                            <button onclick="$.fancybox.close();" type="button" class="ps-btn sm-btn grey-outline-btn  submit_btn" id="foodpanda_close_btn">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <style>
                                                    .spinner-button {
                                                        border: 2px solid #000;
                                                        display: inline-block;
                                                        padding: 8px 20px 9px;
                                                        font-size: 12px;
                                                        color: #000;
                                                        background-color: transparent
                                                    }

                                                    .btn-primary:disabled {
                                                        color: #fff;
                                                        background-color: #000;
                                                        border-color: #000
                                                    }

                                                    .spinner-button:hover {
                                                        background-color: #000;
                                                        border: 2px solid #000;
                                                        color: #fff
                                                    }

                                                    .spinner-button i {
                                                        color: #fff
                                                    }

                                                    .spinner-button:hover i {
                                                        color: #fff
                                                    }
                                                </style>
                                                <script>
                                                    /**
                                                     * Logic for trigger menu to foodpanda / online ordering widget / Zomato
                                                     */

                                                    $(".rest_statuscls").on('change', function() {
                                                        var vardataid = $(this).data('id');
                                                        if ($(this).val() == 0) {
                                                            $(".dunzodivs_" + vardataid + " .reasoncls input").val('');
                                                            $(".dunzodivs_" + vardataid + " .reasoncls").show();
                                                        } else {
                                                            $(".dunzodivs_" + vardataid + " .reasoncls input").val('');
                                                            $(".dunzodivs_" + vardataid + " .reasoncls").hide();
                                                        }
                                                    });

                                                    function send_foodpanda_menu() {
                                                        var res_id = $("#current_restaurant").val();
                                                        var trigger_anyways_flag = 0;
                                                        var validate_tax_flag = 0;
                                                        $.ajax({
                                                            type: "POST",
                                                            url: site_url + "items/menu_trigger/" + res_id,
                                                            async: true,
                                                            data: $('#trigger_foodpanda_form').serializeArray(),
                                                            beforeSend: function(xhr) {
                                                                $("#push_menu_btn,#tp_trigger_anyways_btn").attr('disabled', true);
                                                                $("#push_menu_btn,#tp_trigger_anyways_btn").html('<i class="fa fa-circle-o-notch fa-spin"></i> loading...');
                                                                $('#push_menu_btn,#tp_trigger_anyways_btn').addClass('btn-primary');
                                                            },
                                                            success: function(response1) {
                                                                $('#whole_page_loader').addClass('hidden');
                                                                if (response1 == '9') {
                                                                    window.location.reload(true);
                                                                    return false;
                                                                }
                                                                $("#push_menu_btn,#tp_trigger_anyways_btn").attr('disabled', false);
                                                                $("#push_menu_btn,#tp_trigger_anyways_btn").html('Push Menu');
                                                                $('#push_menu_btn,#tp_trigger_anyways_btn').addClass('btn-primary');
                                                                $('#msg').html('');
                                                                $('#msg').removeClass('alert-danger');
                                                                var response;
                                                                try {
                                                                    response = JSON.parse(response1);
                                                                } catch (e) {}
                                                                $('#msg').addClass('alert-success');
                                                                if (response.white_label_code == 0) {
                                                                    $('#msg').removeClass('alert-success');
                                                                    $('#msg').addClass('alert-danger');
                                                                }
                                                                var display_msg = '';
                                                                if (response.white_label != '') {
                                                                    display_msg += response.white_label;
                                                                    display_msg += '<br>';
                                                                }
                                                                if (response.menu_qr != '') {
                                                                    display_msg += response.menu_qr;
                                                                    display_msg += '<br>';
                                                                }
                                                                $.each(response.zomato, function(field, error) {
                                                                    if (error != "") {
                                                                        display_msg += error;
                                                                        display_msg += '<br>';
                                                                        if (response.zomato_code[field] == '0') {
                                                                            $('#msg').removeClass('alert-success');
                                                                            if (typeof response.validation_type !== 'undefined' && response.validation_type == 1) {
                                                                                trigger_anyways_flag = 0;
                                                                                validate_tax_flag = 1;
                                                                                $('#msg').addClass('alert-info');
                                                                            } else {
                                                                                trigger_anyways_flag = (typeof response.trigger_anyway !== 'undefined' && response.trigger_anyway !== null) ? response.trigger_anyway : 1;
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        } else if (typeof response.validation_type !== 'undefined' && response.validation_type == 2) {
                                                                            $('#msg').attr('style', 'font-size: medium');
                                                                            $('#msg').addClass('alert-success');
                                                                            trigger_anyways_flag = 0;
                                                                            validate_tax_flag = 2;
                                                                        } else if (typeof response.validation_type !== 'undefined' && response.validation_type == 3) {
                                                                            validate_tax_flag = 3;
                                                                            $('#msg').attr('style', 'font-size: medium');
                                                                            $('#msg').removeClass('alert-danger');
                                                                            $('#msg').addClass('alert-success');
                                                                            trigger_anyways_flag = 0;
                                                                            display_msg += '<br>';
                                                                        } else {}
                                                                    }
                                                                });

                                                                $.each(response.swiggy, function(field, error) {
                                                                    if (error != "") {
                                                                        display_msg += error;
                                                                        display_msg += '<br>';
                                                                        if (response.swiggy_code[field] == '0') {
                                                                            $('#msg').removeClass('alert-success');
                                                                            $('#msg').attr('style', 'font-size: medium');
                                                                            if (typeof response.validation_type !== 'undefined' && response.validation_type == 1) {
                                                                                trigger_anyways_flag = 0;
                                                                                validate_tax_flag = 1;
                                                                                $('#msg').addClass('alert-info');
                                                                            } else {
                                                                                trigger_anyways_flag = (typeof response.trigger_anyway !== 'undefined' && response.trigger_anyway !== null) ? response.trigger_anyway : 1;
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        } else if (typeof response.validation_type !== 'undefined' && response.validation_type == 2) {
                                                                            $('#msg').removeClass('alert-danger');
                                                                            $('#msg').addClass('alert-success');
                                                                            validate_tax_flag = 2;
                                                                            trigger_anyways_flag = 0;
                                                                        } else if (typeof response.validation_type !== 'undefined' && response.validation_type == 3) {
                                                                            validate_tax_flag = 3;
                                                                            $('#msg').attr('style', 'font-size: medium');
                                                                            $('#msg').removeClass('alert-danger');
                                                                            $('#msg').addClass('alert-success');
                                                                            trigger_anyways_flag = 0;
                                                                            display_msg += '<br>';
                                                                        } else {}
                                                                    }
                                                                });

                                                                $.each(response.ubereats, function(field, error) {
                                                                    if (error != "") {
                                                                        display_msg += error;
                                                                        display_msg += '<br>';
                                                                        if (response.ubereats_code[field] == '0') {
                                                                            $('#msg').removeClass('alert-success');
                                                                            $('#msg').addClass('alert-danger');
                                                                        }
                                                                    }
                                                                });

                                                                if (typeof response.paytm_menu_label !== "undefined") {
                                                                    $.each(response.paytm_menu_label, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.paytm_menu_code[field] == '0') {
                                                                                $('#msg').addClass('alert-error');
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                                if (typeof response.googlepay_menu_label !== "undefined") {
                                                                    $.each(response.googlepay_menu_label, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.googlepay_menu_code[field] == '0') {
                                                                                $('#msg').addClass('alert-error');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                $.each(response.dineout, function(field, error) {
                                                                    if (error != "") {
                                                                        display_msg += error;
                                                                        display_msg += '<br>';
                                                                        if (response.dineout_code[field] == '0') {
                                                                            $('#msg').removeClass('alert-success');
                                                                            $('#msg').addClass('alert-danger');
                                                                        }
                                                                    }
                                                                });

                                                                $.each(response.dotpe, function(field, error) {
                                                                    if (error != "") {
                                                                        display_msg += error;
                                                                        display_msg += '<br>';
                                                                        if (response.dotpe_code[field] == '0') {
                                                                            $('#msg').removeClass('alert-success');
                                                                            $('#msg').addClass('alert-danger');
                                                                        }
                                                                    }
                                                                });

                                                                $.each(response.magicpin, function(field, error) {
                                                                    if (error != "") {
                                                                        display_msg += error;
                                                                        display_msg += '<br>';
                                                                        if (response.magicpin_code[field] == '0') {
                                                                            $('#msg').removeClass('alert-success');
                                                                            $('#msg').addClass('alert-danger');
                                                                        }
                                                                    }
                                                                });

                                                                if (typeof response.vrmall !== "undefined" && response.vrmall !== null) {
                                                                    $.each(response.vrmall, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.vrmall_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.dukaan !== "undefined" && response.dukaan !== null) {
                                                                    $.each(response.dukaan, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.dukaan_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.thirstycrow !== "undefined" && response.thirstycrow !== null) {
                                                                    $.each(response.thirstycrow, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.thirstycrow_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.yumzy !== "undefined" && response.yumzy !== null) {
                                                                    $.each(response.yumzy, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.yumzy_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.gupshup !== "undefined" && response.gupshup !== null) {
                                                                    $.each(response.gupshup, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.gupshup_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.peppo !== "undefined" && response.peppo !== null) {
                                                                    $.each(response.peppo, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.peppo_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.kringleorder !== "undefined" && response.kringleorder !== null) {
                                                                    $.each(response.kringleorder, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.kringleorder_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.radyes !== "undefined" && response.radyes !== null) {
                                                                    $.each(response.radyes, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.radyes_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.eazydiner !== "undefined" && response.eazydiner !== null) {
                                                                    $.each(response.eazydiner, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.eazydiner_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.thridparty !== "undefined" && response.thridparty !== null) {
                                                                    $.each(response.thridparty, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.thirdparty_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.talabat !== "undefined" && response.talabat !== null) {
                                                                    $.each(response.talabat, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.talabat_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.careemnow !== "undefined" && response.careemnow !== null) {
                                                                    $.each(response.careemnow, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.careemnow_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.keeta !== "undefined" && response.keeta !== null) {
                                                                    $.each(response.keeta, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.keeta[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.uppyo !== "undefined" && response.uppyo !== null) {
                                                                    $.each(response.uppyo, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.uppyo_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.noonfood !== "undefined" && response.noonfood !== null) {
                                                                    $.each(response.noonfood, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.noonfood_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.grab !== "undefined" && response.grab !== null) {
                                                                    $.each(response.grab, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.grab_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.stream !== "undefined" && response.stream !== null) {
                                                                    $.each(response.stream, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.stream_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }

                                                                if (typeof response.foodpanda !== "undefined" && response.foodpanda !== null) {
                                                                    $.each(response.foodpanda, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.foodpanda_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                                if (typeof response.mrdivert !== "undefined" && response.mrdivert !== null) {
                                                                    $.each(response.mrdivert, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.mrdivert_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                                if (typeof response.grubtech !== "undefined" && response.grubtech !== null) {
                                                                    $.each(response.grubtech, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.gt_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                                let irctc_food_type = 0;
                                                                if (typeof response.irctc !== "undefined" && response.irctc !== null) {
                                                                    $.each(response.irctc, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            display_msg += '<br>';
                                                                            if (response.irctc_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                        }
                                                                        if (typeof response.validation_type !== 'undefined' && response.validation_type == 3) {
                                                                            irctc_food_type = 1;
                                                                            // $('#msg').html(display_msg+'<button style="margin:5px;" class="spinner-button ps-btn primary-btn sm-btn" onclick="open_irctc_foodtype_box('+mapped_id+');" type="button" data-tooltip="Map category to IRCTC">Food Type</button>').show();
                                                                        }
                                                                    });
                                                                }
                                                                let show_response = false;
                                                                if (typeof response.th_party !== "undefined" && response.th_party !== null) {
                                                                    $.each(response.th_party, function(field, error) {
                                                                        if (error != "") {
                                                                            display_msg += error;
                                                                            // display_msg += '<br>';
                                                                            if (response.th_party_code[field] == '0') {
                                                                                $('#msg').removeClass('alert-success');
                                                                                $('#msg').addClass('alert-danger');
                                                                            }
                                                                            if (response.th_party_code[field] == '2') {
                                                                                $('#msg').addClass('alert-success');
                                                                                $('#msg').removeClass('alert-danger');
                                                                                show_response = true;
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                                if (display_msg != '') {
                                                                    $('#displayMessage').html('').hide();
                                                                    let $parsed = $($.parseHTML(display_msg));
                                                                    let close_icon = ($parsed.filter('a.close[data-dismiss="alert"]').length || $parsed.find('a.close[data-dismiss="alert"]').length) ? '' : '<div class="close-popup-icon"><svg onclick = "close_pop()" data-tooltip="Close" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></div>';
                                                                    if (trigger_anyways_flag == 1) {
                                                                        let trigger_anyways_btn = '<div class="d-flex align-items-center justify-content-between"><p class="text-black-50">Please Mapped Discount First.</p> <a class="ps-btn primary-btn sm-btn ml-2" id="trigger_anyways" onclick="zomato_menu_trigger_anyways();" href="javascript:void(0);">Push Menu</a></div>';
                                                                        let $container = $('<div>').append($parsed);
                                                                        if (!$parsed.find('#trigger_anyways').length) {
                                                                            $container.append(trigger_anyways_btn);
                                                                        }
                                                                        $('#msg').html($container.html()).show();
                                                                    } else if (validate_tax_flag == 1) {
                                                                        let trigger_anyways_btn = '<button onclick="zomato_menu_trigger_anyways(1);" type="button" id="trigger_anyways" data-tooltip="Please check the validation errors before proceeding further" class="ps-btn primary-btn sm-btn">Proceed anyway & Validate Tax</button>';
                                                                        if (!$parsed.find('#trigger_anyways').length) {
                                                                            $parsed.find('.validation_btns').append(trigger_anyways_btn);
                                                                        }
                                                                        let $container = $('<div>').append($parsed);
                                                                        $('#msg').html(close_icon + $container.html()).show();
                                                                    } else if (validate_tax_flag == 2) {
                                                                        $('#msg').html(display_msg).show();
                                                                    } else if (validate_tax_flag == 3) {
                                                                        $('#msg').html(close_icon + display_msg).show();
                                                                    } else if (irctc_food_type == 1) {
                                                                        let mapped_id = $("#mapped_res_id").val();
                                                                        $('#msg').html(display_msg + '<button style="margin:5px;" class="spinner-button ps-btn primary-btn sm-btn" onclick="open_irctc_foodtype_box(' + mapped_id + ');" type="button" data-tooltip="Map category to IRCTC">Food Type</button>').show();
                                                                    } else {
                                                                        if ($('#msg').hasClass('alert-danger') == true) {
                                                                            $('#msg').html(close_icon + display_msg).show();
                                                                            // $('#msg').html('<div class="close-popup-icon"><svg onclick = "close_pop()" data-tooltip="Close" xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></div>' + display_msg).show();
                                                                        } else if (show_response) {
                                                                            $('#msg').html(close_icon + display_msg).fadeIn();

                                                                            $('#tp_trigger_anyways_btn').on('click', function() {
                                                                                $('#tp_menu_trigger_always').val(1);
                                                                                setTimeout(() => {
                                                                                    send_foodpanda_menu();
                                                                                    $('#tp_menu_trigger_always').val(0);
                                                                                }, 800);

                                                                            });
                                                                        } else {
                                                                            $('#msg').html(display_msg).fadeIn().delay(10000).fadeOut();
                                                                        }
                                                                    }
                                                                }
                                                                $("#push_menu_btn").attr('disabled', false);
                                                                $("#push_menu_btn").html('Push Menu');
                                                                $('#push_menu_btn').removeClass('btn-primary');
                                                                $.fancybox.close();
                                                            },
                                                            error: function(xhr) {
                                                                $("#push_menu_btn").attr('disabled', false);
                                                                $("#push_menu_btn").html('Push Menu');
                                                                $('#push_menu_btn').removeClass('btn-primary');
                                                            }
                                                        });
                                                    }

                                                    /**
                                                     * TO bypass liquor validations
                                                     * @returns {undefined}
                                                     */
                                                    function zomato_menu_trigger_anyways(type = 0) {
                                                        var restId = $("#current_restaurant").val();
                                                        var mappedRestaurantId = $("#mapped_res_id").val();
                                                        var thirdparty_id = $("#client_id").val();
                                                        $("#trigger_anyways").prop('disabled', true);
                                                        $("#trigger_anyways").html('<i class="fa fa-circle-o-notch fa-spin"></i> loading...');
                                                        if (thirdparty_id == 5409) {
                                                            var url = site_url + 'settings/zomato_menu_migration_tool/' + mappedRestaurantId + '/' + restId + '/1/1/1' + '/' + type + '/1';
                                                        } else if (thirdparty_id == 6736) {
                                                            var url = site_url + 'settings/swiggy_menu_migration_tool/' + mappedRestaurantId + '/' + restId + '/1/1' + '/' + type;
                                                        }

                                                        $.ajax({
                                                            type: "POST",
                                                            url: url,
                                                            async: true,
                                                            success: function(responseData) {
                                                                var response = JSON.parse(responseData);
                                                                //$("#trigger_anyways").attr('disabled',false);
                                                                $('#msg').html('').hide();
                                                                if (response == '9') {
                                                                    window.location.reload(true);
                                                                    return false;
                                                                }

                                                                response.message = response.message ?? '';
                                                                let $parsed = $($.parseHTML(response.message));
                                                                let close_icon = ($parsed.filter('a.close[data-dismiss="alert"]').length || $parsed.find('a.close[data-dismiss="alert"]').length) ? '' : '<div class="close-popup-icon"><svg onclick = "close_pop()" data-tooltip="Close" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg></div>';
                                                                if (response.status == 'failed') {
                                                                    $('#displayMessage').removeClass('alert-success');
                                                                    $('#displayMessage').addClass('alert-danger');
                                                                    if (typeof response.validation_type !== 'undefined' && response.validation_type == 2) {
                                                                        $('#displayMessage').html(close_icon + response.message).fadeIn();
                                                                    } else {
                                                                        $('#displayMessage').html(response.message).fadeIn().delay(10000).fadeOut();
                                                                    }
                                                                } else {
                                                                    $('#displayMessage').removeClass('alert-danger');
                                                                    $('#displayMessage').addClass('alert-success');
                                                                    if (typeof response.validation_type !== 'undefined' && response.validation_type == 2) {
                                                                        $('#displayMessage').html(close_icon + response.message).show();
                                                                    } else if (typeof response.validation_type !== 'undefined' && response.validation_type == 3) {
                                                                        var message = response.message;
                                                                        $('#displayMessage').html(close_icon + message).show();
                                                                    } else {
                                                                        let message = response.message;
                                                                        if (response.pccount !== undefined) {
                                                                            message += '<br/><b>' + response.pccount + '</b>';
                                                                        }
                                                                        if (typeof response.moderation_type !== 'undefined' && response.moderation_type === 1) {
                                                                            var menucb_url = site_url + 'settings/zomato_menu_callbacks/' + response.request_id;
                                                                            message += `<br/><br/><h4 style ="color:black;font-weight:bold;">Price Moderation Alert !</h4><div style = "color:#000;font-weight:bold;">We have pushed the menu prices along with the base menu prices. 
                                    Please Check the item list considered for price moderation and get the status. <a href = "${menucb_url}" target = "_blank" style ="text-decoration:underline !important;"> Click here</a></div>`;
                                                                        } else if (typeof response.moderation_type !== 'undefined' && response.moderation_type === 2) {
                                                                            var menucb_url = site_url + 'settings/zomato_menu_callbacks/' + response.restaurant_id + '/' + response.request_id;
                                                                            message += `<br/><br/><h4 style ="color:black;font-weight:bold;">Price Moderation Alert !</h4><div style = "color:#000;font-weight:bold;">Petpooja is not sharing your dine-in or Basemenu prices with Zomato at the moment. Please review the item list considered for price moderation and get the status. <a href = "${menucb_url}" target = "_blank" style ="text-decoration:underline !important;"> Click here</a></div>`;
                                                                        }
                                                                        $('#displayMessage').html(message).fadeIn().delay(50000).fadeOut();
                                                                        if (thirdparty_id == 6736) {
                                                                            setTimeout(function() {
                                                                                trigger_swiggy_menu_process(restId);
                                                                            }, 200);
                                                                        }
                                                                    }
                                                                }
                                                            },
                                                            error: function(jqXHR, textStatus, errorThrown) {
                                                                if (thirdparty_id == 6736) {
                                                                    setTimeout(function() {
                                                                        trigger_swiggy_menu_process(restId);
                                                                    }, 200);
                                                                }
                                                            }
                                                        });
                                                    }

                                                    function close_pop() {
                                                        $('#msg').html('').fadeOut();
                                                        $('#displayMessage').html('').fadeOut();
                                                    }

                                                    function trigger_swiggy_menu_process(restaurantId = 0) {
                                                        return false;
                                                        $.ajax({
                                                            type: "POST",
                                                            url: site_url + 'crons/swiggy_menu_process/1/' + restaurantId,
                                                            async: true,
                                                            data: {
                                                                'restid': restaurantId
                                                            },
                                                            success: function(responseData) {
                                                                console.log('responseData : ', responseData);
                                                            }
                                                        });
                                                    }
                                                </script>
                                                <div id="menu_tr_fancy" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg  fancy_right_side_open fadeInRight ng-shadow-lg">
                                                    <div class="fanycbox-content-new">
                                                        <div class="popup-header p-3">
                                                            <div>
                                                                <h3 class="ps-title"><span id="menu_tr_fancy_title">Update Item</span></h3>
                                                                <p class="paragraph-sm-1 ng-text-clr-2 mb-0" id="menu_tr_fancy_note"></p>
                                                            </div>
                                                        </div>
                                                        <div class="new-fancybox-body p-0 bg-white">
                                                            <input type="hidden" id="menu_tr_item_ids" value="">
                                                            <input type="hidden" id="menu_tr_type" value="">
                                                            <div id="menu_trigger_items"></div>
                                                        </div>
                                                        <div class="popup-footer p-3 d-flex justify-content-between align-items-center mt-3">
                                                            <div class="flex-1 mr-3 critical-footer-suppport-text">
                                                                <p class="paragraph-sm-1 mb-0 ng-text-clr-2">For assistance, contact our support team at</p>
                                                                <p class="paragraph-sm-1 mb-0 ng-text-clr-2"><span><a class="text-primary paragraph-md-3" href="mailto:support@petpooja.com">support@petpooja.com</a></span> or call<span><a class="text-primary text-primary paragraph-md-3" href="tel:+91 7969 223344"> 07969 223344</a></span></p>
                                                            </div>
                                                            <div>
                                                                <button class="ps-btn sm-btn grey-outline-btn cancel_btn" type="button" onclick="$.fancybox.close();">Cancel</button>
                                                                <button class="ps-btn sm-btn primary-btn" type="button" id="menu_tr_update">Update</button>
                                                            </div>
                                                        </div>
                                                        <div class="loader-css-div-fixed" id="fancy_loader">
                                                            <span class="btn-loader loader"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="menu_tr_fancy_cnfm" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg fancy-alert-wrap">
                                                    <div class="new-fancybox-body p-4 bg-white">
                                                        <p class="ng-title-2 ng-text-clr-2 mb-0 pt-2">
                                                            Are you sure you want to update?
                                                        </p>
                                                    </div>
                                                    <div class="popup-footer text-right p-3">
                                                        <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close();">Cancel</button>
                                                        <button class="ps-btn sm-btn primary-btn" id="menu_tr_fancy_cnfm_btn">Update</button>
                                                    </div>
                                                </div>

                                                <script type="text/javascript" src="https://menu.petpooja.com/js/menu_trigger_op.1774928599.js"></script>
                                                <script type="text/javascript" src="https://menu.petpooja.com/js/common_item_list_new.1771231404.js"></script>
                                                <script type="text/javascript" src="https://menu.petpooja.com/js/milistnew.1774928599.js"></script>
                                                <!-- mrp tag fancybox -->
                                                <div style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg mrp_fancy_box">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title ">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                    <style>
                                                                        .cls-1 {
                                                                            fill: #fcedef;
                                                                        }

                                                                        .cls-2 {
                                                                            fill: #1a1818;
                                                                            stroke: rgba(0, 0, 0, 0);
                                                                            stroke-miterlimit: 10;
                                                                        }
                                                                    </style>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg>Update MRP Tag
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body">
                                                        <div class="ps-form-group form-group-set-height">
                                                            <div class="set-radio ps-radio">
                                                                <input type="radio" name="action" id="mrp_option_1" value="1" checked="checked" class="radio-button">
                                                                <label for="mrp_option_1" class="radio-button-click-target"><span class="radio-button-circle"></span>Apply</label>

                                                                <input type="radio" name="action" id="mrp_option_2" value="2" class="radio-button">
                                                                <label for="mrp_option_2" class="radio-button-click-target"><span class="radio-button-circle"></span>Remove</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="popup-footer text-right">
                                                        <button class="ps-btn sm-btn grey-outline-btn" data-fancybox-close="">Cancel</button>
                                                        <button class="ps-btn sm-btn primary-btn ml-2" id="mrp_submit">Request</button>
                                                    </div>
                                                </div>
                                                <!-- mrp tag fancybox end -->

                                                <script>
                                                    var key = 'itemnew';
                                                    var restaurant_ho = '0';
                                                    var allow_all = '1';
                                                    var allow_status = '1';
                                                    var allow_price_status = '1';
                                                    var allow_add = '1';
                                                    var item_action = 'edit';
                                                    var org_item_name = '';
                                                    var is_save_permitted = '1';
                                                    if (allow_all == 0 && allow_add == 0) {
                                                        $("#add_item").hide();
                                                    }
                                                    var zomato_cake_configure = 0;
                                                    var mapped_res_id = '';
                                                    var search_slide_toggle = 0;
                                                    var schedulemenu = 0;
                                                    var clntid = 0;
                                                    var wr = '1';
                                                    var countryid = 97;
                                                    var currest = 427275;
                                                    var is_vb = '0';
                                                    var sap_mndt_flg = '0';
                                                    var sap_conf_flg = '0';
                                                </script>
                                                <script type="text/javascript" src="https://d12wf4nrgjmvr4.cloudfront.net/js/ajaxupload-menu.js"></script>
                                                <script type="text/javascript" src="https://d12wf4nrgjmvr4.cloudfront.net/js/jquery.Jcrop.js"></script>
                                                <link rel="stylesheet" type="text/css" href="https://d12wf4nrgjmvr4.cloudfront.net/css/jquery.Jcrop.css">
                                                <script type="text/javascript" src="https://menu.petpooja.com/structure_new/js/upload_logo_new.1770608291.js"></script>
                                                <div style="display: none;" id="copy_restaurant_item_div" class="user_detail update-user-detail ps-fancybox fancy-md new-fancybox-wrapper">
                                                    <div id="" class="popup-container menu-update">
                                                        <div class="popup-header">
                                                            <h5 class="ps-title">Push All Menu Items</h5>
                                                        </div>
                                                        <div class="card-body scroll modal-body-scroller new-fancybox-body">
                                                            <div class="row m-0">
                                                                <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 col-12">
                                                                    <div class="ng-alert ng-alert-warning d-inline-block col-12 mb-2">
                                                                        <p class="text-left mb-0"><i class="fa fa-info-circle"></i> Taxes will be automatically assigned to the items in the outlet you are copying to, provided those same taxes are present in that outlet.</p>
                                                                    </div>
                                                                    <p class="help-block">Note: You can select maximum 30 Restaurants.</p>
                                                                    <p><b><a class="help-block" href="https://inventory.petpooja.com/inventories/inv_recipe_list/">You can create only self-item recipes from the Inventory module. Kindly click here.</a></b></p>
                                                                    <form name="copy_all_item_form" id="copy_all_item_form" method="POST" class="form-horizontal" novalidate="novalidate">
                                                                        <div class="alert alert-success text-center" id="copy_item_msg_ho" style="display:none;"></div>
                                                                        <fieldset class="copy_success">
                                                                            <div class="form-group form-group-set-height">
                                                                                <div class="set-radio ps-radio">
                                                                                    <input type="radio" name="copy_to_ho_res" id="copy_to_branch" value="0" checked="checked" class="radio-button copy_select_option"><label for="copy_to_branch" class="radio-button-click-target"><span class="radio-button-circle"></span>Copy to branch</label>
                                                                                    <input type="radio" name="copy_to_ho_res" id="copy_to_ho" value="1" class="radio-button copy_select_option"><label for="copy_to_ho" class="radio-button-click-target"><span class="radio-button-circle"></span>Copy to HO</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="controls m-15">
                                                                                <div class="my-3">
                                                                                    <input type="text" placeholder="Search Restaurants" class="form-control" id="copy_menu_rest_search" value="">
                                                                                </div>
                                                                                <table class="outlet_lst">
                                                                                </table>
                                                                                <table class="ho_ids_list" style="display:none;">
                                                                                </table>

                                                                            </div>
                                                                            <div class="controls m-15 area_wise_price" style="display:none;">
                                                                                <div class="ps-checkbox-group">
                                                                                    <label class="grey ps-checkbox-container">
                                                                                        <input type="checkbox" value="1" name="update_item_price" id="update_item_price">
                                                                                        <span class="ps-checkmark">&nbsp;&nbsp;Do you want to change area wise price also?</span>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>
                                                                        <input type="hidden" value="1" id="copy_flag" name="copy_flag">
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="popup-footer d-flex justify-content-between align-items-center">
                                                            <div class="order-1">
                                                                <label id="lbl_rc_ho" class="f_req" style="display: none;"></label>
                                                            </div>
                                                            <div class="order-2">
                                                                <div class="copy_success d-flex gap-10">
                                                                    <button onclick="$.fancybox.close();" type="button" class="ps-btn sm-btn grey-outline-btn submit_btn">Close</button>
                                                                    <button class="ps-btn sm-btn primary-btn submit_btn" id="btn_copy_item_ho" type="button" onclick="copy_ho_items();return false;">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div> <!--end of pmd-footer-->
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    var select_item_copy_res = [];
                                                    var restaurant_for_copyitem = [];

                                                    $('.check_sel_push').click(function() {
                                                        var chekbox_value = $(this).val();
                                                        var sub_zone_id = $(this).attr('sub_zone_id');
                                                        var checked_length;
                                                        var total_length;
                                                        if (this.checked) {
                                                            restaurant_for_copyitem.push(chekbox_value);
                                                            checked_length = $(".individual_zone").find(".sub_zone_" + sub_zone_id + ":checked").length;
                                                            total = $(".individual_zone").find(".sub_zone_" + sub_zone_id + "").length;
                                                            if (checked_length == total) {
                                                                $('.main_zone_' + sub_zone_id).prop('checked', true);
                                                            }
                                                            if ($('.check_sel_push:checked').length == $('.check_sel_push').length) {
                                                                $('.select_checkbox_push').prop('checked', true);
                                                            }
                                                        } else {
                                                            $('.select_checkbox_push').prop('checked', false);
                                                            if (sub_zone_id !== undefined) {
                                                                $('.main_zone_' + sub_zone_id).prop('checked', false);
                                                            }
                                                            restaurant_for_copyitem = jQuery.grep(restaurant_for_copyitem, function(value) {
                                                                return value != chekbox_value;
                                                            });
                                                        }
                                                        if (restaurant_for_copyitem.length > 0) {
                                                            $('#restaurant_for_copyitem').val(restaurant_for_copyitem);
                                                        } else {
                                                            $('#restaurant_for_copyitem').val("");
                                                        }
                                                    });

                                                    $('.check_sel_push_ho').click(function() {
                                                        var chekbox_value = $(this).val();
                                                        if (this.checked) {
                                                            restaurant_for_copyitem.push(chekbox_value);
                                                            if ($('.check_sel_push_ho:checked').length == $('.check_sel_push_ho').length) {
                                                                $('.select_checkbox_push_ho').prop('checked', true);
                                                            }
                                                        } else {
                                                            $('.select_checkbox_push_ho').prop('checked', false);
                                                            restaurant_for_copyitem = jQuery.grep(restaurant_for_copyitem, function(value) {
                                                                return value != chekbox_value;
                                                            });
                                                        }
                                                        if (restaurant_for_copyitem.length > 0) {
                                                            $('#restaurant_for_copyitem').val(restaurant_for_copyitem);
                                                        } else {
                                                            $('#restaurant_for_copyitem').val("");
                                                        }
                                                    });

                                                    $('.select_checkbox_push_ho').click(function() {
                                                        var checked_status = this.checked;
                                                        restaurant_for_copyitem = [];
                                                        $(".check_sel_push_ho").each(function() {
                                                            if (!$(this).is(':disabled')) {
                                                                $(this).prop("checked", checked_status);
                                                                if (checked_status == true) {
                                                                    restaurant_for_copyitem.push($(this).val());
                                                                }
                                                            }
                                                        });
                                                        if (restaurant_for_copyitem.length > 0) {
                                                            $('#restaurant_for_copyitem').val(restaurant_for_copyitem);
                                                        } else {
                                                            $('#restaurant_for_copyitem').val("");
                                                        }
                                                    });

                                                    $('.select_checkbox_push').click(function() {
                                                        var checked_status = this.checked;
                                                        restaurant_for_copyitem = [];
                                                        $(".check_sel_push").each(function() {
                                                            if (!$(this).is(':disabled')) {
                                                                $(this).prop("checked", checked_status);
                                                                if (checked_status == true) {
                                                                    restaurant_for_copyitem.push($(this).val());
                                                                }
                                                            }
                                                        });
                                                        if (restaurant_for_copyitem.length > 0) {
                                                            $('#restaurant_for_copyitem').val(restaurant_for_copyitem);
                                                        } else {
                                                            $('#restaurant_for_copyitem').val("");
                                                        }
                                                        $('table').find(".main_zone:not(:disabled)").prop('checked', checked_status);
                                                    });


                                                    function change_areawise_price() {
                                                        var check_flag = 0;
                                                        select_item_copy_res = [];
                                                        $(".row_sel").each(function() {
                                                            var checked_status = this.checked;
                                                            if (checked_status) {
                                                                var item_id = $(this).attr("chk_itmid");
                                                                select_item_copy_res.push(item_id);
                                                                check_flag = 1;
                                                            }
                                                        });

                                                        $("#copy_flag").val('2');
                                                        $(".popup-header").html("Push areawise price");
                                                        if (check_flag == 1) {
                                                            $(".copy_success").css('display', 'block');
                                                            $("#copy_item_msg_ho").css('display', 'none');
                                                            $(".area_wise_price").css('display', 'none');
                                                            $.fancybox.open({
                                                                type: 'inline',
                                                                src: '#copy_restaurant_item_div',
                                                                width: 500,
                                                                height: 'auto',
                                                                autoSize: false,
                                                                afterClose: function() {
                                                                    $(".select_rows").prop("checked", false);
                                                                    $(".row_sel").prop("checked", false);
                                                                    $(".checkbox").prop("disabled", false);
                                                                    $(".checkbox").parent("label").css('color', 'var(--clr-dark2)');
                                                                }
                                                            });
                                                            $(".main_zone").prop("checked", false);
                                                            $(".check_sel_push").prop("checked", false);
                                                            $(".select_checkbox_push").prop("checked", false);
                                                            $(".individual_zone").css("display", 'none');
                                                            $(".show_sub_zones").attr("toggle_flag", '1');
                                                            $(".show_sub_zones").html('<i class="fa fa-plus" aria-hidden="true"></i>');
                                                            return true;
                                                        } else {
                                                            common_fancy_alert('You haven\'t selected any record. So please select at least one record to perform this action.');
                                                            return false;
                                                        }
                                                    }

                                                    function copy_menu_items_restaurant() {
                                                        $('.outlet_lst').show();
                                                        $('.ho_ids_list').hide();
                                                        var check_flag = 0;
                                                        /* if($('#menu_date').val() == '' || $('#menu_date').val() == undefined) {
                                                            alert("Please add publish date");
                                                            return false;
                                                        }
                                                        var date = new Date();
                                                        var d=(date.getDate()<10)? '0'+ date.getDate(): date.getDate();
                                                        var m=(date.getMonth()+1<10)? '0'+ (date.getMonth()+1): date.getMonth()+1;
                                                        var y=date.getFullYear();
                                                        var h=(date.getHours()<10)? '0'+ date.getHours(): date.getHours();
                                                        var min=(date.getMinutes()<10)? '0'+ date.getMinutes(): date.getMinutes();
                                                        var current_date = d+'-'+m+'-'+y+' '+ h+':'+min+':00';
                                                        var final_date_time = $('#from_date_menu').val() + ' ' + $('#from_time').val()+':00';
                                                        if($('#menu_date').val() != '' && $('#menu_date').val() != undefined && current_date > final_date_time) {
                                                            alert("Please select proper publish date");
                                                            return false;
                                                        } */
                                                        $(".row_sel").each(function() {
                                                            var checked_status = this.checked;
                                                            if (checked_status) {
                                                                var parent_id = $(this).closest('tr').attr('id');
                                                                var split = parent_id.split("_");
                                                                var allow_variation = $("#allowvariation_" + split[2]).val();
                                                                var allow_addon = $("#allowaddon_" + split[2]).val();
                                                                var item_id = $(this).attr("chk_itmid") + "," + allow_variation + "," + allow_addon;
                                                                select_item_copy_res.push(item_id);
                                                                check_flag = 1;
                                                            }
                                                        });

                                                        if (check_flag == 1) {
                                                            $('#copy_to_branch').prop('checked', true);
                                                            $(".copy_success").css('display', 'block');
                                                            $("#copy_item_msg_ho").css('display', 'none');
                                                            $.fancybox.open({
                                                                type: 'inline',
                                                                src: '#copy_restaurant_item_div',
                                                                width: 400,
                                                                height: 'auto',
                                                                autoSize: false,
                                                                beforeShow: function() {
                                                                    $('#copy_menu_rest_search').show();
                                                                },
                                                                afterClose: function() {
                                                                    $(".select_rows").prop("checked", false);
                                                                    $(".row_sel").prop("checked", false);
                                                                    $(".parent-tr-wrap").removeClass('bg-light-pink');
                                                                    $(".checkbox").prop("disabled", false);
                                                                    $(".checkbox").parent("label").css('color', 'var(--clr-dark2)');
                                                                    $('#btn_copy_item_ho').attr('disabled', false);
                                                                },
                                                                afterShow: function() {
                                                                    $('#copy_menu_rest_search').keyup(function() {
                                                                        copy_menu_rest_search();
                                                                    });
                                                                }
                                                            });
                                                            $(".main_zone").prop("checked", false);
                                                            $(".check_sel_push").prop("checked", false);
                                                            $(".select_checkbox_push").prop("checked", false);
                                                            $(".individual_zone").css("display", 'none');
                                                            $(".show_sub_zones").attr("toggle_flag", '1');
                                                            $(".show_sub_zones").html('<i class="fa fa-plus" aria-hidden="true"></i>');
                                                            return true;
                                                        } else {
                                                            common_fancy_alert('You haven\'t selected any record. So please select at least one record to perform this action.');
                                                            return false;
                                                        }
                                                    }

                                                    function copy_menu_rest_search() {
                                                        $("input[id='copy_menu_rest_search']").on("input", function() {
                                                            var filter = $(this).val().toLowerCase();
                                                            $(".single_rest").each(function() {
                                                                if ($(this).attr('name').toLowerCase().includes(filter)) {
                                                                    $(this).show();
                                                                } else {
                                                                    $(this).hide();
                                                                }
                                                            });
                                                        });
                                                    }

                                                    function copy_ho_items() {
                                                        var check_flag = 0;
                                                        $(".checkbox").each(function() {
                                                            var checked_status = this.checked;
                                                            if (checked_status) {
                                                                check_flag = 1;
                                                            }
                                                        });
                                                        if (restaurant_for_copyitem.length > 0) {
                                                            $('#restaurant_for_copyitem').val(restaurant_for_copyitem)
                                                        } else {
                                                            $('#restaurant_for_copyitem').val("");
                                                        }

                                                        $('#lbl_rc_ho').show().html('');
                                                        if (check_flag == 1 && restaurant_for_copyitem.length > 30) {
                                                            $('#lbl_rc_ho').show().html('<div style="color:red;">Select maximum 30 restaurant.</div>');
                                                        } else if (check_flag == 1 && $('#restaurant_for_copyitem').val() != '') {
                                                            $('#btn_copy_item_ho').attr('disabled', true);
                                                            $('#copy_item_msg_ho').removeClass('alert-danger').addClass('alert-success');
                                                            var check_process = check_record_exists();
                                                            if (check_process == 0) {
                                                                $('#copy_item_msg_ho').addClass('alert-danger').removeClass('alert-success');
                                                                $('#copy_item_msg_ho').show().html("You have already one processed queue.Try after sometimes.");
                                                                $('#copy_menu_rest_search').focus();
                                                                return false;
                                                            }

                                                            $('#copy_item_msg_ho').show().html("Your menu will be queued for copy. Please wait for few minutes to get copied.");
                                                            $('#copy_menu_rest_search').focus();

                                                            if ($("#copy_flag").val() == 1) {
                                                                $.ajax({
                                                                    type: "post",
                                                                    url: site_url + "items/copy_ho_items/",
                                                                    async: true,
                                                                    data: {
                                                                        restaurant_for_copyitem: restaurant_for_copyitem,
                                                                        select_item_copy_res: select_item_copy_res,
                                                                        current_restaurant: $('#current_restaurant').val(),
                                                                        update_price: ($('#update_item_price').prop('checked') == true) ? 1 : 0,
                                                                        is_ho_copy: $('input[name=copy_to_ho_res]:checked').val()
                                                                    },
                                                                    success: function(response_data) {
                                                                        $('#copy_restaurant_item_div label.f_req').hide();
                                                                        $('#copy_item_msg_ho').removeClass('alert-error');
                                                                        var response = JSON.parse(response_data);
                                                                        if (response.success == 1) {
                                                                            if (response.tax_msg !== undefined && response.tax_msg != "") {
                                                                                $('#tax-toaster-pp-div').removeClass('hide');
                                                                                $('#tax-toaster-pp-div .ps-title').html(response.tax_msg);
                                                                                $("#close-noti-tax").attr("data-mid", response.tid);
                                                                            }
                                                                            $(".checkbox").each(function() {
                                                                                var checked_status = this.checked;
                                                                            });

                                                                            restaurant_for_copyitem = [];
                                                                            $('#restaurant_for_copyitem').val("");
                                                                            $(".check_sel_push").prop('checked', false);
                                                                            $(".select_checkbox_push").prop('checked', false);

                                                                            $(".check_sel_push_ho").prop('checked', false);
                                                                            $(".select_checkbox_push_ho").prop('checked', false);

                                                                            $(".main_zone").prop('checked', false);
                                                                            $('#update_item_price').prop('checked', false);

                                                                        } else {
                                                                            $('#copy_item_msg_ho').removeClass('alert-success').addClass('alert-danger').show().html("There were some errors while copying items.");
                                                                        }
                                                                        $('#btn_copy_item_ho').attr('disabled', false);
                                                                    }
                                                                });
                                                            } else {
                                                                $.ajax({
                                                                    type: "post",
                                                                    url: site_url + "ho/copy_areawise_price/",
                                                                    data: {
                                                                        restaurant_ids: restaurant_for_copyitem,
                                                                        item_ids: select_item_copy_res,
                                                                        current_restaurant: $('#current_restaurant').val()
                                                                    },
                                                                    async: true,
                                                                    success: function(response) {
                                                                        if (response.success == 1) {
                                                                            $(".checkbox").each(function() {
                                                                                var checked_status = this.checked;
                                                                                if (checked_status) {
                                                                                    $(this).prop('disabled', true);
                                                                                    $(this).parent('label').css('color', 'green');
                                                                                }
                                                                            });

                                                                            restaurant_for_copyitem = [];
                                                                            $('#restaurant_for_copyitem').val("");
                                                                            $(".check_sel_push").prop('checked', false);
                                                                            $(".select_checkbox_push").prop('checked', false);
                                                                            $(".main_zone").prop('checked', false);
                                                                        } else {
                                                                            $('#copy_item_msg_ho').removeClass('alert-success').addClass('alert-danger').show().html("There were some errors while copying items.");
                                                                        }
                                                                        $('#btn_copy_item_ho').attr('disabled', false);
                                                                    }
                                                                });
                                                            }
                                                            $('#copy_menu_rest_search').focus();
                                                            setTimeout(() => {
                                                                $('#copy_item_msg_ho').hide();
                                                                $.fancybox.close();
                                                            }, 10000);
                                                        } else {
                                                            $('#lbl_rc_ho').show().html('<div style="color:red;">Please select atleast one restaurant.</div>');
                                                        }
                                                        return false;
                                                    }

                                                    function check_record_exists() {
                                                        var image_check = 1;
                                                        $.ajax({
                                                            type: 'POST',
                                                            cache: false,
                                                            url: site_url + 'ho/check_record_process',
                                                            dataType: 'json',
                                                            async: false,
                                                            success: function(response) {
                                                                return image_check = response.success;
                                                            }
                                                        });
                                                        return image_check;
                                                    }

                                                    $(document).off("click", ".show_sub_zones");
                                                    $(document).on("click", ".show_sub_zones", function() {
                                                        var temp_zone_id = $(this).attr("temp_zone_id");
                                                        var toggle_flag = $(this).attr("toggle_flag");
                                                        if (toggle_flag == "1") {
                                                            $(this).html('<i class="fa fa-minus" aria-hidden="true"></i>');
                                                            $(this).attr("toggle_flag", "0");
                                                            $(".individual_zone_" + temp_zone_id + "").css('display', 'block');
                                                        } else {
                                                            $(this).html('<i class="fa fa-plus" aria-hidden="true"></i>');
                                                            $(this).attr("toggle_flag", "1");
                                                            $(".individual_zone_" + temp_zone_id + "").css('display', 'none');
                                                        }
                                                    });

                                                    $(document).off("click", ".main_zone");
                                                    $(document).on("click", ".main_zone", function() {
                                                        var zone_id = $(this).attr('zone_id');
                                                        if ($(this).is(":checked")) {
                                                            $(".main_zone").parents('table').find(".sub_zone_" + zone_id + ":not(:disabled)").prop('checked', true);
                                                        } else {
                                                            $(".sub_zone_" + zone_id).prop('checked', false);
                                                        }
                                                        restaurant_for_copyitem = [];
                                                        $(".check_sel_push").each(function() {
                                                            if (!$(this).is(':disabled')) {
                                                                if ($(this).is(":checked")) {
                                                                    restaurant_for_copyitem.push($(this).val());
                                                                }
                                                            }
                                                        });
                                                        if (restaurant_for_copyitem.length > 0) {
                                                            $('#restaurant_for_copyitem').val(restaurant_for_copyitem);
                                                        } else {
                                                            $('#restaurant_for_copyitem').val("");
                                                        }
                                                        if ($(".check_sel_push:checked").length == $(".check_sel_push").length) {
                                                            $(".select_checkbox_push").prop('checked', true);
                                                        } else {
                                                            $(".select_checkbox_push").prop('checked', false);
                                                        }
                                                    });

                                                    $(document).off("click", ".copy_select_option");
                                                    $(document).on("click", ".copy_select_option", function() {
                                                        var selected_opt = $('input[name=copy_to_ho_res]:checked').val();
                                                        $('.ho_ids_list').hide();
                                                        $('.outlet_lst').show();
                                                        $(".check_sel_push_ho").prop("checked", false).prop("disabled", false);
                                                        $(".check_sel_push").prop("checked", false).prop("disabled", false);
                                                        $(".select_checkbox_push_ho").prop("checked", false).prop("disabled", false);
                                                        $(".select_checkbox_push").prop("checked", false).prop("disabled", false);
                                                        $(".main_zone").prop("checked", false).prop("disabled", false);
                                                        $('#lbl_rc_ho').html('');
                                                        $('#copy_menu_rest_search').val('').show();
                                                        $(".single_rest").show();
                                                        if (selected_opt == '1') {
                                                            $('.outlet_lst').hide();
                                                            $('.ho_ids_list').show();
                                                            let ho_ids_list_len = $('.ho_ids_list').find('.single_rest').length;
                                                            if (!ho_ids_list_len || ho_ids_list_len <= 0) {
                                                                $('#copy_menu_rest_search').hide();
                                                            }
                                                        } else {
                                                            let outlet_lst_len = $('.outlet_lst').find('.single_rest').length;
                                                            if (!outlet_lst_len || outlet_lst_len <= 0) {
                                                                $('#copy_menu_rest_search').hide();
                                                            }
                                                        }
                                                    });
                                                </script>
                                                <div id="export_base_menu_div" style="display:none;" class="new-fancybox-wrapper ps-fancybox fancy-sm popup-bg">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                    <style>
                                                                        .cls-1 {
                                                                            fill: #fcedef;
                                                                        }

                                                                        .cls-2 {
                                                                            fill: #1a1818;
                                                                            stroke: rgba(0, 0, 0, 0);
                                                                            stroke-miterlimit: 10;
                                                                        }
                                                                    </style>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg>Download Base Menu
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body base-menu-item-list ps-form-card">

                                                    </div>
                                                    <div class="popup-footer d-flex align-items-center justify-content-between">
                                                        <div class="show_error error"></div>
                                                        <div class="text-right d-flex gap-10">
                                                            <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                            <button class="ps-btn sm-btn primary-btn download_bmenu" type="button">Download</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="export_item_area_wise_price_div" style="display:none;" class="new-fancybox-wrapper ps-fancybox fancy-sm popup-bg">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                    <style>
                                                                        .cls-1 {
                                                                            fill: #fcedef;
                                                                        }

                                                                        .cls-2 {
                                                                            fill: #1a1818;
                                                                            stroke: rgba(0, 0, 0, 0);
                                                                            stroke-miterlimit: 10;
                                                                        }
                                                                    </style>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg>Download Item Area Wise Prices
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body base-menu-item-list ps-form-card">

                                                    </div>
                                                    <div class="popup-footer d-flex align-items-center justify-content-between">
                                                        <div class="show_error error"></div>
                                                        <div class="text-right d-flex gap-10">
                                                            <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                            <button class="ps-btn sm-btn primary-btn download_item_area_wise_price" type="button">Download</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form method="POST" id="download_item_area_wise_price" name="download_item_area_wise_price" action="https://menu.petpooja.com/export_importmenu/export_item_area_wise_price/427275/1">
                                                    <input type="hidden" id="selected_item_area_wise_price_cat_ids" name="selected_item_area_wise_price_cat_ids" value="">
                                                </form>

                                                <div id="area_item_od_name_popup" style="display:none;" class="new-fancybox-wrapper ps-fancybox fancy-sm popup-bg">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            Change Area Display name
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body base-menu-item-list ps-form-card">
                                                        <div id="area_item_od_name_msg" style="display:none;"></div>
                                                        <input type="text" class="form-control" name="data['area_online_display_name']" id="area_item_od_name">
                                                        <input type="hidden" name="data['area_item_id']" id="area_item_id">
                                                    </div>
                                                    <div class="popup-footer">
                                                        <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                        <button class="ps-btn sm-btn primary-btn" id="update_area_item_od_name" type="button">Update</button>
                                                    </div>
                                                </div>
                                                <div class="hide">
                                                    <form method="POST" id="download_bmenu" name="download_bmenu" action="https://menu.petpooja.com/menus/export_menu_items/427275/1">
                                                        <input type="hidden" id="selected_bmenu_cat_ids" name="selected_bmenu_cat_ids" value="">
                                                    </form>
                                                </div>
                                                <div id="cnfm_act_itm_pp" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg fancy-alert-wrap">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title" id="cnfm_act_itm_pp_title"></h5>
                                                    </div>
                                                    <div class="new-fancybox-body">
                                                        <p class="mb-0" id="cnfm_act_itm_pp_msg">
                                                        </p>
                                                    </div>
                                                    <div class="popup-footer text-right">
                                                        <input type="hidden" name="post_action" id="post_action" value="">
                                                        <input type="hidden" name="post_action_schg" id="post_action_schg" value="">
                                                        <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close();">Cancel</button>
                                                        <button class="ps-btn sm-btn primary-btn ml-2" type="button" onclick="process_active_inactive()">Confirm</button>
                                                    </div>
                                                </div>
                                                <div id="remove_publish_pp" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg fancy-alert-wrap">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title" id="remove_publish_pp_title">Remove publish changes of the item(s)</h5>
                                                    </div>
                                                    <div class="new-fancybox-body">
                                                        <p class="mb-0 " id="remove_publish_pp_msg"></p>
                                                    </div>
                                                    <div class="popup-footer text-right">
                                                        <a class="product-color download_recipe" id="download_recipe_btn" data-itemid="" rel="2" type="button" style="display:none;">Download Recipe</a>
                                                        <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close();">Cancel</button>
                                                        <button class="ps-btn sm-btn primary-btn ml-2" type="button" id="remove_pblsh_btn">Confirm</button>
                                                    </div>
                                                </div>

                                                <div id="swiggy_dinein_menu_popup" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-sm popup-bg fancy-alert-wrap">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">Swiggy DIneIn Menu Trigger</h5>
                                                    </div>
                                                    <div class="new-fancybox-body">
                                                        <p class="mb-0">Are ypu sure you want to send full menu to Swiggy DineIn?</p>
                                                    </div>
                                                    <div class="popup-footer text-right">
                                                        <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close();">Cancel</button>
                                                        <button class="ps-btn sm-btn primary-btn ml-2" type="button" id="swiggy_dinein_menu_trigger">Confirm</button>
                                                    </div>
                                                </div>

                                                <div id="upload_language_sheet_div" style="display:none;" class="new-fancybox-wrapper ps-fancybox fancy-sm">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                    <style>
                                                                        .cls-1 {
                                                                            fill: #fcedef;
                                                                        }

                                                                        .cls-2 {
                                                                            fill: #1a1818;
                                                                            stroke: rgba(0, 0, 0, 0);
                                                                            stroke-miterlimit: 10;
                                                                        }
                                                                    </style>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg><span id="upload_language_sheet_div_title"></span>
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body" id="upload_language_sheet_html">
                                                        <div class="button-flex">
                                                            <a data-module="I" href="javascript:void(0);" class="lang_op_pp ps-btn sm-btn grey-outline-btn" id="item_lang_pp">Update Item(s)</a>
                                                            <a data-module="V" href="javascript:void(0);" class="lang_op_pp ps-btn sm-btn grey-outline-btn" id="var_lang_pp">Update Variation(s)</a>
                                                            <a data-module="C" href="javascript:void(0);" class="lang_op_pp ps-btn sm-btn grey-outline-btn" id="cat_lang_pp">Update Category</a>
                                                            <a data-module="A" href="javascript:void(0);" class="lang_op_pp ps-btn sm-btn grey-outline-btn" id="addon_lang_pp">Update AddonGroup(s) / Addon Item(s)</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="open_lan_pp_sheet" style="display:none;" class="new-fancybox-wrapper ps-fancybox fancy-md popup-md">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                    <style>
                                                                        .cls-1 {
                                                                            fill: #fcedef;
                                                                        }

                                                                        .cls-2 {
                                                                            fill: #1a1818;
                                                                            stroke: rgba(0, 0, 0, 0);
                                                                            stroke-miterlimit: 10;
                                                                        }
                                                                    </style>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg><span id="open_lan_pp_sheet_title"></span>
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body ps-form-card" id="open_lan_pp_sheet_html">
                                                        <form name="rest_expupload_variation_form" id="rest_expupload_variation_form" method="POST" class="form-horizontal" action="https://menu.petpooja.com/menus/export_module_langauge_sheet/427275">
                                                            <div class="text-right">
                                                                <a id="Downloadlangsheetmodule" href="javascript:void(0);" class="ext_disabled ps-btn sm-btn primary-outline-btn d-inline-flex"></a>
                                                            </div>
                                                            <div class="card-body clonable p-0">
                                                                <div class="row text-left">
                                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ps-form-group ps-browse-btn">
                                                                        <input type="file" name="rest_expupload_variation" id="rest_expupload_variation" class="realupload">
                                                                        <div class="loader-css-div-fixed" style="display: none;" id="rest_expupload_variation_file">
                                                                            <div class="loader-css-div">
                                                                                <div class="loader-css"></div>
                                                                            </div>
                                                                        </div>
                                                                        <span id="rest_upload_variation_status"></span>
                                                                        <div class="hidden mt-5" id="variation_res_upload_item_msg1"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group float-right clear mt-3">
                                                                    <div class="controls">
                                                                        <button class="ps-btn sm-btn primary-btn" type="button" id="variation_res_upload">Upload</button>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="data[restaurant_id]" id="var_current_restaurant" value="">
                                                                <input type="hidden" name="data[module]" id="module_post" value="">
                                                                <input type="hidden" name="data[selected_cat_ids]" id="selected_cat_ids_lang" value="">
                                                                <input type="hidden" name="data[selected_addon_grp_ids]" id="selected_addon_grp_ids" value="">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div id="download_items_div" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-md popup-bg">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg>Download Item List
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body item-list bg-white">

                                                    </div>
                                                    <div class="popup-footer">
                                                        <div class="show_error error"></div>
                                                        <div class="text-right d-flex">
                                                            <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                            <button class="ps-btn sm-btn primary-btn download_items_sheet" type="button">Download</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="download_addons_div" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-md popup-bg">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg>Download Addon List
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body addon-list bg-white">

                                                    </div>
                                                    <div class="popup-footer">
                                                        <div class="show_error error"></div>
                                                        <div class="text-right d-flex">
                                                            <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                            <button class="ps-btn sm-btn primary-btn download_addons_sheet" type="button">Download</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script type="text/javascript">
                                                    var menu_url = 'https://menu.petpooja.com/inventories/';
                                                    var admin_url = 'https://menu.petpooja.com/inventories/';
                                                </script>

                                                <div id="get_image_mhub_popup" style="display:none;" class="get-image-mhub-popup new-fancybox-wrapper ps-fancybox fancy-md popup-bg">
                                                    <div class="popup-header d-flex justify-content-between">
                                                        <h5 class="ps-title">Search Images From Marketing hub</h5>
                                                        <h3 class="mhub-credit-div mb-0 mr-4 ">
                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M3.79437 17.6252C3.41106 17.6252 3.07866 17.4844 2.79719 17.203C2.51573 16.9215 2.375 16.5891 2.375 16.2058V3.79547C2.375 3.41079 2.51573 3.07723 2.79719 2.79478C3.07866 2.51232 3.41106 2.37109 3.79437 2.37109H16.2047C16.5894 2.37109 16.923 2.51232 17.2054 2.79478C17.4879 3.07723 17.6291 3.41079 17.6291 3.79547V16.2058C17.6291 16.5891 17.4879 16.9215 17.2054 17.203C16.923 17.4844 16.5894 17.6252 16.2047 17.6252H3.79437ZM3.79437 16.2058H16.2047V3.79547H3.79437V16.2058ZM5.55615 14.2746H14.4638C14.6034 14.2746 14.7056 14.2114 14.7705 14.0849C14.8353 13.9585 14.828 13.8318 14.7486 13.7049L12.3261 10.4549C12.249 10.3616 12.1538 10.3141 12.0404 10.3124C11.9271 10.3108 11.8324 10.3583 11.7563 10.4549L9.29121 13.6342L7.64356 11.3716C7.56313 11.2749 7.46626 11.2275 7.35294 11.2291C7.23962 11.2308 7.14492 11.2783 7.06883 11.3716L5.2921 13.7049C5.19881 13.8318 5.18459 13.9585 5.24944 14.0849C5.31427 14.2114 5.41651 14.2746 5.55615 14.2746ZM7.08533 8.21032C7.39889 8.21032 7.6646 8.10058 7.88246 7.88109C8.10031 7.66161 8.20923 7.39508 8.20923 7.08151C8.20923 6.76796 8.09949 6.50225 7.88 6.28439C7.66051 6.06654 7.39399 5.95761 7.08042 5.95761C6.76686 5.95761 6.50115 6.06736 6.28329 6.28684C6.06544 6.50633 5.95652 6.77286 5.95652 7.08643C5.95652 7.39998 6.06626 7.66569 6.28575 7.88355C6.50524 8.1014 6.77176 8.21032 7.08533 8.21032Z" fill="#212121"></path>
                                                            </svg>Balance Credits: <span class="mhub_credit_count"> 0 </span>
                                                        </h3>
                                                    </div>
                                                    <div class="new-fancybox-body base-menu-item-list bg-white ps-form-card position-relative" style="min-height: 400px;">
                                                        <div class="row align-items-center justify-content-center mb-10">
                                                            <div class="col-md-10 col-sm-9 col-8 ps-form-group mb-0">
                                                                <!-- <label>Enter Item Name</label>  -->
                                                                <input type="text" id="item_name" placeholder="Item Name">
                                                                <ul class="dropdown-menu hide w-100" id="item-list"></ul>
                                                            </div>
                                                            <a href="javascript:;" class="ps-btn sm-btn primary-btn" id="search_image"> Search </a>
                                                        </div>
                                                        <input type="hidden" id="itemid" value="">
                                                        <input type="hidden" id="item_dietry" value="">

                                                        <div class="col-md-12 response-msg mt-2 px-0">
                                                            <div class="choose_image_div mb-5" style="display:none;">

                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-wrap mt-20 choose_image_tp justify-content-center" style="gap:10px; display:none!important;">
                                                            <div class="ps-checkbox-group">
                                                                <div class="ps-checkobx">
                                                                    <input type="checkbox" id="all" value="logo_all" class="image_checkbox_all_popup">
                                                                    <label for="all">All</label>
                                                                </div>
                                                            </div>
                                                            <div class="ps-checkbox-group">
                                                                <div class="ps-checkobx">
                                                                    <input type="checkbox" id="logo_temp5" value="logo_temp5" class="group_image_checkbox_popup choose_area">
                                                                    <label for="logo_temp5">Offline Orders</label>
                                                                </div>
                                                            </div>
                                                            <div class="ps-checkbox-group">
                                                                <div class="ps-checkobx">
                                                                    <input type="checkbox" id="logo_temp2" value="logo_temp2" class="group_image_checkbox_popup choose_area">
                                                                    <label for="logo_temp2">Home Website</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="error-message px-3 pb-1 text-center"></div>
                                                    <div class="popup-footer pt-2 pb-3 d-block">
                                                        <div class="show_error error pb-1"></div>
                                                        <div class="d-flex flex-wrap justify-content-end justify-content-md-between align-items-center gap-y-10">
                                                            <div class="order-1 mhub-pagination">
                                                            </div>
                                                            <div class="order-2">
                                                                <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                                <button class="ps-btn sm-btn primary-btn unselect-img" id="save_btn" type="button">Select Image</button>
                                                            </div>
                                                            <!-- <button class="ps-btn sm-btn primary-btn"  type="button">Upload</button> -->
                                                        </div>
                                                    </div>
                                                    <div class="loader-css-div-fixed" id="whole_page_loader_p" style="display:none;">
                                                        <span class="btn-loader loader"></span>
                                                    </div>
                                                </div>

                                                <div id="gbp_push_menu_fancy" style="display:none;" class="ps-fancybox new-fancybox-wrapper fancy-md popup-bg">
                                                    <div class="popup-header">
                                                        <h5 class="ps-title">
                                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                                                <defs>
                                                                </defs>
                                                                <g id="Group_21125" data-name="Group 21125" transform="translate(-443 -199)">
                                                                    <circle id="Ellipse_1450" data-name="Ellipse 1450" class="cls-1" cx="15" cy="15" r="15" transform="translate(443 199)"></circle>
                                                                    <path id="Subtraction_43" data-name="Subtraction 43" class="cls-2" d="M5.787,15.337l-4.309,0A1.5,1.5,0,0,1,.005,14.007c0-.017,0-.034-.005-.051V1.378A1.578,1.578,0,0,1,.232.723,1.488,1.488,0,0,1,.57.348,1.5,1.5,0,0,1,1.015.107,1.627,1.627,0,0,1,1.54.021H8.073V0H8.8l.071.05,0,0h0A1.417,1.417,0,0,1,9.062.2c.35.347.7.7,1.046,1.044h0c.383.383.779.779,1.171,1.167a.567.567,0,0,1,.18.435c0,1.117,0,2.28,0,3.306h0c0,.3,0,.664,0,1.014v.191a3.158,3.158,0,0,1,.962.3,2.991,2.991,0,0,1,.784.564,2.92,2.92,0,0,1,.422,3.56,3.194,3.194,0,0,1-.417.541,2.834,2.834,0,0,1-.5.414,2.937,2.937,0,0,1-.585.29,3.5,3.5,0,0,1-.666.169c0,.077,0,.156,0,.219,0,.156,0,.3,0,.453a1.458,1.458,0,0,1-.13.563A1.541,1.541,0,0,1,11,14.9a1.525,1.525,0,0,1-.47.317,1.427,1.427,0,0,1-.565.118ZM4.537.7H1.587a.853.853,0,0,0-.913.923c0,3.942,0,8.018,0,12.114a1.141,1.141,0,0,0,.026.285.853.853,0,0,0,.888.637h8.3l.072,0a.826.826,0,0,0,.8-.719,3.167,3.167,0,0,0,.01-.5c0-.071,0-.151,0-.229L9.967,13c0,.047,0,.094,0,.139h0v0c0,.088,0,.17,0,.255,0,.338-.109.446-.445.446H1.949a.511.511,0,0,1-.379-.1.536.536,0,0,1-.1-.387c0-1.84,0-3.851,0-6.15,0-.4.107-.505.5-.505H9.6a.4.4,0,0,1,.275.109.4.4,0,0,1,.1.281c0,.107,0,.215,0,.318h0c0,.056,0,.1,0,.141l.8-.211V3.079h-.562c-.11,0-.239,0-.372-.011a1.54,1.54,0,0,1-.809-.275,1.515,1.515,0,0,1-.509-.68,2.081,2.081,0,0,1-.108-.618h0V1.477h0l0-.04C8.395,1.269,8.4,1.1,8.4.933h0V.926c0-.071,0-.144,0-.217l-.061,0H8.336c-.035,0-.062,0-.09,0H4.537ZM2.176,7.409v5.753H9.288c0-.047,0-.092,0-.132,0-.094,0-.183,0-.271a.337.337,0,0,0-.133-.3A2.833,2.833,0,0,1,8.181,10.3a3.077,3.077,0,0,1,.06-.635,2.773,2.773,0,0,1,.187-.581,2.856,2.856,0,0,1,.31-.528,3.33,3.33,0,0,1,.43-.474c.046-.042.109-.1.114-.155a3.734,3.734,0,0,0,.007-.374h0c0-.043,0-.1,0-.146Zm8.88.618a2.252,2.252,0,0,0-.116,4.5c.051,0,.1.005.153.005a2.249,2.249,0,0,0,.108-4.5c-.048,0-.1-.005-.145-.005ZM9.1,1.228a1.052,1.052,0,0,0,.19.876.876.876,0,0,0,.683.3,1.139,1.139,0,0,0,.263-.031l-.148-.149-.07-.07-.1-.1ZM5.491,12.182c-.547,0-1.1,0-1.528,0a.367.367,0,0,1-.265-.108.333.333,0,0,1-.1-.241.319.319,0,0,1,.1-.237.4.4,0,0,1,.268-.094l.727,0H7.359a.43.43,0,0,1,.2.043.238.238,0,0,1,.122.15.439.439,0,0,1-.027.328.41.41,0,0,1-.293.157C6.8,12.18,6.19,12.182,5.491,12.182Zm5.02-.508a.338.338,0,0,1-.273-.144.434.434,0,0,1-.065-.255l.01-.026h0a.82.82,0,0,1,.057-.131c.443-.776.811-1.418,1.16-2.022a.461.461,0,0,1,.143-.158.314.314,0,0,1,.174-.054.342.342,0,0,1,.166.045.323.323,0,0,1,.162.2.411.411,0,0,1-.056.315c-.35.612-.731,1.273-1.163,2.02A.373.373,0,0,1,10.511,11.675Zm1.453-.24h0a.33.33,0,0,1-.236-.1.344.344,0,0,1-.1-.247.325.325,0,0,1,.337-.333h.008a.341.341,0,0,1,.235.1.332.332,0,0,1,.1.233.351.351,0,0,1-.34.347Zm-4.959-.811H3.989a.355.355,0,0,1-.355-.21.281.281,0,0,1,.063-.356.561.561,0,0,1,.319-.113c.233,0,.48-.007.8-.007h1.65l.815,0a.731.731,0,0,1,.247.035.305.305,0,0,1,.16.146.326.326,0,0,1,.034.212.349.349,0,0,1-.118.2.366.366,0,0,1-.231.083C7.265,10.623,7.148,10.624,7.006,10.624Zm3.258-.816h-.007a.334.334,0,0,1-.231-.1.343.343,0,0,1-.1-.235.332.332,0,0,1,.337-.343h0a.349.349,0,0,1,.247.1.329.329,0,0,1,.1.237.346.346,0,0,1-.106.237A.343.343,0,0,1,10.264,9.808ZM7.323,9.064H3.963a.4.4,0,0,1-.26-.107.324.324,0,0,1-.1-.241.33.33,0,0,1,.1-.235.366.366,0,0,1,.255-.1c.213,0,.447,0,.734,0H6.628c.294,0,.531,0,.747,0a.336.336,0,0,1,.352.334.325.325,0,0,1-.1.24.4.4,0,0,1-.261.105ZM8.706,5.853a.466.466,0,0,1-.355-.239l-.14-.2,0,0-.063-.09L8.133,5.3l-.008-.011-.217-.309-.15.213h0c-.1.141-.212.3-.323.455a.41.41,0,0,1-.321.2.326.326,0,0,1-.186-.061.316.316,0,0,1-.139-.2.445.445,0,0,1,.093-.33L6.986,5.1h0c.132-.191.269-.389.411-.579a.184.184,0,0,0,0-.264c-.127-.163-.245-.337-.36-.505v0l-.069-.1a.427.427,0,0,1-.086-.282.32.32,0,0,1,.138-.226.332.332,0,0,1,.2-.07.394.394,0,0,1,.311.189c.084.115.165.231.252.354h0l0,.006.118.167.1-.138.022-.031v0l0,0,.006-.009h0l.236-.332a.411.411,0,0,1,.322-.2.336.336,0,0,1,.2.069.309.309,0,0,1,.134.231.455.455,0,0,1-.092.294l-.058.084,0,0v0c-.118.171-.241.349-.369.517a.166.166,0,0,0,0,.235c.126.17.247.344.365.512h0l.134.191a.514.514,0,0,1,.119.375.309.309,0,0,1-.138.2A.315.315,0,0,1,8.706,5.853Zm-4.178,0A.371.371,0,0,1,4.4,5.828a.345.345,0,0,1-.189-.171A.323.323,0,0,1,4.2,5.4c.225-.6.477-1.266.793-2.083a.368.368,0,0,1,.138-.179.382.382,0,0,1,.216-.061h0a.359.359,0,0,1,.356.241l.024.064h0l0,.006c.252.66.512,1.342.759,2.016a.3.3,0,0,1-.032.281.434.434,0,0,1-.366.162c-.093,0-.191-.1-.251-.242h0c-.053-.129-.082-.2-.133-.233a.509.509,0,0,0-.266-.034H5.38l-.031,0a1.089,1.089,0,0,0-.144-.011.362.362,0,0,0-.39.325.245.245,0,0,1-.107.15A.333.333,0,0,1,4.528,5.852ZM5.344,4.3l-.132.344h.263l-.04-.1L5.35,4.321l0-.011ZM3.323,5.847a.3.3,0,0,1-.251-.107.5.5,0,0,1-.086-.316q0-.509,0-1.04h0q0-.208,0-.416v-.2l-.078,0H2.9c-.06,0-.117-.006-.174-.013A.36.36,0,0,1,2.5,3.647a.328.328,0,0,1-.084-.227A.354.354,0,0,1,2.5,3.185a.306.306,0,0,1,.224-.1c.2-.006.4-.009.609-.009s.394,0,.593.008a.316.316,0,0,1,.233.107.352.352,0,0,1,.085.242.324.324,0,0,1-.09.223.371.371,0,0,1-.232.1c-.051.005-.1.007-.161.01h0l-.091,0v.187q0,.1,0,.207t0,.207c0,.344,0,.7,0,1.059,0,.267-.119.415-.335.418Z" transform="translate(451.098 206)"></path>
                                                                </g>
                                                            </svg>Push GBP Menu
                                                        </h5>
                                                    </div>
                                                    <div class="new-fancybox-body addon-list">
                                                        <div id="show-message-gbp-div"></div>
                                                        <div class="col-md-4 ps-form-group ps-select2-border ps-select2-arrow-none mb-0">
                                                            <label class="ps-form-label">Select Location</label>
                                                            <select name="data[location_list]" class="select-simple form-control pp-select2 select2-hidden-accessible" id="location_list" data-select2-id="location_list" tabindex="-1" aria-hidden="true">
                                                                <option value="" data-select2-id="24">Select Outlet</option>
                                                            </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="23" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-location_list-container"><span class="select2-selection__rendered" id="select2-location_list-container" role="textbox" aria-readonly="true" title="Select Outlet">Select Outlet</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                        </div>
                                                    </div>
                                                    <div class="popup-footer">
                                                        <div class="show_error error"></div>
                                                        <div class="text-right d-flex">
                                                            <button class="ps-btn sm-btn grey-outline-btn" type="button" onclick="$.fancybox.close()">Cancel</button>
                                                            <button class="ps-btn sm-btn primary-btn push_menu_gbp" type="button">Push Menu</button>
                                                        </div>
                                                    </div>
                                                    <div class="loader-css-div-fixed hidden" id="whole_page_loader_popup_gbp">
                                                        <span class="btn-loader loader"></span>
                                                    </div>
                                                </div>
                                                <style>
                                                    .cls-1 {
                                                        fill: #fcedef;
                                                    }

                                                    .cls-2 {
                                                        fill: #1a1818;
                                                        stroke: rgba(0, 0, 0, 0);
                                                        stroke-miterlimit: 10;
                                                    }
                                                </style>
                                                <script type="text/javascript" src="https://d12wf4nrgjmvr4.cloudfront.net/js/pagination.js"></script>
                                            </div>
                                        </div>
                                    </div>
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