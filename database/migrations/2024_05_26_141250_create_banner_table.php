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
        Schema::create('nguyenhoangduy_banner', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sort_order')->default(1);
            $table->string('name', 1000);
            $table->string('link', 1000);
            $table->string('position', 50);
            $table->unsignedInteger('sort_order')->default(1);
            $table->tinyInteger("status")->default(2);
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguyenhoangduy_banner');
    }
};
