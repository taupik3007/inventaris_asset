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
        Schema::create('sys_note', function (Blueprint $table) {
            $table->bigIncrements('note_id');
            $table->unsignedBigInteger('note_user_id')->nullable();
            $table->unsignedBigInteger('note_category_id')->nullable();
            $table->unsignedBigInteger('note_origin_id')->nullable();
            $table->unsignedBigInteger('note_asset_id')->nullable();
            $table->unsignedBigInteger('note_asset_description_id')->nullable();
            $table->unsignedBigInteger('note_borrow_id')->nullable();
            $table->unsignedBigInteger('note_borrow_asset_id')->nullable();
            // $table->string('note_title');
            $table->string('note_text')->text();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->unsigned()->nullable();

            $table->foreign('note_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('note_category_id')->references('ctg_id')->on('categories')->onDelete('cascade');
            $table->foreign('note_origin_id')->references('ori_id')->on('origins')->onDelete('cascade');
            $table->foreign('note_asset_id')->references('ass_id')->on('assets')->onDelete('cascade');
            $table->foreign('note_asset_description_id')->references('asd_id')->on('asset_descriptions')->onDelete('cascade');
            $table->foreign('note_borrow_id')->references('brw_id')->on('borrows')->onDelete('cascade');
            $table->foreign('note_borrow_asset_id')->references('bas_id')->on('borrow_assets')->onDelete('cascade');


           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_note');
    }
};
