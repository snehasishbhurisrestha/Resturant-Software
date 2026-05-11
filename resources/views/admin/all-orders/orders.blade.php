{{-- resources/views/admin/all-orders/orders.blade.php --}}
@extends('layouts.app')

@section('title','All Orders')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">All Orders</h3>
            <p class="text-muted mb-0">Restaurant order history & filters</p>
        </div>

        <div class="d-flex gap-2">
            <a href="#" class="btn btn-success">
                <i class="bi bi-file-earmark-excel"></i> Export
            </a>
        </div>
    </div>

    {{-- FILTER --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET">

                <div class="row g-3">

                    <div class="col-md-2">
                        <label class="form-label">From Date</label>
                        <input type="date"
                               name="from_date"
                               value="{{ request('from_date') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">To Date</label>
                        <input type="date"
                               name="to_date"
                               value="{{ request('to_date') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Order ID</label>
                        <input type="text"
                               name="order_id"
                               value="{{ request('order_id') }}"
                               class="form-control"
                               placeholder="Order #">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text"
                               name="customer_name"
                               value="{{ request('customer_name') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Customer Phone</label>
                        <input type="text"
                               name="customer_phone"
                               value="{{ request('customer_phone') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Order Type</label>
                        <select name="order_type" class="form-select">
                            <option value="">All</option>
                            <option value="dine_in">Dine In</option>
                            <option value="pickup">Pickup</option>
                            <option value="delivery">Delivery</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="processing">Processing</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Payment</label>
                        <select name="payment" class="form-select">
                            <option value="">All</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Min Amount</label>
                        <input type="number"
                               name="min_amount"
                               value="{{ request('min_amount') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Max Amount</label>
                        <input type="number"
                               name="max_amount"
                               value="{{ request('max_amount') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">NC</label>
                        <select name="is_nc" class="form-select">
                            <option value="">All</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Complimentary</label>
                        <select name="is_complimentary" class="form-select">
                            <option value="">All</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="form-label invisible">x</label>
                        <button class="btn btn-dark">Search</button>
                    </div>

                    <div class="col-md-2 d-grid">
                        <label class="form-label invisible">x</label>
                        <a href="{{ url()->current() }}"
                           class="btn btn-secondary">Reset</a>
                    </div>

                </div>

            </form>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Type</th>
                    <th>Table</th>
                    <th>Captain</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Total</th>
                    <th width="160">Action</th>
                </tr>
                </thead>

                <tbody>

                @forelse($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d M Y h:i A') }}</td>
                        <td>
                            <div class="fw-semibold">
                                {{ $order->customer_name ?: 'Walk-in Customer' }}
                            </div>
                            <small class="text-muted">
                                {{ $order->customer_phone }}
                            </small>
                        </td>

                        <td>
                            <span class="badge bg-info">
                                {{ strtoupper($order->order_type) }}
                            </span>
                        </td>

                        <td>{{ $order->table->table_number ?? '-' }}</td>
                        <td>{{ $order->user->name ?? '-' }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ ucfirst(str_replace('_',' ',$order->status)) }}
                            </span>
                        </td>

                        <td>{{ strtoupper($order->payment) }}</td>

                        <td class="fw-bold">
                            ₹{{ number_format($order->grand_total,2) }}
                        </td>

                        <td>
                            <button
                                class="btn btn-sm btn-info viewOrderBtn"
                                data-id="{{ $order->id }}"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#orderDetailsCanvas">
                                View
                            </button>

                            @can('Order Edit')
                                <a href="#" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                            @endcan

                            @can('Table Transfer')
                                <a href="#" class="btn btn-sm btn-warning">
                                    Move
                                </a>
                            @endcan

                            @can('Order Cancel')
                                <a href="#" class="btn btn-sm btn-danger">
                                    Cancel
                                </a>
                            @endcan

                            @can('Bill NC')
                                <a href="#" class="btn btn-sm btn-dark">
                                    NC
                                </a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-5">
                            No orders found
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>
        </div>

        <div class="card-body">
            {{ $orders->links() }}
        </div>
    </div>

</div>

{{-- RIGHT PANEL --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="orderDetailsCanvas">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">Order Details</h5>
        <button class="btn-close"
                data-bs-dismiss="offcanvas">x</button>
    </div>

    <div class="offcanvas-body" id="orderDetailsBody">
        <div class="text-center py-5">
            Loading...
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).on('click','.viewOrderBtn',function(){

    let id = $(this).data('id');

    let canvas = new bootstrap.Offcanvas(
        document.getElementById('orderDetailsCanvas')
    );

    canvas.show();

    $('#orderDetailsBody').html(
        '<div class="text-center py-5">Loading...</div>'
    );

    $.get('/orders/'+id+'/details',function(order){
        let html = `
            <div class="mb-3">
                <h4>#${order.id}</h4>
                <p class="text-muted mb-1">
                    Table: ${order.table?.table_number ?? '-'}
                </p>
                <p class="text-muted">
                    Captain: ${order.user?.name ?? '-'}
                </p>
            </div>

            <hr>

            <h6>Items</h6>
        `;

        order.items.forEach(item=>{

            html += `
                <div class="border rounded p-2 mb-2">
                    <div class="fw-bold">
                        ${item.item_name ?? ''}
                    </div>

                    <small>
                        Qty: ${item.quantity}
                    </small>

                    <div class="text-end fw-bold">
                        ₹${item.line_total}
                    </div>
                </div>
            `;
        });

        html += `
            <hr>
            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal</span>
                <strong>₹${order.subtotal}</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Tax</span>
                <strong>₹${order.tax_amount}</strong>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span>Discount</span>
                <strong>₹${order.discount_amount}</strong>
            </div>
            <div class="d-flex justify-content-between">
                <span>Round off</span>
                <strong>₹${order.round_off}</strong>
            </div>
            <hr>
            <div class="d-flex justify-content-between fs-5">
                <span>Total</span>
                <strong>₹${order.grand_total}</strong>
            </div>
        `;

        $('#orderDetailsBody').html(html);

    });

});
</script>
@endsection