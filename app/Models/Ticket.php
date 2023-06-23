<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'archive',
        'Prioridad_ID',
        'Estados_ID',
        'Agentes_ID',
        'Fecha_Creacion',
        'Fecha_Actualizacion',
    ];

    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'Prioridad_ID');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'Estados_ID');
    }

    public function agente()
    {
        return $this->belongsTo(Agente::class, 'Agentes_ID');
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class, 'ticket_etiqueta', 'ticket_id', 'etiqueta_id');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'ticket_categoria', 'ticket_id', 'categoria_id');
    }
}
