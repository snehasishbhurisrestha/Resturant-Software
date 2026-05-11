<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon.png') }}">

    <!-- Apple Icon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/img/apple-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">

    <!-- Theme Script -->
    <script src="{{ asset('assets/admin/js/theme-script.js') }}" type="text/javascript"></script>

    <!-- Lucide Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lucide/lucide.css') }}">

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/simplebar/simplebar.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">

    <!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    <style>
        .btn-primary {
            background: linear-gradient(135deg, #8C5C1A, #E6B325, #FFD700);
            border: none;
            color: #000;
        }

        .btn-primary:hover {
            box-shadow: 0 0 12px rgba(194,136,64,0.4);
        }

        .card {
            background: #1A1A1A;
            border: 1px solid rgba(194,136,64,0.15);
        }

        .form-control:focus {
            border-color: #C28840;
            box-shadow: 0 0 8px rgba(194,136,64,0.4);
        }

        .table {
            color: #C7B77F;
        }

        .table thead {
            color: #FFD700;
        }
    </style>

    @yield('style')


    <!-- New By Jatindra -->

    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">-->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/mtin0s868.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/fta0as561.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/fdffa0s655.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/b5ed6M5.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/r8g1wr5M5.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/s9d5gd5M_v3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/btstrp5.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/fanJqbx566.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/jcuS1brey445.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/s9p61rM4.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/1775733648.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('new-assets/css/animate.min.css')}}" /> --}}
</head>

<body>

    <!-- Begin Wrapper -->
    <div class="main-wrapper">

        <!-- Topbar Start -->
        @include('layouts.admin_include.header')
        <!-- Topbar End -->

        @php
            $sidebar_need = $sidebar_need ?? true;
        @endphp

        <!-- Two Col Sidebar -->
        @if($sidebar_need)
		@include('layouts.admin_include.sidebar')
        @endif
		<!-- End Two Col Sidebar -->

        <!-- ========================
			Start Page Content
		========================= -->
         
        <div class="page-wrapper" @if(!$sidebar_need) style="margin: 0;" @endif>

            <!-- Start Content -->
            <div class="">

                @yield('content')

                @isset($slot)
                    {{ $slot }}
                @endisset
                                
            </div>
            <!-- End Content -->  

        </div>

        <!-- ========================
			End Page Content
		========================= -->

    </div>
    <!-- End Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>    

	<!-- Simplebar JS -->
	<script src="{{ asset('assets/admin/plugins/simplebar/simplebar.min.js') }}" type="text/javascript"></script>

    <!-- Select2 Js -->	
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <!-- Daterangepikcer JS -->
    <script src="{{ asset('assets/admin/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

    <!-- ApexChart JS -->
    <script src="{{ asset('assets/admin/plugins/apexchart/apexcharts.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/plugins/apexchart/chart-data.js') }}" type="text/javascript"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/js/script.js') }}" type="text/javascript"></script>



    <!-- New Jatindra-->
     
    {{-- <script type="text/javascript" src="{{asset('new-assets/js/jCompN484w.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/j2ycmS0bc064.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/fanB0xjq145.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/page--scroll--function.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/higCt646.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/hig3Dct985.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/morHigct945.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/golCtL0d65.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/sodGa855.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/expt489.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/higCtm0r65.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/higaCc70.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/ajax_load.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/btstrp5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/jv1dt556.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/sp9r65.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/vls56d12.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/input-flot.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/custom.1767585313.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/tagmanager.1648807959.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('new-assets/js/smooth-scrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('new-assets/js/googletagmanager.1775679792.js')}}"></script>
    <script type="text/javascript" src="https://d12wf4nrgjmvr4.cloudfront.net/js/pagination.js"></script> --}}

    {{-- <style>
        @font-face {
            font-family: 'InterVariable';
            src: url('https://d1mxx605nqdf0h.cloudfront.net/fonts/InterVariable.woff2') format('woff2'),
                url('https://d1mxx605nqdf0h.cloudfront.net/fonts/InterVariable.woff') format('woff'),
                url('https://d1mxx605nqdf0h.cloudfront.net/fonts/InterVariable.ttf') format('truetype');
            font-weight: 100 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: InterVariable;
            font-style: italic;
            font-weight: 100 900;
            font-display: swap;
            src: url("https://d1mxx605nqdf0h.cloudfront.net/fonts/InterVariable-Italic.woff2") format("woff2");
        }

        @supports not (font-variation-settings: normal) {
            @font-face {
                font-family: InterVariable;
                src: url('https://d1mxx605nqdf0h.cloudfront.net/fonts/Inter-Regular.woff2') format('woff2'),
                    url('https://d1mxx605nqdf0h.cloudfront.net/fonts/Inter-Regular.woff') format('woff');
                font-weight: 400;
                font-display: swap;
            }
        }
    </style> --}}
    {{-- <script>
        var site_url = "https://billing.petpooja.com/";
        var default_site_title = "Petpooja - The Finest Restaurant Management Platform";
        var l_type = 1;
        var material_new_folder_name = "structure_new";
        var excel_limit = 10000;
        var EXCEL_EXCEED_MSG = 'You can\'t export records more than 10000.';
        var admin_site_url = 'https://billing.petpooja.com/admins/';
        $.fancybox.defaults.touch = false;
        var currency_data = {
            "CODE": "INR",
            "CURRENCY_NAME": "India rupee",
            "HTML_CODE": "&#8377;",
            "CURRENCY_TEXT": "\u20b9"
        };
        var currency_data = {
            "CODE": "INR",
            "CURRENCY_NAME": "India rupee",
            "HTML_CODE": "&#8377;",
            "CURRENCY_TEXT": "\u20b9"
        };
        var active_function = '{"2":{"file_name":"sms_details","logo":"sms-services.png","activate":"activate_sms_service"},"4":{"file_name":"captain_order_details","logo":"Captain_Ordering.png","activate":"activate_captain"},"5":{"file_name":"feedback_details","logo":"feedback.png","activate":"activate_feedback"},"7":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"8":{"file_name":"white_label_details","logo":"online_ordering_widget.png","activate":"activate_online_ordering_widget"},"12":{"file_name":"tally_details","logo":"tally.png","activate":"activate_tally"},"14":{"file_name":"sms_feedback_details","logo":"sms-feedback.png","activate":"activate_sms_feedback"},"15":{"file_name":"hdfc_swipe_details","logo":"edc-machine.png","activate":"activate_hdfc"},"17":{"file_name":"zomato_details","logo":"Zomato-flat-logo.png","activate":"activate_zomato"},"19":{"file_name":"swiggy_details","logo":"swiggy.png","activate":"activate_swiggy"},"20":{"file_name":"virtual_wallet_details","logo":"virtual-wallet-logo.png","activate":"activate_virtual_wallet"},"21":{"file_name":"homedelivery_sms_service_details","logo":"home_delivery_sms_service.png","activate":"activate_inactive_homedelivery_sms_service"},"22":{"file_name":"kiosk_details","logo":"kiosk.png","activate":"activate_kiosk"},"23":{"file_name":"own_website_details","logo":"own-website.png","activate":"activate_restaurant_website"},"25":{"file_name":"delivery_tracking_details","logo":"delivery-tracking-logo.png","activate":"activate_roadcast"},"26":{"file_name":"kds_details","logo":"kitchen_display.png","activate":"activate_kds"},"27":{"file_name":"token_details","logo":"token-management.png","activate":"activate_token_management"},"28":{"file_name":"weighingscale_details","logo":"weighing_scale.png","activate":"activate_weigh_scale"},"29":{"file_name":"qr_print_details","logo":"QR_Print_Service.png","activate":"activate_qr_print"},"36":{"file_name":"paytm_details","logo":"paytm.png","activate":"activate_paytm"},"43":{"file_name":"bingage_loyalty_details","logo":"bingage.jpg","activate":"activate_bingage_loyalty"},"47":{"file_name":"reelo_loyalty_details","logo":"reelo.png","activate":"activate_reelo_loyalty"},"52":{"file_name":"currency_conversion_details","logo":"currency_conversion.png","activate":"activate_currency_conversion"},"55":{"file_name":"ubereats_details","logo":"uber.png","activate":"activate_ubereats"},"57":{"file_name":"call_center_details","logo":"call_center.png","activate":"activate_callcenter"},"59":{"file_name":"ewards_details","logo":"ewards_logo.png","activate":"activate_ewards"},"74":{"file_name":"device_management_details","logo":"delivery_dispatch_device.png","activate":"activate_device_management"},"78":{"file_name":"amazon_s3_integration_details","logo":"amazon-s3-bucket.png","activate":"activate_amazon_integration"},"79":{"file_name":"smart_inventory","logo":"smart_scale.png","activate":"activate_smart_scale"},"81":{"file_name":"restaurant_loyalty_details","logo":"Petpooja-Loyalty.png","activate":""},"83":{"file_name":"menu_qr_details","logo":"menu-qr.png","activate":"activate_menu_qr"},"86":{"file_name":"dineout_details","logo":"dineout-logo.png","activate":"activate_dineout"},"90":{"file_name":"flipkart_details","logo":"flipkart-logo.png","activate":"activate_flipkart"},"91":{"file_name":"magicpin_details","logo":"magicpin-logo.png","activate":"activate_magicpin"},"92":{"file_name":"online_reconciliation_details","logo":"petpooja-match.png","activate":"activate_online_reconciliation"},"93":{"file_name":"amazon_details","logo":"amazon.png","activate":"activate_amazon"},"95":{"file_name":"item_purchase_details"},"96":{"file_name":"shadowfax_details","logo":"shadowfax.png","activate":"activate_shadowfax"},"97":{"file_name":"uengage_details","logo":"uengage_new_logo.svg","activate":"activate_uengage"},"98":{"file_name":"invoice_bazaar_details","logo":"Invoice-bazzar.png","activate":"activate_service_common"},"99":{"file_name":"petpooja_plus","logo":"petpooja_plus.png","activate":"activate_petpooja_plus"},"101":{"file_name":"device_calling_details","logo":"foods-service-icon.png","activate":"activate_service_common"},"102":{"file_name":"device_calling_details","logo":"","activate":""},"103":{"file_name":"e_invoice_details","logo":"e-invoice-logo.png","activate":"activate_einvoice"},"104":{"file_name":"whatsapp_details","logo":"whatsapp.png","activate":"activate_whatsapp_service"},"105":{"file_name":"feedback_qr_details","logo":"qr-based-feedback.png","activate":"activate_feedback"},"107":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"109":{"file_name":"petpooja_pro_details","logo":"petpooja_pro.png","activate":"activate_service_common"},"110":{"file_name":"petpooja_insights_details","logo":"petpooja_insights.png","activate":"activate_service_common"},"114":{"file_name":"green_receipt_details","logo":"green_receipt.png","activate":"activate_green_receipt"},"116":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"127":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"129":{"file_name":"dotpe_details","logo":"dotpe.svg","activate":"activate_service_common"},"132":{"file_name":"airmenu_details","logo":"air_menus.svg","activate":"activate_service_common"},"133":{"file_name":"zoho_details","logo":"zoho.png","activate":"activate_service_common"},"151":{"file_name":"growth_falcon_details","logo":"growth_falcon_logo.svg","activate":"activate_service_common"},"152":{"file_name":"uengage_flash_details","logo":"uengage_new_logo.svg","activate":"activate_service_common"},"153":{"file_name":"uengage_prism_details","logo":"uengage_new_logo.svg","activate":"activate_service_common"},"154":{"file_name":"qlub_pay_details","logo":"qlub_pay.png","activate":"activate_service_common"},"156":{"file_name":"xirify_details","logo":"xirify_logo.png","activate":"activate_xirify"},"159":{"file_name":"socon_details","logo":"socon.jpg","activate":"activate_socon"},"160":{"file_name":"blendfood_details","logo":"blendfood.png","activate":"activate_blendfood"},"162":{"file_name":"butomy_details","logo":"butomy_logo.png","activate":"activate_butomy"},"164":{"file_name":"moozy_details","logo":"moozy_logo.png","activate":"activate_moozy"},"167":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"168":{"file_name":"yumzy_details","logo":"yumzy_logo.png","activate":"activate_yumzy"},"169":{"file_name":"grobux_details","logo":"grobux_logo.jpg","activate":"activate_grobux"},"170":{"file_name":"zinggr_details","logo":"zinggr_logo.jpg","activate":"activate_zinggr"},"171":{"file_name":"ondc_details","logo":"ondc_logo.jpg","activate":"activate_ondc"},"172":{"file_name":"daidish_details","logo":"daidish_logo.jpg","activate":"activate_daidish"},"173":{"file_name":"busy_accounting_details","logo":"busy_logo2.svg","activate":"activate_service_common"},"174":{"file_name":"flashpe_details","logo":"flashpe_logo.png","activate":"activate_flashpe"},"176":{"file_name":"oroboro_details","logo":"oroboro.png","activate":"activate_service_common"},"180":{"file_name":"hellowcart_details","logo":"hellowcart_logo.png","activate":"activate_hellowcart"},"184":{"file_name":"potafo_details","logo":"potafo_logo.png","activate":"activate_potafo"},"186":{"file_name":"ckka_details","logo":"CKKA_Logo.svg","activate":"activate_service_common"},"189":{"file_name":"bizlyfy_details","logo":"bizlyfy_logo.png","activate":"activate_bizlyfy"},"190":{"file_name":"refr_details","logo":"refr_logo.png","activate":"activate_refr"},"192":{"file_name":"serving_drives_details","logo":"serving_drives_logo.png","activate":"activate_serving_drives"},"193":{"file_name":"zaaroz_details","logo":"zaaroz_logo.png","activate":"activate_zaaroz"},"194":{"file_name":"speedyy_details","logo":"speedyy_logo.png","activate":"activate_speedyy"},"198":{"file_name":"show_activated_outlets","logo":"petpooja_aggregation.png","activate":"activate_ondc"},"201":{"file_name":"myfojo_details","logo":"myfojo_logo.png","activate":"activate_myfojo"},"202":{"file_name":"tipplr_details","logo":"tipplr_logo.png","activate":"activate_tipplr"},"203":{"file_name":"eksecond_details","logo":"eksecond_logo.png","activate":"activate_eksecond"},"206":{"file_name":"uengage_ondc_details","logo":"uengage_ondc_details_logo.png","activate":"activate_uengage_ondc"},"205":{"file_name":"talabat_details","logo":"talabat_logo.jpg","activate":"activate_talabat"},"207":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"208":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"209":{"file_name":"qugometa_details","logo":"qugometa_logo.png","activate":"activate_qugometa"},"210":{"file_name":"muncho_details","logo":"muncho_logo.png","activate":"activate_muncho"},"212":{"file_name":"careem_details","logo":"careem_logo.jpg","activate":"activate_careem"},"214":{"file_name":"velocity_details","logo":"velocity_logo.jpeg","activate":"activate_service_common"},"215":{"file_name":"open_capital_details","logo":"open_capital_logo.png","activate":"activate_service_common"},"216":{"file_name":"ybites_details","logo":"ybites_logo.png","activate":"activate_ybites"},"220":{"file_name":"grab_food_details","logo":"grab_logo.jpg","activate":"activate_grab_food"},"221":{"file_name":"petpooja_loan_details","logo":"petpooja_loan_logo.png","activate":"activate_service_common"},"222":{"file_name":"petpooja_payroll_details","logo":"petpooja_payroll_logo.png","activate":"activate_petpooja_payroll"},"224":{"file_name":"finbii_details","logo":"finbii_logo.png","activate":"activate_service_common"},"225":{"file_name":"getvantage_details","logo":"getvantage_logo.png","activate":"activate_service_common"},"211":{"file_name":"whatsapp_promotional_details","logo":"whatsapp-crm.png","activate":"activate_whatsapp_promotional_service"},"227":{"file_name":"zyapaar_details","logo":"zyapaar_logo.png","activate":"activate_zyapaar"},"230":{"file_name":"bigbyts_details","logo":"bigbyts_logo.png","activate":"activate_bigbyts"},"231":{"file_name":"bookyapp_service","logo":"table-reservation1.png","activate":"activate_bookyapp_service"},"233":{"file_name":"tasks_by_petpooja","logo":"tasks_by_petpooja_logo.png","activate":"activate_tasks_by_petpooja"},"238":{"file_name":"invoice_by_petpooja","logo":"invoice_by_petpooja_logo.png","activate":"activate_invoice_by_petpooja"},"239":{"file_name":"noonfoods_details","logo":"NOON LOGO 2.jpg","activate":"activate_noonfoods"},"240":{"file_name":"tata_capital_details","logo":"tata_capital_logo.jpg","activate":"activate_tata_capital"},"242":{"file_name":"flexi_loans_details","logo":"flexi_loans_logo.svg","activate":"activate_flexi_loans"},"243":{"file_name":"petpooja_growth","logo":"petpooja_growth_logo.png","activate":"activate_petpooja_growth"},"244":{"file_name":"petpooja_scale_details","logo":"petpooja_scale_logo.png","activate":"activate_service_common"},"245":{"file_name":"glokal_details","logo":"glokal_logo.svg","activate":"activate_glokal"},"248":{"file_name":"incred_details","logo":"incred.jpg","activate":"activate_incred"},"249":{"file_name":"foodride_details","logo":"foodride_logo.jpg","activate":"activate_foodride"},"250":{"file_name":"mealpe_details","logo":"mealpe_logo.png","activate":"activate_mealpe"},"251":{"file_name":"foodjam_details","logo":"foodjam_logo.png","activate":"activate_foodjam"},"253":{"file_name":"stream_details","logo":"stream_combined_logo.svg","activate":"activate_stream"},"252":{"file_name":"niyogin_details","logo":"niyogin_logo.svg","activate":"activate_niyogin_loans"},"254":{"file_name":"one_loyalty_details","logo":"one_loyalty.jpeg","activate":"activate_one_loyalty"},"255":{"file_name":"pidge_details","logo":"pidge_logo.png","activate":"activate_pidge"},"256":{"file_name":"mysoftindiapms_details","logo":"mysoftindiapms.jpeg","activate":"activate_mysoftindiapms"},"257":{"file_name":"foodpanda_details","logo":"food-panda.png","activate":"activate_foodpanda"},"258":{"file_name":"paytm_ondc_details","logo":"paytm.png","activate":"activate_paytm_ondc"},"259":{"file_name":"petpooja_pay_razorpay_details","logo":"petpooja_pay_razorpay.png","activate":"activate_petpooja_pay_razorpay"},"260":{"file_name":"petpooja_pay_axis_details","logo":"petpooja_pay_axis.png","activate":"activate_petpooja_pay_axis"},"261":{"file_name":"petpooja_pay_bijlipay_details","logo":"petpooja_pay_bijlipay.jpg","activate":"activate_petpooja_pay_bijlipay"},"262":{"file_name":"petpooja_bilfree_details","logo":"petpooja_bilfree.png","activate":"activate_petpooja_bilfree"},"263":{"file_name":"pos_growth_details","logo":"pos_growth_details.png","activate":"activate_pos_growth"},"264":{"file_name":"pos_scale_details","logo":"pos_scale_details.png","activate":"activate_pos_scale"},"265":{"file_name":"pos_growth_renew","logo":"pos_growth_details.png","activate":"activate_pos_growth"},"266":{"file_name":"pos_scale_renew","logo":"pos_scale_details.png","activate":"activate_pos_scale"},"267":{"file_name":"voucher_details","logo":"gift-card-Marketplace-theme.png","activate":"activate_voucher"},"268":{"file_name":"petpooja_zomato_hyperpure","logo":"petpooja_zomato_hyperpure.png","activate":"activate_petpooja_zomato_hyperpure"},"273":{"file_name":"mrdivert_details","logo":"Combined_eateasySmiles.svg","activate":"activate_mrdivert"},"274":{"file_name":"ebill_details","logo":"eBill_Maintenance_Service.png","activate":"activate_ebill"},"275":{"file_name":"my_website","logo":"online_ordering_widget.png","activate":"activate_online_ordering_widget"},"276":{"file_name":"loantap_details","logo":"loantap.png","activate":"activate_flexi_loans"},"279":{"file_name":"bluetooth_printer_details","logo":"bluetooth_printer_logo.png","activate":"activate_bluetooth_printer"},"280":{"file_name":"pos_ultimate_plan_details","logo":"ultimate_plan_logo.png","activate":"activate_service_common"},"282":{"file_name":"ultimate_plan_details","logo":"ultimate_plan_logo.png","activate":"activate_service_common"},"285":{"file_name":"rozgaar_details","logo":"rozgaar_logo.png","activate":"activate_rozgaar"},"1000":{"file_name":"other_details","logo":"other-aggregator.svg","activate":"activate_other_aggregator"},"289":{"file_name":"ownly_details","logo":"ownly_logo.svg","activate":"activate_ownly"},"290":{"file_name":"digital_display_details","logo":"digital_display_details.svg","activate":"activate_digital_display"},"291":{"file_name":"essae_details","logo":"essae_logo.png","activate":"activate_essae"},"293":{"file_name":"posbank_details","logo":"posbank_logo.png","activate":"activate_posbank"},"294":{"file_name":"posiflex_details","logo":"posiflex_logo.png","activate":"activate_posiflex"},"301":{"file_name":"imin_details","logo":"imin_logo.png","activate":"activate_imin"},"302":{"file_name":"lenovo_details","logo":"lenovo_logo.png","activate":"activate_lenovo"},"304":{"file_name":"intellend_details","logo":"intellend.svg","activate":"activate_intellend"},"310":{"file_name":"petpooja_studio_details","logo":"petpooja_studio.png","activate":"activate_service_common"},"314":{"file_name":"trozo_details","logo":"trozo_logo.svg","activate":"activate_service_common"},"316":{"file_name":"ppgom_onetime","logo":"petpooja_pay.png","activate":"activate_service_common"},"317":{"file_name":"ppgom_rental","logo":"petpooja_pay.png","activate":"activate_service_common"},"318":{"file_name":"pppaym_onetime","logo":"petpooja_pay.png","activate":"activate_service_common"},"319":{"file_name":"pppaym_rental","logo":"petpooja_pay.png","activate":"activate_service_common"},"320":{"file_name":"batao_discount_details","logo":"batao_discount.svg","activate":"activate_service_common"},"321":{"file_name":"kiosk_details","logo":"kiosk.png","activate":"activate_kiosk"},"323":{"file_name":"mrp_shop_details","logo":"mrp_shop.svg","activate":"activate_service_common"}}';
        $.fancybox.defaults.touch = false;
    </script>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TZGLGX9');
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/qz-tray/qz-tray.js"></script>
    <script>
        async function thermalPrint(content)
        {
            try {
                if (!qz.websocket.isActive()) {
                    await qz.websocket.connect();
                }
        
                const config = qz.configs.create("cashier bill");
        
                await qz.print(config, [{
                    type: 'raw',
                    format: 'command',
                    data: content
                }]);
        
                console.log("Printed");
        
            } catch (e) {
                console.error(e);
                alert("Printer not connected");
            }
        }
        
        window.thermalHtmlPrint = async function(html)
        {
            try {
        
                if (typeof qz === 'undefined') {
                    alert('QZ Tray not loaded');
                    return;
                }
        
                if (!qz.websocket.isActive()) {
                    await qz.websocket.connect();
                }
        
                const config = qz.configs.create("cashier bill", {
                    copies: 1,
                    density: 300
                });
        
                await qz.print(config, [{
                    type: 'html',
                    format: 'plain',
                    data: html
                }]);
        
                console.log("Printed");
        
            } catch (e) {
                console.error(e);
                alert("Printer Error: " + e.message);
            }
        }
        
        window.kotPrint = async function(html)
        {
            try {
        
                if (!qz.websocket.isActive()) {
                    await qz.websocket.connect();
                }
        
                const config = qz.configs.create("k", {
                    copies: 1,
                    density: 300
                });
        
                await qz.print(config, [{
                    type: 'html',
                    format: 'plain',
                    data: html
                }]);
                
                console.log("Printed");
        
            } catch (e) {
                alert(e.message);
            }
        }
    </script>

    @yield('script')

</body>

</html>