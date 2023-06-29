<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['matter_id','name', 'comments','user_id','metadata'];

    public function matter(){
        return $this->belongsTo(Matter::class);
    }


    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
