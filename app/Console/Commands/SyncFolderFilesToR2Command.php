<?php

namespace App\Console\Commands;

use App\Models\FolderFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SyncFolderFilesToR2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'folder-files:sync-to-r2 {--limit=10 : Número de archivos a procesar}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sincronizar archivos de FolderFile de local a R2';

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
        // Configurar límites para comandos largos
        set_time_limit(0); // Sin límite de tiempo
        ini_set('memory_limit', '512M'); // Aumentar límite de memoria
        
        $limit = (int) $this->option('limit');

        // Contar archivos pendientes
        $pendingCount = FolderFile::notSyncedToR2()->whereNotNull('path')->count();
        $syncedCount = FolderFile::syncedToR2()->count();

        $this->info("=== Sincronización de FolderFiles a R2 ===");
        $this->info("Archivos ya sincronizados: {$syncedCount}");
        $this->info("Archivos pendientes: {$pendingCount}");
        $this->info("Archivos a procesar en esta ejecución: {$limit}");

        if ($pendingCount === 0) {
            $this->info("No hay archivos pendientes de sincronizar.");
            return 0;
        }

        // Obtener archivos a procesar
        $files = FolderFile::notSyncedToR2()
            ->whereNotNull('path')
            ->limit($limit)
            ->get();

        $this->info("Iniciando sincronización...");
        
        $bar = $this->output->createProgressBar($files->count());
        $bar->start();

        $successCount = 0;
        $errorCount = 0;

        foreach ($files as $file) {
            try {
                $this->syncFileToR2($file);
                $successCount++;
                Log::info("Archivo sincronizado exitosamente: {$file->name}");
            } catch (\Exception $e) {
                $errorCount++;
                Log::error("Error sincronizando archivo {$file->name}: " . $e->getMessage());
                $this->error("Error con {$file->name}: " . $e->getMessage());
            }
            
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Sincronización completada. Exitosos: {$successCount}, Errores: {$errorCount}");

        return 0;
    }

    /**
     * Sincronizar un archivo específico a R2
     */
    private function syncFileToR2(FolderFile $file)
    {
        // Verificar que el archivo existe en public storage
        if (!Storage::disk('public')->exists($file->path)) {
            throw new \Exception("El archivo no existe en public storage: {$file->path}");
        }

        // El path en R2 debe ser storage/ + path
        $r2Path = 'storage/' . $file->path;

        // Leer el contenido del archivo desde public storage
        $fileContent = Storage::disk('public')->get($file->path);

        // Subir a R2
        $uploaded = Storage::disk('r2')->put($r2Path, $fileContent);

        if (!$uploaded) {
            throw new \Exception("No se pudo subir el archivo a R2: {$file->path}");
        }

        // Actualizar el archivo en la base de datos
        $file->update([
            'r2_path' => $file->path,
            'r2_synced' => true,
            'r2_synced_at' => now(),
        ]);
    }
}
