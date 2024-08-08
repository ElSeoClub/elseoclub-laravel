<div class="p-3 grid grid-cols-1 gap-3 lg:grid-cols-2 max-w-[1200px] m-auto">
    <div class="bg-white w-full shadow border col-span-2 p-5">
        <div class="grid grid-cols-2">
            Fecha desde:
            <input type="date"  wire:model.defer="start">
            <x-jet-input-error for="start"></x-jet-input-error>
        </div>
        <div class="grid grid-cols-2">
            Fecha hasta:
            <input type="date" wire:model.defer="end">
            <x-jet-input-error for="end"></x-jet-input-error>
        </div>
        <x-button wire:click="export" color="green" class="bg-green-300 px-2 py-2 shadow rounded border border-green-600 hover:bg-green-400">Generar reporte</x-button>
    </div>
</div>
