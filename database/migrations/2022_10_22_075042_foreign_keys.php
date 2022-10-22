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

        Schema::table('PaymentDetail', function (Blueprint $table) {

            // Setting ForeignKeys
            $table->foreign('idUserFK')->references('id')->on('User');
            $table->foreign('idServiceFK')->references('id')->on('Service');
            $table->foreign('idMonthFK')->references('id')->on('Month');
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
