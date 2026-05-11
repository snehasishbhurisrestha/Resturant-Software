<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bill</title>
</head>
<body style="
margin:0;
padding:0;
width:72.1mm;
font-family:'Courier New', monospace;
font-size:13px;
color:#000;
">

{{-- @php
    $qty = 0;

    foreach($order->items as $item){
        $qty += $item->quantity;
    }

    // subtotal
    $subtotal = $order->items->sum('line_total');

    // 10% service charge
    $serviceCharge = $subtotal * 0.10;

    // taxable amount
    $taxable = $subtotal + $serviceCharge;

    // GST split
    $cgst = $taxable * 0.025;
    $sgst = $taxable * 0.025;

    // total before round
    $rawTotal = $taxable + $cgst + $sgst;

    // rounded bill amount
    $grandTotal = round($rawTotal);

    // round off difference
    $roundOff = $grandTotal - $rawTotal;
@endphp --}}

@php
    $qty = 0;

    $foodSubtotal = 0;
    $drinkSubtotal = 0;

    foreach ($items as $item) {

        $qty += $item->quantity;

        $dietary = strtolower(optional($item->item)->dietary);
        echo $dietary;

        if ($dietary === 'drink') {
            $drinkSubtotal += $item->line_total;
        } else {
            $foodSubtotal += $item->line_total;
        }
    }

    // total subtotal
    $subtotal = $foodSubtotal + $drinkSubtotal;

    // 10% service charge (on full bill)
    $serviceCharge = $subtotal * 0.10;

    /*
    |------------------------------------------------------------
    | GST only on non-drink items
    |------------------------------------------------------------
    | Food gets proportional service charge added
    */
    $foodServiceCharge = ($subtotal > 0)
        ? ($serviceCharge * ($foodSubtotal / $subtotal))
        : 0;

    $foodTaxable = $foodSubtotal + $foodServiceCharge;

    // GST only on food
    $cgst = $foodTaxable * 0.025;
    $sgst = $foodTaxable * 0.025;

    // drinks no gst
    $rawTotal = $subtotal + $serviceCharge + $cgst + $sgst;

    // rounded bill
    $grandTotal = round($rawTotal);

    // round off
    $roundOff = $grandTotal - $rawTotal;
@endphp

<div style="padding:3px; box-sizing:border-box; width:100%; top:-100px;">

    <!-- HEADER -->
    <div style="text-align:center;">
        <!-- <div style="
            font-size:24px;
            font-weight:bold;
            letter-spacing:1px;
        ">
            BLR SKY
        </div> -->
        <img
            src="{{ asset('assets/admin/img/BLR SKY 01-02.png') }}"
            style="
                width:105px;
                height:105px;
                display:block;
                margin:0 auto;
            "
        >

        <div style="
            font-size:12px;
            margin:1px 0;font-weight:bold;
        ">GSTIN : BLRS981670794</div>
    </div>

    <div style="border-top:2px solid #000; margin:6px 0;"></div>

    <!-- NAME -->
    <div style="font-size:14px;font-weight:bold;">
        Name:
    </div>

    <div style="border-top:2px solid #000; margin:6px 0 10px;"></div>

    <!-- BILL INFO -->
    <table style="width:100%; border-collapse:collapse;">
        <tr>
            <td style="font-weight:bold;">
                Date: {{ now()->format('d/m/y') }} {{ now()->format('H:i') }}
            </td>
            <td style="text-align:right; font-weight:bold;">
                Dine In: {{ $order->table->table_number }}
            </td>
        </tr>

        <!--<tr>-->
        <!--    <td style="font-weight:bold;">-->
        <!--        {{ now()->format('H:i') }}-->
        <!--    </td>-->
        <!--    <td></td>-->
        <!--</tr>-->

        <tr>
            <td style="font-weight:bold;">
                Cashier: {{ $order->user->name ?? 'Admin' }}
            </td>
            <td style="text-align:right;font-weight:bold;">
                Bill No.: {{ $order->bill_no ?: $order->id }}
            </td>
        </tr>
    </table>

    <div style="border-top:2px solid #000; margin:8px 0;"></div>

    <!-- TABLE HEAD -->
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr>
                <th style="text-align:left; font-weight:bold;">Item</th>
                <th style="text-align:center; font-weight:bold;">Qty.</th>
                <th style="text-align:right; font-weight:bold;">Price</th>
                <th style="text-align:right; font-weight:bold;">Amount</th>
            </tr>
        </thead>
    </table>

    <div style="border-top:2px solid #000; margin:6px 0;"></div>

    <!-- ITEMS -->
    <table style="width:100%; border-collapse:collapse;">
        <tbody>
        @foreach($items as $item)
            <tr style="vertical-align:top;">
                <td style="width:48%; padding:2px 0;font-weight:bold;">
                    {{ $item->item_name }}

                    @foreach($item->addons as $addon)
                        <div style="padding-left:8px; font-size:11px;font-weight:bold;">
                            + {{ $addon->name }}
                        </div>
                    @endforeach

                    @if($item->note)
                        <div style="padding-left:8px; font-size:11px;font-weight:bold;">
                            * {{ $item->note }}
                        </div>
                    @endif
                </td>

                <td style="
                    width:12%;
                    text-align:center;
                    vertical-align:top;font-weight:bold;
                ">
                    {{ $item->quantity }}
                </td>

                <td style="
                    width:20%;
                    text-align:right;
                    vertical-align:top;font-weight:bold;
                ">
                    {{ number_format($item->price,2) }}
                </td>

                <td style="
                    width:20%;
                    text-align:right;
                    vertical-align:top;font-weight:bold;
                ">
                    {{ number_format($item->line_total,2) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="border-top:2px solid #000; margin:10px 0;"></div>

    <!-- TOTALS -->
    <table style="width:100%; border-collapse:collapse;">
        <tr>
            <td style="width:50%;font-weight:bold;">
                Total Qty: {{ $qty }}
            </td>
            <td style="width:20%;font-weight:bold;">
                Sub Total
            </td>
            <td style="width:30%; text-align:right;font-weight:bold;">
                {{ number_format($subtotal,2) }}
            </td>
        </tr>

        <tr>
            <td style="font-weight:bold;" colspan="2">Service Charge (10%)</td>
            <td style="text-align:right;font-weight:bold;">
                {{ number_format($serviceCharge,2) }}
            </td>
        </tr>

        <tr>
            <td></td>
            <td style="font-weight:bold;">CGST@2.5%</td>
            <td style="text-align:right;font-weight:bold;">
                {{ number_format($cgst,2) }}
            </td>
        </tr>

        <tr>
            <td></td>
            <td style="font-weight:bold;">SGST@2.5%</td>
            <td style="text-align:right;font-weight:bold;">
                {{ number_format($sgst,2) }}
            </td>
        </tr>
    </table>

    <div style="border-top:2px solid #000; margin:8px 0;"></div>

    <!-- ROUND OFF -->
    <table style="width:100%;">
        <tr>
            <td style="text-align:center;font-weight:bold;">
                Round off
            </td>
            <td style="text-align:right; width:80px;font-weight:bold;">
                {{ number_format($roundOff,2) }}
            </td>
        </tr>
    </table>

    <!-- GRAND TOTAL -->
    <table style="width:100%; margin-top:2px;">
        <tr>
            <td style="
                font-size:18px;
                font-weight:bold;
                text-align:center;
            ">
                Grand Total
            </td>

            <td style="
                font-size:18px;
                font-weight:bold;
                text-align:right;
                width:120px;
            ">
                ₹{{ number_format($grandTotal,2) }}
            </td>
        </tr>
    </table>

    <div style="border-top:2px solid #000; margin:8px 0;"></div>

    <!-- FOOTER -->
    <div style="
        text-align:center;
        font-size:18px;
        margin-top:6px;
    ">
        Thank you
    </div>

    <div style="border-top:2px solid #000; margin:8px 0;"></div>

    <!-- QR CODE -->
    <div style="
        text-align:center;
        margin-top:12px;
        margin-bottom:10px;
    ">
        <img
            src="{{ asset('assets/admin/img/qr.jpeg') }}"
            style="
                width:90px;
                height:90px;
                display:block;
                margin:0 auto;
            "
        >

        <div style="
            margin-top:5px;
            font-size:11px;
        ">
            Pay Via the QR code
        </div>
    </div>

    <div style="border-top:2px solid #000; margin:8px 0;"></div>

</div>

</body>
</html>