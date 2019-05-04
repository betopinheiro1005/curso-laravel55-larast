<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupIdToNoteTables extends Migration
{
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedInteger('group_id')->nullable()->after('id');

            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            //
        });
    }
}
