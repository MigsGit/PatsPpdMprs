<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjectionVelocitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injection_velocities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->string('injection_time')->nullable();
            $table->string('cooling_time')->nullable();
            $table->string('cycle_start')->nullable();
            $table->string('inj_pp3')->nullable();
            $table->string('inj_pp2')->nullable();
            $table->string('inj_pp1')->nullable();
            $table->string('inj_pp1_unit')->nullable()->comment="NOTE: For Machine 1 only | 1-kg/cm, 2-%";
            $table->string('inj_v1_unit')->nullable()->nullable()->comment="NOTE: For Machine 1 only | 1-mm/S , 2-%";
            $table->string('inj_v1')->nullable();
            $table->string('inj_v2')->nullable();
            $table->string('inj_v3')->nullable();
            $table->string('inj_v4')->nullable();
            $table->string('inj_v5')->nullable();
            $table->string('inj_v6')->nullable();
            $table->string('inj_sv1')->nullable();
            $table->string('inj_sv2')->nullable();
            $table->string('inj_sv3')->nullable();
            $table->string('inj_sv4')->nullable();
            $table->string('inj_sv5')->nullable();
            $table->string('inj_sm')->nullable();
            $table->string('inj_sd')->nullable();
            $table->string('inj_veloc_no')->nullable();
            $table->string('inj_press_no')->nullable();
            $table->string('inj_tp1')->nullable();
            $table->string('inj_tp2')->nullable()->comment = 'NOTE: For Machine 1 only';
            $table->string('inj_pos_change_mode')->nullable();
            $table->string('inj_pos_vs')->nullable()->nullable();
            $table->string('inj_pos_pb')->nullable()->nullable();
            $table->string('inj_pos_pb_unit')->nullable()->comment="NOTE: For Machine 1 only | 1-kg/cm , 2-%";
            $table->string('inj_pv1_unit')->nullable()->comment="NOTE: For Machine 1 only | 1-kg/cm2 , 2-%";
            $table->string('inj_pv1')->nullable();
            $table->string('inj_pv2')->nullable();
            $table->string('inj_pv3')->nullable();
            $table->string('inj_sp1')->nullable();
            $table->string('inj_sp2')->nullable();
            $table->string('inj_hold')->nullable()->comment = 'NOTE: For Machine 2 only';
            $table->string('inj_limit_v')->nullable()->comment = 'NOTE: For Machine 2 only';
            $table->string('inj_fill')->nullable()->comment = 'NOTE: For Machine 2 only';
            $table->string('inj_limit_p')->nullable()->comment = 'NOTE: For Machine 2 only';
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
        Schema::dropIfExists('injection_velocities');
    }
}
