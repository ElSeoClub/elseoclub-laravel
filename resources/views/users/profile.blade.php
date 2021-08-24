<x-default-layout>
    <x-slot name="title">{{__('My profile')}}</x-slot>
    <x-layout.default.breadcrumbs>
        <x-layout.default.breadcrumb-option name="{{__('My profile')}}" arrow="false" />
    </x-layout.default.breadcrumbs>
    <x-alert name="test" icon="fas fa-exclamation" color="yellow">Test</x-alert>
</x-default-layout>