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
        Schema::create('PaymentDetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datDate');
            $table->smallInteger('numPaid', $autoIncrement=false, $unsigned=false);
            $table->boolean('boolDeposited');
            $table->date('datDepositedDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PaymentDetail');
    }
};
