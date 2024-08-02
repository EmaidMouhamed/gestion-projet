<?php

use App\Enums\Prioritee;
use App\Enums\Statut;
use App\Models\Projet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->enum('statut', Statut::getValues())->default(Statut::A_VENIR->value);
            $table->enum('prioritee', Prioritee::getValues());
            $table->date('date_limite');
            $table->foreignIdFor(Projet::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
