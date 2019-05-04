<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidFieldToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('paid')->after('cpf');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
