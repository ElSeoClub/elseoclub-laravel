<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asunto extends Model
{
    use HasFactory;

    protected $fillable = ['expediente','tipo_id'];

    public function actuaciones(){
        return $this->hasMany(Actuacion::class);
    }
}
