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
        // إنشاء جدول البلدان الأساسي
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description');
                $table->string('image')->nullable(); // تم تغييره من image_url إلى image
                $table->timestamps();
                
                // الأعمدة الخاصة بنظام الاقتراحات
                $table->string('best_month_to_travel', 100)->nullable();
                $table->string('preferred_budget', 100)->nullable();
                $table->string('attraction', 100)->nullable();
                $table->string('travel_with', 100)->nullable();
                $table->string('language_preference', 100)->nullable();
                
                // الأعمدة المضافة لاحقاً
                $table->string('capital', 100)->nullable();
                $table->string('capital_ar', 100)->nullable();
                $table->string('currency', 50)->nullable();
                $table->string('postal_code', 100)->nullable();
                $table->json('weather_info')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
