<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;
    protected $table = 'partida';
    protected $fillable = ['puntaje', 'usuario_id'];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
