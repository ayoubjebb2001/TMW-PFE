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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->enum('etat_inscription', ['admis', 'non admis', 'en attente']);
            $table->decimal('note_bac', 4, 2);
            $table->year('annee_bac');
            $table->string('intitule_diplome');
            $table->decimal('note_diplome', 4, 2);
            $table->year('annee_diplome');
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
