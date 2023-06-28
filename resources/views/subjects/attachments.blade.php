<x-mobile-layout title="{{$subject->name}}" active="temas">
    @livewire('subjects.subject.attachments',compact('subject'))
</x-mobile-layout>