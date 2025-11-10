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
        Schema::create('pointages', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->string('statut');
            $table->string('justification');
            $table->date('date');
            $table->date('date_arrive');
            $table->date('date_depart');
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pointages');

    }
};
