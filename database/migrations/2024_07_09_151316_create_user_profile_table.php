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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->bigIncrements('usp_id');
            $table->string('usp_name');
            $table->bigInteger('usp_phone');
            
            $table->string('usp_profile_picture')->nullable();
            $table->string('usp_gender');
            $table->unsignedBigInteger('usp_user_id');

            $table->bigInteger('usp_regis_number')->unique()->nullable();
            $table->bigInteger('usp_nis')->unique()->nullable();

            $table->unsignedBigInteger('usp_classes_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
           


            $table->bigInteger('usp_deleted_by')->nullable();
            $table->bigInteger('usp_updated_by')->nullable();
            $table->bigInteger('usp_created_by')->nullable();

            $table->renameColumn('updated_at', 'usp_updated_at');
            $table->renameColumn('created_at', 'usp_created_at');
            $table->renameColumn('deleted_at', 'usp_deleted_at');
            $table->string('usp_sys_note')->nullable();


            $table->foreign('usp_classes_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('usp_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profile');
    }
};
