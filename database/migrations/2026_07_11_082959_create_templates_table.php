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
        Schema::create('templates', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('short_description');
        $table->longText('long_description')->nullable();
        $table->string('thumbnail')->nullable();   // path to preview image
        $table->string('preview_url')->nullable(); // route to live preview
        $table->string('status')->default('active'); // active | inactive | draft
        $table->integer('view_count')->default(0);
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();
        $table->timestamps();
        $table->index(['category_id', 'status']);  // composite index for filtering
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
