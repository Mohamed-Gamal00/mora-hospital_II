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
        Schema::create('section__translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('section_id');
            $table->unique(['section_id', 'locale']);
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

            // Actual fields you want to translate
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section__translations');
    }
};
