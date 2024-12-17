<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     // Schema::create('it_centers', function (Blueprint $table) {
    //     //     $table->id(); 
    //     //     $table->string('name'); 
    //     //     $table->string('location'); 
    //     //     $table->string('contact_email')->unique();
    //     // });

    //     // Schema::create('hardware_devices', function (Blueprint $table) {
    //     //     $table->id(); 
    //     //     $table->string('device_name'); 
    //     //     $table->string('type');
    //     //     $table->boolean('status')->default(true); 
    //     //     $table->unsignedBigInteger('center_id'); 
    //     //     $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');
    //     //     $table->timestamps();
    //     // });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_devices');
        Schema::dropIfExists('it_centers');
    }
};
