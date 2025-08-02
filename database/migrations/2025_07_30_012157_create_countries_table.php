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
