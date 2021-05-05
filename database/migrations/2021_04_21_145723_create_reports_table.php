<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id');
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('source_id');
            $table->char('txt');
            $table->unsignedBigInteger('obj_id');
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('issue_id');
            $table->char('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
