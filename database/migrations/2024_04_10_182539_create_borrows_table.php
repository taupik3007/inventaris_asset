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
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('brw_id');
            $table->unsignedBigInteger('brw_user_id');
            $table->boolean('brw_status');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('brw_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brw_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('brw_updated_by')->unsigned()->nullable();

            $table->foreign('brw_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('brw_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
