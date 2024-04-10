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
        Schema::create('helps', function (Blueprint $table) {
            $table->bigIncrements('help_id');
            $table->string('help_title');
            $table->string('help_content')->text();
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helps');
    }
};
