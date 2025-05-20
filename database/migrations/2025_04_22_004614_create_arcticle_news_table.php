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
        Schema::create('arcticle_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longtext('content');
            $table->string('thumbnail');
            $table->enum('is_featured', ['featured', 'not_featured'])->default('not_featured');
            $table->foreignid('category_id')->constrained()->cascadeOnDelete();
            $table->foreignid('author_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arcticle_news');
    }
};
