@extends('layouts.app')

@section('content')

<div class="container-fluid py-3">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-warning mb-0">
                Restaurant Dashboard
            </h3>

            <small class="text-muted">
                Live POS Analytics
            </small>
        </div>

        <form method="GET" class="d-flex gap-2">
            <input type="date"
                   name="from"
                   class="form-control"
                   value="{{ request('from') }}">

            <input type="date"
                   name="to"
                   class="form-control"
                   value="{{ request('to') }}">

            <button class="btn btn-warning">
                Filter
            </button>
        </form>
    </div>

    <!-- KPI -->
    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card dashboard-card p-3">
                <small>Total Sales</small>
                <h3>₹ {{ number_format($totalSales,2) }}</h3>
                <small>{{ $totalOrders }} Orders</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card p-3">
                <small>Running Orders</small>
                <h3>{{ $runningOrders }}</h3>
                <small>KOT + Draft</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card p-3">
                <small>Completed Orders</small>
                <h3>{{ $completedOrders }}</h3>
                <small>Billed Orders</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card dashboard-card p-3">
                <small>Average Bill</small>
                <h3>₹ {{ number_format($avgBill,2) }}</h3>
                <small>Per Order</small>
            </div>
        </div>

    </div>

    <!-- ORDER TYPE -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h6>Dine In</h6>

                <h4>₹ {{ number_format($dineInSales,2) }}</h4>

                <small>
                    {{ $dineInOrders }} Orders
                </small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h6>Pick Up</h6>

                <h4>₹ {{ number_format($pickupSales,2) }}</h4>

                <small>
                    {{ $pickupOrders }} Orders
                </small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card p-3">
                <h6>Delivery</h6>

                <h4>₹ {{ number_format($deliverySales,2) }}</h4>

                <small>
                    {{ $deliveryOrders }} Orders
                </small>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- LEFT -->
        <div class="col-md-8">

            <!-- SALES CHART -->
            <div class="card dashboard-card p-3 mb-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Sales Analytics</h5>
                </div>

                <div id="salesChart"></div>

            </div>

            <!-- RECENT ORDERS -->
            <div class="card dashboard-card p-3 mb-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5>Recent Orders</h5>
                </div>

                <div class="table-responsive">

                    <table class="table table-dark table-hover align-middle">

                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Table</th>
                                <th>Captain</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($recentOrders as $order)

                            <tr>
                                <td>
                                    {{ $order->order_no }}
                                </td>

                                <td>
                                    {{ $order->table->table_number ?? '-' }}
                                </td>

                                <td>
                                    {{ $order->user->name ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge bg-warning">
                                        {{ strtoupper($order->status) }}
                                    </span>
                                </td>

                                <td>
                                    ₹ {{ number_format($order->grand_total,2) }}
                                </td>
                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- TOP ITEMS -->
            <div class="card dashboard-card p-3">

                <h5 class="mb-3">
                    Top Selling Items
                </h5>

                <div class="row">

                    @foreach($topItems as $item)

                    <div class="col-md-6 mb-3">

                        <div class="border rounded p-3">

                            <div class="d-flex justify-content-between">
                                <strong>
                                    {{ $item->item_name }}
                                </strong>

                                <span class="badge bg-success">
                                    {{ $item->total_qty }}
                                </span>
                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-md-4">

            <!-- TABLE STATUS -->
            <div class="card dashboard-card p-3 mb-4">

                <h5 class="mb-3">
                    Table Status
                </h5>

                <div class="d-flex justify-content-between mb-2">
                    <span>Total Tables</span>
                    <strong>{{ $totalTables }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Occupied</span>
                    <strong class="text-danger">
                        {{ $occupiedTables }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Available</span>
                    <strong class="text-success">
                        {{ $availableTables }}
                    </strong>
                </div>

            </div>

            <!-- PAYMENT -->
            <div class="card dashboard-card p-3 mb-4">

                <h5 class="mb-3">
                    Payment Analytics
                </h5>

                <div class="mb-2 d-flex justify-content-between">
                    <span>Cash</span>
                    <strong>₹ {{ number_format($cashSales,2) }}</strong>
                </div>

                <div class="mb-2 d-flex justify-content-between">
                    <span>Card</span>
                    <strong>₹ {{ number_format($cardSales,2) }}</strong>
                </div>

                <div class="mb-2 d-flex justify-content-between">
                    <span>UPI</span>
                    <strong>₹ {{ number_format($upiSales,2) }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Other</span>
                    <strong>₹ {{ number_format($otherSales,2) }}</strong>
                </div>

            </div>

            <!-- KOT -->
            <div class="card dashboard-card p-3 mb-4">

                <h5 class="mb-3">
                    Kitchen Operations
                </h5>

                <div class="d-flex justify-content-between mb-2">
                    <span>KOT Orders</span>
                    <strong>{{ $kotOrders }}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Draft Orders</span>
                    <strong>{{ $draftOrders }}</strong>
                </div>

            </div>

            <!-- TAX -->
            <div class="card dashboard-card p-3 mb-4">

                <h5 class="mb-3">
                    Financial Summary
                </h5>

                <div class="d-flex justify-content-between mb-2">
                    <span>Tax</span>
                    <strong>
                        ₹ {{ number_format($totalTax,2) }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Discount</span>
                    <strong>
                        ₹ {{ number_format($totalDiscount,2) }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Service Charge</span>
                    <strong>
                        ₹ {{ number_format($serviceCharge,2) }}
                    </strong>
                </div>

            </div>

            <!-- TOP USERS -->
            <div class="card dashboard-card p-3">

                <h5 class="mb-3">
                    Top Captains
                </h5>

                @foreach($topUsers as $user)

                <div class="border-bottom pb-2 mb-2">

                    <div class="d-flex justify-content-between">
                        <strong>{{ $user->name }}</strong>

                        <span>
                            ₹ {{ number_format($user->total_sales,0) }}
                        </span>
                    </div>

                    <small class="text-muted">
                        {{ $user->total_orders }} Orders
                    </small>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

    var chartData = @json($salesChart);

    var dates = chartData.map(item => item.date);

    var totals = chartData.map(item => item.total);

    var options = {

        chart: {
            type: 'area',
            height: 320,
            toolbar: {
                show: false
            }
        },

        series: [{
            name: 'Sales',
            data: totals
        }],

        xaxis: {
            categories: dates
        },

        stroke: {
            curve: 'smooth'
        },

        dataLabels: {
            enabled: false
        },

        colors: ['#f59e0b']
    };

    var chart = new ApexCharts(
        document.querySelector("#salesChart"),
        options
    );

    chart.render();

</script>

<style>

body{
    background:#0b0b0b;
    color:#fff;
}

/* MAIN CARD */
.dashboard-card{

    background:linear-gradient(
        145deg,
        #181818,
        #111111
    );

    border:1px solid rgba(212,175,55,.12);

    border-radius:18px;

    color:#fff;

    box-shadow:
        0 4px 20px rgba(0,0,0,.35);

    transition:.3s;
}

.dashboard-card:hover{

    transform:translateY(-2px);

    box-shadow:
        0 8px 30px rgba(212,175,55,.10);
}

/* HEADINGS */
.dashboard-card h3,
.dashboard-card h4,
.dashboard-card h5,
.dashboard-card h6{

    color:#f6d365;

    font-weight:600;
}

/* SMALL TEXT */
.dashboard-card small,
.text-muted{

    color:#a1a1aa!important;
}

/* TABLE */
.table-dark{

    --bs-table-bg:transparent;

    color:#fff;
}

.table-dark thead th{

    background:#1e1e1e;

    color:#f6d365;

    border-color:#2c2c2c;

    font-size:13px;
}

.table-dark td{

    border-color:#2c2c2c;
}

.table-hover tbody tr:hover{

    background:rgba(212,175,55,.05);
}

/* BADGE */
.badge{

    padding:7px 10px;

    border-radius:8px;

    font-size:11px;
}

.bg-warning{

    background:#D4AF37!important;

    color:#000!important;
}

.bg-success{

    background:#16a34a!important;
}

/* BUTTON */
.btn-warning{

    background:#D4AF37;

    border:none;

    color:#000;

    font-weight:600;
}

.btn-warning:hover{

    background:#f6d365;

    color:#000;
}

/* FORM */
.form-control{

    background:#181818;

    border:1px solid #333;

    color:#fff;
}

.form-control:focus{

    background:#181818;

    border-color:#D4AF37;

    color:#fff;

    box-shadow:
        0 0 0 .15rem rgba(212,175,55,.15);
}

/* TOP TITLE */
.dashboard-title{

    color:#f6d365;

    font-weight:700;

    letter-spacing:1px;
}

/* TOP ITEM BOX */
.border{

    border:1px solid rgba(212,175,55,.10)!important;

    background:#141414;
}

/* SCROLLBAR */
::-webkit-scrollbar{
    width:7px;
}

::-webkit-scrollbar-thumb{

    background:#D4AF37;

    border-radius:20px;
}

::-webkit-scrollbar-track{
    background:#111;
}

/* APEX CHART */
.apexcharts-tooltip{

    background:#111!important;

    border:1px solid #D4AF37!important;
}

/* RESPONSIVE */
@media(max-width:768px){

    .dashboard-card{
        margin-bottom:15px;
    }
}

.table.table-dark > :not(caption) > * > * {
    background-color: #d4af37 !important;
}

</style>

@endsection