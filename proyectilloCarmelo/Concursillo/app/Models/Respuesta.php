<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;
    protected $table = 'respuesta';
    protected $fillable = ['pregunta_id','opcion','correcta'];
    
    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
    
    
}
