<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['comentarios_apertura', 'fecha','status','usuario_apertura_id','usuario_cierre_id','estado_id','action','created_at','updated_at'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function usuario_apertura(){
        return $this->belongsTo(User::class, 'usuario_apertura_id', 'id');
    }

    public function usuario_cierre(){
        return $this->belongsTo(User::class, 'usuario_cierre_id', 'id');
    }

    public function files(){
        return $this->hasMany(Attachment::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

}