<x-general-layout>
    <x-slot name="title">Consejos</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Consejos" arrow="true" :route="route('legitimation.index')" />
        <x-layout.general.breadcrumb-option :name="$event->name" arrow="false" />
    </x-layout.general.breadcrumbs>

    <div class="grid grid-cols-2 gap-5 mb-5">
        @if (Auth::user()->hasPermission('Administrator'))
        <x-card-image image="{{asset('svg/note.svg')}}">
            <div class="font-bold text-2xl">Padrón del evento</div>
            <div>{{$event->guests()->count()}} Invitados en {{$event->locations()->count()}} sedes</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.guests', ['event' => $event])}}" color="blue" class="w-full">
                    Gestionar padrón</x-button>
            </div>
        </x-card-image>
        <x-card-image image="{{asset('svg/map.svg')}}">
            <div class="font-bold text-2xl">Sedes del evento</div>
            <div>0 Sedes</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.locations', ['event' => $event])}}" color="blue" class="w-full">
                    Gestionar sedes</x-button>
            </div>
        </x-card-image>
        {{-- <x-card-image image="{{asset('svg/teamwork.svg')}}">
            <div class="font-bold text-2xl">Equipo de trabajo</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.teamwork.index', ['event' => $event])}}" color="blue"
                    class="w-full">
                    Gestionar equipo de trabajo</x-button>
            </div>
        </x-card-image> --}}
        @endif
        {{-- <x-card-image image="{{asset('svg/stats.svg')}}">
            <div class="font-bold text-2xl">Estadísticas</div>
            <div>Asistencia global
                0 de
                0</div>
            <div class="mt-20 w-full">
                <x-button href="#" color="blue" class="w-full">Ver estadísticas</x-button>
            </div>
        </x-card-image>
        <x-card-image image="{{asset('svg/seo-report.svg')}}">
            <div class="font-bold text-2xl">Reportes</div>
            <div>a</div>
            <div class="mt-20 w-full">
                <x-button href="#" color="blue" class="w-full">Ver reportes</x-button>
            </div>
        </x-card-image> --}}
        <x-card-image image="{{asset('svg/immigration.svg')}}">
            <div class="font-bold text-2xl">Pase de asistencia</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.attendance',['event' => $event])}}" color="blue" class="w-full">
                    Gestionar asistencia</x-button>
            </div>
        </x-card-image>
        <x-card-image image="{{asset('svg/voting.svg')}}">
            <div class="font-bold text-2xl">Votaciones</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.consejo.votaciones',['event' => $event])}}" color="blue"
                    class="w-full">
                    Gestionar
                    votaciones</x-button>
            </div>
        </x-card-image>
        <x-card-image image="{{asset('svg/stats.svg')}}">
            <div class="font-bold text-2xl">Estadísticas</div>
            <div>Asistencia global
                0 de
                0</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.consejo.stats',['event' => $event])}}" color="blue"
                    class="w-full">Ver estadísticas</x-button>
            </div>
        </x-card-image>
        {{-- <x-card-image image="{{asset('svg/voting.svg')}}">
            <div class="font-bold text-2xl">Computo de resultados parciales</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.votting',['event' => $event])}}" color="blue" class="w-full">
                    Gestionar
                    votaciones</x-button>
            </div>
        </x-card-image>

        @if (Auth::user()->hasPermission('Administrator') || Auth::user()->hasPermission('Jurídico'))
        <x-card-image image="{{asset('svg/vote.svg')}}">
            <div class="font-bold text-2xl">Computo de resultado final</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button href="{{route('legitimation.votting.juridico',['event' => $event])}}" color="blue"
                    class="w-full">
                    Gestionar
                    votaciones</x-button>
            </div>
        </x-card-image>
        @endif
        <x-card-image image="{{asset('svg/folder.svg')}}">
            <div class="font-bold text-2xl">Evidencia del proceso de legitimación</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button :href="route('legitimation.evidence.index',compact('event'))" color="blue" class="w-full">
                    Gestionar evidencia</x-button>
            </div>
        </x-card-image>
        <x-card-image image="{{asset('svg/printer.svg')}}">
            <div class="font-bold text-2xl">Expediente para el día del evento</div>
            <div>&nbsp;</div>
            <div class="mt-20 w-full">
                <x-button :href="route('legitimation.archive.index',compact('event'))" color="blue" class="w-full">Ver
                    expediente</x-button>
            </div>
        </x-card-image> --}}
    </div>

</x-general-layout>