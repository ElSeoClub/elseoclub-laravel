<div class="max-w-[1200px] m-auto">
    <x-table>
        <x-slot name="thead">
            <th>Tema</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($matters as $matter)
                <x-tr>
                    <x-td class="cursor-pointer p-0">
                        <a href="{{route('matters.edit',['matter' => $matter->id])}}" class="block p-3">
                        <x-status-icon status="{{$matter->status}}"></x-status-icon>
                        {{$matter->name}}
                        </a>
                    </x-td>
                </x-tr>
            @endforeach
        </x-slot>
    </x-table>
    <x-button color="green" class="w-full" href="{{route('matters.create')}}">Nuevo tema</x-button>
</div>
