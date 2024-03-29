<?php

use App\Models\User;
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
        Schema::create('User', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('texName');
            $table->boolean('boolStatus');
            $table->boolean('boolAdminStatus')->default(0);
            $table->string('password')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->rememberToken()->nullable();
        });

        $user = new User();
        $user->texName = 'Alejandro';
        $user->boolStatus = true;
        $user->boolAdminStatus = true;
        $user->password = "IngeAlejandro98";

        $user->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User');
    }
};
