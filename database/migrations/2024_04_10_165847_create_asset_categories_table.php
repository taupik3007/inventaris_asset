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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('ctg_id');
            $table->string('ctg_code');
            $table->string('ctg_original_code');
            $table->string('ctg_name');
            $table->unsignedBigInteger('ctg_parent_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unsignedBigInteger('ctg_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ctg_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('ctg_updated_by')->unsigned()->nullable();
            $table->string('ctg_sys_note')->nullable();

            $table->renameColumn('updated_at', 'ctg_updated_at');
            $table->renameColumn('created_at', 'ctg_created_at');
            $table->renameColumn('deleted_at', 'ctg_deleted_at');


            //foreign key
            $table->foreign('ctg_parent_id')->references('ctg_id')->on('categories')->onDelete('cascade');           
            $table->foreign('ctg_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ctg_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ctg_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
