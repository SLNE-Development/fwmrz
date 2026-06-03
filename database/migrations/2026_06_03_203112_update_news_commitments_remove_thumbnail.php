<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("commitments", function (Blueprint $table) {
            $table->dropColumn("thumbnail");
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("commitments", function (Blueprint $table) {
            $table->string("thumbnail")->nullable();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->string('thumbnail')->nullable();
        });
    }
};
