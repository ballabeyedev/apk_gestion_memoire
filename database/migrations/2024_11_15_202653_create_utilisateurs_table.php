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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id(); // ID unique
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique(); // Email unique
            $table->string('password');
            $table->string('statut')->default('etudiant'); // Par défaut "etudiant"
            $table->string('numero')->nullable(); // Champ facultatif pour le numéro de téléphone
            $table->string('etat')->default('debloquer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
