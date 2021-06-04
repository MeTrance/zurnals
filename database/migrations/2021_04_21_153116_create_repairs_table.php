<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id');
            $table->char('txt');
            $table->unsignedBigInteger('state_id');
            $table->date('date');
            $table->time('time');
            $table->unsignedBigInteger('person_id');
            $table->char('note')->nullable(true);

            // Indexejam report, lai atrak querry
            $table->index('report_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
