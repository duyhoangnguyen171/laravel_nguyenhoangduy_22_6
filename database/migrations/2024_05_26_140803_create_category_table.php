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
        Schema::create('nguyenhoangduy_category', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('slug', 1000);
            $table->string('image', 1000)->nullable();
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('sort_odder')->default(1);
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguyenhoangduy_category');
    }
};
