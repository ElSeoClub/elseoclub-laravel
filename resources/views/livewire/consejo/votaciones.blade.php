<div>
    @foreach ($locations as $location)
    @if (Auth::user()->hasPermission($location->name))
    <x-card title="Sede: {{$location->name}}" px="0" py="0">
        <x-table>
            <x-slot name="thead">
                <th class="px-5 py-3 text-left">Consulta</th>
                <th class="px-5 py-3 w-36 text-left">Si</th>
                <th class="px-5 py-3 w-36 text-left">No</th>
                <th class="px-5 py-3 w-36 text-left">No votó</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($location->fresh()->consultas as $consulta)
                <tr>
                    <td class="px-5 py-3">
                        <x-a
                            :href="route('legitimation.consejo.registro',['event' => $event->id,'consulta' => $consulta->id])">
                            {{$consulta->name}}</x-a>
                    </td>
                    <td class="px-5 py-3">{{$consulta->si}}</td>
                    <td class="px-5 py-3">{{$consulta->no}}</td>
                    <td class="px-5 py-3">{{$consulta->nulo}}</td>
                </tr>
                @endforeach
            </x-slot>
        </x-table>

    </x-card>
    @endif
    @endforeach

    @if (Auth::user()->hasPermission('Administrator'))
    <x-button icon="fas fa-plus" color="blue" :href="route('legitimation.consejo.nuevo',compact('event'))">Añadir
        consulta</x-button>
    @endif
</div>