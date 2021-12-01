<div wire:poll.5000ms>
    <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4 mb-5">
        <!-- SMALL CARD ROUNDED -->
        <div
            class="bg-gray-100 border-gray-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200 dark:hover:bg-gray-600 hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/status.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Estado de las sedes</p>
            </div>
        </div>
        <div
            class="bg-gray-100 border-gray-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200 dark:hover:bg-gray-600 hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/attendant-list.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Asistencia de las sedes</p>
            </div>
        </div>
        <div
            class="bg-gray-100 border-gray-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200 dark:hover:bg-gray-600 hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/organization.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Asistencia por coordinación</p>
            </div>
        </div>
        <div
            class="bg-gray-100 border-gray-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200 dark:hover:bg-gray-600 hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/results.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Preliminar de votaciones por sede</p>
            </div>
        </div>
        <div
            class="bg-gray-100 border-gray-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around cursor-pointer | hover:bg-gray-200 dark:hover:bg-gray-600 hover:border-gray-700 | transition-colors duration-500">
            <img class="w-16 h-16 object-cover" src="{{asset('svg/results.svg')}}" alt="" />
            <div class="flex flex-col justify-center">
                <p class="text-gray-900 dark:text-gray-300 font-semibold text-xl">Preliminar de votaciones por sección
                </p>
            </div>
        </div>
    </div>

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
                    class="w-12 h-12 text-center bg-{{$location->apertura != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
                    <div>{{$location->name}}</div>
                </div>
                @endforeach
            </div>
        </x-card>

        <x-card icon="fas fa-stopwatch-20" title="Inicio de conteo de votos">
            <div class="flex gap-5 flex-wrap">
                @foreach ($locations as $location)
                <div
                    class="w-12 h-12 text-center bg-{{$location->apertura != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
                    <div>{{$location->name}}</div>
                </div>
                @endforeach
            </div>
        </x-card>
    </div>
</div>