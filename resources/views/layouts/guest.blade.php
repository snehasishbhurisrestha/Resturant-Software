<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/favicon.png') }}">

    <!-- Apple Icon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/admin/img/apple-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">

    <!-- Lucide Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/lucide/lucide.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}" id="app-style">

</head>

<body class="bg-white" style="background-image: url('{{ asset('assets/admin/img/login.jpg') }}'); 
background-size: cover; 
background-position: center; 
background-repeat: no-repeat;">

    <!-- Begin Wrapper -->
    <div class="main-wrapper">

        <!-- ========================
			Start Page Content
		========================= -->

        <div class="container-fuild">

            <!-- Start Content -->
            <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">

                <!-- start row -->
                <div class="row g-2 justify-content-center">

                    <div class="col-lg-6 col-md-12 col-sm-12 p-3">
                        
                        <!-- start row -->
                        <div class="row justify-content-center align-items-center overflow-auto flex-wrap auth-vh vh-100">
                            
                            <div class="col-xl-6 col-lg-10 col-md-8 col-sm-10 mx-auto">
                                {{ $slot }}
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->

                </div>
                <!-- end row -->

                <div class="alert alert-danger border-0 border-danger border-bottom alert-dismissible pe-5 d-none" role="alert">
                    <p class="fw-medium mb-0 d-inline-flex align-items-center">
                    <span class="btn btn-icon btn-xs rounded-circle bg-danger d-flex align-items-center justify-content-center pe-none me-2 "><i class="icon-x fs-16 text-white"></i></span>Please enter your user name</p>
                    <button type="button" class="btn-close btn-custom-close top-50 translate-middle-y link-danger" data-bs-dismiss="alert" aria-label="Close"><i class="icon-x"></i></button>
                </div>    

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

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/js/script.js') }}" type="text/javascript"></script>
</body>

</html>