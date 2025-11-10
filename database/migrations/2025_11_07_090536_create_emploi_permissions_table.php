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
        Schema::create('emploi_permissions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('message');
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploi_permissions');
    }
};
