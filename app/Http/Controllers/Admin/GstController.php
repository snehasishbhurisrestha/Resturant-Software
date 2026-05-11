<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GstController extends Controller
{
    public function index()
    {
        return response()->json([
            'gst' => setting('gst') ?? 5
        ]);
    }

    public function save(Request $request)
    {
        // save setting
        return response()->json([
            'status' => true,
            'message' => 'GST updated'
        ]);
    }
}