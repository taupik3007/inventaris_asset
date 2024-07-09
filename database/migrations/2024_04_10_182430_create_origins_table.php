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
        Schema::create('origins', function (Blueprint $table) {
            $table->bigIncrements('ori_id');
            $table->string('ori_code')->unique();
            $table->string('ori_name');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('ori_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ori_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ori_updated_by')->unsigned()->nullable();
            $table->renameColumn('updated_at', 'ori_updated_at');
            $table->renameColumn('created_at', 'ori_created_at');
            $table->renameColumn('deleted_at', 'ori_deleted_at');

            $table->string('ori_sys_note')->nullable();


            //foreign key
                    
            $table->foreign('ori_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ori_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ori_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origins');
    }
};
