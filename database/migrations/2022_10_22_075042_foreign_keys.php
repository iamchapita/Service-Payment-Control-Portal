<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('paymentDetails', function (Blueprint $table) {

            // Setting ForeignKeys
            $table->foreign('idUserFK')->references('id')->on('users');
            $table->foreign('idServiceFK')->references('id')->on('services');
            $table->foreign('idMonthFK')->references('id')->on('months');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
