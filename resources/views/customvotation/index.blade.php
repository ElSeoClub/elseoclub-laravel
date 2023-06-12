<x-general-layout>
    <x-slot name="title">Votaciones</x-slot>
    <x-layout.general.breadcrumbs>
        <x-layout.general.breadcrumb-option name="Congreso nacional" arrow="true"
            :route="route('legitimation.show',['event' => $event])" />
        <x-layout.general.breadcrumb-option name="Votaciones" arrow="false" />
    </x-layout.general.breadcrumbs>

    @livewire('event.legitimation.customvotation.index', ['event' => $event])
</x-general-layout>