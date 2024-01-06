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
            $table->id('inscription_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('filiere_id');
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->foreign('filiere_id')->references('filiere_id')->on('filieres')->onDelete('cascade');

            $table->enum('Status', ['Accepted', 'Refused', 'Pinned']);
            $table->integer('Bac_note');
            $table->integer('Deplome');
            $table->year('Deplome_year');
            $table->integer('Deplome_note');
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
