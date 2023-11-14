<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
    protected $fillable = [
        'event_id',
        'location_id',
        'name',
        'label_1',
        'label_2',
        'label_3',
        'label_4',
        'label_5',
        'label_6',
        'label_7',
        'label_8',
        'label_9',
        'label_10'
    ];
    use HasFactory;
}
