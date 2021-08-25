<x-default-layout>
    <x-slot name="title">Legitimaciones</x-slot>
    <x-layout.default.breadcrumbs>
        <x-layout.default.breadcrumb-option name="Legitimaciones" arrow="true" :route="route('legitimation.index')" />
        <x-layout.default.breadcrumb-option name="Crear" arrow="false" />
    </x-layout.default.breadcrumbs>
    @livewire('event.legitimation.create')
</x-default-layout>