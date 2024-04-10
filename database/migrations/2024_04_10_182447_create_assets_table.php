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
            $table->bigInteger('ass_category_id');
            $table->bigInteger('ass_origin_id');
            $table->string('ass_year');
            $table->string('ass_registration_code');
            $table->string('ass_name');
            $table->double('ass_price');
            $table->boolean('ass_status');
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
        Schema::dropIfExists('assets');
    }
};
