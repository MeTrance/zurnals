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
            $table->date('ziņojuma_datums');
            $table->time('laiks');
            $table->char('atskaitošā_persona');
            $table->char('avots');
            $table->char('ziņojuma_apraksts');
            $table->char('atrašanās_vieta');
            $table->char('ierīces_tips');
            $table->char('problēmas_veids');
            $table->char('piezīmes');
            $table->timestamps();
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
