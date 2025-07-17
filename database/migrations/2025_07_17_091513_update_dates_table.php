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
        Schema::table('dates', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->longText('time_in_image')->nullable();
            $table->longText('time_out_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('dates', function (Blueprint $table) {
            $table->longText('image')->nullable();
            $table->dropColumn(['time_in_image', 'time_out_image']);
        });
    }
};
