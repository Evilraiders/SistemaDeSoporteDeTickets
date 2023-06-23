<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_categoria', 'categoria_id', 'ticket_id');
    }
}

