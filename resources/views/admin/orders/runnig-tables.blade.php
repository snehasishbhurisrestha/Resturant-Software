@extends('layouts.app')

@section('content')


<section class="content-scrolling-wrapper">
    <div class="running-table-container billing-inner-pages-design-wrap" id="content">


        <section class="running-tables-wrapper ps-running-table">
            <div class="container-fluid ps-full-width-container">
                <div class="ps-top-header-button-card">
                    <div class="order-1">
                    </div>
                    <div class="order-2 button-flex">
                        <a class="ps-btn sm-btn grey-outline-btn d-inline-flex wmin-auto" href="javascript:void(0);" onclick="reload_data('1');">
                            <span class="btn-icon">
                                <img src="https://d12wf4nrgjmvr4.cloudfront.net/images/refresh_icon.svg" class="img-fluid" alt="refresh icon" />
                            </span>
                            <span class="mobile-display-none"> Refresh</span>
                        </a>
                    </div>
                </div>
                <div class="ps-form-card">
                    <div class="tab-marg clearfix">
                        <div class="ps-nav-wrapper">
                            <ul class="nav nav-tabs ps-nav" role="tablist">
                                <li class="nav-item"><a class="nav-link ngr" href="{{route('admin.orders')}}" data-active="">Running Orders</a></li>
                                <li class="nav-item position-relative active"><a class="nav-link" href="javascript:void(0);" data-active="">Running Tables</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="running-tables-wraper">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12 col-12">
                                    <div class="running-table-top-bar">
                                        <div class="running-table-stats ml-auto">
                                            <p class="transit mb-1">Estimated Total</p>
                                            <h3 class="transit-total" id="estimated_total"><span class="ps-checkmark currency-icon rs-font-family ">&#8377;</span> 0</h3>
                                        </div>
                                        <p class="mb-0 ps-rt-line-div"></p>
                                        <div class="running-table-stats mr-auto">
                                            <p class="transit mb-1">Total Running Tables</p>
                                            <h3 class="transit-total" id="total_running_tables">0</h3>
                                        </div>
                                    </div>
                                </div><!--end of col-12-->
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class=" running-tables inner-page-two row running-tables-single ps-running-table-body pt-3 bg-white mx-0 main-card singlediv" id="append_here">


                                <div class="col-xl-3 col-sm-6 col-lg-4 col-md-6 col-12 table_order ps-rt-card table427275" id="table_427275G_7" "=""><div class=" card">
                                    <div class="card-header d-flex justify-content-between py-3">
                                        <h4 class="table-name my-auto paragraph-md-2"><span>Table G 7</span></h4>
                                        <div class="d-flex align-items-center">
                                            <div class="mins-div mins-div-align d-flex"> <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.99988 18.15C4.24988 18.15 0.379883 14.28 0.379883 9.52002C0.379883 4.76002 4.24988 0.900024 8.99988 0.900024C13.7499 0.900024 17.6199 4.77002 17.6199 9.52002C17.6199 14.27 13.7499 18.14 8.99988 18.14V18.15ZM8.99988 2.40002C5.07988 2.40002 1.87988 5.60002 1.87988 9.52002C1.87988 13.44 5.07988 16.64 8.99988 16.64C12.9199 16.64 16.1199 13.44 16.1199 9.52002C16.1199 5.60002 12.9299 2.40002 8.99988 2.40002Z" fill="#646464"></path>
                                                    <path d="M11.9399 12.71C11.7699 12.71 11.5999 12.65 11.4599 12.54L8.51988 10.1C8.34988 9.96002 8.24988 9.75002 8.24988 9.52002V5.43002C8.24988 5.02002 8.58988 4.68002 8.99988 4.68002C9.40988 4.68002 9.74988 5.02002 9.74988 5.43002V9.17002L12.4199 11.38C12.7399 11.64 12.7799 12.12 12.5199 12.44C12.3699 12.62 12.1599 12.71 11.9399 12.71Z" fill="#646464"></path>
                                                </svg> <span class="table-mins mx-1" title="25" id="table_mins_427275G_7">30</span> <span> Mins</span> </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-3">
                                        <div class="row m-0 ps-rt-bd-bottom pb-2">
                                            <div class="col-md-6 col-sm-6 col-lg-6 col-6 d-flex align-items-center p-0"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.3597 8.02108L14.5697 11.7149H17.3881V13.85H14.1213L13.2673 17.8H10.94L11.794 13.85H7.60917L6.75512 17.8H4.42782L5.28187 13.85H1.97241V11.7149H5.73025L6.52025 8.02108H3.23214V5.88595H6.96863L7.80133 2H10.1286L9.29593 5.88595H13.4808L14.3135 2H16.6408L15.8081 5.88595H18.6478V8.02108H15.3597ZM13.0324 8.02108H8.84755L8.05755 11.7149H12.2424L13.0324 8.02108Z" fill="#646464"></path>
                                                </svg>
                                                <div class="px-2">
                                                    <p>KOTs: </p>
                                                    <h5 id="table_no_kots_427275G_7">10</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 col-6 d-flex align-items-center p-0"><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.0821 2.83234L18.9108 1.79137C18.6683 1.66956 18.3818 1.66956 18.1283 1.79137L16.3427 2.64408L14.5682 1.79137C14.3257 1.66956 14.0392 1.66956 13.7857 1.79137L12.0001 2.64408L10.2256 1.79137C9.98315 1.66956 9.69659 1.66956 9.44309 1.79137L7.65755 2.64408L5.87202 1.79137C5.62954 1.66956 5.34297 1.66956 5.08947 1.79137L2.91817 2.83234C2.59854 2.9763 2.40015 3.30852 2.40015 3.65182V21.3482C2.40015 21.6915 2.59854 22.0127 2.91817 22.1677L5.08947 23.2087C5.21071 23.264 5.34297 23.2972 5.47523 23.2972C5.60749 23.2972 5.73976 23.264 5.861 23.2087L7.64653 22.3559L9.43206 23.2087C9.67454 23.3305 9.96111 23.3305 10.2146 23.2087L11.9891 22.3559L13.7747 23.2087C14.0171 23.3305 14.3037 23.3305 14.5572 23.2087L16.3427 22.3559L18.1283 23.2087C18.3708 23.3194 18.6573 23.3305 18.8998 23.2087L21.0821 22.1677C21.3907 22.0237 21.6001 21.6915 21.6001 21.3482V3.65182C21.6001 3.30852 21.4018 2.9763 21.0821 2.83234ZM19.7815 4.22767V20.7724L18.514 21.3704L16.7285 20.5177C16.6073 20.4623 16.475 20.4291 16.3427 20.4291C16.1995 20.4291 16.0672 20.4623 15.946 20.5177L14.1604 21.3704L12.3859 20.5177C12.1324 20.3958 11.8458 20.4069 11.6034 20.5177L9.81783 21.3704L8.04332 20.5177C7.78981 20.4069 7.51427 20.3958 7.26077 20.5177L5.47523 21.3704L4.21875 20.7724V4.22767L5.48625 3.62967L7.27179 4.48238C7.51427 4.59312 7.80084 4.59312 8.04332 4.48238L9.82885 3.62967L11.6144 4.48238C11.8569 4.59312 12.1434 4.59312 12.3859 4.48238L14.1714 3.62967L15.957 4.48238C16.1995 4.59312 16.486 4.59312 16.7395 4.48238L18.5251 3.62967L19.7815 4.22767Z" fill="#646464"></path>
                                                    <path d="M18.8778 7.70493C18.8778 7.23982 18.503 6.85223 18.0291 6.85223H5.96019C5.49728 6.85223 5.11151 7.22874 5.11151 7.70493C5.11151 8.18112 5.48625 8.55763 5.96019 8.55763H18.0401C18.503 8.55763 18.8888 8.18112 18.8888 7.70493H18.8778ZM15.9019 10.9718C15.9019 10.5067 15.5271 10.1191 15.0532 10.1191H5.96019C5.49728 10.1191 5.11151 10.4956 5.11151 10.9718C5.11151 11.448 5.48625 11.8245 5.96019 11.8245H15.0642C15.5271 11.8245 15.9129 11.448 15.9129 10.9718H15.9019ZM5.96019 13.3859C5.49728 13.3859 5.11151 13.7625 5.11151 14.2386C5.11151 14.7148 5.48625 15.0913 5.96019 15.0913H11.3939C11.8569 15.0913 12.2426 14.7148 12.2426 14.2386C12.2426 13.7625 11.8679 13.3859 11.3939 13.3859H5.96019Z" fill="#646464"></path>
                                                </svg>
                                                <div class="px-2">
                                                    <p>Bill No.</p>
                                                    <h5 id="table_invoice_427275G_7">-</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-6 d-flex align-items-center px-0 pb-2 pt-4"> <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 1.70001C6.04795 1.70001 1.19995 6.54801 1.19995 12.512C1.19995 15.656 2.55595 18.5 4.71595 20.48C4.72795 20.492 4.73995 20.492 4.73995 20.504C4.96795 20.708 5.19595 20.9 5.43595 21.08C5.47195 21.104 5.50795 21.14 5.54395 21.164C5.73595 21.308 5.93995 21.452 6.14395 21.572C6.22795 21.632 6.31195 21.692 6.40795 21.74C6.43195 21.764 6.46795 21.788 6.50395 21.8C6.71995 21.932 6.94795 22.064 7.18795 22.172C7.43995 22.304 7.70395 22.424 7.96795 22.52C8.31595 22.676 8.67595 22.796 9.03595 22.892C9.63595 23.072 10.26 23.192 10.896 23.252C10.956 23.264 11.028 23.264 11.088 23.264C11.3879 23.3 11.7 23.312 12 23.312C12.3 23.312 12.612 23.3 12.912 23.264C12.972 23.264 13.044 23.264 13.104 23.252C13.74 23.192 14.3639 23.072 14.976 22.892C15.3119 22.796 15.636 22.688 15.96 22.556C16.248 22.448 16.536 22.316 16.824 22.172C17.088 22.04 17.3519 21.896 17.604 21.74C17.652 21.716 17.712 21.68 17.76 21.644C18 21.488 18.24 21.332 18.468 21.164C18.504 21.14 18.528 21.116 18.5639 21.092C18.804 20.9 19.056 20.696 19.2839 20.48H19.2959C21.4559 18.488 22.812 15.656 22.812 12.512C22.812 6.54801 17.9639 1.70001 12 1.70001ZM16.764 20.132C16.62 20.24 16.452 20.336 16.2959 20.42C16.056 20.552 15.804 20.684 15.54 20.78C15.504 20.804 15.4679 20.816 15.4319 20.828C15.1919 20.936 14.9399 21.032 14.676 21.104C14.436 21.188 14.196 21.248 13.944 21.296C13.86 21.32 13.776 21.332 13.6919 21.344C13.524 21.392 13.344 21.416 13.176 21.428C12.792 21.488 12.396 21.512 12 21.512C11.604 21.512 11.184 21.488 10.788 21.416C10.644 21.416 10.488 21.392 10.344 21.356C10.236 21.344 10.128 21.32 10.032 21.296C9.80395 21.248 9.57595 21.188 9.35995 21.116C9.33595 21.104 9.31195 21.104 9.28795 21.092C9.05995 21.02 8.84395 20.948 8.62795 20.852C8.56795 20.828 8.49595 20.804 8.43595 20.78C8.23195 20.684 8.02795 20.588 7.82395 20.48C7.29595 20.204 6.79195 19.868 6.32395 19.484C6.50395 18.956 6.94795 18.44 7.57195 18.008C9.98395 16.412 14.0399 16.412 16.4279 18.008C17.0639 18.44 17.496 18.956 17.688 19.484C17.3879 19.724 17.088 19.952 16.764 20.132ZM19.02 18.14C18.648 17.528 18.12 16.976 17.424 16.52C14.448 14.516 9.57595 14.516 6.57595 16.52C5.89195 16.988 5.33995 17.54 4.99195 18.152C3.74395 16.604 2.99995 14.636 2.99995 12.512C2.99995 7.54401 7.03195 3.50001 12 3.50001C16.9679 3.50001 21.0119 7.54401 21.0119 12.512C21.0119 14.636 20.268 16.592 19.02 18.14Z" fill="#646464"></path>
                                                <path d="M11.9039 5.66C9.62392 5.66 7.76392 7.52 7.76392 9.812C7.76392 12.104 9.51592 13.88 11.7599 13.952C11.8079 13.952 11.8679 13.952 11.9159 13.952C11.9519 13.952 11.9879 13.952 12.0239 13.952H12.0599C14.2919 13.88 16.0439 12.056 16.0559 9.812C16.0559 7.52 14.1959 5.66 11.9039 5.66ZM12.0479 12.152C11.9639 12.152 11.8559 12.152 11.7719 12.152C10.5239 12.08 9.56392 11.06 9.56392 9.812C9.56392 8.564 10.6079 7.46 11.9039 7.46C13.1999 7.46 14.2559 8.516 14.2559 9.812C14.2559 11.108 13.2839 12.08 12.0479 12.152Z" fill="#646464"></path>
                                            </svg>
                                            <div class="px-2">
                                                <p>No of Person</p>
                                                <h5 class="mb-0" id="table_person_427275G_7">15</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-6 d-flex align-items-center px-0 pt-2 pb-0"><svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_59_5330)">
                                                    <mask id="mask0_59_5330" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="25">
                                                        <path d="M0 0.500002H24V24.5H0V0.500002Z" fill="white"></path>
                                                    </mask>
                                                    <g mask="url(#mask0_59_5330)">
                                                        <path d="M11.9999 1.20312C12.8314 1.20312 13.5061 1.87803 13.5061 2.7094C13.5061 3.54068 12.8314 4.21564 11.9999 4.21564C11.1688 4.21564 10.4937 3.54068 10.4937 2.7094C10.4937 1.87803 11.1688 1.20312 11.9999 1.20312Z" stroke="#646464" stroke-width="1.40625" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M21.7907 14.0062H2.20947C2.20947 8.60262 6.59679 4.21559 12.0001 4.21559C17.4038 4.21559 21.7907 8.60262 21.7907 14.0062Z" stroke="#646464" stroke-width="1.40625" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M0.703125 14.0062H23.2969" stroke="#646464" stroke-width="1.40625" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M0.703125 20.7844L3.71564 17.7718V17.7711C3.71564 16.7726 4.11253 15.815 4.81856 15.1089C5.52464 14.4028 6.48225 14.0062 7.4805 14.0062H9.74062C10.1401 14.0062 10.5235 14.1649 10.8059 14.4474C11.0883 14.7299 11.2469 15.113 11.2469 15.5125C11.2469 15.9119 11.0883 16.2951 10.8059 16.5776C10.5235 16.86 10.1401 17.0188 9.74062 17.0188H7.48125H12.7531C12.7531 17.0188 14.2379 15.831 15.3427 14.9471C16.1041 14.3381 17.0501 14.0062 18.025 14.0062H18.0254C18.4742 14.0062 18.8741 14.2896 19.0225 14.7131C19.1709 15.1366 19.0361 15.6076 18.6855 15.8879C16.4758 17.6557 13.5062 20.0313 13.5062 20.0313L6.72811 20.7844L3.71564 23.7969L0.703125 20.7844Z" stroke="#646464" stroke-width="1.40625" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </g>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_59_5330">
                                                        <rect width="24" height="24" fill="white" transform="translate(0 0.5)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <div class="px-2">
                                                <p>Assigned To</p>
                                                <h5 title="subhas" class="vertical-align-middle" id="table_assign_427275G_7">subhas</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer ps-rt-footer d-flex justify-content-between">
                                        <div id="table_amount_427275G_7" class="m-0 d-flex align-items-center"><span class="currency-icon rs-font-family">₹</span> <span class="ps-rt-amount ml-1">6,972.00</span></div>
                                        <div class="running-table-detail d-flex align-items-center" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" onclick="show_items('kot','8824599583,8824599583,8824599583,8824599583,8824599583,8824599583,8824599583,8824599583,8824599579,8824599579','G 7','427275','2')" id="table_view_items_427275G_7">
                                            <h5 class="px-2">View Details</h5> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.25 2.4975C11.51 2.4975 11.76 2.5975 11.96 2.7875L18.7 9.5375C18.8 9.6375 18.87 9.7475 18.92 9.8675C18.97 9.9875 19 10.1075 19 10.2475C19 10.3875 18.97 10.5175 18.92 10.6275C18.87 10.7475 18.8 10.8575 18.7 10.9475L11.96 17.7075C11.57 18.0975 10.94 18.0975 10.55 17.7075C10.16 17.3175 10.16 16.6875 10.55 16.2975L15.59 11.2475L2.25 11.2475C1.7 11.2475 1.25 10.7975 1.25 10.2475C1.25 9.6975 1.7 9.2475 2.25 9.2475L15.59 9.2475L10.55 4.2075C10.16 3.8175 10.16 3.1875 10.55 2.7975C10.75 2.5975 11 2.5075 11.26 2.5075L11.25 2.4975Z" fill="#646464"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner-page">
                    <div class="">
                        <div class="no-table-blank-state hidden">
                            <!--no table found blank state-->
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="no-table-found text-center">
                                    <div>
                                        <svg x="0px" y="0px" width="118px" height="118px" viewBox="0 0 118 118" enable-background="new 0 0 118 118" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <g>
                                                        <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="1.5" y1="59.482" x2="1.5" y2="115.304" />
                                                        <polyline fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="1.5,92.054 31.398,92.054 31.398,116.5" />
                                                        <polyline fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="2.555,74.309 32.375,74.309 23.82,92.054" />
                                                    </g>
                                                    <g>
                                                        <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="116.5" y1="59.482" x2="116.5" y2="115.304" />
                                                        <polyline fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="116.5,92.054 86.602,92.054 86.602,116.5" />
                                                        <polyline fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="115.444,74.309 85.625,74.309 94.181,92.054" />
                                                    </g>
                                                </g>
                                                <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="31.867" y1="66.156" x2="86.134" y2="66.156" />
                                                <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="59" y1="68.796" x2="59" y2="115.304" />
                                                <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="50.083" y1="115.304" x2="67.921" y2="115.304" />
                                                <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="59" y1="37.149" x2="59" y2="59.482" />
                                                <path fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M59,9.825c-21.929,0-40.417,11.04-46.173,26.126h92.346C99.42,20.865,80.934,9.825,59,9.825z" />
                                                <line fill="none" stroke="#C9C8C8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="59" y1="1.5" x2="59" y2="7.311" />
                                            </g>
                                        </svg>
                                        <h4>No Running Table Found</h4>
                                    </div>
                                </div>
                            </div><!-- end no table found blank state-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>




@endsection