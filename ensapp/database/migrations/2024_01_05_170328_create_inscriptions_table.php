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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('filiere_id')->constrained('filieres');
            $table->enum('status', ['Accepted', 'Refused', 'Pinned']);
            $table->integer('bac_note');
            $table->integer('deplome');
            $table->year('deplome_year');
            $table->integer('deplome_note');
            $table->text('files');
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
