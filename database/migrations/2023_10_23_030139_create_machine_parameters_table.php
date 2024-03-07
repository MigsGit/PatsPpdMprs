<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('machine_id')->unsigned();
            $table->tinyInteger('is_accumulator')->nullable()->default(0)->comment = '1-With, 2-Without | Machine 2 w/out this column';
            $table->string('device_name')->nullable();
            $table->string('material_name')->nullable();
            $table->integer('machine_no')->nullable();
            $table->integer('no_of_cavity')->nullable();
            $table->string('color')->nullable();
            $table->integer('shot_weight')->nullable();
            $table->string('material_mixing_ratio_v')->nullable();
            $table->string('material_mixing_ratio_r')->nullable();
            $table->integer('dryer_used')->nullable()->comment = '0-Oven, 1-DHD';
            $table->integer('unit_weight')->nullable();
            $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';
            // Foreign key
            $table->foreign('machine_id')->references('id')->on('machine'); // foreign id sa table, references id sa pagkukunan, on pagkukunan na table

           // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->softDeletes()->nullable();
            $table->timestamps();
            //17
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('machine_parameters', function (Blueprint $table) {
        //     $table->dropForeign('machine_id');
        //     $table->dropColumn('machine_id');
        // });

        Schema::dropIfExists('machine_parameters');
    }
}
