<div>
    <x-card title="Crear nueva la legitimación" icon="fas fa-plus">
        <div class="grid grid-cols-12">
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">Nombre</p>
                <p class="text-sm">
                    Nombre de la tematica de votación
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <x-input type="text" label="Tema" model="name"></x-input>
            </div>

        </div>
        <x-slot name="footer">
            <x-button icon="fas fa-plus" color="blue" click="create()">Crear tema</x-button>
        </x-slot>
    </x-card>
</div>