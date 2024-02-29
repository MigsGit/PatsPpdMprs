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
            $table->tinyInteger('is_accumulator')->default(0)->comment = '1-With, 2-Without';;
            $table->string('device_name');
            $table->string('material_name');
            $table->integer('machine_no');
            $table->integer('no_of_cavity');
            $table->string('color');
            $table->integer('shot_weight');
            $table->string('material_mixing_ratio_v');
            $table->string('material_mixing_ratio_r');
            $table->integer('dryer_used')->comment = '0-Oven, 1-DHD';
            $table->integer('unit_weight');
            $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';
            /*
            machine_id:
            device_name:
            no_of_cavity:
            material_mixing_ratio_v:
            material_mixing_ratio_r:
            material_name:
            material_mixing_ratio_v:
            machine_no:
            shot_weight:
            unit_weight:


            */
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
