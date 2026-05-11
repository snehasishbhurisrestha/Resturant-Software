@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Kitchen Order Ticket</h5>
        </div>

        <div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-white">
        <button
            class="btn w-100 text-start fw-bold d-flex justify-content-between align-items-center"
            data-bs-toggle="collapse"
            data-bs-target="#kotFilterBox">

            <span>
                <i class="bi bi-search me-2"></i> Search
            </span>

            <i class="bi bi-chevron-down"></i>
        </button>
    </div>

    <div id="kotFilterBox" class="collapse show">
        <div class="card-body">

            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            Start Date
                        </label>
                        <input
                            type="date"
                            name="from_date"
                            value="{{ request('from_date') }}"
                            class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            End Date
                        </label>
                        <input
                            type="date"
                            name="to_date"
                            value="{{ request('to_date') }}"
                            class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            KOT ID
                        </label>
                        <input
                            type="text"
                            name="kot_id"
                            value="{{ request('kot_id') }}"
                            class="form-control"
                            placeholder="Enter KOT ID">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Customer Name
                        </label>
                        <input
                            type="text"
                            name="customer_name"
                            value="{{ request('customer_name') }}"
                            class="form-control"
                            placeholder="Customer name">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Customer Phone
                        </label>
                        <input
                            type="text"
                            name="customer_phone"
                            value="{{ request('customer_phone') }}"
                            class="form-control"
                            placeholder="Phone">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Table No.
                        </label>
                        <select name="table_id" class="form-select">
                            <option value="">All</option>

                            @foreach($tables as $table)
                                <option
                                    value="{{ $table->id }}"
                                    {{ request('table_id') == $table->id ? 'selected' : '' }}>
                                    {{ $table->table_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            All Order Type
                        </label>
                        <select name="order_type" class="form-select">
                            <option value="">All</option>
                            <option value="dine_in">Dine In</option>
                            <option value="pickup">Pickup</option>
                            <option value="delivery">Delivery</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Status
                        </label>
                        <select name="status" class="form-select">
                            <option value="">All</option>
                            <option value="pending">Pending</option>
                            <option value="preparing">Preparing</option>
                            <option value="ready">Ready</option>
                            <option value="served">Served</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">
                            Filter
                        </label>
                        <select name="filter" class="form-select">
                            <option value="">All</option>
                            <option value="complimentary">Complimentary</option>
                            <option value="normal">Normal</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="form-label invisible">x</label>
                        <button class="btn btn-danger">
                            Search
                        </button>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="form-label invisible">x</label>
                        <a href="{{ url()->current() }}"
                           class="btn btn-outline-secondary">
                            Show All
                        </a>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>KOT ID</th>
                        <th>Order Type</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>No. of Items</th>
                        <th width="280">Items</th>
                        <th>Status</th>
                        <th>Bill Print Date</th>
                        <th>Complete Duration</th>
                        <th>Created</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($orders as $order)

                    @php
                        $items = $order->items;

                        $itemNames = $items
                            ->pluck('item_name')
                            ->implode(', ');

                        $itemCount = $items->sum('quantity');

                        $status = 'served';

                        if($items->where('status','pending')->count()){
                            $status='pending';
                        }elseif($items->where('status','preparing')->count()){
                            $status='preparing';
                        }elseif($items->where('status','ready')->count()){
                            $status='ready';
                        }

                        $duration =
                            $order->created_at
                            ? $order->created_at->diffForHumans(null,true)
                            : '-';
                    @endphp

                    <tr>

                        <td>
                            <strong>{{ $order->order_no ?? '#'.$order->id }}</strong>
                        </td>

                        <td>
                            {{ $order->order_type ?? '-' }}
                        </td>

                        <td>
                            {{ $order->customer_name ?: 'Walk-in Customer' }}
                        </td>

                        <td>
                            {{ $order->customer_phone ?: '-' }}
                        </td>

                        <td>
                            <span class="badge bg-primary">
                                {{ $itemCount }}
                            </span>
                        </td>

                        <td style="white-space:normal;">
                            {{ $itemNames }}
                        </td>

                        <td>
                            @if($status=='pending')
                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>
                            @elseif($status=='preparing')
                                <span class="badge bg-info">
                                    Preparing
                                </span>
                            @elseif($status=='ready')
                                <span class="badge bg-success">
                                    Ready
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    Served
                                </span>
                            @endif
                        </td>

                        <td>
                            {{ $order->updated_at?->format('d M Y h:i A') ?? '-' }}
                        </td>

                        <td>
                            {{ $duration }}
                        </td>

                        <td>
                            {{ $order->created_at->format('d M Y h:i A') }}
                        </td>

                        <td>
                            <button
                                class="btn btn-sm btn-info viewKotBtn"
                                data-id="{{ $order->id }}"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#kotCanvas">
                                View
                            </button>

                            <button
                                class="btn btn-sm btn-dark">
                                Print
                            </button>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="11" class="text-center py-5">
                            No KOT Found
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection