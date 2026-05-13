@extends('layouts.app')

@section('style')
    <style>

        body{
            background:#0d0d0d;
            color:#fff;
        }
        
        .table.table-dark > :not(caption) > * > * {
            background-color: #d4af37 !important;
        }

        .report-card{

            background:#171717;

            border-radius:15px;

            border:1px solid rgba(212,175,55,.12);

            padding:20px;

            margin-bottom:25px;
        }

        .report-title{
            color:#D4AF37;
            font-weight:700;
        }

        .table-dark{
            --bs-table-bg:transparent;
        }

        .table-dark th{

            background:#1f1f1f;

            color:#D4AF37;

            border-color:#333;
        }

        .table-dark td{
            border-color:#333;
        }

        .form-control{

            background:#111;

            border:1px solid #333;

            color:#fff;
        }

        .btn-warning{
            background:#D4AF37;
            border:none;
            color:#000;
        }

        .analytics-box{

            background:#111;

            border-radius:10px;

            padding:15px;

            border:1px solid rgba(212,175,55,.10);
        }

    </style>
@endsection

@section('content')

<div class="container-fluid py-3">

    <div class="report-card">

        <!-- FILTER -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

            <!-- TITLE + DATE -->
            <div class="d-flex align-items-center gap-3">

                <h3 class="report-title mb-0">
                    Category Summary Report
                </h3>

                <small class="text-muted">

                    {{ \Carbon\Carbon::parse($from)->format('d M Y') }}

                    -

                    {{ \Carbon\Carbon::parse($to)->format('d M Y') }}

                </small>

            </div>

            <!-- FILTER -->
            <form method="GET"
                class="d-flex align-items-center gap-2 flex-wrap">

                <input type="date"
                    name="from"
                    value="{{ request('from', \Carbon\Carbon::parse($from)->format('Y-m-d')) }}"
                    class="form-control">

                <input type="date"
                    name="to"
                    value="{{ request('to', \Carbon\Carbon::parse($to)->format('Y-m-d')) }}"
                    class="form-control">

                <button class="btn btn-warning">
                    Filter
                </button>

                <a href="{{ url()->current() }}"
                class="btn btn-dark border">
                    Reset
                </a>

            </form>

        </div>
        <div class="table-responsive">

            <table class="table table-dark table-hover">

                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($categories as $row)

                    <tr>
                        <td>{{ $row->category_name }}</td>
                        <td>{{ $row->qty }}</td>
                        <td>
                            ₹ {{ number_format($row->total,2) }}
                        </td>
                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection