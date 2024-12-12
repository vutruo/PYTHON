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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);//tên thuốc
            $table->string('brand',100);//thương hiệu
            $table->string('dosage',150);//thông tin liều lượng
            $table->string('form',50);//dạng viên thuốc
            $table->float('price',10,2);//giá trên 1 đơn vị thuốc
            $table->integer('stoke');//số lượng tồn trong kho
            $table->timestamps();
        });
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->foreign('medicine_id')
                ->references('id')
                ->on('medicines')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->dateTime('sale_date');
            $table->string('customer_phone', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('medicines');
    }
};
