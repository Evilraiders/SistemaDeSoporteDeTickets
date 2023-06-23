<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'Ticket_ID',
        'Usuario_ID',
        'Content',
        'date',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'Ticket_ID');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuario_ID');
    }
}

