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
            $table->bigInteger('note_user_id');
            $table->bigInteger('note_category_id');
            $table->bigInteger('note_origin_id');
            $table->bigInteger('note_asset_id');
            $table->bigInteger('note_asset_description_id');
            $table->bigInteger('note_borrow_id');
            $table->bigInteger('note_borrow_asset_id');
            $table->string('note_text')->text();
            $table->timestamps();
            $table->bigInteger('created_by')->nullable();
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
