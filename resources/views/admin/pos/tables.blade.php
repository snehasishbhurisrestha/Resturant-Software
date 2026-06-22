@extends('layouts.app')

@section('content')

<div class="m-3">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h3>Table View</h3>
    </div>

    <!-- ================= SECTIONS ================= -->
    @foreach($sections as $section)

        <h5>{{ $section->name }}</h5>

        <div class="row">

            @forelse($section->tables as $table)

            <div class="col-md-2 col-4 mb-3">

                <a href="{{ route('pos.mainindex', ['section' => $section->id, 'table' => $table->id]) }}"
                   class="text-decoration-none">

                    <div class="card p-3 border-0 shadow-sm text-dark" style=" {{ $table->orders->count() > 0 ? 'background-color: #c2863080 !important;' : '' }}">

                        <h6>
                            {{ $table->table_number }}
                        </h6>

                        {{--<p class="mb-0">
                            Capacity: {{ $table->capacity }}
                        </p>--}}

                        @if($table->orders->count() > 0)

                            <small class="fw-semibold mt-2">
                                ₹{{ $table->orders->sum('grand_total') }}
                            </small>

                        @endif

                    </div>

                </a>

            </div>

            @empty

                <p>No tables in this section</p>

            @endforelse

        </div>

    @endforeach

</div>

@endsection