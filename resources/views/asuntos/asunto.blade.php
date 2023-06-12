<x-mobile-layout :title="$asunto->expediente" active="asuntos">
    @livewire('asuntos.asunto', compact('asunto'))
</x-mobile-layout>