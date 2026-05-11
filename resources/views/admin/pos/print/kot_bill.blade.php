<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>KOT</title>
</head>
<body style="
    margin:0;
    padding:0;
    width:72mm;
    font-family:'Courier New', monospace;
    font-size:13px;
    color:#000;
">

<div style="
    padding:8px;
    box-sizing:border-box;
">

    <!-- HEADER -->
    <div style="text-align:center; line-height:1.4;">
        <div style="
            font-size:16px;
            font-weight:bold;
        ">
            Running Table
        </div>

        <div style="font-size:14px;">
            {{ now()->format('d/m/y H:i') }}
        </div>

        <div style="
            font-size:18px;
            font-weight:bold;
            margin-top:3px;
        ">
            KOT - {{ $order->id }}
        </div>

        <div style="
            font-size:22px;
            font-weight:bold;
            margin-top:5px;
        ">
            Dine In
        </div>

        <div style="
            font-size:18px;
            font-weight:bold;
            margin-top:4px;
        ">
            Table No: {{ $order->table->table_number }}
        </div>
    </div>

    <!-- LINE -->
    <div style="
        border-top:2px dashed #000;
        margin:8px 0;
    "></div>

    <!-- CAPTAIN -->
    <div style="
        font-size:14px;
        margin-bottom:8px;
    ">
        Captain: {{ $order->user->name ?? 'Admin' }}
    </div>

    <!-- LINE -->
    <div style="
        border-top:2px dashed #000;
        margin:8px 0;
    "></div>

    <!-- HEAD -->
    <table style="
        width:100%;
        border-collapse:collapse;
        font-size:13px;
        font-weight:bold;
    ">
        <tr>
            <td style="width:55%;">Item</td>
            <td style="width:30%; text-align:left;">Special Note</td>
            <td style="width:15%; text-align:right;">Qty.</td>
        </tr>
    </table>

    <div style="
        border-top:2px dashed #000;
        margin:6px 0;
    "></div>
    
    @php

        $printItems = collect();
    
        if(isset($foodItems) && $foodItems->count() > 0){
            $printItems = $foodItems;
        }
    
        if(isset($drinkItems) && $drinkItems->count() > 0){
            $printItems = $drinkItems;
        }
    
    @endphp

    <!-- ITEMS -->
    
    @foreach($printItems as $item)

        <table style="
            width:100%;
            border-collapse:collapse;
            margin-bottom:8px;
        ">
            <tr style="
                vertical-align:top;
                font-weight:bold;
            ">
                <td style="width:55%;">
                    {{ $item->item_name }}
                </td>

                <td style="
                    width:30%;
                    font-size:11px;
                ">
                    @if($item->note)
                        [{{ $item->note }}]
                    @endif
                </td>

                <td style="
                    width:15%;
                    text-align:right;
                ">
                    {{ $item->quantity }}
                </td>
            </tr>

            @foreach($item->addons as $addon)
                <tr>
                    <td colspan="3" style="
                        padding-left:10px;
                        font-size:11px;
                    ">
                        + {{ $addon->name }}
                    </td>
                </tr>
            @endforeach

        </table>

    @endforeach

    <!-- FOOTER -->
    <div style="
        border-top:2px dashed #000;
        margin-top:8px;
    "></div>

</div>

</body>
</html>