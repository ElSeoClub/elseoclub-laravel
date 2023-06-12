<div>
    <div class="w-full h-14 flex bg-white flex justify-center">
        <div class="w-full flex max-w-[480px] justify-center">
            <div wire:click="view('info')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'info')  border-red-400 @endif"><img src="{{asset('svg/info.png')}}" width="26" alt=""></div>
            <div wire:click="view('archivos')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'archivos')  border-red-400 @endif"><img src="{{asset('svg/files.png')}}" width="26" alt=""></div>
            <div wire:click="view('dinero')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'dinero')  border-red-400 @endif"><img src="{{asset('svg/money-bag.png')}}" width="26" alt=""></div>
            <div wire:click="view('actuaciones')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'actuaciones')  border-red-400 @endif"><img src="{{asset('svg/wall-clock.png')}}" width="26" alt=""></div>
            <div wire:click="view('configuracion')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'configuracion')  border-red-400 @endif"><img src="{{asset('svg/cog.png')}}" width="26" alt=""></div>
        </div>
    </div>
    <div class="max-w-[1200px] mx-auto">
        @if($view == 'info')
            <x-card title="Datos principales">
                <x-container>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Prioridad:</p>
                            <x-select>
                                <option value="">Alta</option>
                                <option value="">Media</option>
                                <option value="">Baja</option>
                            </x-select>
                        </div>
                        <div></div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Estado procesal del asunto:</p>
                            <x-select>
                                <option value="">Ofrecimiento de pruebas</option>
                            </x-select>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente de la autoridad:</p>
                            <x-input-text></x-input-text>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente interno:</p>
                            <x-input-text></x-input-text>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente auxiliar:</p>
                            <x-input-text></x-input-text>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Promueve:</p>
                            <x-select>
                                <option value="">CFE</option>
                            </x-select>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Fecha de presentación del asunto:</p>
                            <x-input-date></x-input-date>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Abogado a cargo:</p>
                            <x-select>
                                <option value="">Lucio Vargas Galvan</option>
                            </x-select>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Ubicación geográfica de la problemática (Entidad):</p>
                            <x-select>
                                <option value="">CIUDAD DE MÉXICO</option>
                            </x-select>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Municipio:</p>
                            <x-select>
                                <option value="">MIGUEL HIDALGO</option>
                            </x-select>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Promovente:</p>
                            <x-input-text></x-input-text>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Promovido:</p>
                            <x-input-text></x-input-text>
                        </div>
                    </x-box>
                </x-container>
            </x-card>
        @elseif($view == 'actuaciones')
            <x-button click="view('agregar_actuacion')">Agregar actuación</x-button>
            <div class="flex flex-col divide-y bg-white border rounded shadow">
                @foreach($asunto->fresh()->actuaciones as $actuacion)
                    <div class="flex gap-3 p-4" wire:click="editarActuacion({{$actuacion->id}})">
                        <div class="text-xs flex items-center @if($actuacion->status == 0) text-gray-300 @else text-green-600 @endif"><i class="fas fa-circle"></i></div>
                        <div>{{$actuacion->fecha}}</div>
                        <div class="truncate flex-grow">{{$actuacion->comentarios_apertura}}</div>
                    </div>
                @endforeach
            </div>
        @elseif($view == 'agregar_actuacion')
            <x-card title="Nueva actuación">
                <textarea wire:model="actuationComment" placeholder="Comentarios de la actuación"></textarea>
                <input type="datetime-local" wire:model.defer="actuationDate">
                <x-slot name="footer">
                    <x-button click="agregarActuacion()">Agregar actuación</x-button>
                </x-slot>
            </x-card>
        @elseif($view == 'editarActuacion')
            <x-card title="Actuación">
                <span class="font-bold">Comentarios de apertura</span>
                <textarea disabled class="bg-gray-200 w-full">{{$actuacion->comentarios_apertura}}</textarea>
                <span class="font-bold">Comentarios de cierre</span>
                @if($actuacion->status == 1)
                    <textarea  class="bg-gray-200 w-full" disabled>{{$actuacion->comentarios_cierre}}</textarea>
                @else
                    <textarea class="w-full" wire:model.defer="comentariosCierre"></textarea>
                    <x-slot name="footer">
                        <x-button click="cerrarActuacion()">Finalizar actuación</x-button>
                    </x-slot>
                @endif
            </x-card>
            @elseif($view = 'archivos')
            <div class="bg-white p-6">
              
                <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                        type="file"
                        id="formFile" />
            </div>
            <div class="grid grid-cols-2 gap-3 p-5">
                <img src="https://picsum.photos/200/300" class="w-full">
                <img src="https://picsum.photos/200/300" class="w-full">
                <img src="https://picsum.photos/200/300" class="w-full">
                <img src="https://picsum.photos/200/300" class="w-full">
            </div>
        @endif
        
    </div>
</div>
