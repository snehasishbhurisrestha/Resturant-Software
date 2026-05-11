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
        Schema::table('orders', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | PAYMENT TYPE
            |--------------------------------------------------------------------------
            */
            $table->string('payment_method')
                  ->nullable()
                  ->after('status');

            /*
            |--------------------------------------------------------------------------
            | SPLIT PAYMENT
            |--------------------------------------------------------------------------
            */
            $table->decimal('cash_amount', 10, 2)
                  ->default(0)
                  ->after('payment_method');

            $table->decimal('card_amount', 10, 2)
                  ->default(0)
                  ->after('cash_amount');

            $table->decimal('upi_amount', 10, 2)
                  ->default(0)
                  ->after('card_amount');

            $table->decimal('other_amount', 10, 2)
                  ->default(0)
                  ->after('upi_amount');

            /*
            |--------------------------------------------------------------------------
            | OTHER PAYMENT DETAILS
            |--------------------------------------------------------------------------
            */
            $table->string('other_payment_method')
                  ->nullable()
                  ->after('other_amount');

            $table->text('payment_note')
                  ->nullable()
                  ->after('other_payment_method');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([

                'payment_method',

                'cash_amount',
                'card_amount',
                'upi_amount',
                'other_amount',

                'other_payment_method',
                'payment_note',
            ]);

        });
    }
};
