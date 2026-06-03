<?php

use App\CommitmentType;
use App\Services\Slug;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommitmentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up(): void
    {
        Schema::create('commitment_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("short");
            $table->string("slug")->unique();
            $table->string("name");
            $table->string("aaoName");
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
        Schema::dropIfExists('commitment_types');
    }
}
