<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('pages');
        Schema::create('pages', function (Blueprint $table) {
            $table->id("author");
            $table->string("page_slug");
            $table->json("text_contents");
            $table->string("template");
            $table->string("last_edited_at");
            $table->timestamps();
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->foreign("author")->references("id")->on('users');
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
