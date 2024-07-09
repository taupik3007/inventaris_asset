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
        Schema::create('asset_descriptions', function (Blueprint $table) {
            $table->bigIncrements('asd_id');
            $table->unsignedBigInteger('asd_asset_id');
            $table->string('asd_name');
            $table->string('asd_value');
            $table->timestamps();
            $table->softDeletes();
            $table->renameColumn('updated_at', 'asd_updated_at');
            $table->renameColumn('created_at', 'asd_created_at');
            $table->renameColumn('deleted_at', 'asd_deleted_at');

            $table->unsignedBigInteger('asd_created_by')->unsigned()->nullable();
            $table->unsignedBigInteger('asd_deleted_by')->unsigned()->nullable();
            $table->unsignedBigInteger('asd_updated_by')->unsigned()->nullable();
            $table->string('asd_sys_note');


            // foreign key
            $table->foreign('asd_asset_id')->references('ass_id')->on('assets')->onDelete('cascade');

            $table->foreign('asd_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_descriptions');
    }
};
