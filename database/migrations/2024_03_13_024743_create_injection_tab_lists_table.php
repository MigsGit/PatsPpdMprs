<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjectionTabListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injection_tab_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('machine_parameter_id')->unsigned();
            $table->string('inj_tab_list_mo_day')->nullable();
            $table->float('inj_tab_list_shot_count')->nullable();
            $table->string('inj_tab_list_operator_name')->nullable();
            $table->string('inj_tab_list_mat_time_in')->nullable();
            $table->string('inj_tab_list_prond_time_start')->nullable();
            $table->string('inj_tab_list_prond_time_end')->nullable();
            $table->string('inj_tab_list_total_mat_dring_time')->nullable();
            $table->string('inj_tab_list_mat_lot_num_virgin')->nullable();
            $table->string('inj_tab_list_mat_lot_num_recycle')->nullable();
            $table->string('inj_tab_list_remarks')->nullable();
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
        Schema::dropIfExists('injection_tab_lists');
    }
}
