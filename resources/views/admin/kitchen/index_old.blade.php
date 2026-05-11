@extends('layouts.app')

@section('content')

<!-- ================= HEADER ================= -->
<div class="d-flex justify-content-between mb-4">

    <h3>Kitchen</h3>

    <!-- STATUS COUNTS -->
    <div class="d-flex gap-3">

        <div class="badge bg-light text-dark">New: {{ $newOrders }}</div>
        <div class="badge bg-secondary">Kitchen: {{ $inKitchen }}</div>
        <div class="badge bg-danger">Delayed: {{ $delayed }}</div>
        <div class="badge bg-success">Done: {{ $completed }}</div>

    </div>

</div>

<!-- ================= ORDERS ================= -->
<div class="row g-4">

    @foreach($orders as $order)

    <div class="col-xl-4 col-md-6 d-flex">
        <div class="card flex-fill">

            <!-- HEADER COLOR BASED ON STATUS -->
            <div class="card-header 
                @if($order->status == 'pending') bg-gray
                @elseif($order->status == 'processing') bg-warning
                @elseif($order->status == 'ready') bg-success
                @endif">

                <div class="d-flex justify-content-between">

                    <div>
                        <strong class="text-white">{{ $order->customer_name ?? 'Walk-in' }}</strong>
                        <br>
                        <small>{{ ucfirst($order->order_type) }}</small>
                    </div>

                    <span class="badge bg-white text-dark">#{{ $order->id }}</span>

                </div>
            </div>

            <!-- TOKEN -->
            <div class="card-body border-bottom">
                <div class="d-flex justify-content-between">
                    <span>Token: {{ $order->token_no ?? '-' }}</span>
                    <span>{{ $order->created_at->format('h:i A') }}</span>
                </div>
            </div>

            <!-- ITEMS -->
            <div class="card-body">

                @foreach($order->items as $item)
                    <div class="d-flex justify-content-between border-bottom mb-2 pb-1">
                        <span>{{ $item->item->name }}</span>
                        <span>x{{ $item->quantity }}</span>
                    </div>

                    @if($item->note)
                        <small class="text-muted">Note: {{ $item->note }}</small>
                    @endif
                @endforeach

                <!-- PROGRESS -->
                <div class="mt-3">
                    <div class="progress">
                        <div class="progress-bar 
                            @if($order->status=='pending') bg-secondary
                            @elseif($order->status=='processing') bg-warning
                            @else bg-success
                            @endif"
                            style="width: {{ $order->progress ?? 20 }}%">
                        </div>
                    </div>
                </div>

            </div>

            <!-- ACTIONS -->
            <div class="card-footer d-flex gap-2">

                <!-- START COOKING -->
                @if($order->status == 'pending')
                <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
                    @csrf
                    <input type="hidden" name="status" value="processing">
                    <button class="btn btn-warning w-100">Start Cooking</button>
                </form>
                @endif

                <!-- MARK DONE -->
                @if($order->status == 'processing')
                <form method="POST" action="{{ route('admin.orders.status', $order->id) }}">
                    @csrf
                    <input type="hidden" name="status" value="ready">
                    <button class="btn btn-success w-100">Done</button>
                </form>
                @endif

            </div>

        </div>
    </div>

    @endforeach

</div>

@endsection