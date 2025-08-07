<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            if (!Schema::hasColumn('countries', 'capital_ar')) {
                $table->string('capital_ar')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('capital_ar');
        });
    }
};
