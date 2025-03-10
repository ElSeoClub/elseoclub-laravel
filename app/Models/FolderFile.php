<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FolderFile extends Model
{
    protected $guarded = [];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
