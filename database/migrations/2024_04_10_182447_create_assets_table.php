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
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('ass_id');
            $table->unsignedBigInteger('ass_category_id');
            $table->unsignedBigInteger('ass_origin_id');
            $table->string('ass_year');
            $table->string('ass_registration_code')->unique();
            $table->string('ass_name')->unique();
            $table->double('ass_price')->nullable();
            $table->integer('ass_condition');
            $table->integer('ass_status');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('ass_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ass_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ass_updated_by')->unsigned()->nullable();

            //foreign key
            $table->foreign('ass_category_id')->references('ctg_id')->on('categories')->onDelete('cascade');
            $table->foreign('ass_origin_id')->references('ori_id')->on('origins')->onDelete('cascade');


            $table->foreign('ass_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
