<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Helpers\ApiResponse;

class PaymentController extends Controller
{

    public function pay(Request $request)
    {

        $payment = Payment::create([
            'order_id'=>$request->order_id,
            'amount'=>$request->amount,
            'method'=>$request->method
        ]);

        return ApiResponse::success(
            'Payment successful',
            $payment
        );

    }

}