<x-general-layout>
    <x-slot name="title">Consejos</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Consejos" arrow="true" :route="route('legitimation.index')" />
        <x-layout.general.breadcrumb-option name="{{$event->name}}" arrow="true"
            :route="route('legitimation.show',compact('event'))" />
        <x-layout.general.breadcrumb-option name="consultas" arrow="true"
            :route="route('legitimation.consejo.votaciones',compact('event'))" />
        <x-layout.general.breadcrumb-option name="{{$consulta->name}}" arrow="false" />
    </x-layout.general.breadcrumbs>
    @livewire('consejo.registro', ['event' => $event,'consulta' => $consulta])

</x-general-layout>