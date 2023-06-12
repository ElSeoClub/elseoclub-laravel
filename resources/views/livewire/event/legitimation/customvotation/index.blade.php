<div>
    <x-card title="Tema de votación" px="0" py="0">
        <x-table>
            <x-slot name="thead">
                <th class="text-left px-5 py-3">Nombre</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach($votations as $votation)
                <tr class="hover:bg-gray-100">
                    <td class="px-5 py-3">
                        <x-a
                            :href="route('legitimation.customvotation.votation',['event' => $event->id,'votation'=>$votation->id])">
                            {{$votation->name}}</x-a>
                    </td>
                </tr>
                @endforeach
            </x-slot>
        </x-table>

    </x-card>
    @if (Auth::user()->hasPermission('Administrator'))
    <div class="flex justify-between">
        <x-button icon="fas fa-plus" class="mt-5" color="green"
            :href="route('legitimation.customvotation.create', $event->id)">
            Crear
            nuevo tema
        </x-button>
        <x-button icon="fas fa-eye" class="mt-5" color="blue"
            :href="route('legitimation.customvotation.view', $event->id)">
            Ver monitor principal
        </x-button>
    </div>
    @endif
</div>