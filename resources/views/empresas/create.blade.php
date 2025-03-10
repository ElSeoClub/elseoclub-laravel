<x-mobile-layout title="Empresas" active="empresas">
    @if(isset($folder))
        <livewire:folder.create :folder="$folder" />
    @else
        <livewire:folder.create/>
        @endif
</x-mobile-layout>