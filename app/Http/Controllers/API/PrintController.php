<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrintJob;

class PrintController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET PENDING PRINT JOBS
    |--------------------------------------------------------------------------
    */
    public function pendingJobs()
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | GET ONLY PENDING JOBS
            |--------------------------------------------------------------------------
            */
            $jobs = PrintJob::where('status', 'pending')
                ->orderBy('id', 'asc')
                ->limit(20)
                ->get();

            /*
            |--------------------------------------------------------------------------
            | MARK AS PROCESSING
            |--------------------------------------------------------------------------
            */
            foreach ($jobs as $job) {

                $job->update([
                    'status' => 'processing'
                ]);
            }

            return response()->json($jobs);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MARK PRINTED
    |--------------------------------------------------------------------------
    */
    public function markPrinted($id)
    {
        try {

            $job = PrintJob::findOrFail($id);

            $job->update([

                'status' => 'printed',

                'printed_at' => now(),

                'error_message' => null
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Marked as printed'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | MARK FAILED
    |--------------------------------------------------------------------------
    */
    public function markFailed(Request $request, $id)
    {
        try {

            $job = PrintJob::findOrFail($id);

            $job->update([

                'status' => 'failed',

                'retry_count' => $job->retry_count + 1,

                'error_message' => $request->error
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Marked as failed'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RETRY FAILED JOB
    |--------------------------------------------------------------------------
    */
    public function retryJob($id)
    {
        try {

            $job = PrintJob::findOrFail($id);

            $job->update([

                'status' => 'pending',

                'error_message' => null
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Retry added'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | GET FAILED JOBS
    |--------------------------------------------------------------------------
    */
    public function failedJobs()
    {
        try {

            $jobs = PrintJob::where('status', 'failed')
                ->latest()
                ->get();

            return response()->json([
                'status' => true,
                'data' => $jobs
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | PRINT HISTORY
    |--------------------------------------------------------------------------
    */
    public function history()
    {
        try {

            $jobs = PrintJob::where('status', 'printed')
                ->latest()
                ->limit(100)
                ->get();

            return response()->json([
                'status' => true,
                'data' => $jobs
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}