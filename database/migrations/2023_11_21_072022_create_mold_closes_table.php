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
            $table->string('hiv');
            $table->string('mid_slow');
            $table->string('low_l');
            $table->string('slow_start');
            $table->string('slow_end');
            $table->string('lvlp');
            $table->string('hpcl');
            $table->string('mid_slp');
            $table->string('low_p');
            $table->string('hi_p')->comment = '0-KN, 1-%';
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
        Schema::dropIfExists('mold_closes');
    }
}
