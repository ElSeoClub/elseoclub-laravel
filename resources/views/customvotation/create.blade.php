<x-general-layout>
    <x-slot name="title">Votaciones</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Congreso nacional" arrow="true"
            :route="route('legitimation.show',['event' => $event])" />
        <x-layout.general.breadcrumb-option name="Votaciones" arrow="true"
            :route="route('legitimation.customvotation',['event' => $event])" />
        <x-layout.general.breadcrumb-option name="Crear" arrow="false" />
    </x-layout.general.breadcrumbs>

    @livewire('event.legitimation.customvotation.create', ['event' => $event])
</x-general-layout>