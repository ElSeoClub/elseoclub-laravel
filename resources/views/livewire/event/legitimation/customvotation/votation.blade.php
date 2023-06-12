<div>
    <x-card title="Tema - {{$votation->name}}" px="0" py="0">
        <x-table>
            <x-slot name="thead">
                <th class="text-left px-5 py-3">Coordinación</th>
                <th class="text-left px-5 py-3 text-center  w-24">Planilla 1</th>
                <th class="text-left px-5 py-3 text-center w-24">Planilla 2</th>
                <th class="text-left px-5 py-3 text-center w-24">Planilla 3</th>
                <th class="text-left px-5 py-3 text-center w-24">Planilla 4</th>
                <th class="text-left px-5 py-3 text-center w-24">Nulos</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach($user_locations as $location)
                <tr class="hover:bg-gray-100">
                    <td class="px-5 text-2xl font-bold">
                        {{$location->name}}
                    </td>
                    <td class="text-center  text-2xl font-bold px-5 w-24">
                        <input type="number" class="text-2xl font-bold w-24" value="{{$location->p1($votation->id)}}"
                            wire:keyup.debounce.500ms="update('p1',$event.target.value, {{$votation->id}}, {{$location->id}})" />
                    </td>
                    <td class="text-center  text-2xl font-bold px-5 w-24">
                        <input type="number" class="text-2xl font-bold w-24" value="{{$location->p2($votation->id)}}"
                               wire:keyup.debounce.500ms="update('p2',$event.target.value, {{$votation->id}}, {{$location->id}})" />
                    </td>
                    <td class="text-center  text-2xl font-bold px-5 w-24">
                        <input type="number" class="text-2xl font-bold w-24" value="{{$location->p3($votation->id)}}"
                               wire:keyup.debounce.500ms="update('p3',$event.target.value, {{$votation->id}}, {{$location->id}})" />
                    </td>
                    <td class="text-center  text-2xl font-bold px-5 w-24">
                        <input type="number" class="text-2xl font-bold w-24" value="{{$location->p4($votation->id)}}"
                               wire:keyup.debounce.500ms="update('p4',$event.target.value, {{$votation->id}}, {{$location->id}})" />
                    </td>
                    <td class="text-center  text-2xl font-bold px-5 w-24">
                        <input type="number" class="text-2xl font-bold w-24" value="{{$location->nulos($votation->id)}}"
                            wire:keyup.debounce.500ms="update('nulos',$event.target.value, {{$votation->id}}, {{$location->id}})" />
                    </td>
                </tr>
                @endforeach

            </x-slot>
        </x-table>

    </x-card>
</div>