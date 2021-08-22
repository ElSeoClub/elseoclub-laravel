<x-default-layout>
    <x-slot name="title">{{__('Users')}}</x-slot>
    <x-layout.default.breadcrumbs>
        <x-layout.default.breadcrumb-option name="{{__('Users')}}" arrow="false" />
    </x-layout.default.breadcrumbs>

    @livewire('user.table')
</x-default-layout>