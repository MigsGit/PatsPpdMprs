<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnjectionVelocitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enjection_velocities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->foreign('machine_parameter_id')->references('id')->on('machine_parameters'); // foreign id sa table, references id sa pagkukunan, on pagkukunan na table
            $table->float('injection_time')->nullable();
            $table->float('cooling_time')->nullable();
            $table->float('cycle_start')->nullable();
            $table->float('v6')->nullable();
            $table->float('v5')->nullable();
            $table->float('v4')->nullable();
            $table->float('v3')->nullable();
            $table->float('v2')->nullable();
            $table->float('v1')->nullable();
            $table->float('v1_unit')->nullable()->comment="1-mm/S | %";
            $table->float('veloc_no')->nullable();
            $table->float('sv5')->nullable();
            $table->float('sv4')->nullable();
            $table->float('sv3')->nullable();
            $table->float('sv2')->nullable();
            $table->float('sv1')->nullable();
            $table->float('sm')->nullable();
            $table->float('sd')->nullable();
            $table->float('pp3')->nullable();
            $table->float('pp2')->nullable();
            $table->float('pp1')->nullable();
            $table->float('pp1_unit')->nullable()->comment="1-kg/cm2 | %";
            $table->float('press_no')->nullable();
            $table->float('tp2')->nullable();
            $table->float('tp1')->nullable();
            $table->float('change_mode')->nullable();
            $table->float('vs')->nullable();
            $table->float('pb')->nullable();
            $table->float('pb_unit')->nullable()->comment="1-kg/cm2 | %";
            $table->float('pv3')->nullable();
            $table->float('pv2')->nullable();
            $table->float('pv1')->nullable();
            $table->float('pv1_unit')->nullable()->comment="1-kg/cm2 | %";
            $table->float('sp2')->nullable();
            $table->float('sp1')->nullable();
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
        Schema::dropIfExists('enjection_velocities');
    }
}
