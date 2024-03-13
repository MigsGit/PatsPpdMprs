<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoldOpensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mold_opens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->float('open_end_v')->nullable();
            $table->float('hi_velocity_2')->nullable();
            $table->float('hi_velocity_1_percent')->nullable();
            $table->float('open_v')->nullable();
            $table->float('tmp_stop_time')->nullable()->comment = 'NOTE: For Machine 1 only';
            $table->float('open_stop')->nullable();
            $table->float('low_distance')->nullable();
            $table->float('hi_velocity_1mm')->nullable();
            $table->float('tmp_stop_pos')->nullable()->comment = 'NOTE: For Machine 1 only';
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
        Schema::dropIfExists('mold_opens');
    }
}
