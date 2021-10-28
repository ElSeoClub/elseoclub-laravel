<div>
    <div class="grid grid-cols-12 grid-gap-5 mb-5">
        <div class="col-span-9"></div>
        <div class="col-span-3">
            <x-search></x-search>
        </div>
    </div>
    <div wire:loading.remove wire:target="search">
        <x-table>
            <x-slot name="thead">
                <th class="px-5 py-3 text-left">Nombre del puesto</th>
            </x-slot>
            <x-slot name="tbody">
                @if (count($puestos) == 0)
                <tr>
                    <td class="px-5 py-3 text-center font-bold text-red-600">No se encontró ningún puesto.</td>
                </tr>
                @endif
                @foreach ($puestos as $puesto)
                <tr>
                    <td class="px-5 py-3">{{$puesto->name}}</td>
                </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                {{$puestos->links()}}
            </x-slot>
        </x-table>

    </div>
    <div wire:loading.delay wire:loading.inline wire:target="search">
        <x-loading-table rows="15" columns="4"></x-loading-table>
    </div>
    <x-button color="blue" icon="fas fa-plus">Añadir puesto</x-button>
</div>