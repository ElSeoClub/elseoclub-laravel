<x-general-layout>
    <x-slot name="title">Consejos</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Consejos" arrow="true" :route="route('legitimation.index')" />
        <x-layout.general.breadcrumb-option name="{{$event->name}}" arrow="true"
            :route="route('legitimation.show',compact('event'))" />
        <x-layout.general.breadcrumb-option name="consultas" arrow="false" />
    </x-layout.general.breadcrumbs>
    @livewire('consejo.votaciones', ['event' => $event])

</x-general-layout>