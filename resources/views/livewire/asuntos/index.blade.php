<section class="flex flex-col gap-5">
    <x-search></x-search>
    <ul class="shadow rounded divide-y bg-white">
        @foreach($asuntos as $asunto)
            <a href="{{route('asuntos.asunto',['asunto' => $asunto])}}" class="p-5 hover:bg-gray-50 flex w-full gap-3 hover:bg-gray-50 cursor-pointer">
                <div class="flex-grow truncate">{{$asunto->expediente}}</div>
            </a>
        @endforeach
    </ul>
    {{$asuntos->links()}}
    <x-button :href="route('asuntos.crear')" color="red" icon="fas fa-plus">Nuevo asunto</x-button>
</section>

