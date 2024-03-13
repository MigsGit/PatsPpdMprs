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
            $table->float('inj_tab_rv6')->nullable();
            $table->float('inj_tab_rv5')->nullable();
            $table->float('inj_tab_rv4')->nullable();
            $table->float('inj_tab_rv3')->nullable();
            $table->float('inj_tab_rv2')->nullable();
            $table->float('inj_tab_rv1')->nullable();
            $table->float('inj_tab_rp3')->nullable();
            $table->float('inj_tab_rp2')->nullable();
            $table->float('inj_tab_rp1')->nullable();
            $table->float('inj_tab_fill_time')->nullable();
            $table->float('inj_tab_plastic_time')->nullable();
            $table->float('inj_tab_cycle_time')->nullable();
            $table->float('inj_tab_spray_tm')->nullable();
            $table->float('inj_tab_screw_most_fwd')->nullable();
            $table->float('inj_tab_enj_end_pos')->nullable();
            $table->float('inj_tab_airblow_start_time')->nullable();
            $table->float('inj_tab_airblow_blow_time' )->nullable();
            $table->float('inj_tab_md_temp_requirement')->nullable();
            $table->float('inj_tab_md_time_requirement')->nullable();
            $table->float('inj_tab_md_temp_actual')->nullable();
            $table->string('inj_tab_spray_type')->nullable()->comment = '0-YP, 1-Z';
            $table->string('inj_tab_spray')->nullable()->comment = '0-YES, 1-NO';
            $table->string('inj_tab_spray_mode')->nullable()->comment = '0-MANUAL, 1-AUTO';
            $table->string('inj_tab_spray_side')->nullable()->comment = '0-MOVE, 1-FIXED';
            $table->string('inj_tab_ccd')->nullable()->comment = '0-YES, 1-NO';
            $table->string('inj_tab_esc')->nullable()->comment = '0-YES, 1-NO';
            $table->string('inj_tab_spray_portion')->nullable()->comment = '0-CENTER ONLY, 1-WHOLE AREA';
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
        Schema::dropIfExists('injection_tabs');
    }
}
