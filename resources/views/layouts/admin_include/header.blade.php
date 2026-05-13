<header class="navbar-header">
    <div class="topbar-menu">
        <div class="d-flex align-items-center gap-2" style="line-height: 50px;">

            <!-- Logo -->
            {{-- <a href="index.html" class="logo">

                <!-- Logo Normal -->
                <span class="logo-light">
                    <span class="logo-lg"><img src="{{ asset('assets/admin/img/logo.svg') }}" alt="logo"></span>
                    <span class="logo-sm"><img src="{{ asset('assets/admin/img/logo-small.svg') }}" alt="small logo"></span>
                </span>

                <!-- Logo Dark -->
                <span class="logo-dark">
                    <span class="logo-lg"><img src="{{ asset('assets/admin/img/logo-white.svg') }}" alt="dark logo"></span>
                </span>
            </a> --}}

            <!-- Sidebar Mobile Button -->
            <a id="mobile_btn" class="mobile-btn" href="#sidebar">
                <i class="icon-menu fs-24"></i>
            </a>    
            
            <!-- Search -->
            {{-- <div class="header-links d-lg-flex d-none"> --}}
                {{-- <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="icon-hand-platter me-1"></i>POS</a> --}}
                {{-- <a href="{{ route('admin.orders') }}" class="d-inline-flex align-items-center"><i class="icon-list-todo me-1"></i>Orders</a> --}}
                {{-- <a href="{{ route('admin.kitchen') }}" class="d-inline-flex align-items-center"><i class="icon-drumstick me-1"></i>Kitchen</a> --}}
                {{-- <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="icon-file-clock me-1"></i>Reservation</a> --}}
                {{-- <a href="{{ route('tables.index') }}" class="d-inline-flex align-items-center"><i class="icon-concierge-bell me-1"></i>Table</a> --}}
            {{-- </div> --}}
            
        </div>

        {{-- <div class="d-flex align-items-center header-list">

            <!-- Report Button -->
            <div class="header-item d-none d-sm-flex">
                <a href="javascript:void(0);" class="topbar-link btn btn-icon" aria-label="report" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Setting">
                    <i class="icon-settings fs-16"></i>
                </a>
            </div>

            <!-- Light/Dark Mode Button -->
            <div class="header-item d-flex">
                <button class="topbar-link btn btn-icon light-dark-mode" type="button" aria-label="light/dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dark/Light Mode">
                    <i class="icon-moon fs-16"></i>
                </button>
            </div>
                
        </div> --}}

        <style>
            #settingsDropdown::after {
                display: none !important;
            }
        </style>

        <div class="header-item d-flex align-items-center dropdown">
    
            <a href="javascript:void(0);" 
            class="topbar-link btn btn-icon dropdown-toggle"
            id="settingsDropdown"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            aria-label="Settings">
                <i class="icon-settings fs-16"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                
                <!-- Edit Profile -->
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="icon-user me-2"></i> Edit Profile
                    </a>
                </li>

                <!-- Divider -->
                <li><hr class="dropdown-divider"></li>

                <!-- Logout -->
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="icon-log-out me-2"></i> Logout
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</header>