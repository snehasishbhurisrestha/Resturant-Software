<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('print_jobs', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | ORDER
            |--------------------------------------------------------------------------
            */
            $table->unsignedBigInteger('order_id')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | PRINTER
            |--------------------------------------------------------------------------
            */
            $table->string('printer_name');
            // kitchen / bar / cashier

            /*
            |--------------------------------------------------------------------------
            | TYPE
            |--------------------------------------------------------------------------
            */
            $table->string('type')
                ->default('kot');
            // kot / bill / receipt

            /*
            |--------------------------------------------------------------------------
            | CONTENT
            |--------------------------------------------------------------------------
            */
            $table->longText('html');

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */
            $table->enum('status', [
                'pending',
                'processing',
                'printed',
                'failed'
            ])->default('pending');

            /*
            |--------------------------------------------------------------------------
            | RETRY
            |--------------------------------------------------------------------------
            */
            $table->integer('retry_count')
                ->default(0);

            /*
            |--------------------------------------------------------------------------
            | ERROR
            |--------------------------------------------------------------------------
            */
            $table->text('error_message')
                ->nullable();

            /*
            |--------------------------------------------------------------------------
            | PRINTED TIME
            |--------------------------------------------------------------------------
            */
            $table->timestamp('printed_at')
                ->nullable();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | INDEXES
            |--------------------------------------------------------------------------
            */
            $table->index('status');
            $table->index('printer_name');
            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_jobs');
    }
};