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
            $table->string('fristname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->date('hiring_date');
            $table->decimal('salary', 10, 2);
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // lié la table serviceS au niveau de la colonne id
            // cascade | set null | restrict | no action
            // $table->foreignId('service_secondaire_id')->nullable()->constrained('services')->onDelete('cascade'); 

            $table->string('photo')->nullable();
            $table->timestamps();
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
