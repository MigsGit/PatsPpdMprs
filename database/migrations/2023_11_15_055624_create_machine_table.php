<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('machine_name');
            $table->string('machine_category')->nullable()->default(1)->comment = '0- Form1, 1-Form2';
            $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';

            // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            // $table->tinyInteger('is_deleted')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
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
        Schema::dropIfExists('machine');
    }
}
