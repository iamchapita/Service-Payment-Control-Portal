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

        Schema::table('paymentDetail', function (Blueprint $table) {

            // Setting ForeignKeys
            $table->foreign('idUserFK')->references('id')->on('user');
            $table->foreign('idServiceFK')->references('id')->on('service');
            $table->foreign('idMonthFK')->references('id')->on('month');
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
