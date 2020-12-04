<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAngsuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_angsurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angsuran_id');
            $table->foreign('angsuran_id')->references('id')->on('angsurans')->onDelete('cascade');
            $table->date('jatuh_tempo');
            $table->integer('besar_angsuran');
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
        Schema::dropIfExists('detail_angsurans');
    }
}
