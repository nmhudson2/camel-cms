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
        Schema::dropIfExists('pages');
        Schema::create('pages', function (Blueprint $table) {
            $table->string("author");
            $table->string("page_slug")->primary();
            $table->json("text_contents");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('page', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'author')) {
                Schema::dropColumns('pages', 'author');
            }
        });
    }
};
