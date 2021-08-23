<x-default-layout>
    <x-slot name="title">{{__('Users')}}</x-slot>
    <x-layout.default.breadcrumbs>
        <x-layout.default.breadcrumb-option name="{{__('Users')}}" arrow="true" :route="route('users.index')" />
        <x-layout.default.breadcrumb-option name="{{$user->name}} ({{$user->username}})" arrow="false" />
    </x-layout.default.breadcrumbs>

    @livewire('user.edit', ['user' => $user])
</x-default-layout>