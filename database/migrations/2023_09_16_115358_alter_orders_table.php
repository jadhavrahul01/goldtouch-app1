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
            $table->string('mtaker1', 255)->after('phone');
            $table->string('mtaker2', 255);
            $table->string('ponumber', 255);
            $table->string('poimg');
            $table->integer('fabrics_status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('mtaker1');
            $table->dropColumn('mtaker2');
            $table->dropColumn('ponumber');
            $table->dropColumn('poimg');
        });
    }
};
