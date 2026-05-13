@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    <h3 class="mb-4 fw-bold">Order Management</h3>

    {{-- status cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-2">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Confirmed</h6>
                    <h3>{{ $statusCounts->confirmed }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card border-0 shadow-sm bg-warning text-dark">
                <div class="card-body text-center">
                    <h6>Pending</h6>
                    <h3>{{ $statusCounts->pending }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card border-0 shadow-sm bg-info text-white">
                <div class="card-body text-center">
                    <h6>Processing</h6>
                    <h3>{{ $statusCounts->processing }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card border-0 shadow-sm bg-success text-white">
                <div class="card-body text-center">
                    <h6>Delivered</h6>
                    <h3>{{ $statusCounts->delivered }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card border-0 shadow-sm bg-danger text-white">
                <div class="card-body text-center">
                    <h6>Cancelled</h6>
                    <h3>{{ $statusCounts->cancelled }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- filter --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form method="GET">
                <div class="row g-2">

                    <div class="col-md-4">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search Order ID"
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="processing">Processing</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-dark w-100">
                            Filter
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- table --}}
    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">

                <thead class="table-dark">
                    <tr>
                        <th>#Order</th>
                        <th>Table</th>
                        <th>Captain</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th width="220">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($orders as $order)

                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->table->table_number ?? '-' }}</td>
                        <td>{{ $order->user->name ?? '-' }}</td>

                        <td>
                            @foreach($order->items as $item)
                                <span class="badge bg-light text-dark border mb-1">
                                    {{ $item->menuItem->name ?? '-' }}
                                    x {{ $item->quantity }}
                                </span>
                            @endforeach
                        </td>

                        <td>₹{{ number_format($order->grand_total,2) }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ ucfirst(str_replace('_',' ',$order->status)) }}
                            </span>
                        </td>

                        <td>
                            <button
                                class="btn btn-sm btn-info viewOrderBtn"
                                data-id="{{ $order->id }}">
                                View
                            </button>
                            @can('Order Edit')
                                <a href="#" class="btn btn-sm btn-primary">
                                    Edit
                                </a>
                            @endcan

                            @can('Order Cancel')
                                <a href="#" class="btn btn-sm btn-danger">
                                    Cancel
                                </a>
                            @endcan
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="orderDetailsCanvas">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">Order Details</h5>
        <button type="button" class="btn-close" data-dismiss="offcanvas">x</button>
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

        $('#orderDetailsBody').html(
            '<div class="text-center py-5">Loading...</div>'
        );

        canvas.show();

        $.get('/orders/'+id+'/details', function(order){

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

                <div class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <strong>₹${order.subtotal}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Tax</span>
                    <strong>₹${order.tax_amount}</strong>
                </div>

                <div class="d-flex justify-content-between">
                    <span>Round off</span>
                    <strong>₹${order.round_off}</strong>
                </div>

                <div class="d-flex justify-content-between fs-5 mt-3">
                    <span>Total</span>
                    <strong>₹${order.grand_total}</strong>
                </div>
                
            `;

            $('#orderDetailsBody').html(html);

        });

    });
</script>
@endsection