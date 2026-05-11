@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Page Header -->
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3 mb-4">

        <div class="flex-grow-1">
            <h3 class="mb-0">
                Items
                <a href="{{ route('items.index') }}" class="btn btn-icon btn-sm btn-white rounded-circle ms-2">
                    <i class="icon-refresh-ccw"></i>
                </a>
            </h3>
        </div>

        <div class="gap-2 d-flex align-items-center flex-wrap">

            <form method="GET" action="{{ route('items.index') }}">
                <div class="input-group input-group-flat w-auto">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <span class="input-group-text">
                        <i class="icon-search text-dark"></i>
                    </span>
                </div>
            </form>

            <a class="btn btn-primary d-inline-flex align-items-center"
               data-bs-toggle="modal"
               data-bs-target="#add_item">

                <i class="icon-circle-plus me-1"></i>
                Add New

            </a>

        </div>

    </div>
    <!-- Page Header End -->


    <!-- Row start -->
    <div class="row">

        @foreach($items as $item)

        <div class="col-lg-3 col-md-4 col-sm-6">

            <div class="card">

                <div class="card-body">

                    <div class="food-items">

                        <img src="{{ $item->getFirstMediaUrl('items') ?: asset('assets/img/items/food-01.jpg') }}"
                             class="img-fluid mb-3 w-100 rounded">

                        <a class="food-items-menu" data-bs-toggle="dropdown">
                            <i class="icon-ellipsis-vertical"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-split">

                            <li>
                                <a class="dropdown-item"
                                   data-bs-toggle="modal"
                                   data-bs-target="#edit_item_{{ $item->id }}">
                                    <i class="icon-pencil-line me-2"></i>Edit Item
                                </a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('items.delete',$item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="dropdown-item">
                                        <i class="icon-trash-2 me-2"></i>Delete
                                    </button>
                                </form>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('items.hide',$item->id) }}">
                                    @csrf
                                    <button class="dropdown-item">
                                        <i class="icon-eye-off me-2"></i>Hide Item
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>


                    <h6 class="fs-14 fw-semibold">

                        {{ $item->name }}

                    </h6>


                    <div class="d-flex align-items-center justify-content-between">

                        <p class="mb-0">

                            ₹{{ $item->price }}

                        </p>

                        <div>

                            @if($item->type == 'veg')

                                <span class="d-flex align-items-center">
                                    <i class="icon-square-dot text-success me-1"></i>Veg
                                </span>

                            @else

                                <span class="d-flex align-items-center">
                                    <i class="icon-square-dot text-danger me-1"></i>Non Veg
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>
    <!-- Row end -->


    <!-- Pagination -->
    <div class="mt-4">

        {{ $items->links() }}

    </div>



    <!-- Add Item Modal -->

    <div class="modal fade" id="add_item">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header border-0 p-4">

                    <h4 class="modal-title">Add Item</h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                        <i class="icon-x"></i>
                    </button>

                </div>


                <form action="{{ route('items.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body p-4 pt-1">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Item Image
                                    </label>

                                    <input type="file"
                                           name="image"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Item Name
                                    </label>

                                    <input type="text"
                                           name="name"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Price
                                    </label>

                                    <input type="text"
                                           name="price"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Tax
                                    </label>

                                    <input type="text"
                                           name="tax"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Category
                                    </label>

                                    <select name="category_id" class="form-control">

                                        @foreach($categories as $category)

                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Type
                                    </label>

                                    <select name="type" class="form-control">

                                        <option value="veg">Veg</option>
                                        <option value="nonveg">Non Veg</option>

                                    </select>

                                </div>

                            </div>

                        </div>


                        <div class="d-flex justify-content-end gap-2">

                            <button type="button"
                                    class="btn btn-light"
                                    data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <button type="submit"
                                    class="btn btn-primary">

                                Save Item

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>



    <!-- Edit Item Modals -->

    @foreach($items as $item)

    <div class="modal fade" id="edit_item_{{ $item->id }}">

        <div class="modal-dialog modal-dialog-centered modal-lg">

            <div class="modal-content">

                <div class="modal-header border-0 p-4">

                    <h4 class="modal-title">Edit Item</h4>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                        <i class="icon-x"></i>
                    </button>

                </div>


                <form action="{{ route('items.update',$item->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body p-4 pt-1">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Item Image
                                    </label>

                                    <input type="file"
                                           name="image"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-12">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Item Name
                                    </label>

                                    <input type="text"
                                           name="name"
                                           value="{{ $item->name }}"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Price
                                    </label>

                                    <input type="text"
                                           name="price"
                                           value="{{ $item->price }}"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Tax
                                    </label>

                                    <input type="text"
                                           name="tax"
                                           value="{{ $item->tax }}"
                                           class="form-control">

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Category
                                    </label>

                                    <select name="category_id" class="form-control">

                                        @foreach($categories as $category)

                                            <option value="{{ $category->id }}"
                                                {{ $item->category_id == $category->id ? 'selected' : '' }}>

                                                {{ $category->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="mb-3">

                                    <label class="form-label">
                                        Type
                                    </label>

                                    <select name="type" class="form-control">

                                        <option value="veg" {{ $item->type == 'veg' ? 'selected' : '' }}>Veg</option>

                                        <option value="nonveg" {{ $item->type == 'nonveg' ? 'selected' : '' }}>Non Veg</option>

                                    </select>

                                </div>

                            </div>

                        </div>


                        <div class="d-flex justify-content-end gap-2">

                            <button type="button"
                                    class="btn btn-light"
                                    data-bs-dismiss="modal">

                                Cancel

                            </button>

                            <button type="submit"
                                    class="btn btn-primary">

                                Update Item

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