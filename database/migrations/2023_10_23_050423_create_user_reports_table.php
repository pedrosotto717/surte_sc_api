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
        Schema::create('user_reports', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('approx_vehicle')->nullable();
            $table->enum('vehicle_type', ['MOTORCYCLE', 'CAR'])->nullable();
            $table->enum('type', ['QUEUED', 'OUT_OF_GAS'])->nullable(false);

            $table->foreignId('users_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('gas_stations_id')
                ->references('id')
                ->on('gas_stations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reports');
    }
};
