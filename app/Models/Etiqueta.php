<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_etiqueta', 'etiqueta_id', 'ticket_id');
    }
}

