<div wire:poll.30000ms>
    <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4 mb-5">
        <!-- SMALL CARD ROUNDED -->
        <div wire:click="display('status')"
            class="bg-{{$view == 'status' ? 'red-50':'gray-100'}} border-{{$view == 'status' ? 'red-900':'gray-600'}} bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200  hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/status.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Estado de las sedes</p>
            </div>
        </div>
        <div wire:click="display('attendance')"
            class="bg-{{$view == 'attendance' ? 'red-50':'gray-100'}} border-{{$view == 'attendance' ? 'red-900':'gray-600'}} bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200  hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/attendant-list.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Asistencia de las sedes</p>
            </div>
        </div>
        <div wire:click="display('attendance2')"
            class="bg-{{$view == 'attendance2' ? 'red-50':'gray-100'}} border-{{$view == 'attendance2' ? 'red-900':'gray-600'}} bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200  hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/organization.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Asistencia por coordinación</p>
            </div>
        </div>
        <div wire:click="display('count')"
            class="bg-{{$view == 'count' ? 'red-50':'gray-100'}} border-{{$view == 'count' ? 'red-900':'gray-600'}} bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200  hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/results.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Preliminar de votaciones por sede</p>
            </div>
        </div>
        <div wire:click="display('count2')"
            class="bg-{{$view == 'count2' ? 'red-50':'gray-100'}} border-{{$view == 'count2' ? 'red-900':'gray-600'}} bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200  hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/results.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Preliminar de votaciones por sección
                </p>
            </div>
        </div>
    </div>

    @if ($view == 'status')
    <div>
        <x-card icon="fab fa-searchengin" title="Llegada del verificador por sede">
            <div class="flex gap-5 flex-wrap">
                @foreach ($locations as $location)
                <div
                    class="w-12 h-12 text-center bg-{{$location->llegada_verificador != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
                    <div>{{$location->name}}</div>
                </div>
                @endforeach
            </div>
        </x-card>

        <x-card icon="fas fa-play" title="Inicio del proceso de votación">
            <div class="flex gap-5 flex-wrap">
                @foreach ($locations as $location)
                <div
                    class="w-12 h-12 text-center bg-{{$location->apertura != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
                    <div>{{$location->name}}</div>
                </div>
                @endforeach
            </div>
        </x-card>

        <x-card icon="fas fa-stop" title="Inicio del centro de votación">
            <div class="flex gap-5 flex-wrap">
                @foreach ($locations as $location)
                <div
                    class="w-12 h-12 text-center bg-{{$location->cierre != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
                    <div>{{$location->name}}</div>
                </div>
                @endforeach
            </div>
        </x-card>

        <x-card icon="fas fa-stopwatch-20" title="Inicio de conteo de votos">
            <div class="flex gap-5 flex-wrap">
                @foreach ($locations as $location)
                <div
                    class="w-12 h-12 text-center bg-{{$location->conteo != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
                    <div>{{$location->name}}</div>
                </div>
                @endforeach
            </div>
        </x-card>
    </div>
    @elseif($view == 'attendance')
    x
    @endif

</div>