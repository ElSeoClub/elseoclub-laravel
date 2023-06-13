<section class="flex flex-col gap-5">
    <x-card title="Datos principales">
        <x-jet-validation-errors></x-jet-validation-errors>
        <x-container>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Prioridad:</p>
                    <x-select wire:model.defer="metas.prioridad.meta_value">
                        <option value="0">Elige la prioridad</option>
                        <option value="1">Alta</option>
                        <option value="2">Media</option>
                        <option value="3">Baja</option>
                    </x-select>
                    <x-jet-input-error for="metas.prioridad.meta_value"></x-jet-input-error>
                </div>
                <div></div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Estado procesal del asunto:</p>
                    <x-select wire:model.defer="metas.estado_procesal.meta_value">
                        <option value="0">Elige el estatus</option>
                        <option value="1">Ofrecimiento de pruebas</option>
                    </x-select>
                    <x-jet-input-error for="metas.estado_procesal.meta_value"></x-jet-input-error>
                </div>
            </x-box>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente</p>
                    <x-input-text wire:model.defer="asunto.expediente"></x-input-text>
                    <x-jet-input-error for="asunto.expediente"></x-jet-input-error>
                </div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Tipo:</p>
                    <x-select wire:model.defer="asunto.tipo_id">
                        <option value="0">Elige un tipo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                    </x-select>
                    <x-jet-input-error for="asunto.tipo_id"></x-jet-input-error>
                </div>
            </x-box>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Fecha de presentación del asunto:</p>
                    <x-input-date></x-input-date>
                </div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Abogado a cargo:</p>
                    <x-select wire:model.defer="asunto.user_id">
                        @foreach($abogados as $abogado)
                            <option value="{{$abogado->id}}">{{$abogado->name}}</option>
                        @endforeach
                    </x-select>
                </div>
            </x-box>
        </x-container>
        
        <x-slot name="footer">
            <x-button click="create()">Crear asunto</x-button>
        </x-slot>
    </x-card>
</section>
