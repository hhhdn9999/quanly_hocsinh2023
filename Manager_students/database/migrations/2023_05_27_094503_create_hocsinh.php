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
        Schema::create('hocsinh', function (Blueprint $table) {
            $table->Increments('hocsinh_id');
            $table->string('hocsinh_name');
            $table->integer('sobuoihoc_somonhoc')->nullable()->default(0);
            $table->string('hocsinh_image')->nullable()->default('chua cap nhat anh');
            $table->string('hocsinh_ghichu')->nullable()->default('ko co ghi chú');

            $table->integer('id_monhoc')->unsigned();
            $table->foreign('id_monhoc')->references('id')->on('monhoc')->onDelete('cascade');

            $table->integer('lop_id')->unsigned();
            $table->foreign('lop_id')->references('id')->on('lop')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hocsinh');
    }
};
