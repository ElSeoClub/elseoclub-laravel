<x-general-layout>
    <x-slot name="title">Consejo</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Consejos" arrow="true" :route="route('legitimation.index')" />
        <x-layout.general.breadcrumb-option name="{{$event->name}}" arrow="true"
            :route="route('legitimation.show',compact('event'))" />
        <x-layout.general.breadcrumb-option name="Estadísticas" arrow="false" />
    </x-layout.general.breadcrumbs>
    @livewire('consejo.stats', ['event' => $event, 'consulta' => $consulta])

</x-general-layout>