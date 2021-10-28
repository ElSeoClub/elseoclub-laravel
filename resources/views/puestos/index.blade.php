<x-default-layout>
    <x-slot name="title">{{__('Puestos')}}</x-slot>
    <x-layout.default.breadcrumbs>
        <x-layout.default.breadcrumb-option name="{{__('Puestos')}}" arrow="false" />
    </x-layout.default.breadcrumbs>

    @livewire('puestos.index')
</x-default-layout>