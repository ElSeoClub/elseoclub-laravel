<x-default-layout>
    <x-slot name="title">{{__('My profile')}}</x-slot>
    <x-layout.default.breadcrumbs>
        <x-layout.default.breadcrumb-option name="{{__('My profile')}}" arrow="false" />
    </x-layout.default.breadcrumbs>
    @livewire('profile.change-password')
</x-default-layout>