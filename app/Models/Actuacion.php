<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuacion extends Model
{
    use HasFactory;

    protected $fillable = ['comentarios_apertura', 'fecha','status','usuario_apertura_id','usuario_cierre_id','estado_id'];

    public function asunto(){
        return $this->belongsTo(Asunto::class);
    }

    public function usuario_apertura(){
        return $this->belongsTo(User::class, 'usuario_apertura_id', 'id');
    }

    public function files(){
        return $this->hasMany(Archivo::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
