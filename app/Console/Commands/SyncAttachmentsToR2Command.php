<?php

namespace App\Console\Commands;

use App\Models\Attachment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SyncAttachmentsToR2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attachments:sync-to-r2 {--limit=10 : Número de archivos a procesar}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronizar attachments de local a R2';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Configurar límites para comandos largos
        set_time_limit(0); // Sin límite de tiempo
        ini_set('memory_limit', '512M'); // Aumentar límite de memoria
        
        $limit = (int) $this->option('limit');

        // Contar attachments pendientes
        $pendingCount = Attachment::notSyncedToR2()->whereNotNull('path')->count();
        $syncedCount = Attachment::syncedToR2()->count();

        $this->info("=== Sincronización de Attachments a R2 ===");
        $this->info("Archivos ya sincronizados: {$syncedCount}");
        $this->info("Archivos pendientes: {$pendingCount}");
        $this->info("Archivos a procesar en esta ejecución: {$limit}");

        if ($pendingCount === 0) {
            $this->info("No hay archivos pendientes de sincronizar.");
            return 0;
        }

        // Obtener attachments a procesar
        $attachments = Attachment::notSyncedToR2()
            ->whereNotNull('path')
            ->limit($limit)
            ->get();

        $this->info("Iniciando sincronización...");
        
        $bar = $this->output->createProgressBar($attachments->count());
        $bar->start();

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
                $this->error("Error con {$attachment->name}: " . $e->getMessage());
            }
            
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Sincronización completada. Exitosos: {$successCount}, Errores: {$errorCount}");

        return 0;
    }

    /**
     * Sincronizar un attachment específico a R2
     */
    private function syncAttachmentToR2(Attachment $attachment)
    {
        // Verificar que el archivo existe en public storage
        if (!Storage::disk('public')->exists($attachment->path)) {
            throw new \Exception("El archivo no existe en public storage: {$attachment->path}");
        }

        // El path en R2 debe ser storage/ + path
        $r2Path = 'storage/' . $attachment->path;

        // Leer el contenido del archivo desde public storage
        $fileContent = Storage::disk('public')->get($attachment->path);

        // Subir a R2
        $uploaded = Storage::disk('r2')->put($r2Path, $fileContent);

        if (!$uploaded) {
            throw new \Exception("No se pudo subir el archivo a R2: {$attachment->path}");
        }

        // Actualizar el attachment en la base de datos
        $attachment->update([
            'r2_path' => $attachment->path,
            'r2_synced' => true,
            'r2_synced_at' => now(),
        ]);
    }
}
