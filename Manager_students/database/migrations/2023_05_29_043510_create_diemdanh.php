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
        Schema::create('diemdanh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time_batdauhoc');
            $table->string('day_and_thu_dihoc');
            $table->string('reasons')->nullable()->default('có đi học');
            $table->string('hocphi')->default('chưa thanh toán buổi học này');
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
        Schema::dropIfExists('diemdanh');
    }
};
