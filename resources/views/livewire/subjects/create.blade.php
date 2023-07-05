<x-content>
    <x-card>
        <x-container>
            <x-box class=" flex flex-col gap-3">
                Nombre del asunto o número de expediente
                <x-input-text wire:model.defer="name"></x-input-text>
                Título del asunto
                <x-input-text wire:model.defer="comments"></x-input-text>
                <x-button wire:click="create()">Crear</x-button>
            </x-box>
        </x-container>
    </x-card>
</x-content>