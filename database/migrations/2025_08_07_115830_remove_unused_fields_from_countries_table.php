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
        Schema::table('countries', function (Blueprint $table) {
            // إزالة الحقول غير المستخدمة إذا كانت موجودة
            if (Schema::hasColumn('countries', 'postal_code')) {
                $table->dropColumn('postal_code');
            }

            if (Schema::hasColumn('countries', 'country_code')) {
                $table->dropColumn('country_code');
            }

            if (Schema::hasColumn('countries', 'code')) {
                $table->dropColumn('code');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            // إعادة إضافة الحقول في حالة التراجع
            $table->string('postal_code')->nullable()->after('capital');
            $table->string('country_code', 2)->nullable()->after('capital');
            $table->string('code', 2)->nullable()->after('country_code');
        });
    }
};
