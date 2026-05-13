<style>
    .sidebar-twocol.sidebar .sidebar-right {
        width: 100% !important;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        border-bottom: 1px solid #eee;
    }

    .menu-toggle {
        display: flex;
        justify-content: space-between;
        padding: 12px 15px;
        cursor: pointer;
        font-weight: 500;
        color: #333;
        text-decoration: none;
    }

    .arrow {
        margin-left: auto;
        transition: transform 0.3s ease;
    }

    /* rotate to DOWN */
    .menu-toggle.subdrop .arrow {
        transform: rotate(90deg);
    }

    .menu-toggle:hover {
        background: #f5f5f5;
    }

    .submenu {
        display: none;
        list-style: none;
        padding-left: 15px;
        background: #161616;
    }

    .submenu li a {
        display: block;
        padding: 10px;
        color: #555;
        text-decoration: none;
    }

    .submenu li a:hover {
        background: #eaeaea;
    }

    .menu-item.active .submenu {
        display: block;
    }

    /* Arrow rotate */
    .arrow {
        transition: 0.3s;
    }

    .menu-item.active .arrow {
        transform: rotate(90deg);
    }
</style>

<div class="two-col-sidebar" id="two-col-sidebar">
    <div class="sidebar sidebar-twocol">
        <div class="sidebar-right">
            <div class="sidebar-logo mb-3">
                <!-- Sidebar Close Button -->
                <button class="sidebar-close">
                    <i class="icon-x align-middle"></i>
                </button>
            </div>
            <div class="sidebar-scroll">
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="icon-layout-dashboard"></i><span>Dashboard</span></a></li>
                    @can('Order Create')
                    <li><a href="{{ route('pos.index') }}" class="{{ request()->routeIs('pos.index') ? 'active' : '' }}"><i class="icon-layout-dashboard"></i><span>POS</span></a></li>
                    @endcan
                    @can('Order View')
                    <li class="menu-title"><span>Daily Operations</span></li>
                    <li><a href="{{ route('admin.orders') }}" class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}"><i class="icon-clock"></i><span>Running Orders</span></a></li>
                    <li><a href="{{ route('admin.all.orders') }}" class="{{ request()->routeIs('admin.all.orders') ? 'active' : '' }}"><i class="icon-list-todo"></i><span>All Orders</span></a></li>
                    @endcan
                    <li><a href="javascript:void(0);"><i class="icon-phone"></i><span>Online Orders</span></a></li>
                    @can('KOT Print')
                    <li><a href="{{ route('admin.kitchen') }}" class="{{ request()->routeIs('admin.kitchen') ? 'active' : '' }}"><i class="icon-chef-hat"></i><span>KOT</span></a></li>
                    @endcan
                    <li><a href="javascript:void(0);"><i class="icon-hand-coins"></i><span>Due Payment Settlement</span></a></li>
                </ul>
                <ul class="sidebar-menu" style="border-top: 1px solid #eee;">

                    <!-- MENU -->
                    @canany(['Item Add','Item Edit'])
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Menu</span>
                            <i class="icon-chevron-right arrow"></i>
                        </a>
                        <ul class="submenu">
                            {{-- <li><a href="{{ route('categories.manage.menu.list') }}"><i class="icon-tags"></i><span>Menu & Discounts</span></a></li>
                            <li><a href="{{ route('items.index') }}"><i class="icon-upload"></i><span>Multi-Item Images Upload</span></a></li>
                            <li><a href="#"><i class="icon-toggle-left"></i><span>Menu on/off</span></a></li> --}}

                            {{-- <li><a href="{{ route('categories.index') }}"><i class="icon-tags"></i><span>Categories</span></a></li> --}}
                            <li><a href="{{ route('items.index') }}"><i class="icon-toggle-left"></i><span>Items</span></a></li>


                        </ul>
                    </li>
                    @endcanany

                    <!-- REPORTS -->
                    @can('Report View')
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Reports</span>
                            <i class="icon-chevron-right arrow"></i>
                        </a>
                        <ul class="submenu">

                            <!-- SALES -->
                            <li>
                                <a href="{{ route('reports.sales.summary') }}">
                                    <i class="icon-report-money"></i>
                                    <span>Sales Summary</span>
                                </a>
                            </li>

                            <!-- CATEGORY -->
                            <li>
                                <a href="{{ route('reports.category.summary') }}">
                                    <i class="icon-category"></i>
                                    <span>Category Summary</span>
                                </a>
                            </li>

                            <!-- ITEM -->
                            <li>
                                <a href="{{ route('reports.item.summary') }}">
                                    <i class="icon-list-details"></i>
                                    <span>Item Summary</span>
                                </a>
                            </li>

                            <!-- ORDER -->
                            <li>
                                <a href="{{ route('reports.order.summary') }}">
                                    <i class="icon-shopping-cart"></i>
                                    <span>Order Summary</span>
                                </a>
                            </li>

                            <!-- EXECUTIVE -->
                            <li>
                                <a href="{{ route('reports.executive.summary') }}">
                                    <i class="icon-users-group"></i>
                                    <span>Executive Sales Summary</span>
                                </a>
                            </li>

                            <!-- TIP -->
                            <li>
                                <a href="{{ route('reports.tip.summary') }}">
                                    <i class="icon-cash"></i>
                                    <span>Tip Summary</span>
                                </a>
                            </li>

                            <!-- EMPLOYEE -->
                            <li>
                                <a href="{{ route('reports.employee.summary') }}">
                                    <i class="icon-user-star"></i>
                                    <span>Employee Summary</span>
                                </a>
                            </li>

                            <!-- NC -->
                            <li>
                                <a href="{{ route('reports.nc.summary') }}">
                                    <i class="icon-alert-triangle"></i>
                                    <span>NC Item Summary</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endcan

                    <!-- MANAGEMENT -->
                    @canany(['User Manage','Role Manage'])
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Management</span>
                            <i class="icon-chevron-right arrow"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('tables.index') }}"><i class="icon-table"></i><span>Tables</span></a></li>
                            <li><a href="{{ route('users.index') }}"><i class="icon-user"></i><span>Users</span></a></li>
                            <li><a href="{{ route('roles.index') }}"><i class="icon-user-round-pen"></i><span>Permissions</span></a></li>
                        </ul>
                    </li>
                    @endcanany

                </ul>
            </div>
        </div>
    </div>
</div>