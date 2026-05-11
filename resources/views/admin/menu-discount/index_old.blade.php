@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Page Header -->
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3 mb-4">

        <div class="flex-grow-1">
            <h3 class="mb-0">
                Categories
                <a href="{{ route('categories.index') }}" class="btn btn-icon btn-sm btn-white rounded-circle ms-2">
                    <i class="icon-refresh-ccw"></i>
                </a>
            </h3>
        </div>

        <div class="gap-2 d-flex align-items-center flex-wrap">

            <a class="btn btn-primary d-inline-flex align-items-center"
               data-bs-toggle="modal"
               data-bs-target="#add_category">

                <i class="icon-circle-plus me-1"></i>
                Add New

            </a>

        </div>

    </div>
    <!-- Page Header End -->


    <!-- Card -->
    <div class="card mb-0">

        <div class="card-body">

            <!-- Table -->
            <div class="table-responsive table-nowrap">

                <table class="table mb-0 border">

                    <thead>

                        <tr>

                            <th>Category</th>
                            <th>No of Items</th>
                            <th>Created On</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($categories as $category)

                        <tr>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="avatar avatar-sm avatar-rounded flex-shrink-0 me-2">

                                        <img src="{{ $category->getFirstMediaUrl('categories') ?? asset('assets/img/category/category-01.png') }}"
                                             class="img-fluid">

                                    </div>

                                    <h6 class="fs-14 fw-normal mb-0">

                                        {{ $category->name }}

                                    </h6>

                                </div>

                            </td>

                            <td>

                                {{ $category->items_count }}

                            </td>

                            <td>

                                {{ $category->created_at->format('F d, Y') }}

                            </td>

                            <td>

                                @if($category->status == 1)

                                    <span class="badge badge-soft-success">Active</span>

                                @else

                                    <span class="badge badge-soft-danger">Inactive</span>

                                @endif

                            </td>

                            <td>

                                <a class="btn btn-icon btn-sm btn-white rounded-circle me-2"
                                   data-bs-toggle="modal"
                                   data-bs-target="#edit_category_{{ $category->id }}">

                                    <i class="icon-pencil-line"></i>

                                </a>


                                <form method="POST"
                                      action="{{ route('categories.delete',$category->id) }}"
                                      style="display:inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-icon btn-sm btn-white rounded-circle">

                                        <i class="icon-trash-2"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>
            <!-- Table End -->

        </div>

    </div>


    <!-- Add Category Modal -->

    <div class="modal fade" id="add_category">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header border-0 p-4 pb-3">

                    <h4 class="modal-title">

                        Add Category

                    </h4>

                    <button type="button"
                            class="btn-close btn-close-modal"
                            data-bs-dismiss="modal">

                        <i class="icon-x"></i>

                    </button>

                </div>


                <form action="{{ route('categories.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body p-4 pt-1">

                        <div class="mb-3">

                            <label class="form-label">

                                Category Image

                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">

                                Category Name

                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control">

                        </div>


                        <div class="d-flex align-items-center justify-content-between gap-2 pt-1">

                            <button type="button"
                                    class="btn btn-light w-100"
                                    data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <button type="submit"
                                    class="btn btn-primary w-100">

                                Save

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>



    <!-- Edit Category Modals -->

    @foreach($categories as $category)

    <div class="modal fade"
         id="edit_category_{{ $category->id }}">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header border-0 p-4 pb-3">

                    <h4 class="modal-title">

                        Edit Category

                    </h4>

                    <button type="button"
                            class="btn-close btn-close-modal"
                            data-bs-dismiss="modal">

                        <i class="icon-x"></i>

                    </button>

                </div>


                <form action="{{ route('categories.update',$category->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body p-4 pt-1">

                        <div class="mb-3">

                            <label class="form-label">

                                Category Image

                            </label>

                            <input type="file"
                                   name="image"
                                   class="form-control">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">

                                Category Name

                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ $category->name }}"
                                   class="form-control">

                        </div>


                        <div class="d-flex align-items-center justify-content-between gap-2 pt-1">

                            <button type="button"
                                    class="btn btn-light w-100"
                                    data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <button type="submit"
                                    class="btn btn-primary w-100">

                                Save

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    @endforeach


</div>

@endsection