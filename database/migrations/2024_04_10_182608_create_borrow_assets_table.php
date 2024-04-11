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
        Schema::create('borrow_assets', function (Blueprint $table) {
            $table->bigIncrements('bas_id');
            $table->unsignedBigInteger('bas_asset_id');
            $table->unsignedBigInteger('bas_borrow_id');
            $table->boolean('bas_status');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('bas_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('bas_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('bas_updated_by')->unsigned()->nullable();


            $table->foreign('bas_asset_id')->references('ass_id')->on('assets')->onDelete('cascade');
            $table->foreign('bas_borrow_id')->references('brw_id')->on('borrows')->onDelete('cascade');
            $table->foreign('bas_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bas_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('bas_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow_assets');
    }
};
