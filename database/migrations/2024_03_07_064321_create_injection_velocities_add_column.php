<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjectionVelocitiesAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('injection_velocities', function (Blueprint $table) {
            $table->string('inj_hold')->after('inj_sp2')->nullable()->comment = 'Machine 2';
            $table->string('inj_limit_v')->after('inj_hold')->nullable()->comment = 'Machine 2';
            $table->string('inj_fill')->after('inj_limit_v')->nullable()->comment = 'Machine 2';
            $table->string('inj_limit_p')->after('inj_fill')->nullable()->comment = 'Machine 2';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('injection_velocities');
    }
}
