<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_name');
            $table->integer('rapidx_id');
            $table->string('department');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('username');
            $table->string('status')->nullable()->default(1)->comment = '0-Not Active, 1-Active';
            $table->unsignedBigInteger('user_level')->comment = '1-Engineer, 2-Machine Operator';

           // Defaults
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            // $table->tinyInteger('is_deleted')->nullable()->default(0)->comment = '0-Active, 1-Deleted';
            $table->timestamps();

            // Foreign key
            // $table->foreign('user_level_id')->references('id')->on('user_levels');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_management');
    }
}
