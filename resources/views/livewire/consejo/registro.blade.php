<div>
    <x-card title="Registrar resultados de la consulta {{$consulta->name}}">
        <div class="grid grid-cols-12">
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Votos SI')}}</p>
                <p class="text-sm">
                    {{__("El número de votos a favor.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <div class="py-3 center mx-auto">
                    <x-input type="number" :label="__('Votos SI')" model="consulta.si"></x-input>
                </div>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('Votos NO')}}</p>
                <p class="text-sm">
                    {{__("El número de votos en contra.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <div class="py-3 center mx-auto">
                    <x-input type="text" :label="__('Votos NO')" model="consulta.no"></x-input>
                </div>
            </div>
            <div class="col-span-4 text-right pt-3 border-r pr-4 mb-3">
                <p class="font-bold">{{__('No votó')}}</p>
                <p class="text-sm">
                    {{__("El número de compañeros que no votaron.")}}
                </p>
            </div>
            <div class="col-span-8 pl-4 mb-3">
                <div class="py-3 center mx-auto">
                    <x-input type="text" :label="__('No votó')" model="consulta.nulo"></x-input>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <x-button icon="fas fa-plus" color="blue" click="save">Añadir consulta</x-button>
        </x-slot>
    </x-card>
</div>