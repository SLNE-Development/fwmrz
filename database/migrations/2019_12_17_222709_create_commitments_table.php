<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('commitments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title");
            $table->string("slug");
            $table->longText("body")->nullable();
            $table->dateTime("start");
            $table->foreignId("user_id")->nullable()->constrained("users")->nullOnDelete()->nullOnUpdate();
            $table->foreignId("commitment_type_id")->nullable()->constrained("commitment_types")->nullOnDelete()->nullOnUpdate();
            $table->string("thumbnail");
            $table->integer("publicity");
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
        Schema::dropIfExists('commitments');
    }
}
