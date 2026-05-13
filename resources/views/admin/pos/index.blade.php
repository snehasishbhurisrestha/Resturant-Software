@extends('layouts.app')
@php
    $sidebar_need = false;
@endphp
@section('style')
<style>
    .left-panel{
        height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 10px;
    }

    /* scrollbar */
    .left-panel::-webkit-scrollbar{
        width: 6px;
    }
    .left-panel::-webkit-scrollbar-thumb{
        background: #888;
        border-radius: 10px;
    }
</style>

<style>
    .payment-btn{
        border:1px solid #dcdcdc;
        background:#fff;
        min-width:100px;
        height:50px;
        border-radius:4px;
        display:flex;
        align-items:center;
        justify-content:center;
        gap:10px;
        font-size:16px;
        font-weight:600;
        color:#333;
        transition:0.2s;
    }

    .payment-btn i{
        font-size:22px;
        color:#555;
    }

    .payment-btn.active{
        background:#dff5e8;
        border-color:#17a34a;
        color:#17a34a;
    }

    .payment-btn.active i{
        color:#17a34a;
    }

    .payment-btn:hover{
        transform:translateY(-2px);
    }
</style>
<!-- FONT AWESOME -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection

@section('content')

<div class="content">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('pos.index') }}"
           class="btn btn-warning">
            <i class="fa fa-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="card border-0 shadow-sm overflow-hidden">

        <div class="card-body p-0">

            <div class="row g-0">

                <!-- MOBILE CATEGORY BUTTON -->
                <div class="d-lg-none p-2 border-bottom bg-dark">

                    <button class="btn btn-warning w-100"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#mobileCategorySidebar">

                        <i class="bi bi-grid"></i> Categories

                    </button>

                </div>


                <!-- DESKTOP LEFT SIDEBAR -->
                <div class="col-lg-2 border-end bg-dark left-panel d-none d-lg-block">

                    <div class="p-3 border-bottom">
                        <h5 class="mb-0 text-primary">Categories</h5>
                    </div>

                    <div class="p-2">

                        @foreach($categories as $category)

                        <a href="javascript:void(0)"
                        class="categoryBtn d-block text-decoration-none mb-2"
                        data-id="{{ $category->id }}">

                            <div class="card border-0 shadow-sm mb-0">

                                <div class="card-body p-2">

                                    <div class="fw-semibold">
                                        {{ $category->name }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $category->items_count }} items
                                    </small>

                                </div>

                            </div>

                        </a>

                        @endforeach

                    </div>

                </div>


                <!-- MOBILE OFFCANVAS SIDEBAR -->
                <div class="offcanvas offcanvas-start bg-dark text-white"
                    tabindex="-1"
                    id="mobileCategorySidebar">

                    <!-- Header -->
                    <div class="offcanvas-header border-bottom">

                        <h5 class="offcanvas-title">
                            Categories
                        </h5>

                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="offcanvas">
                        </button>

                    </div>

                    <!-- Body -->
                    <div class="offcanvas-body p-2">

                        @foreach($categories as $category)

                        <a href="javascript:void(0)"
                        class="categoryBtn d-block text-decoration-none mb-2"
                        data-id="{{ $category->id }}"
                        data-bs-dismiss="offcanvas">

                            <div class="card border-0 shadow-sm mb-0">

                                <div class="card-body p-2">

                                    <div class="fw-semibold">
                                        {{ $category->name }}
                                    </div>

                                    <small class="text-muted">
                                        {{ $category->items_count }} items
                                    </small>

                                </div>

                            </div>

                        </a>

                        @endforeach

                    </div>

                </div>


                <!-- CENTER -->
                <div class="col-lg-6 bg-dark">

                    <div class="p-3 border-bottom bg-dark">

                        <div class="row">

                            {{-- <div class="col-md-4">
                                <select id="sectionSelect"
                                        class="form-control">
                                    <option value="">Select Section</option>

                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">
                                            {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <select id="tableSelect"
                                        class="form-control">
                                    <option value="">Select Table</option>
                                </select>
                            </div> --}}
                            <input type="hidden" name="section_id" id="sectionSelect" value="{{ $sectionId }}">
                            <input type="hidden" name="table_id" id="tableSelect" value="{{ $tableId }}">
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control"
                                    id="itemSearch"
                                    placeholder="Search item"
                                    autocomplete="off">

                                <!-- Suggestion Box -->
                                <div id="searchSuggestion"
                                    class="card shadow-sm position-absolute mt-1 d-none"
                                    style="z-index: 999;">

                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <input type="text"
                                       class="form-control"
                                       id="itemSearch"
                                       placeholder="Short Code">
                            </div> --}}

                        </div>

                    </div>


                    <div class="p-3" id="itemsArea">

                        <div class="row g-3">

                            @foreach($items as $item)

                            <div class="col-lg-3 col-md-4 col-6">

                                <div class="card itemCard h-100 shadow-sm cursor-pointer" data-id="{{ $item->id }}">

                                    <div class="card-body p-2">

                                        <div class="fw-semibold small">
                                            {{ $item->name }}
                                        </div>

                                        <div class="text-primary fw-bold mt-1">
                                            ₹{{ $item->price }}
                                        </div>

                                    </div>

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->
                <div class="col-lg-4 border-start bg-dark">

                    <div class="p-3 border-bottom">

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1 text-primary">Current Order</h5>

                                <div class="small text-primary">
                                    Section:
                                    <span class="fw-bold">
                                        {{ $currentSection->name ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="small text-primary">
                                    Table:
                                    <span class="fw-bold">
                                        {{ $currentTable->table_number ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Move Table Button -->
                            <button class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#moveTableModal">
                                Move
                            </button>
                        </div>

                    </div>

                    <div id="cartArea" class="p-3">

                        <div class="text-center text-muted mt-5">
                            No item selected
                        </div>

                    </div>

                    <div class="border-top p-3 bg-dark">

                        {{-- <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <strong id="subtotalText">₹0</strong>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax</span>
                            <strong id="taxText">₹0</strong>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount</span>
                            <strong id="discountText">₹0</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Round off</span>
                            <strong id="round_off_text">₹0</strong>
                        </div> --}}

                        <!-- Toggle Button -->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-semibold">Bill Details</span>

                            <button class="btn btn-sm btn-dark"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#billDetailsCollapse">
                                More
                            </button>
                        </div>

                        <!-- Toggle Popup Section -->
                        <div class="collapse" id="billDetailsCollapse">

                            <div class="card border-0 shadow-sm rounded-3 p-3 bg-light">

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Subtotal</span>
                                    <strong id="subtotalText">₹0</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Tax</span>
                                    <strong id="taxText">₹0</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Discount
                                    <!-- More Button -->
                                    <button type="button"
                                            class="btn btn-sm btn-outline-dark py-0 px-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#discountModal">
                                        More
                                    </button>
                                    </span>

                                    <strong id="discountText">₹0</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Round Off</span>
                                    <strong id="round_off_text">₹0</strong>
                                </div>

                                <!-- Extra Fields -->
                                {{-- <div class="d-flex justify-content-between mb-2">
                                    <span>Delivery Charge</span>

                                    <input type="number"
                                        class="form-control form-control-sm w-25 text-end"
                                        value="0">
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Container Charge</span>

                                    <input type="number"
                                        class="form-control form-control-sm w-25 text-end"
                                        value="0">
                                </div> --}}

                                <div class="d-flex justify-content-between mb-2">
                                    <span>Service Charge</span>

                                    <input type="number"
                                        class="form-control form-control-sm w-25 text-end"
                                        id="service_charge_amount"
                                        value="0">
                                </div>

                                <div class="d-flex justify-content-between">
                                    <span>Tip</span>

                                    <input type="number"
                                        class="form-control form-control-sm w-25 text-end"
                                        id="tip_amount"
                                        value="0">
                                </div>

                            </div>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-bold">Grand Total</span>
                            <strong class="text-success fs-5"
                                    id="grandText">
                                ₹0
                            </strong>
                        </div>

                        <!-- BUTTONS -->
                        <div class="d-flex flex-wrap gap-2 my-3 align-items-center">

                            <button class="payment-btn">
                                <i class="fa fa-times-circle"></i>
                                <span>Not Paid</span>
                            </button>

                            <button class="payment-btn active">
                                <i class="fa fa-money-bill-wave"></i>
                                <span>Cash</span>
                            </button>

                            <button class="payment-btn">
                                <i class="fa fa-credit-card"></i>
                                <span>Card</span>
                            </button>

                            <!-- OTHER -->
                            <button class="payment-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#otherPaymentModal">
                                <i class="fa fa-wallet"></i>
                                <span>Other</span>
                            </button>

                            <!-- MORE -->
                            <button class="payment-btn"
                                    data-bs-toggle="offcanvas"
                                    data-bs-target="#splitPaymentCanvas">
                                <i class="fa fa-chevron-up"></i>
                                <span>More</span>
                            </button>

                        </div>


                        <!-- ===================================== -->
                        <!-- OTHER PAYMENT MODAL -->
                        <!-- ===================================== -->

                        <div class="modal fade" id="otherPaymentModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Other Payment Method</h5>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                Select Platform
                                            </label>

                                            <select class="form-select" id="otherMethod">
                                                <option value="">Choose Method</option>
                                                <option>Swiggy</option>
                                                <option>Zomato</option>
                                                <option>UPI</option>
                                                <option>PhonePe</option>
                                                <option>Google Pay</option>
                                                <option>Paytm</option>
                                                <option>Razorpay</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">
                                                Description
                                            </label>

                                            <textarea class="form-control"
                                                    rows="4"
                                                    placeholder="Enter payment note..."></textarea>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <button class="btn btn-success" onclick="saveOtherPayment()">
                                            Save Payment
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- ===================================== -->
                        <!-- PART PAYMENT OFFCANVAS -->
                        <!-- ===================================== -->

                        <div class="offcanvas offcanvas-end"
                            tabindex="-1"
                            id="splitPaymentCanvas"
                            style="width:400px;">

                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title">
                                    Part Payment
                                </h5>

                                <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="offcanvas"></button>
                            </div>

                            <div class="offcanvas-body">

                                <!-- CASH -->
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">

                                        <label class="fw-bold mb-2">
                                            Cash Amount
                                        </label>

                                        <input type="number"
                                            class="form-control"
                                            id="split_cash"
                                            placeholder="Enter cash amount">

                                    </div>
                                </div>

                                <!-- CARD -->
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">

                                        <label class="fw-bold mb-2">
                                            Card Amount
                                        </label>

                                        <input type="number"
                                            class="form-control"
                                            id="split_card"
                                            placeholder="Enter card amount">

                                    </div>
                                </div>

                                <!-- UPI -->
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">

                                        <label class="fw-bold mb-2">
                                            UPI Amount
                                        </label>

                                        <input type="number"
                                            class="form-control"
                                            id="split_upi"
                                            placeholder="Enter UPI amount">

                                    </div>
                                </div>

                                <!-- OTHER -->
                                <div class="card border-0 shadow-sm mb-3">
                                    <div class="card-body">

                                        <label class="fw-bold mb-2">
                                            Other Amount
                                        </label>

                                        <input type="number"
                                            class="form-control"
                                            id="split_other"
                                            placeholder="Enter other amount">

                                    </div>
                                </div>

                                <textarea class="form-control"
                                    id="paymentDescription"
                                    rows="4"
                                    placeholder="Enter payment note..."></textarea>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100 py-2" onclick="saveSplitPayment()">
                                        Save Part Payment
                                    </button>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex gap-2">

                            <button class="btn btn-warning"
                                    id="kotBtn">
                                KOT Save
                            </button>

                            <button class="btn btn-info"
                                    id="kotPrintBtn">
                                KOT Print
                            </button>

                            <button class="btn btn-primary"
                                    id="billBtn">
                                Print Bill
                            </button>

                            <button class="btn btn-success"
                                    id="placeOrderBtn">
                                Place Order
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<!-- ITEM CUSTOMIZE MODAL -->
<div class="modal fade" id="itemModal">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header border-0">
                <h4 id="modalItemName">Item</h4>

                <button class="btn-close"
                        data-bs-dismiss="modal">
                    <i class="icon-x"></i>
                </button>
            </div>

            <div class="modal-body">

                <input type="hidden" id="modalItemId">

                <div class="row">

                    <div class="col-md-4">

                        <label>Quantity</label>

                        <div class="input-group">
                            <button class="btn btn-dark qtyMinus">-</button>
                            <input type="number"
                                   id="modalQty"
                                   class="form-control text-center"
                                   value="1">
                            <button class="btn btn-dark qtyPlus">+</button>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <label>Discount</label>

                        <input type="number"
                               id="modalDiscount"
                               class="form-control"
                               value="0">

                    </div>

                    <div class="col-md-4 d-flex align-items-end">

                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="complimentary">
                            <label class="form-check-label">
                                Complimentary
                            </label>
                        </div>

                    </div>

                    <div class="col-md-12 mt-3">

                        <label>Special Note</label>

                        <textarea id="modalNote"
                                  class="form-control"
                                  rows="2"></textarea>

                    </div>

                    <div class="col-md-12 mt-3">

                        <label>Addons</label>

                        <div id="addonArea" class="row g-2">
                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer border-0">

                <button class="btn btn-primary"
                        id="addToCartBtn">
                    Add To Cart
                </button>

            </div>

        </div>

    </div>

</div>

<!-- Price Update Modal -->
<div class="modal fade" id="priceUpdateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="priceModalTitle">Update Price</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <p>Please provide rate for single quantity. [Actual base amount is <span id="modalPrice"></span>]</p>
                <form id="priceUpdateForm">
                    <input type="hidden" name="nc_order_id" id="nc_order_id">
                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <input type="password"
                               class="form-control"
                               name="password"
                               placeholder="Enter password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>

                        <input type="number"
                               class="form-control"
                               name="price"
                               placeholder="Enter new price">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Reason</label>

                        <textarea class="form-control"
                                  name="reason"
                                  rows="3"
                                  placeholder="Enter reason"></textarea>
                    </div>

                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button"
                        class="btn btn-primary"
                        onclick="savePriceUpdate()">
                    Save
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Discount Modal -->
<div class="modal fade" id="discountModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Apply Discount</h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <!-- Body -->
            <div class="modal-body">

                <form id="discountForm">

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <input type="password"
                               class="form-control"
                               name="password" id="discount_password"
                               placeholder="Enter password">
                    </div>

                    <!-- Radio Buttons -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold d-block">
                            Discount Type
                        </label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   type="radio"
                                   name="discount_type"
                                   id="fixedDiscount"
                                   value="fixed"
                                   checked>

                            <label class="form-check-label"
                                   for="fixedDiscount">
                                Fixed
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input"
                                   type="radio"
                                   name="discount_type"
                                   id="percentageDiscount"
                                   value="percentage">

                            <label class="form-check-label"
                                   for="percentageDiscount">
                                Percentage
                            </label>
                        </div>

                    </div>

                    <!-- Input -->
                    <div class="mb-3">

                        <label class="form-label">
                            Discount Value
                        </label>

                        <input type="number"
                               class="form-control"
                               id="discountValue"
                               placeholder="Enter value">

                    </div>

                </form>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cancel
                </button>

                <button type="button"
                        class="btn btn-primary"
                        onclick="applyDiscount()">
                    Apply
                </button>

            </div>

        </div>

    </div>

</div>

<!-- Move Table Modal -->
<div class="modal fade" id="moveTableModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header border-secondary">
                <h5 class="modal-title">Move Table</h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('pos.move.table') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <input type="hidden"
                           name="current_table_id"
                           value="{{ $currentTable->id }}">

                    <!-- Select Section -->
                    <div class="mb-3">

                        <label class="form-label">
                            Select Section
                        </label>

                        <select class="form-select"
                                id="moveSection">

                            <option value="">
                                Choose Section
                            </option>

                            @foreach($sections as $section)

                                @php

                                    $availableTables = $section->tables->filter(function($table) use ($currentTable){

                                        if($table->id == $currentTable->id){
                                            return false;
                                        }

                                        $activeOrder = \App\Models\Order::where('table_id', $table->id)
                                            ->whereIn('status', ['draft','kot'])
                                            ->exists();

                                        return !$activeOrder;
                                    });

                                @endphp

                                @if($availableTables->count() > 0)

                                    <option value="{{ $section->id }}">
                                        {{ $section->name }}
                                    </option>

                                @endif

                            @endforeach

                        </select>

                    </div>

                    <!-- Select Table -->
                    <div class="mb-3">

                        <label class="form-label">
                            Select Available Table
                        </label>

                        <select class="form-select"
                                name="new_table_id"
                                id="moveTableSelect"
                                required>

                            <option value="">
                                Choose Table
                            </option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer border-secondary">
                    <button type="submit" class="btn btn-warning">
                        Move Table
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    let selectedOrderId = null;

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });


    /*
    |--------------------------------------------------------------------------
    | Load tables
    |--------------------------------------------------------------------------
    */
    // $('#sectionSelect').change(function(){

    //     let id = $(this).val();

    //     $('#tableSelect').html('<option>Loading...</option>');

    //     $.post('/pos/tables',{
    //         section_id:id
    //     },function(res){

    //         let html = '<option value="">Select Table</option>';

    //         $.each(res,function(i,row){
    //             html += `
    //                 <option value="${row.id}">
    //                     Table ${row.table_number}
    //                 </option>
    //             `;
    //         });

    //         $('#tableSelect').html(html);

    //     });

    // });


    //$('#tableSelect').change(function(){
        loadCart();
    // });


    /*
    |--------------------------------------------------------------------------
    | Category click
    |--------------------------------------------------------------------------
    */
    $(document).on('click','.categoryBtn',function(){

        let id = $(this).data('id');

        $.get('/pos/load-items/'+id,function(res){

            let html = '<div class="row g-3">';

            $.each(res,function(i,item){

                html += `
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card itemCard h-100 shadow-sm"
                        data-id="${item.id}">
                        <div class="card-body p-2">
                            <div class="fw-semibold small">${item.name}</div>
                            <div class="text-primary fw-bold mt-1">
                                ₹${item.price}
                            </div>
                        </div>
                    </div>
                </div>
                `;
            });

            html += '</div>';

            $('#itemsArea').html(html);

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Item modal
    |--------------------------------------------------------------------------
    */
    $(document).on('click','.itemCard',function(){

        let section = $('#sectionSelect').val();
        let table = $('#tableSelect').val();

        if(!section || !table){
            alert('Select section & table first');
            return;
        }

        let itemId = $(this).data('id');

        $.post('/pos/item-detail',{
            item_id:itemId
        },function(item){

            $('#modalItemId').val(item.id);
            $('#modalItemName').text(item.name);
            $('#modalQty').val(1);
            $('#modalDiscount').val(0);
            $('#modalNote').val('');
            $('#complimentary').prop('checked',false);

            let addonHtml='';

            $.each(item.addons,function(i,row){
                addonHtml += `
                <div class="col-md-4">
                    <label class="border rounded p-2 w-100">
                        <input type="checkbox"
                            class="addonCheck"
                            value="${row.id}">
                        ${row.name}
                        <span class="float-end">₹${row.price}</span>
                    </label>
                </div>
                `;
            });

            $('#addonArea').html(addonHtml);

            $('#itemModal').modal('show');

        });

    });


    $('.qtyPlus').click(function(){
        let v=parseInt($('#modalQty').val());
        $('#modalQty').val(v+1);
    });

    $('.qtyMinus').click(function(){
        let v=parseInt($('#modalQty').val());
        if(v>1) $('#modalQty').val(v-1);
    });


    /*
    |--------------------------------------------------------------------------
    | Add cart
    |--------------------------------------------------------------------------
    */
    $('#addToCartBtn').click(function(){

        let addons=[];

        $('.addonCheck:checked').each(function(){
            addons.push($(this).val());
        });

        $.post('/pos/add-cart',{
            section_id:$('#sectionSelect').val(),
            table_id:$('#tableSelect').val(),
            item_id:$('#modalItemId').val(),
            qty:$('#modalQty').val(),
            discount:$('#modalDiscount').val(),
            complimentary:$('#complimentary').is(':checked') ? 1 : 0,
            note:$('#modalNote').val(),
            addons:addons
        },function(res){

            selectedOrderId = res.order_id;

            $('#itemModal').modal('hide');

            loadCart();

        });

    });


    /*
    |--------------------------------------------------------------------------
    | load cart
    |--------------------------------------------------------------------------
    */
    function loadCart()
    {
        $.post('/pos/cart',{
            section_id:$('#sectionSelect').val(),
            table_id:$('#tableSelect').val()
        },function(order){

            if(!order){
                $('#cartArea').html('No item');
                return;
            }

            selectedOrderId = order.id;

            let html='';

            $.each(order.items,function(i,row){

                html += `
                <div class="card mb-2 shadow-sm">
                    <div class="card-body p-2">

                        <div class="fw-semibold">
                            ${row.item_name}
                        </div>

                        <div class="d-flex justify-content-between align-items-center small text-muted mb-1">

                            <!-- Left Side -->
                            <div>
                                <span>Qty ${row.quantity}</span>
                            </div>

                            <!-- Right Side -->
                            <div class="d-flex align-items-center gap-3">

                                <!-- Base Price -->
                                <span>
                                    ₹${row.line_total}
                                </span>
                                |
                                <!-- Line Price Clickable -->
                                <a href="javascript:void(0)"
                                class="text-primary text-decoration-underline"
                                data-bs-toggle="modal"
                                data-bs-target="#priceUpdateModal"
                                onclick="setPriceModalData(
                                        '${row.id}',
                                        '${row.item_name}',
                                        '${row.price}'
                                )">

                                    ₹${row.price}
                                </a>

                            </div>

                        </div>

                        ${row.note ? `
                            <div class="small text-primary">
                                ${row.note}
                            </div>
                        `:''}

                        <div class="mt-2 d-flex gap-1">

                            <button class="btn btn-sm btn-dark qtyBtn"
                                    data-id="${row.id}"
                                    data-qty="${row.quantity-1}">
                                -
                            </button>

                            <button class="btn btn-sm btn-dark qtyBtn"
                                    data-id="${row.id}"
                                    data-qty="${row.quantity+1}">
                                +
                            </button>

                            <button class="btn btn-sm btn-danger removeBtn"
                                    data-id="${row.id}">
                                x
                            </button>

                        </div>

                    </div>
                </div>
                `;
            });

            $('#cartArea').html(html);

            $('#subtotalText').text('₹'+order.subtotal);
            $('#taxText').text('₹'+order.tax_amount);
            $('#discountText').text('₹'+order.discount_amount);
            $('#grandText').text('₹'+order.grand_total);
            $('#round_off_text').text('₹'+order.round_off);
            $('#service_charge_amount').val(order.service_charge);


            /*
            |--------------------------------------------------------------------------
            | PAYMENT METHOD ACTIVE BUTTON
            |--------------------------------------------------------------------------
            */

            $('.payment-btn').removeClass('active');

            $('.payment-btn').each(function () {

                let method = $(this).find('span').text().trim();

                if(
                    method == order.payment_method ||

                    (method == 'More' && order.payment_method == 'Split')
                )
                {
                    $(this).addClass('active');
                }

            });


            /*
            |--------------------------------------------------------------------------
            | SPLIT PAYMENT VALUES
            |--------------------------------------------------------------------------
            */
            $('#split_cash').val(order.cash_amount);

            $('#split_card').val(order.card_amount);

            $('#split_upi').val(order.upi_amount);

            $('#split_other').val(order.other_amount);


            /*
            |--------------------------------------------------------------------------
            | OTHER PAYMENT
            |--------------------------------------------------------------------------
            */
            $('#otherMethod').val(order.other_payment_method);

            $('#paymentDescription').val(order.payment_note);


            /*
            |--------------------------------------------------------------------------
            | SERVICE / TIP
            |--------------------------------------------------------------------------
            */
            $('#service_charge_amount').val(order.service_charge);

            $('#tip_amount').val(order.tip);

        });
    }


    /*
    |--------------------------------------------------------------------------
    | qty update
    |--------------------------------------------------------------------------
    */
    $(document).on('click','.qtyBtn',function(){

        let qty=$(this).data('qty');
        if(qty<1) return;

        $.post('/pos/update-cart',{
            id:$(this).data('id'),
            qty:qty
        },function(){
            loadCart();
        });

    });


    /*
    |--------------------------------------------------------------------------
    | remove
    |--------------------------------------------------------------------------
    */
    $(document).on('click','.removeBtn',function(){

        $.post('/pos/remove-cart',{
            id:$(this).data('id')
        },function(){
            loadCart();
        });

    });


    $('#kotBtn').click(function(){

        $.post('/pos/kot-save',{
            order_id:selectedOrderId
        },function(res){
            alert(res.message);
        });

    });


    $('#kotPrintBtn').click(function(){
        $.post('/pos/kot-print', {
            order_id: selectedOrderId
        }, function(res){

            // Kitchen Printer
            if(res.food_html){
                kotPrint(res.food_html);
            }

            // Bar Printer
            if(res.drink_html){
                thermalHtmlPrint(res.drink_html);
            }

        });

    });


    $('#billBtn').click(function(){

        $.post('/pos/bill-print',{
            order_id:selectedOrderId
        },function(res){
            // alert(res.message);
            thermalHtmlPrint(res.html);
            // let w = window.open('', '_blank');
            // w.document.write(res.html);
            // w.document.close();

            // w.focus();

            // setTimeout(()=>{
            //     w.print();
            //     w.close();
            // },500);
        });

    });


    $('#placeOrderBtn').click(function(){

        $.post('/pos/place-order',{
            order_id:selectedOrderId
        },function(res){
            alert(res.message);
            location.reload();
        });

    });
</script>

<script>
    function setPriceModalData(id, itemName, price) {
        document.getElementById('priceModalTitle').innerText = itemName;
        document.getElementById('modalPrice').innerHTML = price;
        document.getElementById('nc_order_id').value = id;
    }
    function savePriceUpdate()
    {
        $.ajax({
            url: "{{ route('pos.update.price') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                nc_order_id: $('#nc_order_id').val(),
                password: $('input[name="password"]').val(),
                price: $('input[name="price"]').val(),
                reason: $('textarea[name="reason"]').val(),
            },

            success: function(response)
            {
                if(response.status)
                {
                    $('#priceUpdateModal').modal('hide');

                    alert(response.message);

                    // reload cart
                    loadCart();
                }
            },

            error: function(xhr)
            {
                if(xhr.responseJSON)
                {
                    alert(xhr.responseJSON.message);
                }
                else
                {
                    alert('Something went wrong');
                }
            }
        });
    }
</script>
<script>
    function applyDiscount()
    {
        $.ajax({

            url: "{{ route('pos.apply.discount') }}",
            type: "POST",

            data: {
                _token: "{{ csrf_token() }}",
                order_id: selectedOrderId,

                password: $('#discount_password').val(),

                discount_type:
                    $('input[name="discount_type"]:checked').val(),

                discount_value:
                    $('#discountValue').val(),
            },

            success: function(response)
            {
                if(response.status)
                {
                    $('#discountModal').modal('hide');

                    alert(response.message);

                    loadCart();
                }
            },

            error: function(xhr)
            {
                if(xhr.responseJSON)
                {
                    alert(xhr.responseJSON.message);
                }
                else
                {
                    alert('Something went wrong');
                }
            }
        });
    }
</script>
<script>

    $('#itemSearch').on('keyup', function () {

        let search = $(this).val();

        if (search.length < 1) {
            $('#searchSuggestion').addClass('d-none').html('');
            return;
        }

        $.ajax({
            url: "{{ route('search.items') }}",
            type: "GET",
            data: {
                search: search
            },
            success: function (response) {

                let html = '';

                if (response.length > 0) {

                    response.forEach(function (item) {

                        html += `
                            <div class="p-2 border-bottom search-item">

                                <div class="card itemCard shadow-sm cursor-pointer" style="margin:0;" data-id="${item.id}">

                                    <div class="card-body row">

                                        <div class="fw-semibold small col-8">
                                            ${item.name}
                                        </div>

                                        <div class="text-primary col-4 text-end">
                                            ₹${item.price}
                                        </div>

                                    </div>

                                </div>

                            </div>
                        `;
                    });

                } else {

                    html = `
                        <div class="p-2 text-muted small">
                            No items found
                        </div>
                    `;
                }

                $('#searchSuggestion')
                    .removeClass('d-none')
                    .html(html);
            }
        });

    });

    // Hide suggestion when click outside
    $(document).on('click', function (e) {

        if (!$(e.target).closest('#itemSearch, #searchSuggestion').length) {

            $('#searchSuggestion')
                .addClass('d-none');
        }

    });

</script>
<script>

    $('#service_charge_amount, #tip_amount').on('keyup change', function () {

        $.ajax({

            url: "{{ route('pos.update.charges') }}",
            type: "POST",

            data: {
                _token: "{{ csrf_token() }}",

                order_id: selectedOrderId,

                service_charge: $('#service_charge_amount').val(),

                tip: $('#tip_amount').val()
            },

            success: function (response) {

                loadCart();
            }
        });

    });

</script>


<script>

    /*
    |--------------------------------------------------------------------------
    | NORMAL PAYMENT BUTTON
    |--------------------------------------------------------------------------
    */
    $('.payment-btn').click(function(){

        $('.payment-btn').removeClass('active');

        $(this).addClass('active');

        let paymentMethod =
            $(this).find('span').text().trim();

        $.ajax({

            url: "{{ route('pos.update.payment') }}",
            type: "POST",

            data: {
                _token: "{{ csrf_token() }}",
                order_id: selectedOrderId,
                payment_method: paymentMethod
            }
        });

    });


    /*
    |--------------------------------------------------------------------------
    | OTHER PAYMENT SAVE
    |--------------------------------------------------------------------------
    */
    function saveOtherPayment()
    {
        $.ajax({

            url: "{{ route('pos.update.payment') }}",
            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                order_id: selectedOrderId,

                payment_method: 'Other',

                other_payment_method:
                    $('#otherMethod').val(),

                payment_note:
                    $('#paymentDescription').val()
            },

            success:function(response){

                $('#otherPaymentModal').modal('hide');

                alert(response.message);
            }
        });
    }


    /*
    |--------------------------------------------------------------------------
    | SPLIT PAYMENT
    |--------------------------------------------------------------------------
    */
    function saveSplitPayment()
    {
        $.ajax({

            url: "{{ route('pos.update.payment') }}",
            type: "POST",

            data: {

                _token: "{{ csrf_token() }}",

                order_id: selectedOrderId,

                payment_method: 'Split',

                cash_amount: $('#split_cash').val(),

                card_amount: $('#split_card').val(),

                upi_amount: $('#split_upi').val(),

                other_amount: $('#split_other').val()
            },

            success:function(response){

                alert(response.message);
            }
        });
    }

</script>

<script>

    let sectionTables = {

        @foreach($sections as $section)

            @php

                $availableTables = $section->tables->filter(function($table) use ($currentTable){

                    if($table->id == $currentTable->id){
                        return false;
                    }

                    $activeOrder = \App\Models\Order::where('table_id', $table->id)
                        ->whereIn('status', ['draft','kot'])
                        ->exists();

                    return !$activeOrder;
                });

            @endphp

            "{{ $section->id }}": [

                @foreach($availableTables as $table)

                    {
                        id: "{{ $table->id }}",
                        table: "{{ $table->table_number }}"
                    },

                @endforeach

            ],

        @endforeach

    };

    $('#moveSection').on('change', function(){

        let sectionId = $(this).val();

        let tables = sectionTables[sectionId] || [];

        let html = '<option value="">Choose Table</option>';

        tables.forEach(function(table){

            html += `
                <option value="${table.id}">
                    Table ${table.table}
                </option>
            `;
        });

        $('#moveTableSelect').html(html);

    });

</script>
@endsection