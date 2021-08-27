<div>
    <div class="w-full" style="height: calc(100vh - 100px)">
        <div class="text-center font-bold text-3xl">
            Control de Accesos - {{$door->location->name}} - {{$door->name}}
        </div>
        <div class="flex" style="height:calc(100vh - 310px)">
            <div class="w-3/4 flex p-3">
                <div class="w-1/3 flex flex-wrap content-center">
                    <div class="w-full relative">
                        <img src="{{asset('img/credencial.png')}}"
                            class="max-w-full m-auto rounded-xl border border-gray-300 shadow-xl"
                            style="max-height: calc(100vh - 330px)">
                        <div class="absolute"
                            style="top: 60%; left:50%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);width:50%;">
                            @if ($user)
                            <img src="{{Storage::url($user->profile_photo_path)}}"
                                class="max-h-full max-w-full max-h-full m-auto shadow-lg border border-gray-300 imgDNE"
                                alt="">
                            @endif

                        </div>
                    </div>
                </div>
                <div class="w-2/3 ml-6">
                    <div class="w-full text-center text-xl mb-3">Jueves 27 de Agosto de 2021 <span id="clock"></span>
                    </div>
                    <x-card title="Datos del trabajador:">
                        <div class="-m-5 p-6" style="height:calc(100vh - 590px); overflow-y:hidden">
                            @if ($user)
                            <div class="text-lg text-gray-900 font-bold mb-2"><span class="text-gray-600 ">Clave de
                                    empleado:</span> {{strtoupper($user->username)}}</div>
                            <div class="text-lg text-gray-900 font-bold mb-2"><span
                                    class="text-gray-600 ">Nombre:</span> {{strtoupper($user->name)}}</div>
                            <div class="text-xl text-green-600 font-bold w-full text-center">¡Bienvenido a la
                                legitimación!</div>
                            @endif
                        </div>
                        <x-slot name="footer">
                            <div class="-m-5 px-3">
                                <div class="relative z-0 w-full mb-5">
                                    <input type="text" placeholder=" " autocomplete="off"
                                        class="pt-3 pb-2 block w-full font-bold px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-400 border-gray-200"
                                        wire:keydown.enter="get_user($event.target.value)"
                                        wire:model.debounce.500ms="qr_code" />
                                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">
                                        Escanea el código QR
                                    </label>
                                </div>
                            </div>
                        </x-slot>
                    </x-card>

                    <div class="rounded bg-white shadow-xl mt-3">
                        <div class="w-full font-bold text-base px-3 pb-2">Ultimos asistentes:</div>
                        <div class="flex p-3">
                            @foreach ($door->attendances()->paginate(6) as $last)
                            <img src="{{Storage::url($last->profile_photo_path)}}"
                                class="max-h-full max-w-full max-h-full h-16 w-16 m-auto rounded-full shadow-lg border border-gray-300"
                                alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="w-1/4 pl-3 py-3">
                <x-card title="Comité auxiliar">
                    <div class="-m-5" style="height:calc(100vh - 393px); overflow-y:auto">
                        @php
                        $n = 0;
                        @endphp
                        @foreach($door->guests()->get() as $user)
                        @if ($n < 4) <div class="flex border-b border-b-2 pb-2 p-3">
                            <div class="w-16 h-16 min-w-16">
                                <img src="{{Storage::url($user->profile_photo_path)}}"
                                    class="max-h-full max-w-full max-h-full h-16 w-16 m-auto rounded-full shadow-lg border border-gray-300 imgDNE"
                                    alt="" />
                            </div>
                            <div class="h-16 content-center flex flex-wrap w-full text-sm">
                                <div class="text-center font-bold w-full uppercase">{{$user->name}}</div>
                            </div>
                    </div>
                    @php $n++; @endphp
                    @endif
                    @endforeach
            </div>
            &nbsp;
            </x-card>
        </div>
    </div>
    <div class="mt-6" style="height:130px">
        <div class="w-full h-full">
            <span class="font-bold text-xl">Asistencia de la puerta: </span>
            <div class="shadow-md w-full bg-gray-200 h-9 mb-3 flex">
                <div class="bg-green-500 text-xs leading-none text-center text-white h-full py-2 font-bold text-lg z-10"
                    style="width: {{round(($door->guests()->whereNotNull('attendance_door_id')->count()/$door->guests()->count())*100)}}%">
                    {{round(($door->guests()->whereNotNull('attendance_door_id')->count()/$door->guests()->count())*100)}}%
                </div>
            </div>
            <span class="font-bold text-xl">Asistencia general:</span>
            <div class=" shadow-md w-full bg-gray-200 h-9 rounded">
                <div class="bg-green-500 text-xs leading-none text-center text-white h-full rounded py-2 font-bold text-lg"
                    style="width: {{round(($door->location->event->guests()->whereNotNull('attendance_door_id')->count()/$door->location->event->guests()->count())*100)}}%">
                    {{round(($door->location->event->guests()->whereNotNull('attendance_door_id')->count()/$door->location->event->guests()->count())*100)}}%
                </div>
            </div>
        </div>
    </div>
</div>