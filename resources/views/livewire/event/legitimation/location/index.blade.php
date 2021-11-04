<div class="grid grid-cols-2">
    <x-card title="Sedes del evento" px="0" py="0">
        <x-table>
            <x-slot name="thead">
                <th class="text-left px-5 py-3">Nombre</th>
                <th class="text-left px-5 py-3"># de invitados</th>
                <th class="text-left px-5 py-3"># de Boletas</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($locations as $key => $location)
                @if (Auth::user()->hasPermission($location->name))
                <tr class="hover:bg-gray-100">
                    <td class="px-5 py-3">{{$location->name}}</td>
                    <td class="px-5 py-3">{{$location->guests()->count()}}</td>
                    <td class="px-5 py-3"><input type="text" wire:keyup="save({{$location->id}},event.target.value)"
                            value="{{$location->boletas}}"></td>
                </tr>
                @endif

                @endforeach
            </x-slot>
        </x-table>
    </x-card>

    <x-card title="Asistencia" px="0" py="0">
        x
    </x-card>
</div>