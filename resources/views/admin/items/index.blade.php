@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Header -->
    <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3 mb-4">
        <div class="flex-grow-1">
            <h3 class="mb-0">
                Menu Management
                <a href="{{ route('menu.management') }}"
                   class="btn btn-icon btn-sm btn-white rounded-circle ms-2">
                    <i class="icon-refresh-ccw"></i>
                </a>
            </h3>
            <p class="text-muted mb-0 mt-1">
                Manage Categories, Menu Items and GST
            </p>
        </div>

        <div class="d-flex gap-2 flex-wrap">

            <button class="btn btn-primary category-tab-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#addCategoryModal">
                <i class="icon-circle-plus me-1"></i>
                Add Category
            </button>

            <button class="btn btn-success item-tab-btn d-none"
                    data-bs-toggle="modal"
                    data-bs-target="#addItemModal">
                <i class="icon-circle-plus me-1"></i>
                Add Item
            </button>

        </div>
    </div>


    <!-- Nav Tabs -->
    <div class="card mb-4">
        <div class="card-body p-2">

            <ul class="nav nav-pills nav-justified" id="menuTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active"
                            id="categories-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#categoriesPane"
                            type="button">
                        <i class="icon-layout-grid me-1"></i>
                        Categories
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                            id="items-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#itemsPane"
                            type="button">
                        <i class="icon-burger me-1"></i>
                        Menu Items
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link"
                            id="gst-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#gstPane"
                            type="button">
                        <i class="icon-receipt-tax me-1"></i>
                        GST Settings
                    </button>
                </li>

            </ul>

        </div>
    </div>


    <!-- Tab Content -->
    <div class="tab-content">

        <!-- ================= CATEGORY TAB ================= -->
        <div class="tab-pane fade show active"
             id="categoriesPane">

            <div class="card">

                <div class="card-header border-0 pb-0">

                    <div class="row align-items-center">

                        <div class="col-md-4">
                            <h5 class="mb-0">
                                Category Management
                            </h5>
                        </div>

                        <div class="col-md-8">

                            <div class="d-flex gap-2 justify-content-md-end mt-3 mt-md-0">

                                <div class="input-group input-group-flat" style="max-width:300px;">
                                    <input type="text"
                                           id="categorySearch"
                                           class="form-control"
                                           placeholder="Search category...">
                                    <span class="input-group-text">
                                        <i class="icon-search"></i>
                                    </span>
                                </div>

                                <button class="btn btn-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addCategoryModal">
                                    <i class="icon-circle-plus me-1"></i>
                                    Add
                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle" id="categoryTable">

                            <thead>
                                <tr>
                                    <th width="80">Image</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Group</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th width="130">Action</th>
                                </tr>
                            </thead>

                            <tbody id="categoryTableBody">

                                @foreach($categories as $category)

                                <tr data-id="{{ $category->id }}">

                                    <td>
                                        <img src="{{ $category->getFirstMediaUrl('categories') ?: asset('assets/img/items/food-01.jpg') }}"
                                             class="rounded"
                                             width="55"
                                             height="55"
                                             style="object-fit:cover;">
                                    </td>

                                    <td>
                                        <h6 class="mb-0">
                                            {{ $category->name }}
                                        </h6>
                                    </td>

                                    <td>
                                        {{ $category->online_display_name ?: '-' }}
                                    </td>

                                    <td>
                                        {{ $category->category_group ?: '-' }}
                                    </td>

                                    <td>
                                        <span class="badge bg-primary">
                                            {{ $category->items_count }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($category->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Hidden</span>
                                        @endif
                                    </td>

                                    <td>

                                        <div class="dropdown">

                                            <a href="#"
                                               class="btn btn-sm btn-white"
                                               data-bs-toggle="dropdown">
                                                <i class="icon-dots-vertical"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-end">

                                                <li>
                                                    <a href="javascript:void(0)"
                                                       class="dropdown-item editCategoryBtn"
                                                       data-id="{{ $category->id }}"
                                                       data-name="{{ $category->name }}"
                                                       data-display="{{ $category->online_display_name }}"
                                                       data-group="{{ $category->category_group }}">
                                                        <i class="icon-pencil-line me-2"></i>
                                                        Edit
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="javascript:void(0)"
                                                       class="dropdown-item text-danger deleteCategoryBtn"
                                                       data-id="{{ $category->id }}">
                                                        <i class="icon-trash-2 me-2"></i>
                                                        Delete
                                                    </a>
                                                </li>

                                            </ul>

                                        </div>

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================= ITEMS TAB ================= -->
        <div class="tab-pane fade"
             id="itemsPane">

            <div id="items-section-placeholder" class="card">
                <div class="card-body text-center py-5">
                    <div class="row">

                        <!-- Left Category Sidebar -->
                        <div class="col-lg-3">

                            <div class="card sticky-top" style="top:20px;">

                                <div class="card-header border-0 pb-2">
                                    <h5 class="mb-0">Categories</h5>
                                </div>

                                <div class="card-body pt-2">

                                    <div class="input-group input-group-flat mb-3">
                                        <input type="text"
                                            id="itemCategorySearch"
                                            class="form-control"
                                            placeholder="Search category">
                                        <span class="input-group-text">
                                            <i class="icon-search"></i>
                                        </span>
                                    </div>

                                    <div id="categorySidebar">

                                        <a href="javascript:void(0)"
                                        class="category-filter-item active"
                                        data-id="all">

                                            <div class="d-flex justify-content-between align-items-center p-2 rounded bg-primary text-white mb-2">
                                                <span>All Items</span>
                                                <span class="badge bg-white text-dark">
                                                    {{ $totalItems ?? 0 }}
                                                </span>
                                            </div>

                                        </a>

                                        @foreach($categories as $category)

                                        <a href="javascript:void(0)"
                                        class="category-filter-item"
                                        data-id="{{ $category->id }}">

                                            <div class="d-flex justify-content-between align-items-center p-2 rounded border mb-2 categoryBox">
                                                <span>{{ $category->name }}</span>
                                                <span class="badge bg-primary">
                                                    {{ $category->items_count }}
                                                </span>
                                            </div>

                                        </a>

                                        @endforeach

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Right Item Section -->
                        <div class="col-lg-9">

                            <div class="card">

                                <div class="card-header border-0">

                                    <div class="row align-items-center">

                                        <div class="col-md-3">
                                            <h5 class="mb-0">
                                                Menu Items
                                            </h5>
                                        </div>

                                        <div class="col-md-9">

                                            <div class="d-flex gap-2 justify-content-md-end flex-wrap mt-3 mt-md-0">

                                                <div class="input-group input-group-flat" style="max-width:250px;">
                                                    <input type="text"
                                                        id="itemSearch"
                                                        class="form-control"
                                                        placeholder="Search item">
                                                    <span class="input-group-text">
                                                        <i class="icon-search"></i>
                                                    </span>
                                                </div>

                                                <select class="form-control"
                                                        id="foodTypeFilter"
                                                        style="max-width:170px;">
                                                    <option value="">All Type</option>
                                                    <option value="veg">Veg</option>
                                                    <option value="nonveg">Non Veg</option>
                                                </select>

                                                <button class="btn btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#addItemModal">
                                                    <i class="icon-circle-plus me-1"></i>
                                                    Add Item
                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="card-body">

                                    <div class="table-responsive">

                                        <table class="table align-middle">

                                            <thead>
                                                <tr>
                                                    <th width="70">Image</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>GST</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th width="120">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="itemsTableBody">

                                                @foreach($items as $item)

                                                <tr class="itemRow"
                                                    data-category="{{ $item->category_id }}"
                                                    data-type="{{ $item->type }}"
                                                    data-name="{{ strtolower($item->name) }}">

                                                    <td>
                                                        <img src="{{ $item->getFirstMediaUrl('items') ?: asset('assets/img/items/food-01.jpg') }}"
                                                            width="55"
                                                            height="55"
                                                            class="rounded"
                                                            style="object-fit:cover;">
                                                    </td>

                                                    <td>
                                                        <h6 class="mb-0">{{ $item->name }}</h6>
                                                        <small class="text-muted">
                                                            {{ $item->short_code }}
                                                        </small>
                                                    </td>

                                                    <td>
                                                        {{ $item->category->name ?? '-' }}
                                                    </td>

                                                    <td>
                                                        ₹{{ number_format($item->price,2) }}
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-warning text-dark">
                                                            {{ $item->tax ?? 0 }}%
                                                        </span>
                                                    </td>

                                                    <td>
                                                        @if($item->type == 'veg')
                                                            <span class="badge bg-success">Veg</span>
                                                        @else
                                                            <span class="badge bg-danger">Non Veg</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($item->status)
                                                            <span class="badge bg-success">Visible</span>
                                                        @else
                                                            <span class="badge bg-danger">Hidden</span>
                                                        @endif
                                                    </td>

                                                    <td>

                                                        <div class="dropdown">

                                                            <a href="#"
                                                            class="btn btn-sm btn-white"
                                                            data-bs-toggle="dropdown">
                                                                <i class="icon-dots-vertical"></i>
                                                            </a>

                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li>
                                                                    <a href="#"
                                                                    class="dropdown-item editItemBtn"
                                                                    data-id="{{ $item->id }}"
                                                                    data-name="{{ $item->name }}"
                                                                    data-price="{{ $item->price }}"
                                                                    data-tax="{{ $item->tax }}"
                                                                    data-category="{{ $item->category_id }}"
                                                                    data-type="{{ $item->type }}">
                                                                        <i class="icon-pencil-line me-2"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#"
                                                                    class="dropdown-item toggleItemBtn"
                                                                    data-id="{{ $item->id }}"
                                                                    data-status="{{ $item->status }}">
                                                                        <i class="icon-eye-off me-2"></i>
                                                                        {{ $item->status ? 'Hide' : 'Show' }}
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#"
                                                                    class="dropdown-item text-danger deleteItemBtn"
                                                                    data-id="{{ $item->id }}">
                                                                        <i class="icon-trash-2 me-2"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>

                                                            </ul>

                                                        </div>

                                                    </td>

                                                </tr>

                                                @endforeach

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- ADD ITEM MODAL -->
                    <div class="modal fade" id="addItemModal">

                        <div class="modal-dialog modal-dialog-centered modal-lg">

                            <div class="modal-content">

                                <div class="modal-header border-0">
                                    <h4>Add Item</h4>
                                    <button class="btn-close" data-bs-dismiss="modal">
                                        <i class="icon-x"></i>
                                    </button>
                                </div>

                                <form id="addItemForm" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-md-12 text-center mb-3">

                                                <img id="itemPreview"
                                                    src="{{ asset('assets/img/items/food-01.jpg') }}"
                                                    width="100"
                                                    height="100"
                                                    class="rounded mb-2"
                                                    style="object-fit:cover;">

                                                <input type="file"
                                                    name="image"
                                                    id="itemImage"
                                                    class="form-control">

                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Name</label>
                                                <input type="text"
                                                    name="name"
                                                    class="form-control"
                                                    required>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Category</label>
                                                <select name="category_id"
                                                        class="form-control"
                                                        required>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Price</label>
                                                <input type="number"
                                                    name="price"
                                                    class="form-control"
                                                    step="0.01">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>GST %</label>
                                                <input type="number"
                                                    name="tax"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label>Type</label>
                                                <select name="type"
                                                        class="form-control">
                                                    <option value="veg">Veg</option>
                                                    <option value="nonveg">Non Veg</option>
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer border-0">
                                        <button class="btn btn-light"
                                                data-bs-dismiss="modal"
                                                type="button">
                                            Cancel
                                        </button>

                                        <button class="btn btn-success"
                                                type="submit">
                                            Save Item
                                        </button>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>


        <!-- ================= GST TAB ================= -->
        <div class="tab-pane fade"
             id="gstPane">

            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="row">

                        <div class="col-lg-7">

                            <div class="card">

                                <div class="card-header border-0">
                                    <h5 class="mb-0">GST Settings</h5>
                                </div>

                                <div class="card-body">

                                    <form id="gstForm">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">
                                                Default GST Percentage
                                            </label>

                                            <div class="input-group">
                                                <input type="number"
                                                    class="form-control"
                                                    id="gst_value"
                                                    name="gst"
                                                    value="5">

                                                <span class="input-group-text">%</span>
                                            </div>

                                            <small class="text-muted">
                                                This GST will apply globally unless overridden in category/item.
                                            </small>
                                        </div>

                                        <button type="submit"
                                                class="btn btn-primary">
                                            <i class="icon-device-floppy me-1"></i>
                                            Save GST
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>


                        <div class="col-lg-5">

                            <div class="card">

                                <div class="card-body text-center py-5">

                                    <i class="icon-receipt-tax fs-1 text-primary"></i>

                                    <h5 class="mt-3">
                                        GST Priority Rule
                                    </h5>

                                    <p class="mb-0 text-muted">
                                        Item GST → Category GST → Global GST
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



<!-- ADD CATEGORY MODAL -->
<div class="modal fade" id="addCategoryModal">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header border-0">
                <h4 class="modal-title">Add Category</h4>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                    <i class="icon-x"></i>
                </button>
            </div>


            <form id="addCategoryForm"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12 mb-3 text-center">

                            <img id="categoryPreview"
                                 src="{{ asset('assets/img/items/food-01.jpg') }}"
                                 width="100"
                                 height="100"
                                 class="rounded mb-2"
                                 style="object-fit:cover;">

                            <input type="file"
                                   name="image"
                                   id="categoryImage"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Display Name</label>
                            <input type="text"
                                   name="online_display_name"
                                   class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Category Group</label>

                            <select name="category_group" class="form-control">
                                <option value="">Select Group</option>

                                <option value="Beverage">Beverage</option>
                                <option value="Food Menu">Food Menu</option>
                                <option value="Bar Menu">Bar Menu</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button class="btn btn-light"
                            data-bs-dismiss="modal"
                            type="button">
                        Cancel
                    </button>

                    <button class="btn btn-primary"
                            type="submit">
                        <i class="icon-device-floppy me-1"></i>
                        Save Category
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>



<!-- EDIT CATEGORY MODAL -->
<div class="modal fade" id="editCategoryModal">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header border-0">
                <h4 class="modal-title">Edit Category</h4>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                    <i class="icon-x"></i>
                </button>
            </div>


            <form id="editCategoryForm"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" id="editCategoryId">

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Image</label>
                            <input type="file"
                                   name="image"
                                   class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text"
                                   id="editCategoryName"
                                   name="name"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Display Name</label>
                            <input type="text"
                                   id="editCategoryDisplay"
                                   name="online_display_name"
                                   class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Category Group</label>
                            <select id="editCategoryGroup" name="category_group" class="form-control">
                                <option value="">Select Group</option>

                                <option value="Beverage">Beverage</option>
                                <option value="Food Menu">Food Menu</option>
                                <option value="Bar Menu">Bar Menu</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button class="btn btn-light"
                            data-bs-dismiss="modal"
                            type="button">
                        Cancel
                    </button>

                    <button class="btn btn-primary"
                            type="submit">
                        Update Category
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@section('script')
<script>
    $(function(){

        /*
        |--------------------------------------------------------------------------
        | CSRF
        |--------------------------------------------------------------------------
        */
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        /*
        |--------------------------------------------------------------------------
        | Preview image
        |--------------------------------------------------------------------------
        */
        $('#categoryImage').on('change', function(){
            let file = this.files[0];
            if(file){
                $('#categoryPreview').attr('src', URL.createObjectURL(file));
            }
        });

        $('#itemImage').on('change', function(){
            let file = this.files[0];
            if(file){
                $('#itemPreview').attr('src', URL.createObjectURL(file));
            }
        });


        /*
        |--------------------------------------------------------------------------
        | Category Search
        |--------------------------------------------------------------------------
        */
        $('#categorySearch').on('keyup', function(){

            let value = $(this).val().toLowerCase();

            $('#categoryTableBody tr').filter(function(){
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                );
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Item Search
        |--------------------------------------------------------------------------
        */
        $('#itemSearch').on('keyup', filterItems);
        $('#foodTypeFilter').on('change', filterItems);

        function filterItems()
        {
            let search = $('#itemSearch').val().toLowerCase();
            let type = $('#foodTypeFilter').val();

            $('.itemRow').each(function(){

                let name = $(this).data('name');
                let rowType = $(this).data('type');

                let visible = true;

                if(search && !name.includes(search)){
                    visible = false;
                }

                if(type && rowType != type){
                    visible = false;
                }

                $(this).toggle(visible);

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Category wise filter
        |--------------------------------------------------------------------------
        */
        $(document).on('click','.category-filter-item',function(){

            $('.category-filter-item .categoryBox')
                .removeClass('bg-primary text-white border-primary');

            $(this).find('.categoryBox')
                .addClass('bg-primary text-white border-primary');

            let category = $(this).data('id');

            $('.itemRow').hide();

            if(category == 'all'){
                $('.itemRow').show();
            }else{
                $('.itemRow[data-category="'+category+'"]').show();
            }

        });


        /*
        |--------------------------------------------------------------------------
        | Add Category
        |--------------------------------------------------------------------------
        */
        $('#addCategoryForm').submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url:"{{ route('categories.store') }}",
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
                success:function(res){
                    location.reload();
                },
                error:function(xhr){
                    alert('Category save failed');
                }
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Edit Category open
        |--------------------------------------------------------------------------
        */
        $(document).on('click','.editCategoryBtn',function(){

            $('#editCategoryId').val($(this).data('id'));
            $('#editCategoryName').val($(this).data('name'));
            $('#editCategoryDisplay').val($(this).data('display'));
            $('#editCategoryGroup').val($(this).data('group'));

            $('#editCategoryModal').modal('show');

        });


        /*
        |--------------------------------------------------------------------------
        | Update Category
        |--------------------------------------------------------------------------
        */
        $('#editCategoryForm').submit(function(e){
            e.preventDefault();

            let id = $('#editCategoryId').val();
            let formData = new FormData(this);

            $.ajax({
                url:'/admin/menu/categories/'+id,
                type:'POST',
                data:formData,
                processData:false,
                contentType:false,
                headers:{
                    'X-HTTP-Method-Override':'PUT'
                },
                success:function(){
                    location.reload();
                }
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Delete Category
        |--------------------------------------------------------------------------
        */
        $(document).on('click','.deleteCategoryBtn',function(){

            if(!confirm('Delete category?')) return;

            let id = $(this).data('id');

            $.ajax({
                url:'/admin/menu/categories/'+id,
                type:'DELETE',
                success:function(){
                    location.reload();
                }
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Add Item
        |--------------------------------------------------------------------------
        */
        $('#addItemForm').submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url:"{{ route('items.store') }}",
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
                success:function(){
                    location.reload();
                }
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Delete Item
        |--------------------------------------------------------------------------
        */
        $(document).on('click','.deleteItemBtn',function(){

            if(!confirm('Delete item?')) return;

            let id = $(this).data('id');

            $.ajax({
                url:'/admin/menu/items/'+id,
                type:'DELETE',
                success:function(){
                    location.reload();
                }
            });

        });


        /*
        |--------------------------------------------------------------------------
        | Hide / Show Item
        |--------------------------------------------------------------------------
        */
        $(document).on('click','.toggleItemBtn',function(){

            let id = $(this).data('id');
            let status = $(this).data('status');

            let url = status == 1
                ? '/admin/menu/items/'+id+'/hide'
                : '/admin/menu/items/'+id+'/show';

            $.post(url,function(){
                location.reload();
            });

        });


        /*
        |--------------------------------------------------------------------------
        | GST save
        |--------------------------------------------------------------------------
        */
        $('#gstForm').submit(function(e){
            e.preventDefault();

            $.post(
                "{{ route('gst.save') }}",
                $(this).serialize(),
                function(res){
                    alert('GST updated successfully');
                }
            );
        });

    });
</script>
@endsection