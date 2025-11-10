<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('veiculos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('modelo_id')->constrained('modelos');
        $table->foreignId('cor_id')->constrained('cors');
        $table->integer('ano');
        $table->integer('quilometragem');
        $table->decimal('valor', 10, 2);
        $table->text('detalhes')->nullable();

        $table->string('foto_1')->nullable(); 
        $table->string('foto_2')->nullable(); 
        $table->string('foto_3')->nullable(); 
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};

