<?php

use App\Enums\Prioritee;
use App\Enums\Statut;
use App\Models\Tache;
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
        Schema::create('sous_taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->enum('statut', Statut::getValues())->default(Statut::A_VENIR->value);
            $table->enum('prioritee', Prioritee::getValues());
            $table->date('date_limite');
            $table->foreignIdFor(Tache::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_taches');
    }
};
