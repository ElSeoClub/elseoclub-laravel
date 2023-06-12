<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Door;
use App\Models\Event;
use App\Models\User;
use App\Models\Event\Archive;
use App\Models\Event\Evidence;
use App\Models\Result;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function doors()
    {
        return $this->hasMany(Door::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function archives()
    {
        return $this->hasMany(Archive::class);
    }

    public function evidences()
    {
        return $this->hasMany(Evidence::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function guests()
    {
        return $this->belongsToMany(User::class, 'guests', 'location_id')->withPivot(['event_id', 'door_id', 'attendance_location_id', 'attendance_door_id', 'manager_id']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function favor($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->favor ?? 0;
    }

    public function contra($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->contra ?? 0;
    }

    public function nulos($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->nulos ?? 0;
    }

    public function p1($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->p1 ?? 0;
    }
    public function p2($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->p2 ?? 0;
    }
    public function p3($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->p3 ?? 0;
    }
    public function p4($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->p4 ?? 0;
    }


    public function pc1($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->pc1 ?? null;
    }
    public function pc2($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->pc2 ?? null;
    }
    public function pc3($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->pc3 ?? null;
    }
    public function pc4($votation_id)
    {
        return $this->results()->where('votation_id', $votation_id)->first()->pc4 ?? null;
    }
}
