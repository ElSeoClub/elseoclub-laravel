<?php

namespace App\Jobs;

use App\Models\Attachment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SyncAttachmentsToR2 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300; // 5 minutos
    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Obtener attachments que no están sincronizados con R2
        $attachments = Attachment::notSyncedToR2()
            ->whereNotNull('path')
            ->limit(10) // Procesar máximo 10 archivos por ejecución
            ->get();

        if ($attachments->isEmpty()) {
            Log::info('No hay attachments pendientes de sincronizar con R2');
            return;
        }

        $successCount = 0;
        $errorCount = 0;

        foreach ($attachments as $attachment) {
            try {
                $this->syncAttachmentToR2($attachment);
                $successCount++;
                Log::info("Archivo sincronizado exitosamente: {$attachment->name}");
            } catch (\Exception $e) {
                $errorCount++;
                Log::error("Error sincronizando archivo {$attachment->name}: " . $e->getMessage());
            }
        }

        Log::info("Job SyncAttachmentsToR2 completado. Exitosos: {$successCount}, Errores: {$errorCount}");
    }

    /**
     * Sincronizar un attachment específico a R2
     */
    private function syncAttachmentToR2(Attachment $attachment)
    {
        // Verificar que el archivo existe en local
        if (!Storage::disk('local')->exists($attachment->path)) {
            throw new \Exception("El archivo no existe en local: {$attachment->path}");
        }

        // Generar ruta para R2 (mantener estructura similar)
        $r2Path = 'attachments/' . date('Y/m/d') . '/' . $attachment->id . '_' . $attachment->name . '.' . $attachment->extension;

        // Leer el contenido del archivo local
        $fileContent = Storage::disk('local')->get($attachment->path);

        // Subir a R2
        $uploaded = Storage::disk('r2')->put($r2Path, $fileContent);

        if (!$uploaded) {
            throw new \Exception("No se pudo subir el archivo a R2: {$attachment->name}");
        }

        // Actualizar el attachment en la base de datos
        $attachment->update([
            'r2_path' => $r2Path,
            'r2_synced' => true,
            'r2_synced_at' => now(),
        ]);
    }

    /**
     * Handle a job failure.
     */
    public function failed(\Throwable $exception)
    {
        Log::error('Job SyncAttachmentsToR2 falló: ' . $exception->getMessage());
    }
}
