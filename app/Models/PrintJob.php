<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintJob extends Model
{
    protected $fillable = [

        'order_id',

        'printer_name',

        'type',

        'html',

        'status',

        'retry_count',

        'error_message',

        'printed_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */
    protected $casts = [

        'printed_at' => 'datetime'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePrinted($query)
    {
        return $query->where('status', 'printed');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */
    public function markAsPrinted()
    {
        $this->update([
            'status' => 'printed',
            'printed_at' => now(),
            'error_message' => null
        ]);
    }

    public function markAsFailed($message = null)
    {
        $this->update([
            'status' => 'failed',
            'retry_count' => $this->retry_count + 1,
            'error_message' => $message
        ]);
    }

    public function markAsProcessing()
    {
        $this->update([
            'status' => 'processing'
        ]);
    }
}