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
            $table->bigInteger('asd_asset_id');
            $table->string('asd_description_name');
            $table->string('asd_description_value');
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
        Schema::dropIfExists('asset_descriptions');
    }
};
