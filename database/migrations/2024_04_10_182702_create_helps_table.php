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
            $table->unsignedBigInteger('help_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('help_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('help_updated_by')->unsigned()->nullable();

            $table->foreign('help_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('help_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('help_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
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
