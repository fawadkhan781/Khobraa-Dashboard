<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('rate_option')->nullable();
            $table->json('days')->nullable();
            $table->integer('duration')->nullable();
            $table->string('person')->nullable();
            $table->time('time')->nullable();
            $table->string('source')->nullable();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['rate_option', 'days', 'duration', 'person', 'time', 'source', 'date']);
        });
    }
};
