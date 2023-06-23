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
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Tipo de demanda:</p>
                    <x-select wire:model.defer="metas.prioridad.meta_value">
                        <option value="0">Elige la prioridad</option>
                        <option value="1">Laboral</option>
                        <option value="2">Penal</option>
                        <option value="3">Baja</option>
                    </x-select>
                    <x-jet-input-error for="metas.prioridad.meta_value"></x-jet-input-error>
                </div>
            </x-box>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente</p>
                    <x-input-text wire:model.defer="asunto.expediente"></x-input-text>
                    <x-jet-input-error for="asunto.expediente"></x-jet-input-error>
                </div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Tipo de asunto:</p>
                    <x-select wire:model.defer="asunto.tipo_id">
                        <option value="0">Elige un tipo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                    </x-select>
                    <x-jet-input-error for="asunto.tipo_id"></x-jet-input-error>
                </div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Demandado:</p>
                    <x-select wire:model.defer="metas.demandado.meta_value">
                        <option value="0">Elige un demandado</option>
                        <option value="CFE y SUTERM">CFE Y SUTERM</option>
                        <option value="CFE">CFE</option>
                        <option value="SUTERM">SUTERM</option>
                    </x-select>
                    <x-jet-input-error for="metas.demandado.meta_value"></x-jet-input-error>
                </div>
            </x-box>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Fecha de presentación del asunto:</p>
                    <x-input-date wire:model.defer="metas.fecha_presentacion.meta_value"></x-input-date>
                    <x-jet-input-error for="metas.fecha_presentacion.meta_value"></x-jet-input-error>
                </div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Abogado a cargo:</p>
                    <x-select wire:model.defer="asunto.user_id">
                        <option value="0">Elige un abogado</option>
                        @foreach($abogados as $abogado)
                            <option value="{{$abogado->id}}">{{$abogado->name}}</option>
                        @endforeach
                    </x-select>
                    <x-jet-input-error for="asunto.user_id"></x-jet-input-error>
                </div>
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Acción ejercida:</p>
                    <x-select wire:model.defer="metas.accion_ejercida.meta_value">
                        <option value="0">Elige una acción</option>
                        <option value="Acoso">Acoso</option>
                        <option value="Beneficiarios">Beneficiarios</option>
                        <option value="CIJUBILA">CIJUBILA</option>
                        <option value="Derechos sindicales">Derechos sindicales</option>
                        <option value="Diferencias salariales">Diferencias salariales</option>
                        <option value="Escrituración">Escrituración</option>
                        <option value="Equidad de genero">Equidad de genero</option>
                        <option value="FHSSTE">FHSSTE</option>
                        <option value="Fondo mutualista">Fondo mutualista</option>
                        <option value="Incapacidad">Incapacidad</option>
                        <option value="Indemnización constitucional y salarios caídos">Indemnización constitucional y salarios caídos</option>
                        <option value="INFONAVIT">INFONAVIT</option>
                        <option value="Jubilación y prestaciones derivadas">Jubilación y prestaciones derivadas</option>
                        <option value="Nulidad clausulas convenios y finiquitos">Nulidad clausulas convenios y finiquitos</option>
                        <option value="Pago de prestaciones contractuales">Pago de prestaciones contractuales</option>
                        <option value="Plaza">Plaza</option>
                        <option value="Reconocimiento de antigüedad">Reconocimiento de antigüedad</option>
                        <option value="Reinstalación  y salarios caídos">Reinstalación  y salarios caídos</option>
                        <option value="Relación de trabajo SUTERM">Relación de trabajo SUTERM</option>
                        <option value="Seguro de vida">Seguro de vida</option>
                    </x-select>
                    <x-jet-input-error for="metas.accion_ejercida.meta_value"></x-jet-input-error>
                </div>
            </x-box>
    
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Promueve</p>
                    <x-input-text wire:model.defer="metas.actor.meta_value"></x-input-text>
                    <x-jet-input-error for="metas.actor.meta_value"></x-jet-input-error>
                </div>
            </x-box>
        </x-container>
        
        <x-slot name="footer">
            <x-button click="create()">Crear asunto</x-button>
        </x-slot>
    </x-card>
</section>
