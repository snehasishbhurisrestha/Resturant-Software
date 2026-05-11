@extends('layouts.app')

@section('content')

<!-- ================= HEADER ================= -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Customer Details</h3>
</div>

<div class="row">

    <!-- ================= LEFT PROFILE ================= -->
    <div class="col-xl-4">

        <div class="card p-3 text-center">

            <!-- Avatar -->
            <div class="mb-3">
                <div class="avatar avatar-xl rounded-circle bg-primary text-white fs-24">
                    {{ strtoupper(substr($customer->name,0,1)) }}
                </div>
            </div>

            <h4 class="mb-1">{{ $customer->name }}</h4>
            <p class="mb-1">{{ $customer->phone }}</p>
            <p class="text-muted">{{ $customer->email ?? '-' }}</p>

            <hr>

            <!-- Extra Info -->
            <div class="text-start">
                <p><strong>DOB:</strong> {{ $customer->dob ?? '-' }}</p>
                <p><strong>Marital Status:</strong> {{ ucfirst($customer->marital_status ?? '-') }}</p>
            </div>

        </div>

    </div>

    <!-- ================= RIGHT CONTENT ================= -->
    <div class="col-xl-8">

        <!-- ================= SUMMARY ================= -->
        <div class="row mb-3">

            <div class="col-md-3">
                <div class="card p-3">
                    <p class="mb-1 text-muted">Total Amount</p>
                    <h5>₹ {{ number_format($totalSpent,2) }}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3">
                    <p class="mb-1 text-muted">Total Cover</p>
                    <h5>₹ {{ number_format($totalCover,2) }}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3">
                    <p class="mb-1 text-muted">Visits</p>
                    <h5>{{ $totalVisits }}</h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3">
                    <p class="mb-1 text-muted">Most Event</p>
                    <h6>{{ $mostVisitedEvent->event_name ?? 'N/A' }}</h6>
                </div>
            </div>

        </div>

        <!-- ================= EVENT COUNT ================= -->
        <div class="card p-3 mb-3">
            <h5 class="mb-3">Event Visits</h5>

            @foreach($eventCounts as $event)
                <div class="d-flex justify-content-between border-bottom py-2">
                    <span>{{ $event->event_name ?? 'General' }}</span>
                    <span class="badge bg-primary">{{ $event->total }}</span>
                </div>
            @endforeach
        </div>

        <!-- ================= HISTORY ================= -->
        <div class="card p-3">

            <div class="d-flex justify-content-between mb-3">
                <h5>Visit History</h5>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Event</th>
                            <th>Amount</th>
                            <th>Table</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($history as $h)
                        <tr>
                            <td>{{ $h->created_at->format('d M Y') }}</td>
                            <td>{{ $h->event_name ?? '-' }}</td>
                            <td>₹ {{ $h->used_amount }}</td>
                            <td>{{ $h->table->table_number ?? '-' }}</td>

                            <td>
                                @if($h->status == 'active')
                                    <span class="badge bg-warning">Active</span>
                                @else
                                    <span class="badge bg-success">Closed</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>

</div>

@endsection