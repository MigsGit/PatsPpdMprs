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
            $table->string('open_end_v');
            $table->string('hi_velocity2');
            $table->string('hi_velocity1_percent');
            $table->string('open_v');
            $table->string('open_stop');
            $table->string('low_distance');
            $table->string('hi_velocity1_mm');
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
        Schema::dropIfExists('mold_opens');
    }
}
