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
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notif_id');
            $table->bigInteger('notif_user_id');
            $table->string('notif_title');
            $table->string('notif_content')->text();
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
        Schema::dropIfExists('notifications');
    }
};
