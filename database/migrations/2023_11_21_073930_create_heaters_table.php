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
            $table->string('hot_sprue_set');
            $table->string('hot_sprue_actual');
            $table->string('nozzle_set');
            $table->string('nozzle_actual');
            $table->string('front_set');
            $table->string('front_actual');
            $table->string('mid_set');
            $table->string('mid_actual');
            $table->string('rear1_set');
            $table->string('rear1_actual');
            $table->string('rear2_set');
            $table->string('rear2_actual');
            $table->string('mold1_set');
            $table->string('mold1_actual');
            $table->string('mold2_set');
            $table->string('mold2_actual');
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
        Schema::dropIfExists('heaters');
    }
}
