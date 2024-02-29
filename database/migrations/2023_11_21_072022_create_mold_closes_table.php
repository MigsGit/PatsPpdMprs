<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoldClosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mold_closes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->string('hi_v')->nullable();
            $table->string('mid_slow')->nullable();
            $table->string('low_l')->nullable();
            $table->string('obstacle_check_tm')->nullable();
            $table->string('slow_start')->nullable();
            $table->string('slow_end')->nullable();
            $table->string('lvlp')->nullable();
            $table->string('hpcl')->nullable();
            $table->string('mid_sl_p')->nullable();
            $table->string('low_p')->nullable();
            $table->string('hi_p')->nullable();
            $table->string('hi_p_unit')->nullable()->default(0)->comment = '1-Ton, 2-%';
            $table->softDeletes();

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
        Schema::dropIfExists('mold_closes');
    }
}