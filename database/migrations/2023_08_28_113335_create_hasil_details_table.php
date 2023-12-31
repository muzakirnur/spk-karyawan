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
        Schema::create('hasil_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hasil_id')->constrained();
            $table->foreignId('pelamar_id')->constrained();
            $table->float('nilai', 15,15);
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
        Schema::dropIfExists('hasil_details');
    }
};
