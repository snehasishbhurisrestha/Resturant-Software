<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('status');
            // ✅ Add status column
            $table->enum('status', [
                'pending',
                'preparing',
                'served',
                'cancelled'
            ])->default('pending')->after('price');

            // ✅ Add note column
            $table->text('note')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {

            // 🔄 Rollback
            $table->dropColumn(['status', 'note']);
        });
    }
};
