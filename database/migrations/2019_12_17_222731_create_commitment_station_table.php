<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitmentStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('commitment_station', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("commitment_id")->constrained("commitments")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("station_id")->constrained("stations")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('commitment_station');
    }
}
