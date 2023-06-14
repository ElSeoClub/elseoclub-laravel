<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bitacora_id', 'comentarios', 'pin'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function childs(){
        return $this->hasMany(Bitacora::class);
    }
}
