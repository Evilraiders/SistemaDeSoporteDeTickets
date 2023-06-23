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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('archive')->nullable();
            $table->unsignedBigInteger('Prioridad_ID');
            $table->unsignedBigInteger('Estados_ID');
            $table->unsignedBigInteger('Agentes_ID');
            $table->dateTime('Fecha_Creacion');
            $table->dateTime('Fecha_Actualizacion');
            $table->timestamps();
    
            $table->foreign('Prioridad_ID')
                ->references('id')
                ->on('prioridades');
    
            $table->foreign('Estados_ID')
                ->references('id')
                ->on('estados');
    
            $table->foreign('Agentes_ID')
                ->references('id')
                ->on('agentes');
        });

        Schema::create('ticket_etiqueta', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('etiqueta_id');
            
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets');
    
            $table->foreign('etiqueta_id')
                ->references('id')
                ->on('etiquetas');
        });
    
        Schema::create('ticket_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('categoria_id');
            
            $table->foreign('ticket_id')
                ->references('id')
                ->on('tickets');
    
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
