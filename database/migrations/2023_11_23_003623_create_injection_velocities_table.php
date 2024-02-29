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
            $table->string('injection_time');
            $table->string('cooling_time');
            $table->string('cycle_start');
            $table->string('inj_pp3');
            $table->string('inj_pp2');
            $table->string('inj_pp1')->comment = '0 - kg/cm 1 - MPa';
            $table->string('injection_hold')->comment = 'Form 2';
            $table->string('injection_limit_v')->comment = 'Form 2';
            $table->string('ramp_pp1');
            $table->string('inj_v1');
            $table->string('inj_v2');
            $table->string('inj_v3');
            $table->string('inj_v4');
            $table->string('inj_v5');
            $table->string('inj_v6');
            $table->string('inj_sm');
            $table->string('inj_sv1');
            $table->string('inj_sv2');
            $table->string('inj_sv3');
            $table->string('inj_sv4');
            $table->string('inj_sv5');
            $table->string('inj_veloc_no');
            $table->string('inj_fill')->comment = 'Form 2';
            $table->string('inj_sd');
            $table->string('inj_press_no');
            $table->string('inj_tp1');
            $table->string('inj_tp2')->comment = 'Form 2 w/out tp2';;
            $table->string('inj_pos_change_mode');
            $table->string('inj_pos_vs');
            $table->string('inj_pos_pb');
            $table->string('inj_pv1');
            $table->string('inj_pv2');
            $table->string('inj_pv3');
            $table->string('inj_sp1');
            $table->string('inj_sp2');
            $table->string('injection_limit_p')->comment = 'Form 2';
            // $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';

            // Foreign key
            $table->foreign('machine_parameter_id')->references('id')->on('machine_parameters'); // foreign id sa table, references id sa pagkukunan, on pagkukunan na table


           // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
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
        Schema::dropIfExists('injection_velocities');
    }
}
