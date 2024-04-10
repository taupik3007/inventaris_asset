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
            $table->bigInteger('ctg_parent_id')->nullable();
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
        Schema::dropIfExists('categories');
    }
};
