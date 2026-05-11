<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {

            $table->string('item_name')->nullable()->after('menu_item_id');

            $table->decimal('tax', 10, 2)->default(0)->after('price');
            $table->decimal('discount', 10, 2)->default(0)->after('tax');
            $table->decimal('line_total', 10, 2)->default(0)->after('discount');

            $table->boolean('is_complimentary')->default(false)->after('line_total');

            // $table->text('note')->nullable()->after('is_complimentary');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn([
                'item_name',
                'tax',
                'discount',
                'line_total',
                'is_complimentary',
                // 'note'
            ]);
        });
    }
};
