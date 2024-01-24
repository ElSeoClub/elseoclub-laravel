<div>
    <div class="w-full h-14 flex bg-white flex justify-center">
        <div class="w-full flex max-w-[480px] justify-center">
            <a href="{{route('subjects.subject.view', $subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-100 border-b-4 border-white hover:border-red-400"><img src="{{asset('svg/info.png')}}" width="26" alt=""></a>
            <a href="{{route('subjects.subject.attachments', $subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-100 border-b-4 border-white hover:border-red-400"><img src="{{asset('svg/files.png')}}" width="26" alt=""></a>
            <a href="{{route('subjects.subject.tasks', $subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-100 border-b-4 border-white hover:border-red-400 relative border-red-400"><img src="{{asset('svg/wall-clock.png')}}" width="26" alt=""> <div class="px-1 bg-red-600 absolute text-xs rounded-full font-bold text-white top-2 right-4"></div></a>
        </div>
    </div>

    <x-content>
        @if($view == 'tasks')
            <div class="flex flex-col p-6 bg-white shadow w-full mt-5 text-center cursor-pointer hover:bg-orange-50 text-red-500 hover:text-red-600" wire:click="view('agregar_actuacion')">
                <i class="fas fa-calendar-plus text-3xl"></i>
                <span class="text-2xl">Agregar actuación</span>
            </div>
        <div class="flex flex-col divide-y bg-white border rounded w-full">
            @foreach($subject->fresh()->tasks()->orderBy('fecha','desc')->get() as $actuacion)
                <div class="flex gap-3 p-4 items-center cursor-pointer hover:bg-orange-50" wire:click="editarActuacion({{$actuacion->id}})">
                    <div class="flex flex-col gap-2">
                        <div>Fecha: {{$actuacion->fecha->format('d/m/Y H:i:s')}}</div>
                        <div class="truncate flex-grow">Comentarios: <span class="font-bold">{{$actuacion->comentarios_apertura}}</span></div>
                        <div class="">Actuación: <span class="p-1 rounded shadow bg-gray-200 text-xs truncate">{{$actuacion->action ?? 'Indefinido'}}</span></div>
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
                            <option value="0">Elige una acción o estado procesal</option>
                            @foreach($estados as $estado)
                                <option value="{{$estado}}">{{$estado}}</option>
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
            <x-card title="Actuación" >
                <div class="gap-3 flex flex-col">
                    <div class="flex gap-3 items-center">
                        <img src="{{asset('storage/'.$task->usuario_apertura->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                        <div class="bg-gray-100 shadow rounded w-full p-3">
                            <div class="text-sm font-bold flex justify-between">
                                <div class="truncate">
                                {{$task->usuario_apertura->name}}
                                </div>
                                <div class="flex-grow text-right">
                                    @if($editDate == $task->id)
                                        <div class="flex">
                                            <div class="flex-grow"></div>
                                            <input id="updaterDate" type="datetime-local" wire:model.debounce.1000ms="newDate">
                                        </div>
                                        <script>
                                            document.querySelector('#updaterDate').addEventListener('focusout', (event) => {
                                                window.livewire.emit('uptodateDate');
                                            });
                                        </script>
                                    @else
                                        <div wire:click="editDate({{$task->id}})" class="cursor-pointer">
                                        <i class="fas fa-edit cursor-pointer hover:text-orange-500" ></i>
                                        {{$task->fecha->format('d/m/Y H:i:s')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="text-sm font-bold">{{$task->action ?? 'Indefinido'}}</div>
                            <div>{{$task->comentarios_apertura}}</div>
                        </div>
                    </div>
                    @foreach($task->fresh()->comments as $n => $comment)
                        <div class="flex gap-3 items-center">
                            @if($n % 2 != 0)
                                <img src="{{asset('storage/'.$comment->user->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                            @endif

                            <div class="bg-gray-100 shadow rounded w-full p-3">
                                <div class="text-sm font-bold flex justify-between">
                                    <div class="truncate">
                                        {{$comment->user->name}}
                                    </div>
                                    <div class="flex-grow text-right">
                                        {{$comment->created_at->format('d/m/Y H:i:s')}}
                                    </div>
                                </div>
                                <div>{{$comment->comment}}</div>
                            </div>
                                @if($n % 2 == 0)
                                    <img src="{{asset('storage/'.$comment->user->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                                @endif
                        </div>
                    @endforeach

                    @if($task->fresh()->usuario_cierre)
                        <div class="flex gap-3 items-center">

                            <div class="bg-gray-100 shadow rounded w-full p-3">
                                <div class="text-sm font-bold">{{$task->usuario_cierre->name}}</div>
                                <div>{{$task->comentarios_cierre}}</div>
                            </div>
                            <img src="{{asset('storage/'.$task->usuario_cierre->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                        </div>
                    @endif
                </div>
                <div class="flex w-full mt-3">
                    <textarea class="flex-grow" wire:model.defer="comment"></textarea>
                    <div class="h-full" wire:click="addComment">
                        <button  class="text-base bg-gray-500 text-white font-bold px-3 py-2 rounded
        hover:bg-gray-600 focus:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-600
        focus:ring-opacity-50"><i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
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
                           type="file" wire:model="filesActuacion" enctype="multipart/form-data" multiple/>

                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress" class="w-full"></progress>
                    </div>
                </div>
                @if(isset($filesActuacion))
                    <x-button click="storeFileActuacion()">Guardar</x-button>
                    <x-jet-input-error for="fileNameActuacion"></x-jet-input-error>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 p-5">
                @foreach($subject->fresh()->attachments()->where('task_id',$task->id)->orderBy('created_at','desc')->get() as $archivo)
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
        @endif
    </x-content>
</div>
