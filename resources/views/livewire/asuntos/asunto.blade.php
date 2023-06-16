<div>
    <div class="w-full h-14 flex bg-white flex justify-center">
        <div class="w-full flex max-w-[480px] justify-center">
            <div wire:click="view('info')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'info')  border-red-400 @endif"><img src="{{asset('svg/info.png')}}" width="26" alt=""></div>
            <div wire:click="view('archivos')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'archivos')  border-red-400 @endif"><img src="{{asset('svg/files.png')}}" width="26" alt=""></div>
            <div wire:click="view('dinero')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'dinero')  border-red-400 @endif"><img src="{{asset('svg/money-bag.png')}}" width="26" alt=""></div>
            <div wire:click="view('actuaciones')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 relative @if($view == 'actuaciones')  border-red-400 @endif"><img src="{{asset('svg/wall-clock.png')}}" width="26" alt=""> <div class="px-1 bg-red-600 absolute text-xs rounded-full font-bold text-white top-2 right-4">{{$asunto->fresh()->actuaciones()->where('status',0)->count()}}</div></div>
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
                            <x-input-text value="{{$asunto->metas()->where('meta_key','prioridad')->first()->meta_value ?? 'Media'}}" disabled class="cursor-not-allowed bg-gray-100"></x-input-text>
                        </div>
                        <div></div>
                        <div></div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente de la autoridad:</p>
                            <x-input-text value="{{$asunto->expediente}}" disabled class="cursor-not-allowed bg-gray-100"></x-input-text>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Abogado a cargo:</p>
                            <x-select disabled class="cursor-not-allowed bg-gray-100">
                                <option value="">{{$asunto->user->name ?? 'Sin abogado designado'}}</option>
                            </x-select>
                        </div>
                    </x-box>
                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Acción ejercida:</p>
                            <x-input-text value="{{$asunto->metas()->where('meta_key','accion_ejercida')->first()->meta_value ?? ''}}" disabled class="cursor-not-allowed bg-gray-100   "></x-input-text>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Promueve:</p>
                            <x-input-text value="{{$asunto->metas()->where('meta_key','actor')->first()->meta_value ?? ''}}" disabled class="cursor-not-allowed bg-gray-100   "></x-input-text>
                        </div>
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Fecha de presentación del asunto:</p>
                            <x-input-date></x-input-date>
                        </div>
                    </x-box>
                </x-container>
            </x-card>
        @elseif($view == 'actuaciones')
            <x-button click="view('agregar_actuacion')">Agregar actuación</x-button>
            <div class="flex flex-col divide-y bg-white border rounded shadow">
                @foreach($asunto->fresh()->actuaciones()->orderBy('fecha','desc')->get() as $actuacion)
                    <div class="flex gap-3 p-4 items-center" wire:click="editarActuacion({{$actuacion->id}})">
                        <div class="text-xs flex items-center @if($actuacion->status == 0) text-gray-300 @else text-green-600 @endif"><i class="fas fa-circle"></i></div>
                       
                        <div class="flex flex-col gap-2">
                            <div>Fecha: {{$actuacion->fecha}}</div>
                            <div class="truncate flex-grow">Comentarios: <span class="font-bold">{{$actuacion->comentarios_apertura}}</span></div>
                            <div class="">Estado procesal: <span class="p-1 rounded shadow bg-gray-200 text-xs truncate">{{$actuacion->estado->name ?? 'Indefinido'}}</span></div>
                        </div>
                        <div>@if($actuacion->files()->count() > 0)<i class="fas fa-paperclip text-gray-700"></i>@endif</div>
                    </div>
                @endforeach
            </div>
        @elseif($view == 'agregar_actuacion')
            <x-card title="Nueva actuación">
                <div class="flex flex-col gap-3">
                    <div>
                        <textarea wire:model="actuationComment" placeholder="Comentarios de la actuación" class="w-full"></textarea>
                        <x-jet-input-error for="actuationComment"></x-jet-input-error>
                    </div>
                    <div>
                        <select wire:model.defer="actuacionEstado">
                            <option value="0">Elige un estado procesal</option>
                            @foreach($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="actuacionEstado"></x-jet-input-error>
                    </div>
                    <div>
                        <input type="datetime-local" wire:model.defer="actuationDate">
                        <x-jet-input-error for="actuationDate"></x-jet-input-error>
                    </div>
                </div>
                <x-slot name="footer">
                    <x-button click="agregarActuacion()">Agregar actuación</x-button>
                </x-slot>
            </x-card>
        @elseif($view == 'editarActuacion')
            <x-card title="Actuación">
                <div class="flex gap-3 items-center">
                    <img src="{{asset('storage/'.$actuacion->usuario_apertura->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                    <div class="bg-gray-100 shadow rounded w-full p-3">
                        <div class="text-sm font-bold">{{$actuacion->usuario_apertura->name}}</div>
                        <div>{{$actuacion->comentarios_apertura}}</div>
                    </div>
                </div>
                
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
        
            <div class="bg-white p-6">
                <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <!-- File Input -->
                    <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                           type="file" wire:model="fileActuacion" enctype="multipart/form-data" />
                
                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress" class="w-full"></progress>
                    </div>
                </div>
                @if(isset($fileActuacion))
                    @if(in_array($fileActuacion->getClientOriginalExtension(),[   'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
                        'mov', 'avi', 'wmv', 'mp3', 'm4a',
                        'jpg', 'jpeg', 'mpga', 'webp', 'wma',
                    ]))
                        <img src="{{$fileActuacion->temporaryUrl() }}" width='200px;'>
                    @endif
                    <input type="text" wire:model.defer="fileNameActuacion">
                    <x-button click="storeFileActuacion()">Guardar</x-button>
                    <x-jet-input-error for="fileNameActuacion"></x-jet-input-error>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 p-5">
                @foreach($asunto->fresh()->archivos()->where('actuacion_id',$actuacion->id)->orderBy('created_at','desc')->get() as $archivo)
                    @if($archivo->extension == 'pdf')
                        <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                            <img src="{{asset('svg/pdf-file.png')}}" class="w-full max-h-[250px]">
                            <div class="text-sm text-center">{{$archivo->name}}</div>
                        </a>
                    @elseif($archivo->extension == 'png' || $archivo->extension == 'jpg')
                        <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                            <div class="flex-grow items-center flex"><img src="{{asset('storage/'.$archivo->path)}}" class="w-full max-h-[250px]"></div>
                            <div class="text-sm text-center">{{$archivo->name}}</div>
                        </a>
                    @else
                        <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                            <div class="flex-grow items-center flex"><img src="{{asset('svg/documents.png')}}" class="w-full max-h-[250px]"></div>
                            <div class="text-sm text-center">{{$archivo->name}}</div>
                        </a>
                    @endif
                @endforeach
            </div>
        @elseif($view == 'archivos')
            <div class="bg-white p-6">
                <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <!-- File Input -->
                    <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                           type="file" wire:model="file" enctype="multipart/form-data" />
        
                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress" class="w-full"></progress>
                    </div>
                </div>
                @if(isset($file))
                    @if(in_array($file->getClientOriginalExtension(),[   'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
                        'mov', 'avi', 'wmv', 'mp3', 'm4a',
                        'jpg', 'jpeg', 'mpga', 'webp', 'wma',
                    ]))
                        <img src="{{  $file->temporaryUrl() }}" width='200px;'>
                    @endif
                    <input type="text" wire:model.defer="fileName">
                    <x-button click="storeFile()">Guardar</x-button>
                    <x-jet-input-error for="fileName"></x-jet-input-error>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 p-5">
                @foreach($asunto->fresh()->archivos()->orderBy('created_at','desc')->get() as $archivo)
                    @if($archivo->extension == 'pdf')
                        <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                            <img src="{{asset('svg/pdf-file.png')}}" class="w-full max-h-[250px]">
                            <div class="text-sm text-center">{{$archivo->name}}</div>
                        </a>
                    @elseif($archivo->extension == 'png' || $archivo->extension == 'jpg')
                        <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                            <div class="flex-grow items-center flex"><img src="{{asset('storage/'.$archivo->path)}}" class="w-full max-h-[250px]"></div>
                            <div class="text-sm text-center">{{$archivo->name}}</div>
                        </a>
                    @else
                        <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                            <div class="flex-grow items-center flex"><img src="{{asset('svg/documents.png')}}" class="w-full max-h-[250px]"></div>
                            <div class="text-sm text-center">{{$archivo->name}}</div>
                        </a>
                    @endif
                @endforeach
            </div>
            
        @elseif($view == 'dinero')
            <div class="p-5">
            Costo por la demanda
            <input type="number" class="text-sm w-full">
            </div>
        @endif
        
    </div>
</div>
