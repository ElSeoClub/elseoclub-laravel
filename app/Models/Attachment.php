<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'r2_path',
        'r2_synced',
        'r2_synced_at',
        'name',
        'extension',
        'user_id',
        'task_id',
        'subject_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'r2_synced' => 'boolean',
        'r2_synced_at' => 'datetime',
    ];

    /**
     * Scope para obtener attachments que no están sincronizados con R2
     */
    public function scopeNotSyncedToR2($query)
    {
        return $query->where('r2_synced', false);
    }

    /**
     * Scope para obtener attachments que ya están sincronizados con R2
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
            return Storage::disk('r2')->url($this->r2_path);
        }
        
        // Para archivos locales, construir la ruta completa
        $localPath = 'storage/' . $this->path;
        return Storage::disk('public')->url($localPath);
    }

    /**
     * Verificar si el archivo existe en local
     */
    public function existsInLocal()
    {
        $localPath = 'storage/' . $this->path;
        return Storage::disk('public')->exists($localPath);
    }

    /**
     * Verificar si el archivo existe en R2
     */
    public function existsInR2()
    {
        return $this->r2_synced && $this->r2_path && Storage::disk('r2')->exists($this->r2_path);
    }
}
