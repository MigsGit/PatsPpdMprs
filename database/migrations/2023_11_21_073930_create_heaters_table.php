<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heaters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->float('hot_sprue_set')->nullable();
            $table->float('nozzle_set')->nullable();
            $table->float('front_set')->nullable();
            $table->float('mid_set')->nullable();
            $table->float('rear_set')->nullable();
            $table->float('hot_sprue_actual')->nullable();
            $table->float('nozzle_actual')->nullable();
            $table->float('front_actual')->nullable();
            $table->float('mid_actual')->nullable();
            $table->float('rear_actual')->nullable();
            $table->float('mold_one_set')->nullable();
            $table->float('mold_two_set')->nullable();
            $table->float('mold_one_actual')->nullable();
            $table->float('mold_two_actual')->nullable();
            // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
            // Foreign key
            $table->foreign('machine_parameter_id')->references('id')->on('machine_parameters'); // foreign id sa table, references id sa pagkukunan, on pagkukunan na table

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heaters');
    }
}
