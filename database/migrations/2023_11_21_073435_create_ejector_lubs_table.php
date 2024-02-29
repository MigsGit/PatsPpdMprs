<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjectorLubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejector_lubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->string('ej_pres');
            $table->string('fwd_ev1');
            $table->string('fwd_ev2');
            $table->string('fwd_stop');
            $table->string('bwd_stop');
            $table->string('count');
            $table->string('pattern');

            // Foreign key
            $table->foreign('machine_parameter_id')->references('id')->on('machine_parameters'); // foreign id sa table, references id sa pagkukunan, on pagkukunan na table


           // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejector_lubs');
    }
}
