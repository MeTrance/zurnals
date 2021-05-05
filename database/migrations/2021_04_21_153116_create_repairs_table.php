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
            $table->unsignedBigInteger('report_id')->nullable(true);
            $table->char('txt')->nullable(true);
            $table->unsignedBigInteger('state_id')->nullable(true);
            $table->date('date')->nullable(true);
            $table->time('time')->nullable(true);
            $table->unsignedBigInteger('person_id')->nullable(true);
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
