<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuacion extends Model
{
    use HasFactory;

    protected $fillable = ['comentarios_apertura', 'fecha','status'];

    public function asunto(){
        return $this->belongsTo(Asunto::class);
    }
}
