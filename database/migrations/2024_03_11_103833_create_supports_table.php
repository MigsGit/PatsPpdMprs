<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->float('support_v6')->nullable();
            $table->float('support_v5')->nullable();
            $table->float('support_v4')->nullable();
            $table->float('support_v3')->nullable();
            $table->float('support_v2')->nullable();
            $table->float('support_v1')->nullable();
            $table->float('support_pp3')->nullable();
            $table->float('support_pp2')->nullable();
            $table->float('support_pp1')->nullable();
            $table->float('support_fill_p')->nullable();
            $table->float('support_bp')->nullable();
            $table->float('support_fill_time')->nullable();
            $table->float('support_plastic_time')->nullable();
            $table->float('support_cycle_time')->nullable();
            $table->float('support_spray_tm')->nullable();
            $table->float('support_screw_most_fwd')->nullable();
            $table->float('support_enj_end_pos')->nullable();
            $table->float('support_airblow_start_time')->nullable();
            $table->float('support_airblow_blow_time')->nullable();
            $table->float('support_md_temp_requirement')->nullable();
            $table->float('support_md_time_requirement')->nullable();
            $table->float('support_md_temp_actual')->nullable();
            $table->string('support_spray_type')->nullable()->comment = '0-YP, 1-Z';
            $table->string('support_spray')->nullable()->comment = '0-YES, 1-NO';
            $table->string('support_spray_mode')->nullable()->comment = '0-MANUAL, 1-AUTO';
            $table->string('support_spray_side')->nullable()->comment = '0-MOVE, 1-FIXED';
            $table->string('support_ccd')->nullable()->comment = '0-YES, 1-NO';
            $table->string('support_esc')->nullable()->comment = '0-YES, 1-NO';
            $table->string('support_spray_portion')->nullable()->comment = '0-CENTER ONLY, 1-WHOLE AREA';
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
        Schema::dropIfExists('supports');
    }
}
