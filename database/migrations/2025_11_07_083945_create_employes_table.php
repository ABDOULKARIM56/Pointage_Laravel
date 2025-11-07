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
            $table->string('adress');
            $table->string('password');
            $table->string('fonction');
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
