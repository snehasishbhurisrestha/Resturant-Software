<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('order_no')->nullable()->after('id');
            $table->string('bill_no')->nullable()->after('order_no');

            $table->decimal('subtotal', 10, 2)->default(0)->after('my_amount');
            $table->decimal('discount_amount', 10, 2)->default(0)->after('discount');
            $table->decimal('tax_amount', 10, 2)->default(0)->after('tax');

            $table->boolean('kot_printed')->default(false)->after('status');
            $table->boolean('bill_printed')->default(false)->after('kot_printed');

            $table->text('note')->nullable()->after('payment');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'order_no',
                'bill_no',
                'subtotal',
                'discount_amount',
                'tax_amount',
                'kot_printed',
                'bill_printed',
                'note',
            ]);
        });
    }
};
