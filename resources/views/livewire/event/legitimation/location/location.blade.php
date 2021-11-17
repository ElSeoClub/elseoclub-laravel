<div>
    <x-card>
        <div class="grid grid-cols-12">
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Convocatoria')}}</p>
                <p class="text-sm">
                    {{__("Elige el archivo de la convocatoria de la sede.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <div class="py-3 center mx-auto">
                    <div class="bg-white px-4 py-5 rounded-lg text-center w-72">
                        <label class="cursor-pointer mt-6 mb-5">
                            <span
                                class="mt-2 text-base leading-normal px-4 py-2 bg-blue-500 text-white text-sm rounded-full">
                                {{__('Elegir convocatoria')}}
                            </span>
                            <input type='file' class="hidden" wire:model="convocatoria" />
                        </label>
                        <x-jet-input-error for="convocatoria" class="mt-5"></x-jet-input-error>
                    </div>
                </div>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('# Boletas')}}</p>
                <p class="text-sm">
                    {{__("Elige la cantidad de boletas entregadas en la sede.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <x-input type="numeric" model="location.boletas"></x-input>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Dirección')}}</p>
                <p class="text-sm">
                    {{__("Es la dirección donde se realizara la la votación.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <x-input type="numeric" model="location.description"></x-input>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Ubicación GPS')}}</p>
                <p class="text-sm">
                    {{__("Es la liga de la ubicación GPS.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <x-input type="numeric" model="location.georeferences"></x-input>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Horario')}}</p>
                <p class="text-sm">
                    {{__("Es el horario en el que se realizará la votación (8:00 a 18:00 hrs).")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <x-input type="numeric" model="location.schedule"></x-input>
            </div>
        </div>
        <x-slot name="footer">
            <x-button icon="fas fa-save" color="blue" click="save">Guardar cambios</x-button>
        </x-slot>
    </x-card>
</div>