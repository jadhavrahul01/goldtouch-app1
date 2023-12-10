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
        Schema::create('empdetails', function (Blueprint $table) {
            $table->id();
            $table->string('tokenNo');
            $table->string('sname');
            $table->string('fullName');
            $table->string('category');
            $table->string('setOrder');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empdetails');
    }
};
