<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catering_id');
            $table->string('service_type');
            $table->integer('price');
            $table->integer('guests');
            $table->boolean('set_up')->default(0);
            $table->string('venue');
            $table->boolean('planner')->default(0);
            $table->timestamps();

            $table->foreign('catering_id')->references('id')->on('caterings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_services');
    }
};
