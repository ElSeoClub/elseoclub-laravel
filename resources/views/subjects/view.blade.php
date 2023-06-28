<x-mobile-layout title="{{$subject->name}}" active="temas">
    @livewire('subjects.subject.view',compact('subject'))
</x-mobile-layout>