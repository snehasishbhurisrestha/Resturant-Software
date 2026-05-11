@extends('layouts.app')

@section('content')

<!-- ================= HEADER ================= -->
<div class="d-flex align-items-sm-center justify-content-between flex-sm-row flex-column gap-3 mb-4">

    <div>
        <h3 class="mb-0">
            Customers
            <a href="{{ route('admin.customers') }}" class="btn btn-icon btn-sm btn-white rounded-circle ms-2">
                <i class="icon-refresh-ccw"></i>
            </a>
        </h3>
    </div>

    <!-- SEARCH -->
    <div class="d-flex gap-2">

        <form method="GET">
            <div class="input-group input-group-flat">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search Customer">
                <span class="input-group-text">
                    <i class="icon-search"></i>
                </span>
            </div>
        </form>

    </div>

</div>

<!-- ================= CUSTOMER CARDS ================= -->
<div class="row">

    @forelse($customers as $c)

    <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
        <div class="card flex-fill">

            <div class="card-body">

                <!-- AVATAR -->
                <div class="text-center mb-3">
                    <div class="avatar avatar-lg rounded-circle bg-primary text-white fs-20 mx-auto">
                        {{ strtoupper(substr($c->name,0,1)) }}
                    </div>
                </div>

                <!-- INFO -->
                <div class="text-center">
                    <h5 class="mb-1">{{ $c->name }}</h5>
                    <p class="mb-1 text-muted">{{ $c->phone }}</p>
                </div>

                <hr>

                <!-- STATS -->
                <div class="d-flex justify-content-between text-center">

                    <div>
                        <p class="mb-0 text-muted">Visits</p>
                        <h6>{{ $c->total_visits }}</h6>
                    </div>

                    <div>
                        <p class="mb-0 text-muted">Spent</p>
                        <h6>₹ {{ number_format($c->total_spent,2) }}</h6>
                    </div>

                    <div>
                        <p class="mb-0 text-muted">Cover</p>
                        <h6>₹ {{ number_format($c->total_cover,2) }}</h6>
                    </div>

                </div>

            </div>

            <!-- ACTION -->
            <div class="card-footer text-center">
                <a href="{{ route('admin.customers.show', $c->id) }}" class="btn btn-primary w-100">
                    View Details
                </a>
            </div>

        </div>
    </div>

    @empty

    <div class="col-12">
        <div class="card p-4 text-center">
            <p>No customers found</p>
        </div>
    </div>

    @endforelse

</div>

<!-- ================= PAGINATION ================= -->
<div class="mt-3">
    {{ $customers->links() }}
</div>

@endsection