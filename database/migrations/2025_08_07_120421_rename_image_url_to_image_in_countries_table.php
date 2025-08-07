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
            // تغيير اسم العمود من image_url إلى image
            if (Schema::hasColumn('countries', 'image_url')) {
                $table->renameColumn('image_url', 'image');
            } elseif (!Schema::hasColumn('countries', 'image')) {
                // إذا لم يكن العمود موجوداً أصلاً، أنشئه
                $table->string('image')->nullable()->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            // العكس: تغيير من image إلى image_url
            if (Schema::hasColumn('countries', 'image')) {
                $table->renameColumn('image', 'image_url');
            }
        });
    }
};
