@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- ================= HEADER ================= -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Dashboard</h3>
    </div>

    <!-- ================= TOP CARDS ================= -->
    <div class="row">

        <!-- Total Collection -->
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h6>Total Collection</h6>
                <h4>₹ {{ number_format($totalCollection, 2) }}</h4>
                {{-- <small class="text-success">
                    Growth: {{ round($growth,2) }}%
                </small> --}}
            </div>
        </div>

        <!-- Cover Amount -->
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h6>Cover Amount</h6>
                <h4>₹ {{ number_format($coverAmount,2) }}</h4>

                {{-- <p class="text-success mb-1">
                    Remaining: ₹ {{ $remainingAmount }}
                </p>
                <p class="text-danger mb-0">
                    Used: ₹ {{ $usedAmount }}
                </p> --}}
            </div>
        </div>

        <!-- Due Amount -->
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h6>Due Amount</h6>
                <h4 class="text-danger">₹ {{ number_format($dueAmount,2) }}</h4>
            </div>
        </div>

        <!-- Active Sessions -->
        <div class="col-md-3 mb-3">
            <div class="card p-3">
                <h6>Active Sessions</h6>
                <h4>{{ $activeSessions }}</h4>
                {{-- <small>Closed: {{ $closedSessions }}</small> --}}
            </div>
        </div>

    </div>

    <!-- ================= CHECKINS ================= -->
    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Total Checkins</h6>
                <div class="d-flex justify-content-between">
                    <div>
                        <span class="mb-0">PAX</span>
                        <h5>{{ $totalPax ?? 0 }}</h5>
                    </div>
                    <div>
                        <span class="mb-0">GROUP</apan>
                        <h5>{{ $totalGroup }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Platform -->
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Platform Booking</h6>
                <h4>{{ $qrOrders }}</h4>
            </div>
        </div>

        <!-- Walkin -->
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Walkin Booking</h6>
                <h4>{{ $walkin }}</h4>
            </div>
        </div>

    </div>

    <!-- ================= CHART + TOP ITEMS ================= -->
    <div class="row">

        <!-- Revenue Chart -->
        <div class="col-md-8 mb-3">
            <div class="card p-3">
                <h6>Total Revenue</h6>
                <div id="revenue-charts"></div>
            </div>
        </div>

        <!-- Top Items -->
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h6>Top Selling Items</h6>

                <p class="text-success">
                    Most Ordered: {{ $topItem->name ?? 'N/A' }}
                </p>

                @foreach($topItems as $index => $item)
                    <div class="d-flex justify-content-between mb-2">
                        <span>#{{ $index+1 }} {{ $item->name }}</span>
                        <span>{{ $item->total_orders }}</span>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

    <!-- ================= ACTIVE CUSTOMERS ================= -->
    <div class="row">

        <div class="col-md-6 mb-3">
            <div class="card p-3">
                <h6>Active Customers</h6>

                @forelse($activeCustomers as $c)
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ $c->customer_name }}</span>
                        <span>₹ {{ $c->remaining_amount }}</span>
                    </div>
                @empty
                    <p>No active customers</p>
                @endforelse

            </div>
        </div>

        <!-- Transactions -->
        <div class="col-md-6 mb-3">
            <div class="card p-3">
                <h6>Recent Transactions</h6>

                @forelse($transactions as $t)
                    <div class="d-flex justify-content-between mb-2">
                        <span>#{{ $t->id }}</span>
                        <span>₹ {{ $t->entry_fee }}</span>
                    </div>
                @empty
                    <p>No transactions</p>
                @endforelse

            </div>
        </div>

    </div>

</div>

<!-- ================= CHART SCRIPT ================= -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var data = @json($revenueChart);

    var dates = data.map(item => item.date);
    var totals = data.map(item => item.total);

    var options = {
        chart: {
            type: 'area',
            height: 300
        },
        series: [{
            name: 'Revenue',
            data: totals
        }],
        xaxis: {
            categories: dates
        }
    };

    var chart = new ApexCharts(document.querySelector("#revenue-charts"), options);
    chart.render();
</script>

@endsection