<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eventtype;
use App\Models\Location;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function type()
    {
        return $this->belongsTo(Eventtype::Class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
