<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;

    public $timestamps = false; // Desativa os timestamps automáticos

    protected $fillable = [
        'tipoFeedback',
        'setor',
        'comentario',
    ];

}
