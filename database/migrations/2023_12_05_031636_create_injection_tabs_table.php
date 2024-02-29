<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjectionTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injection_tabs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->string('inj_v1');
            $table->string('inj_v2');
            $table->string('inj_v3');
            $table->string('inj_v4');
            $table->string('inj_v5');
            $table->string('presure_rp1');
            $table->string('presure_rp2');
            $table->string('presure_rp3');
            $table->string('fill_time');
            $table->string('plast_time');
            $table->string('cycle_time');
            $table->string('spray_type')->comment = '0-YP, 1-Z';
            $table->string('spray')->comment = '0-YES, 1-NO';
            $table->string('spray_mode')->comment = '0-MANUAL, 1-AUTO';
            $table->string('spray_side')->comment = '0-MOVE, 1-FIXED';
            $table->string('spray_time');
            $table->string('screw_most_fwd');
            $table->string('enj_end_pos');
            $table->string('air_blow_stime');
            $table->string('air_blow_btime');
            $table->string('injection_ccd')->comment = '0-YES, 1-NO';
            $table->string('ej_pin_checker')->comment = '0-YES, 1-NO';
            $table->string('spray_portion')->comment = '0-CENTER ONLY, 1-WHOLE AREA';
            $table->string('material_dry_temp_req');
            $table->string('material_dry_time_req');
            $table->string('material_dry_time_actual');
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
        Schema::dropIfExists('injection_tabs');
    }
}
