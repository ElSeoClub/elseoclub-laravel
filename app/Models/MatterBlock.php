<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatterBlock extends Model
{
    use HasFactory;

    protected $fillable = ['position'];

    public function matter(){
        return $this->belongsTo(Matter::class);
    }
}
