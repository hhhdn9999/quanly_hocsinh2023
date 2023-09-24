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
        Schema::create('no', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sotienthieu');
            $table->string('timeKhoang');
            $table->string('value')->nullable()->default('chưa nộp');
            $table->integer('hocsinh_id')->unsigned();
            $table->foreign('hocsinh_id')->references('hocsinh_id')->on('hocsinh')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('no');
    }
};
