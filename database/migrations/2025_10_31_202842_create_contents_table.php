<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->nullable(); // Relation to pages table

            // Headings
            $table->string('h1')->nullable();
            $table->string('h2')->nullable();
            $table->string('h3')->nullable();
            $table->string('h4')->nullable();
            $table->string('h5')->nullable();
            $table->string('h6')->nullable();

            // Paragraphs
            $table->text('p1')->nullable();
            $table->text('p2')->nullable();

            // SEO & meta
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->text('meta_description')->nullable();

            // Other content
            $table->longText('content')->nullable();
            $table->string('image')->nullable();

            // Timestamps + Soft Delete
            $table->timestamps();
            $table->softDeletes();

            // Foreign key
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
