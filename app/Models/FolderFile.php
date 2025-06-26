<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class FolderFile extends Model
{
    protected $guarded = [];

    protected $casts = [
        'r2_synced' => 'boolean',
        'r2_synced_at' => 'datetime',
    ];

    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    /**
     * Scope para obtener archivos que no están sincronizados con R2
     */
    public function scopeNotSyncedToR2($query)
    {
        return $query->where('r2_synced', false);
    }

    /**
     * Scope para obtener archivos que ya están sincronizados con R2
     */
    public function scopeSyncedToR2($query)
    {
        return $query->where('r2_synced', true);
    }

    /**
     * Obtener la URL del archivo (local o R2 según corresponda)
     */
    public function getFileUrlAttribute()
    {
        if ($this->r2_synced && $this->r2_path) {
            // En R2, el path real es storage/ + r2_path
            return Storage::disk('r2')->url('storage/' . $this->r2_path);
        }
        // En local, el path es directo en public
        return Storage::disk('public')->url($this->path);
    }

    /**
     * Verificar si el archivo existe en public storage
     */
    public function existsInLocal()
    {
        return Storage::disk('public')->exists($this->path);
    }

    /**
     * Verificar si el archivo existe en R2
     */
    public function existsInR2()
    {
        return $this->r2_synced && $this->r2_path && Storage::disk('r2')->exists('storage/' . $this->r2_path);
    }
}
