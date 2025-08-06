<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // العمود الأساسي
            $table->string('name'); // اسم الدولة
            $table->string('slug')->unique(); // slug لاستخدامه في الروابط
            $table->text('description'); // وصف الدولة
            $table->string('image_url')->nullable(); // رابط صورة الدولة (اختياري)
            
            $table->timestamps(); // الأعمدة created_at و updated_at

        //  الأعمدة الجديدة لنظام الاقتراحات الذكي
        $table->enum('best_month_to_travel', ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'])->nullable(); // الشهر المثالي للسفر
        $table->enum('preferred_budget', ['أقل من 1000 دولار', '1000-5000 دولار', 'أكثر من 5000 دولار'])->nullable(); // الميزانية المفضلة
        $table->enum('attraction', ['أسعار منخفضة', 'أجواء ماطرة', 'مناطق سياحية مشهورة', 'فعاليات ثقافية أو رياضية'])->nullable(); // أكثر ما يجذب في الوجهة
        $table->enum('travel_with', ['بمفردي', 'مع العائلة', 'مع الأصدقاء'])->nullable(); // السفر بمفردك أم مع العائلة أو الأصدقاء
        $table->enum('language_preference', ['الإنجليزية', 'العربية', 'لا توجد لغة معينة'])->nullable(); // اللغة المفضلة
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
