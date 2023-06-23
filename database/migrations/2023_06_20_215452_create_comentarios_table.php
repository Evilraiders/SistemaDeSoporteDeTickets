<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Agente;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Estado;
use App\Models\Etiqueta;
use App\Models\Prioridad;
use App\Models\Rol;
use App\Models\Ticket;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Ticket_ID');
            $table->unsignedBigInteger('Usuario_ID');
            $table->string('Content');
            $table->dateTime('date');
            $table->timestamps();
    
            $table->foreign('Ticket_ID')
                ->references('id')
                ->on('tickets');
    
            $table->foreign('Usuario_ID')
                ->references('id')
                ->on('users');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
