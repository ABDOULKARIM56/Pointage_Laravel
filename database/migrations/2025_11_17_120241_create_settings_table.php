<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('settings', function (Blueprint $table) {
        $table->id();

        // Horaires
        $table->time('start_time')->nullable();
        $table->time('break_time')->nullable();
        $table->time('resume_time')->nullable();
        $table->time('end_time')->nullable();

        // Jours ouvrables (JSON : ["Lundi","Mardi",...])
        $table->json('workdays')->nullable();

        // Retard / Tolérance
        $table->integer('tolerance_minutes')->default(10);
        $table->integer('sanction_after')->default(3);

        // Textes
        $table->text('conditions')->nullable();
        $table->text('obligations')->nullable();
        $table->text('sanctions')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
