<?php

namespace App\Helpers;

class ApiResponse
{

    public static function success($message = '', $data = [])
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function error($message = '', $data = null)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], 400);
    }

}