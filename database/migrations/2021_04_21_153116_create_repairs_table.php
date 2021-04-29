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
            $table->char('veiktās_darbības')->nullable(true);
            $table->char('stāvoklis')->nullable(true);
            $table->date('rīcības_datums')->nullable(true);
            $table->time('rīcības_laiks')->nullable(true);
            $table->char('darbības_persona')->nullable(true);
            $table->char('piezīmes')->nullable(true);
            $table->timestamps();

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
