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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_discription')->nullable();
            $table->longText('discription')->nullable();
            $table->json('tag')->nullable();  // Change this to JSON type
            $table->json('meta_keyword')->nullable();  // Change this to JSON type
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->bigInteger('views')->default(0); 
            $table->bigInteger('likes')->default(0); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
