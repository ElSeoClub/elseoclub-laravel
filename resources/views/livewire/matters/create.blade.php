<x-content>
    <x-card class="mt-5">
        <x-container>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Nombre:</p>
                <x-input-text wire:model.defer="name"></x-input-text>
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>
        </x-box>
        </x-container>
        <x-slot name="footer">
            <x-button color="blue" icon="fas fa-plus" class="w-full lg:w-96" click="create()">Crear tema</x-button>
        </x-slot>
    </x-card>
</x-content>
