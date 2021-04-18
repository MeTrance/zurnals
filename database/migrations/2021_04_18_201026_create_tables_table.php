<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->date('ziņojuma datums');
            $table->time('laiks');
            $table->char('nedēļa');
            $table->char('atskaitošā persona');
            $table->char('avots');
            $table->char('ziņojuma apraksts');
            $table->char('atrašanās vieta');
            $table->char('ierīces tips');
            $table->char('problēmas veids');
            $table->char('piezīmes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
