<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            if (!Schema::hasColumn('countries', 'code')) {
                $table->string('code', 2)->nullable();
            }
            if (!Schema::hasColumn('countries', 'capital')) {
                $table->string('capital')->nullable();
            }
        });

        // تحديث البيانات الموجودة
        DB::table('countries')->where('slug', 'saudi-arabia')->update([
            'code' => 'SA',
            'capital' => 'Riyadh'
        ]);
        DB::table('countries')->where('slug', 'uae')->update([
            'code' => 'AE',
            'capital' => 'Abu Dhabi'
        ]);
        DB::table('countries')->where('slug', 'bahrain')->update([
            'code' => 'BH',
            'capital' => 'Manama'
        ]);
        DB::table('countries')->where('slug', 'kuwait')->update([
            'code' => 'KW',
            'capital' => 'Kuwait City'
        ]);
        DB::table('countries')->where('slug', 'oman')->update([
            'code' => 'OM',
            'capital' => 'Muscat'
        ]);
        DB::table('countries')->where('slug', 'qatar')->update([
            'code' => 'QA',
            'capital' => 'Doha'
        ]);
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn(['code', 'capital']);
        });
    }
};
