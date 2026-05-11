@extends('layouts.app')

@section('content')

<div class="m-3">

    <!-- HEADER -->
    <div class="d-flex justify-content-between mb-3">
        <h3>Sections & Tables</h3>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSection">
            + Add Section
        </button>
    </div>

    <!-- ================= SECTIONS ================= -->
    @foreach($sections as $section)

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5>{{ $section->name }}</h5>

            <!-- ADD TABLE BUTTON -->
            <button class="btn btn-sm btn-success"
                data-bs-toggle="modal"
                data-bs-target="#addTable{{ $section->id }}">
                + Add Table
            </button>
        </div>

        <div class="card-body">

            <div class="row">

                @forelse($section->tables as $table)

                <div class="col-md-3 mb-3">
                    <div class="card p-3">

                        <h6>
                            Table {{ $table->table_number }}

                            @if($table->activeSession)
                                <span class="badge bg-danger">Occupied</span>
                            @else
                                <span class="badge bg-success">Available</span>
                            @endif
                        </h6>

                        <p>Capacity: {{ $table->capacity }}</p>

                        <form method="POST" action="{{ route('tables.destroy',$table->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>

                    </div>
                </div>

                @empty
                    <p>No tables in this section</p>
                @endforelse

            </div>

        </div>
    </div>

    <!-- ================= ADD TABLE MODAL (PER SECTION) ================= -->
    <div class="modal fade" id="addTable{{ $section->id }}">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="POST" action="{{ route('tables.store') }}">
                @csrf

                <input type="hidden" name="section_id" value="{{ $section->id }}">

                <div class="modal-header">
                    <h5>Add Table ({{ $section->name }})</h5>
                </div>

                <div class="modal-body">

                    <div class="mb-2">
                        <label>Table Number</label>
                        <input type="text" name="table_number" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label>Capacity</label>
                        <input type="number" name="capacity" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                </div>

                </form>

            </div>
        </div>
    </div>

    @endforeach

</div>


<!-- ================= ADD SECTION MODAL ================= -->
<div class="modal fade" id="addSection">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('sections.store') }}">
            @csrf

            <div class="modal-header">
                <h5>Add Section</h5>
            </div>

            <div class="modal-body">

                <div class="mb-2">
                    <label>Section Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Create</button>
            </div>

            </form>

        </div>
    </div>
</div>

@endsection