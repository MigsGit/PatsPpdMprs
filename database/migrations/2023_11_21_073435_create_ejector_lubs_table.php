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
            $table->string('ej_pres')->nullable();
            $table->string('fwd_ev1')->nullable();
            $table->string('fwd_ev2')->nullable();
            $table->string('fwd_stop')->nullable();
            $table->string('bwd_stop')->nullable();
            $table->string('count')->nullable();
            $table->string('pattern')->nullable();
            $table->softDeletes();
            $table->timestamp('updated_at');

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
        Schema::dropIfExists('ejector_lubs');
    }
}
