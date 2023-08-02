<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_teoris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained();
            $table->char('q1');
            $table->char('q2');
            $table->char('q3');
            $table->char('q4');
            $table->char('q5');
            $table->char('q6');
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
        Schema::dropIfExists('tes_teoris');
    }
};
