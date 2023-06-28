<x-mobile-layout title="{{$subject->name}}" active="temas">
    @livewire('subjects.subject.tasks',compact('subject'))
</x-mobile-layout>