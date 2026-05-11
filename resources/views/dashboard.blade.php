@extends('layouts.app')

@section('style')
<style>
    .left-panel{
        height: 80vh;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 10px;
    }

    /* scrollbar */
    .left-panel::-webkit-scrollbar{
        width: 6px;
    }
    .left-panel::-webkit-scrollbar-thumb{
        background: #888;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')

<div class="container-fluid" style="padding-top:20px;">

    <!-- ================= HEADER ================= -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-gold">Dashboard</h4>
        <span class="text-muted">Order synced just now</span>
    </div>

    

    <!-- ================= MAIN SECTION ================= -->
    <div class="row">

        <!-- LEFT SIDE -->
        <div class="col-md-8 left-panel">
            <!-- ================= TOP KPI ================= -->
            <div class="row g-3 mb-3">

                <div class="col-md-3">
                    <div class="card dashboard-card p-3">
                        <h6>Total Sales</h6>
                        <h4>₹ {{ number_format($totalCollection,0) }}</h4>
                        <small>{{ $totalSessions }} Orders</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card dashboard-card p-3">
                        <h6>Dine In</h6>
                        <h4>₹ {{ number_format($totalCollection,0) }}</h4>
                        <small>{{ $activeSessions }} Orders</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card dashboard-card p-3">
                        <h6>Pick Up</h6>
                        <h4>₹ {{ number_format($qrOrders,0) }}</h4>
                        <small>{{ $qrOrders }} Orders</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card dashboard-card p-3">
                        <h6>Delivery</h6>
                        <h4>₹ 0</h4>
                        <small>0 Orders</small>
                    </div>
                </div>

            </div>

            <!-- SALES CHART -->
            <div class="card dashboard-card p-3 mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <h6>Sales</h6>
                    <select class="form-select form-select-sm w-auto">
                        <option>Bar Chart</option>
                    </select>
                </div>
                <div id="sales-chart"></div>
            </div>

            <!-- PAYMENT -->
            <div class="card dashboard-card p-3">
                <div class="d-flex justify-content-between">
                    <h6>Payment Bifurcation</h6>
                    <button class="btn btn-sm btn-outline-light">Refresh</button>
                </div>

                <div class="progress mt-3" style="height:20px;">
                    <div class="progress-bar bg-success" style="width:100%">100%</div>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-4">

            <!-- ALERTS -->
            <div class="card dashboard-card p-3 mb-3">
                <h6>⚠ Alerts</h6>
                <p class="text-danger mb-1">271 Menu Item(s) Without Tax</p>
                <small class="text-muted">Apply tax or close if acceptable</small>
                <hr>
                <p class="text-warning mb-1">290 Items Missing Description</p>
                <small class="text-muted">Add description for better UX</small>
            </div>

            <!-- ORDER STATS -->
            <div class="card dashboard-card p-3 mb-3">
                <h6>📊 Order Statistics</h6>

                <div class="d-flex justify-content-between">
                    <span>Successful</span>
                    <b>{{ $totalSessions }}</b>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Cancel</span>
                    <b>0</b>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Complimentary</span>
                    <b>0</b>
                </div>

                <hr>
                <small>Avg Turnaround: 113 mins</small>
            </div>

            <!-- REVENUE LEAKAGE -->
            <div class="card dashboard-card p-3">
                <h6>⚡ Revenue Leakage</h6>

                <div class="row">
                    <div class="col-6">
                        <b>Bills</b>
                        <p>25 Modified</p>
                        <p>27 Re-Printed</p>
                    </div>

                    <div class="col-6">
                        <b>KOTs</b>
                        <p>6 Cancelled</p>
                        <p>22 Modified</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- ================= APEX CHART ================= -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var data = @json($revenueChart);

    var dates = data.map(item => item.date);
    var totals = data.map(item => item.total);

    var options = {
        chart: {
            type: 'bar',
            height: 300,
            toolbar: { show: false }
        },
        series: [{
            name: 'Sales',
            data: totals
        }],
        xaxis: {
            categories: dates
        },
        colors: ['#C28840']
    };

    var chart = new ApexCharts(document.querySelector("#sales-chart"), options);
    chart.render();
</script>

<!-- ================= CUSTOM CSS ================= -->
<style>

body {
    background: #0A0A0A;
}

/* GOLD TEXT */
.text-gold {
    color: #FFD700;
}

/* CARD */
.dashboard-card {
    background: #1A1A1A;
    border: 1px solid rgba(194,136,64,0.15);
    border-radius: 10px;
    color: #C7B77F;
    transition: 0.3s;
}

.dashboard-card:hover {
    box-shadow: 0 0 15px rgba(194,136,64,0.3);
}

/* PROGRESS */
.progress {
    background: #111;
}

/* BUTTON */
.btn-outline-light {
    border-color: rgba(194,136,64,0.3);
    color: #C28840;
}

.btn-outline-light:hover {
    background: #C28840;
    color: #000;
}

</style>

@endsection