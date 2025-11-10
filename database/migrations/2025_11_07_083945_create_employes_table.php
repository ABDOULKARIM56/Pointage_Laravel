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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom'); 
            $table->string('prenom');
            $table->string('matricule');
            $table->string('email');
            $table->string('nationnalite');
            $table->string('genre');
            $table->string('etat_civil');
            $table->string('numero');
            $table->string('adresse');
            $table->string('password');
            $table->string('role');
            $table->string('date_naissance');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
