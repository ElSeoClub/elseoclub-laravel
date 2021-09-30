<x-general-layout>
    <x-slot name="title">Computo de resultado final del evento</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Legitimaciones" arrow="true" />
        <x-layout.general.breadcrumb-option name="{{$event->name}}" arrow="true"
            :route="route('legitimation.show',['event' => $event->id])" />
        <x-layout.general.breadcrumb-option name="Parciales" arrow="false" />
    </x-layout.general.breadcrumbs>
    @livewire('event.legitimation.votting.juridico', ['event' => $event])
</x-general-layout>