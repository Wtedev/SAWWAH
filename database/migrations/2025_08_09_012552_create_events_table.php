<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('capacity')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('category')->nullable();
            $table->json('tags')->nullable();
            $table->timestamps();

            $table->index(['start_date', 'end_date']);
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
