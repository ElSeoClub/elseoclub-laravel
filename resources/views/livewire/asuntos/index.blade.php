<section class="flex flex-col gap-5">
    <x-search></x-search>
    <ul class="shadow rounded divide-y bg-white">
        @foreach($asuntos as $asunto)
            <a href="{{route('asuntos.asunto',['asunto' => $asunto])}}" class="p-5 hover:bg-gray-50 flex w-full gap-3 hover:bg-gray-50 cursor-pointer">
                <div class="rounded shadow truncate text-xs font-bold bg-gray-200 p-1">{{$asunto->expediente}}</div>
                <div class="flex-grow"></div>
            </a>
        @endforeach
    </ul>
    {{$asuntos->links()}}
    <x-button :href="route('asuntos.crear')" color="red" icon="fas fa-plus">Nuevo asunto</x-button>
</section>

