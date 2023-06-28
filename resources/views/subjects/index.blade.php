<x-mobile-layout title="{{$matter->name}}" active="temas">
    @livewire('subjects.index',compact('matter'))
</x-mobile-layout>