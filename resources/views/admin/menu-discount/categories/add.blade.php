@extends('layouts.app')
@section('content')

<section class="content-scrolling-wrapper">
    <div class=" running-table-container billing-inner-pages-design-wrap" id="content">

        <div class="inner-page-two">
            <div class="slide-out-div" style="">
                <form onsubmit="return categoryform('');" method="POST" id="category_form" name="category_form">
                    <div class="main-banner" id="main_grid_header" style="margin-bottom:0;float:inherit;">
                        <div class="container-fluid page-head mb-0">
                            <div class="page-sub-header">
                                <div>
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="ps-breadcrumb breadcrumb page-head-nav">
                                            <li class="breadcrumb-item ps-page-item"><a href="https://billing.petpooja.com/users/dashboard/" class="ajax_load_url ps-page-link" data-active="left_dashboard"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="home">
                                                            <path id="Vector" d="M10.0002 1.66663L0.833496 10.6558L1.77916 11.5831L2.64384 10.7352V18.3333H8.66265V12.431H11.3377V18.3333H17.3565V10.7352L18.2212 11.5831L19.1668 10.6558L16.019 7.56887V4.56139H14.6815V6.25726L10.0002 1.66663ZM10.0002 3.52132L16.019 9.42357V17.0217H12.6752V11.1194H7.32514V17.0217H3.98135V9.42357L10.0002 3.52132Z" fill="#646464"></path>
                                                        </g>
                                                    </svg></a></li>
                                            <li class="breadcrumb-item ps-page-item">Menu</li>
                                            <li class="breadcrumb-item ps-page-item"><a id="cancel" href="javascript:void(0);">Category Management</a></li>
                                            <li class="breadcrumb-item ps-page-item page-title-breadcrumb">Add Category</li>
                                            <div class="table-header">
                                            </div>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="d-flex justify-content-end gap-5">
                                    <a class="ps-btn sm-btn grey-outline-btn float-right back-btn header-back breadcrum-back-btn" id="cancel" href="javascript:void(0);"><i class="fa fa-angle-left"></i> Back</a>
                                    <a class="ps-btn sm-btn grey-outline-btn only-icon-btn float-right back-btn mob-back-btn" id="cancel" href="javascript:void(0);"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid ps-full-width-container" id="main_grid">
                        <div class="">
                            <div class="">
                                <div class="ps-form-card">
                                    <div class="card-header">
                                        <h5 class="card-title">Add Category</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ps-form-group">
                                                    <label class="ps-form-label text-dark">Name<span class="text-danger">*</span></label>
                                                    <input name="data[Category][name]" class="ps-input form-control required" maxlength="50" type="text" id="CategoryName"> <span for="name" generated="true" class="has-error-text error" id="name_validation"></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ps-form-group ps-select2-border">
                                                    <label class="ps-form-label">Category Group</label>
                                                    <select name="data[Category][group_name]" tabindex="-1" aria-hidden="true" class="select-with-search form-control pp-select2 select2-hidden-accessible" id="CategoryGroupName" data-select2-id="CategoryGroupName">
                                                        <option value="" data-select2-id="10">Select Category Group</option>
                                                        <option value="299059">Beverage</option>
                                                        <option value="295534">Food Menu</option>
                                                        <option value="295535">Bar Menu</option>
                                                    </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="9" style="width: 603.9px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false" aria-labelledby="select2-CategoryGroupName-container"><span class="select2-selection__rendered" id="select2-CategoryGroupName-container" role="textbox" aria-readonly="true" title="Select Category Group">Select Category Group</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> <span for="group_name" generated="true" class="has-error-text error" id="group_name_validation"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ps-form-group">
                                                    <label class=" ps-form-label">Online Display Name</label>
                                                    <input name="data[Category][online_display_name]" class="ps-input form-control" maxlength="50" type="text" id="CategoryOnlineDisplayName"> <span for="online_display_name" generated="true" class="has-error-text error" id="online_display_name_validation"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ps-form-group ps-select2-border ps-select2-multi">
                                                    <label class="ps-form-label">Select Tag <a href="javascript:void(0)" id="create-tag" class="ps-btn ps-btn sm-btn grey-outline-btn pull-right btn-permission mb-2">Add Tag</a></label>
                                                    <select name="data[Category][tags][]" class="select-with-search form-control w-100 pp-select2 select2-hidden-accessible" multiple="" id="CategoryTags" tabindex="-1" aria-hidden="true" data-select2-id="CategoryTags">

                                                    </select><span class="select2 select2-container select2-container--bootstrap-5" dir="ltr" data-select2-id="11" style="width: 603.9px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                                    <span for="tags" generated="true" class="has-error-text error" id="tags_validation"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row upload_logo">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="input-prepend ps-form-group ps-browse-btn">
                                                    <label class=" ps-form-label">Logo</label>
                                                    <input type="file" name="user_picture1" id="user_picture1" class="realupload" accept=".png,.jpg,.jpeg,.pdf,image/png,image/jpeg,application/pdf">
                                                    <span id="uploadmsg_status1"></span>
                                                    <div id="picture_error1" class="error"></div>
                                                    <span class="f_req">Upload only png, jpeg or jpg file</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="input-prepend ps-form-group ps-browse-btn">
                                                    <label class=" ps-form-label">Swiggy Image</label>
                                                    <input type="file" name="user_picture" id="user_picture" class="realupload" accept=".png,.jpg,.jpeg,.pdf,image/png,image/jpeg,application/pdf">
                                                    <span id="uploadmsg_status"></span>
                                                    <div id="picture_error" class="error"></div>
                                                    <span class="f_req">Upload only png, jpeg or jpg file</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div id="image_preview_main1">
                                                    <ul id="image_preview_main_ui1" class="m-0 pl-2">
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div id="image_preview_main">
                                                    <ul id="image_preview_main_ui" class="m-0 pl-2">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="input-prepend ps-form-label ps-form-group ps-browse-btn">
                                                    <label class=" ps-form-label">Offline Orders Image</label>
                                                    <input type="file" name="user_picture5" id="user_picture5" class="realupload" accept=".png,.jpg,.jpeg,.pdf,image/png,image/jpeg,application/pdf">
                                                    <span id="uploadmsg_status5"></span>
                                                    <div id="picture_error5" class="error"></div>
                                                    <input type="hidden" id="extension" name="extension" value="">
                                                    <span class="f_req">Upload only png, jpeg or jpg file</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div id="image_preview_main5">
                                                    <ul id="image_preview_main_ui5" style="margin:0px;">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="ps-form-group set-checkbox form-group-set-height checkbox-last-child ps-checkbox-group">
                                                    <label class="ps-checkbox-container" style="pointer-events:all;opacity:1">
                                                        <input type="hidden" name="data[Category][status]" id="status_" value="0"><input type="checkbox" name="data[Category][status]" id="status" checked="checked" value="1"> <span class="ps-checkmark"></span>
                                                        <span class="ps-checkbox-label">Status</span>
                                                    </label>
                                                    <div class="hidden my-2" id="item_check"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="data[change_item_status]" id="change_item_status" value="0">

                            <div class=" catagory-schedules">

                                <div class="card-title add-title p-2 border-radius-0 d-flex justify-content-between align-item-center"><span class="pt-1">Category Schedule</span>
                                    <a class="ps-btn ps-btn sm-btn grey-outline-btn addnewschedule btn-permission" href="javascript:void(0);">Add Schedule</a>
                                </div>
                                <span for="to_time" generated="true" class="alert-danger p-2 has-error-text error schedule-error" style="display: none;" id="to_time_validation"></span>
                                <span for="schedule_name" generated="true" class="alert-danger p-2 has-error-text error schedule-error" style="display: none;" id="schedule_name_validation"></span>
                            </div>
                            <div class="card-footer control-group bottom-footer-sticky">
                                <div class="text-right add-edit-section">
                                    <button class="ps-btn sm-btn grey-outline-btn click-close cancel-text-mob d-inline-flex" type="button" id="cancel">
                                        <span class="cancel-icon-mob"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.292 3.70201C16.1995 3.60931 16.0896 3.53576 15.9687 3.48558C15.8477 3.4354 15.718 3.40957 15.587 3.40957C15.4561 3.40957 15.3264 3.4354 15.2054 3.48558C15.0844 3.53576 14.9746 3.60931 14.882 3.70201L9.99204 8.58201L5.10205 3.69201C5.00946 3.59943 4.89955 3.52599 4.77859 3.47589C4.65762 3.42578 4.52798 3.39999 4.39705 3.39999C4.26611 3.39999 4.13647 3.42578 4.0155 3.47589C3.89454 3.52599 3.78463 3.59943 3.69204 3.69201C3.59946 3.7846 3.52602 3.89451 3.47592 4.01547C3.42581 4.13644 3.40002 4.26608 3.40002 4.39701C3.40002 4.52795 3.42581 4.65759 3.47592 4.77856C3.52602 4.89952 3.59946 5.00943 3.69204 5.10201L8.58205 9.99201L3.69204 14.882C3.59946 14.9746 3.52602 15.0845 3.47592 15.2055C3.42581 15.3264 3.40002 15.4561 3.40002 15.587C3.40002 15.7179 3.42581 15.8476 3.47592 15.9686C3.52602 16.0895 3.59946 16.1994 3.69204 16.292C3.78463 16.3846 3.89454 16.458 4.0155 16.5081C4.13647 16.5582 4.26611 16.584 4.39705 16.584C4.52798 16.584 4.65762 16.5582 4.77859 16.5081C4.89955 16.458 5.00946 16.3846 5.10205 16.292L9.99204 11.402L14.882 16.292C14.9746 16.3846 15.0845 16.458 15.2055 16.5081C15.3265 16.5582 15.4561 16.584 15.587 16.584C15.718 16.584 15.8476 16.5582 15.9686 16.5081C16.0896 16.458 16.1995 16.3846 16.292 16.292C16.3846 16.1994 16.4581 16.0895 16.5082 15.9686C16.5583 15.8476 16.5841 15.7179 16.5841 15.587C16.5841 15.4561 16.5583 15.3264 16.5082 15.2055C16.4581 15.0845 16.3846 14.9746 16.292 14.882L11.402 9.99201L16.292 5.10201C16.672 4.72201 16.672 4.08201 16.292 3.70201Z" fill="#212121"></path>
                                            </svg></span>
                                        Cancel
                                    </button>
                                    <button class="ps-btn sm-btn primary-btn ml-2 d-inline-flex save-text-mob" id="submit" type="submit">
                                        <span class="save-icon-mob"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2551_5364)">
                                                    <mask id="mask0_2551_5364" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                                        <path d="M20 0H0V20H20V0Z" fill="white"></path>
                                                    </mask>
                                                    <g mask="url(#mask0_2551_5364)">
                                                        <mask id="mask1_2551_5364" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                                            <path d="M19.5237 0.332031H1.97607C1.14765 0.332031 0.476074 1.00361 0.476074 1.83203V17.8797C0.476074 18.7081 1.14765 19.3797 1.97608 19.3797H18.0237C18.8521 19.3797 19.5237 18.7081 19.5237 17.8796V0.332031Z" fill="white"></path>
                                                        </mask>
                                                        <g mask="url(#mask1_2551_5364)">
                                                            <mask id="mask2_2551_5364" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                                                <path d="M18.8095 18.6659V1.04688H1.19043V18.6659H18.8095Z" fill="white" stroke="white" stroke-width="1.5"></path>
                                                            </mask>
                                                            <g mask="url(#mask2_2551_5364)">
                                                                <path d="M18.9658 5.09449V17.7061C18.9658 18.3226 18.4661 18.8222 17.8497 18.8222H2.15025C1.53381 18.8222 1.03418 18.3226 1.03418 17.7061V2.00669C1.03418 1.39026 1.53381 0.890625 2.15025 0.890625H14.7619L18.9658 5.09449Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M18.9656 5.09449L14.7617 0.890625" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M11.4883 6.21056H12.7531C13.3696 6.21056 13.8692 5.71093 13.8692 5.09449V0.890625H11.4883" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4.64258 12.832V18.8217H13.8688V12.832" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M13.8688 12.8321V11.5673C13.8688 10.9508 13.3691 10.4512 12.7527 10.4512H5.75865C5.14221 10.4512 4.64258 10.9508 4.64258 11.5673V12.8321" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M12.7527 6.21056H5.75865C5.14228 6.21056 4.64258 5.71087 4.64258 5.09449V0.890625H13.8688V5.09449C13.8688 5.71087 13.3691 6.21056 12.7527 6.21056Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2551_5364">
                                                        <rect width="20" height="20" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg></span>
                                        Save changes
                                    </button>

                                </div>
                            </div>
                        </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection