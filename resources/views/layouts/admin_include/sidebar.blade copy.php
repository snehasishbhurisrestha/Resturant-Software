<div class="two-col-sidebar" id="two-col-sidebar">
    <div class="sidebar sidebar-twocol">
        <div class="twocol-mini">
            <a href="index.html" class="logo-small">
                {{-- <img src="{{ asset('assets/admin/img/logo-small.svg') }}" alt="Logo">
            </a> --}}
            <div class="sidebar-left">
                <div class="nav flex-column align-items-center sidebar-nav" id="sidebar-tabs" role="tablist" aria-orientation="vertical" data-simplebar>
                    <a href="#" class="nav-link {{ request()->routeIs('dashboard') || request()->routeIs('admin.orders') || request()->routeIs('admin.kitchen') ? 'active' : '' }}" title="Dashboard" data-bs-toggle="tab" data-bs-target="#dashboard">
                        <i class="icon-layout-dashboard"></i>
                    </a>
                    <a href="#" class="nav-link {{ request()->routeIs('categories.*') || request()->routeIs('items.*') ? 'active' : '' }}" title="Management" data-bs-toggle="tab" data-bs-target="#menu-management">
                        <i class="icon-layers"></i>
                    </a>
                    <a href="#" class="nav-link {{ request()->routeIs('tables.*') || request()->routeIs('admin.customers') ? 'active' : '' }}" title="Operations" data-bs-toggle="tab" data-bs-target="#operations">
                        <i class="icon-merge"></i>
                    </a>
                    <a href="#" class="nav-link {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'active' : '' }}" title="Administration" data-bs-toggle="tab" data-bs-target="#administration">
                        <i class="icon-user-cog"></i>
                    </a>
                </div>
                <div class="sidebar-profile">
                    <div class="dropdown dropend">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <i class="icon-bell"></i>
                            <span class="position-absolute notification-badge bg-danger"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl notification-dropdown">
                            <div class="d-flex align-items-center justify-content-between notification-header">
                                <h5 class="mb-0">Notifications</h5>
                                <a href="#" class="link-primary">Mark all as unread</a>
                            </div>
                            <div class="notification-body" data-simplebar>

                                <ul class="nav nav-tabs p-1 bg-light rounded border-0 nav-solid-white mb-3">
                                    <li class="nav-item">
                                        <a href="#all-notification" data-bs-toggle="tab" aria-expanded="true" class="nav-link active d-flex align-items-center py-1 px-2">
                                            All
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#unread-notification" data-bs-toggle="tab" aria-expanded="false" class="nav-link d-flex align-items-center py-1 px-2">
                                            Unread <span class="badge-icon ms-1">4</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#inbox-notification" data-bs-toggle="tab" aria-expanded="false" class="nav-link d-flex align-items-center py-1 px-2">
                                            Inbox
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#kitchen-notification" data-bs-toggle="tab" aria-expanded="false" class="nav-link d-flex align-items-center py-1 px-2">
                                            Kitchen <span class="badge-icon ms-1">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#order-notification" data-bs-toggle="tab" aria-expanded="false" class="nav-link d-flex align-items-center py-1 px-2">
                                            Orders
                                        </a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="all-notification">

                                        <div class="notification-list">                                            
                                            <h6 class="fs-14 fw-semibold mb-3">Today</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-secondary border border-secondary">
                                                        <i class="icon-cooking-pot"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New order from <span class="text-dark fw-medium">Table #12</span>  (3 items) pending.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>20 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-orange border border-orange">
                                                        <i class="icon-shopping-cart"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-medium">Order #124</span> confirmed and sent to the kitchen.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>35 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-success border border-success">
                                                        <i class="icon-badge-dollar-sign"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-medium">$850</span> received via UPI for <span class="text-dark fw-medium">Order #124.</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>40 Min Ago</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-success border border-success">
                                                        <i class="icon-square-pen"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New  order has been created <span class="text-dark fw-medium">Dine</span> in  for <span class="text-dark fw-medium">Table 1</span> total <span class="text-dark fw-medium">20 Items</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>45 Min Ago</p>
                                                        <div class="d-flex align-items-center gap-2 mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary">Accept</button>
                                                            <button type="button" class="btn btn-sm btn-white">Decline</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-list">
                                            <h6 class="fs-14 fw-semibold mb-3">Yesterday</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-danger border border-danger">
                                                        <i class="icon-info"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">Low stock: Cheese <span class="text-dark fw-medium">(5 units left).</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>10 Hrs Ago</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-indigo border border-indigo">
                                                        <i class="icon-calendar-fold"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">Table reservation for Andrew Merkel at <span class="text-dark fw-medium">7:30 PM.</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>40 Hrs Ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="unread-notification">

                                        <div class="notification-list">                                            
                                            <h6 class="fs-14 fw-semibold mb-3">Today</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-secondary border border-secondary">
                                                        <i class="icon-cooking-pot"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New order from <span class="text-dark fw-medium">Table #12</span>  (3 items) pending.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>20 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-orange border border-orange">
                                                        <i class="icon-shopping-cart"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-medium">Order #124</span> confirmed and sent to the kitchen.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>35 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-list">
                                            <h6 class="fs-14 fw-semibold mb-3">Yesterday</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-danger border border-danger">
                                                        <i class="icon-info"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">Low stock: Cheese <span class="text-dark fw-medium">(5 units left).</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>10 Hrs Ago</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-indigo border border-indigo">
                                                        <i class="icon-calendar-fold"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">Table reservation for Andrew Merkel at <span class="text-dark fw-medium">7:30 PM.</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>40 Hrs Ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="inbox-notification">

                                        <div class="notification-list">                                            
                                            <h6 class="fs-14 fw-semibold mb-3">Today</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-success border border-success">
                                                        <i class="icon-badge-dollar-sign"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-medium">$850</span> received via UPI for <span class="text-dark fw-medium">Order #124.</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>40 Min Ago</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-success border border-success">
                                                        <i class="icon-square-pen"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New  order has been created <span class="text-dark fw-medium">Dine</span> in  for <span class="text-dark fw-medium">Table 1</span> total <span class="text-dark fw-medium">20 Items</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>45 Min Ago</p>
                                                        <div class="d-flex align-items-center gap-2 mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary">Accept</button>
                                                            <button type="button" class="btn btn-sm btn-white">Decline</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="kitchen-notification">

                                        <div class="notification-list">                                            
                                            <h6 class="fs-14 fw-semibold mb-3">Today</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-orange border border-orange">
                                                        <i class="icon-shopping-cart"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-medium">Order #124</span> confirmed and sent to the kitchen.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>35 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-secondary border border-secondary">
                                                        <i class="icon-cooking-pot"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New order from <span class="text-dark fw-medium">Table #12</span>  (3 items) pending.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>20 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-list">
                                            <h6 class="fs-14 fw-semibold mb-3">Yesterday</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-indigo border border-indigo">
                                                        <i class="icon-calendar-fold"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">Table reservation for Andrew Merkel at <span class="text-dark fw-medium">7:30 PM.</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>40 Hrs Ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="order-notification">

                                        <div class="notification-list">                                            
                                            <h6 class="fs-14 fw-semibold mb-3">Today</h6>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-secondary border border-secondary">
                                                        <i class="icon-cooking-pot"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New order from <span class="text-dark fw-medium">Table #12</span>  (3 items) pending.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>20 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-orange border border-orange">
                                                        <i class="icon-shopping-cart"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1"><span class="text-dark fw-medium">Order #124</span> confirmed and sent to the kitchen.</p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>35 Min Ago</p>
                                                    </div>
                                                </div>
                                                <div class="notification-action">
                                                    <a href="javascript:void(0);" class="notification-read rounded-circle bg-success" data-bs-toggle="tooltip" title="" data-bs-original-title="Make as Read" aria-label="Make as Read"></a>
                                                </div>
                                            </div>

                                            <!-- Item-->
                                            <div class="notification-item">
                                                <div class="d-flex">
                                                    <div class="me-2 avatar avatar-rounded flex-shrink-0 badge-soft-success border border-success">
                                                        <i class="icon-square-pen"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1">New  order has been created <span class="text-dark fw-medium">Dine</span> in  for <span class="text-dark fw-medium">Table 1</span> total <span class="text-dark fw-medium">20 Items</span></p>
                                                        <p class="fs-13 mb-0 d-inline-flex align-items-center"><i class="icon-clock me-1"></i>45 Min Ago</p>
                                                        <div class="d-flex align-items-center gap-2 mt-2">
                                                            <button type="button" class="btn btn-sm btn-primary">Accept</button>
                                                            <button type="button" class="btn btn-sm btn-white">Decline</button>
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
                    {{-- <div class="dropdown dropend">
                        <a href="javascript:void(0);" class="avatar avatar-sm" data-bs-toggle="dropdown">
                            <img src="assets/img/profiles/avatar-27.jpg" alt="user" class="img-fluid rounded-circle">
                        </a>
                        <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-md">
                            <div class="dropdown-header border-bottom p-3">
                                <div class="d-flex align-items-center justify-content-between gap-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-lg avatar-rounded border border-success">
                                            <img src="assets/img/profiles/avatar-27.jpg" class="rounded-circle" alt="user">
                                        </div>
                                        <div class="ms-2">
                                            <h5 class="mb-1 fs-14 fw-semibold">Adrian James</h5>
                                            <span class="d-block fs-13">Administrator</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3">

                                <!-- Item-->
                                <a href="store-settings.html" class="dropdown-item">
                                    <i class="icon-warehouse me-2 fs-16 align-middle"></i>
                                    <span class="align-middle">Store Settings</span>
                                </a>

                                <!-- Item-->
                                <a href="role-permission.html" class="dropdown-item">
                                    <i class="icon-shield-ellipsis me-2 fs-16 align-middle"></i>
                                    <span class="align-middle">Roles & Permisisons</span>
                                </a>

                                <!-- Item-->
                                <a href="audit-report.html" class="dropdown-item">
                                    <i class="icon-clock-arrow-down me-2 fs-16 align-middle"></i>
                                    <span class="align-middle">Audit Logs</span>
                                </a>

                                <!-- Item-->
                                <a href="users.html" class="dropdown-item">
                                    <i class="icon-user-pen me-2 fs-16 align-middle"></i>
                                    <span class="align-middle">Manage Staffs</span>
                                </a>

                            </div>
                            <div class="p-3 border-top">
                                <a href="login.html" class="btn btn-white btn-sm w-100">
                                    <i class="icon-log-in me-1"></i>Logout
                                </a>
                            </div>
                            
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="sidebar-right">
            <div class="sidebar-logo mb-3">
                <!-- Sidebar Close Button -->
                <button class="sidebar-close">
                    <i class="icon-x align-middle"></i>
                </button>
            </div>
            <div class="sidebar-scroll">
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane fade {{ request()->routeIs('dashboard') || request()->routeIs('admin.orders') || request()->routeIs('admin.kitchen') ? 'show active' : '' }}" id="dashboard">
                        <ul>
                            <li class="menu-title"><span>MAIN</span></li>
                            <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="icon-layout-dashboard"></i><span>Dashboard</span></a></li>
                            {{-- <li><a href="javascript:void(0);"><i class="icon-combine"></i><span>POS</span></a></li> --}}
                            <li><a href="{{ route('admin.orders') }}" class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}"><i class="icon-list-todo"></i><span>Orders</span></a></li>
                            <li><a href="{{ route('admin.kitchen') }}" class="{{ request()->routeIs('admin.kitchen') ? 'active' : '' }}"><i class="icon-drumstick"></i><span>Kitchen (KDS)</span></a></li>
                            {{-- <li><a href="javascript:void(0);"><i class="icon-file-clock"></i><span>Reservation</span></a></li> --}}
                        </ul>
                    </div>
                    <div class="tab-pane fade {{ request()->routeIs('categories.*') || request()->routeIs('items.*') ? 'show active' : '' }}" id="menu-management">
                        <ul>
                            <li class="menu-title"><span>MENU MANAGEMENT</span></li>
                            <li><a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}"><i class="icon-layers"></i><span>Categories</span></a></li>
                            <li><a href="{{ route('items.index') }}" class="{{ request()->routeIs('items.*') ? 'active' : '' }}"><i class="icon-layout-list"></i><span>Items</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade {{ request()->routeIs('tables.*') || request()->routeIs('admin.customers') ? 'show active' : '' }}" id="operations">
                        <ul>
                            <li class="menu-title"><span>OPERATIONS</span></li>
                            <li><a href="{{ route('tables.index') }}" class="{{ request()->routeIs('tables.*') ? 'active' : '' }}"><i class="icon-concierge-bell"></i><span>Tables</span></a></li>
                            <li><a href="{{ route('admin.customers') }}" class="{{ request()->routeIs('admin.customers') ? 'active' : '' }}"><i class="icon-user-round"></i><span>Customers</span></a></li>
                            {{-- <li><a href="javascript:void(0);"><i class="icon-file-spreadsheet"></i><span>Invoices</span></a></li> --}}
                            {{-- <li><a href="javascript:void(0);"><i class="icon-badge-dollar-sign"></i><span>Payments</span></a></li> --}}
                        </ul>
                    </div>
                    <div class="tab-pane fade {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'show active' : '' }}" id="administration">
                        <ul>
                            <li class="menu-title"><span>ADMINISTRATION</span></li>
                            <li><a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}"><i class="icon-users"></i><span>Users</span></a></li>
                            <li><a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.*') ? 'active' : '' }}"><i class="icon-shield"></i><span>Permissions</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-file-spreadsheet"></i><span>Reports</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>