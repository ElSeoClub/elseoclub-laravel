<div>
    <x-card title="Nueva consulta">
        <div class="grid grid-cols-12">
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Nombre')}}</p>
                <p class="text-sm">
                    {{__("El nombre de la consulta.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <div class="py-3 center mx-auto">
                    <x-input type="text" :label="__('Nombre')" model="name"></x-input>
                </div>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Nombre corto')}}</p>
                <p class="text-sm">
                    {{__("El nombre de la consulta corto.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <div class="py-3 center mx-auto">
                    <x-input type="text" :label="__('Nombre corto')" model="short_name"></x-input>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <x-button icon="fas fa-plus" color="blue" click="add">Añadir consulta</x-button>
        </x-slot>
    </x-card>
</div>