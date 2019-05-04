<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCpfToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf')->after('name')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
