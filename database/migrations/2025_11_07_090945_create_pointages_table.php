<?php

/*use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*public function up(): void
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
    /*public function down(): void
    {
        Schema::dropIfExists('pointages');

    }
};*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pointages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('heure_arrivee')->nullable();
            $table->time('heure_depart')->nullable();
            $table->enum('statut', ['présent', 'absent', 'retard', 'congé'])->default('absent');
            $table->text('justification')->nullable();
            $table->integer('duree_travail')->default(0); // en minutes
            $table->timestamps();
            
            // Index pour optimiser les recherches
            $table->index(['employe_id', 'date']);
            $table->unique(['employe_id', 'date']); // Un pointage par jour par employé
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pointages');
    }
};
