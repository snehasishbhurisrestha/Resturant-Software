@extends('layouts.app')

@section('content')

<!-- ================= HEADER ================= -->
<div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3 mb-4">
    <div class="flex-grow-1">
        <h3 class="mb-0">Orders</h3>
    </div>

    <form method="GET" class="d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search Order ID">
        <button class="btn btn-primary">Search</button>
    </form>
</div>

<!-- ================= STATUS CARDS ================= -->
<div class="row orders-list-four">

    <div class="col-md-2">
        <div class="card p-3">
            <span>Confirmed</span>
            <h4>{{ $confirmed }}</h4>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card p-3">
            <span>Pending</span>
            <h4>{{ $pending }}</h4>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card p-3">
            <span>Processing</span>
            <h4>{{ $processing }}</h4>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card p-3">
            <span>Out</span>
            <h4>{{ $outForDelivery }}</h4>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card p-3">
            <span>Delivered</span>
            <h4>{{ $delivered }}</h4>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card p-3">
            <span>Cancelled</span>
            <h4>{{ $cancelled }}</h4>
        </div>
    </div>

</div>

<!-- ================= ORDERS ================= -->
<div class="row mt-4">

    @forelse($orders as $order)

    <div class="col-xl-4 col-md-6 d-flex">
        <div class="card flex-fill">
            <div class="card-body">

                <!-- ORDER HEADER -->
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h6>#{{ $order->id }}</h6>
                        <p>
                            @if($order->table_number)
                                Table {{ $order->table_number }}
                            @endif
                        </p>
                    </div>
                </div>

                <!-- TOKEN + TIME -->
                <div class="d-flex justify-content-between mb-3">
                    <span>Token: {{ $order->token_no ?? '-' }}</span>
                    <span>{{ \Carbon\Carbon::parse($order->created_at)->format('h:i A') }}</span>
                </div>

                <!-- ITEMS -->
                <div class="border-bottom pb-2 mb-3">
                    @foreach($orderItems[$order->id] ?? [] as $item)
                        <div class="d-flex justify-content-between">
                            <span>{{ $item->name }}</span>
                            <span>x{{ $item->quantity }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- FOOTER -->
                <div class="d-flex justify-content-between align-items-center">

                    <!-- PAYMENT -->
                    <span class="badge bg-success">
                        {{ $order->payment_status ?? 'Unpaid' }}
                    </span>

                    <!-- STATUS -->
                    <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">

                            <option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>
                            <option value="processing" {{ $order->status=='processing'?'selected':'' }}>Preparing</option>
                            <option value="served" {{ $order->status=='served'?'selected':'' }}>Served</option>
                            <option value="delivered" {{ $order->status=='delivered'?'selected':'' }}>Delivered</option>
                            <option value="completed" {{ $order->status=='completed'?'selected':'' }}>Completed</option>
                            <option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>Cancelled</option>

                        </select>
                    </form>

                </div>

            </div>
        </div>
    </div>

    @empty
    <p>No Orders Found</p>
    @endforelse

</div>

@endsection