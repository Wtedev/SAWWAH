<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('travel_with', 50)->change();
            $table->string('attraction', 50)->change();
            $table->string('language_preference', 50)->change();
        });
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->string('travel_with')->change();
            $table->string('attraction')->change();
            $table->string('language_preference')->change();
        });
    }
};
