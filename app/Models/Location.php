<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Door;
use App\Models\Event;

class Location extends Model
{
    use HasFactory;

    public function doors()
    {
        return $this->hasMany(Door::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
