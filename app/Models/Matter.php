<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function blocks(){
        return $this->hasMany(MatterBlock::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
