<?php

namespace App\Console\Commands;

use App\Jobs\SyncAttachmentsToR2;
use App\Models\Attachment;
use Illuminate\Console\Command;

class SyncAttachmentsToR2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attachments:sync-to-r2 {--limit=10 : Número de archivos a procesar} {--queue : Ejecutar en cola}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronizar attachments de local a R2';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = (int) $this->option('limit');
        $useQueue = $this->option('queue');

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

        if ($useQueue) {
            // Ejecutar en cola
            SyncAttachmentsToR2::dispatch();
            $this->info("Job enviado a la cola para procesamiento.");
        } else {
            // Ejecutar inmediatamente
            $this->info("Iniciando sincronización...");
            
            $attachments = Attachment::notSyncedToR2()
                ->whereNotNull('path')
                ->limit($limit)
                ->get();

            $bar = $this->output->createProgressBar($attachments->count());
            $bar->start();

            $successCount = 0;
            $errorCount = 0;

            foreach ($attachments as $attachment) {
                try {
                    // Crear una instancia del job y ejecutar el método directamente
                    $job = new SyncAttachmentsToR2();
                    $reflection = new \ReflectionClass($job);
                    $method = $reflection->getMethod('syncAttachmentToR2');
                    $method->setAccessible(true);
                    $method->invoke($job, $attachment);
                    
                    $successCount++;
                } catch (\Exception $e) {
                    $errorCount++;
                    $this->error("Error con {$attachment->name}: " . $e->getMessage());
                }
                
                $bar->advance();
            }

            $bar->finish();
            $this->newLine();
            $this->info("Sincronización completada. Exitosos: {$successCount}, Errores: {$errorCount}");
        }

        return 0;
    }
}
