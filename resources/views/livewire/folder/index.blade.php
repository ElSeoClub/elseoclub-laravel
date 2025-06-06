<div class="max-w-6xl mx-auto py-12 space-y-8">
    <x-card>
    <div class="overflow-x-auto">
        <table class="table-auto w-full dark:text-gray-300">
            <thead class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
            <tr>
                <th class="p-2">
                    <div class="font-semibold text-left">Empresa</div>
                </th>
            </tr>
            </thead>
            <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
            @if($folders->count())
                @foreach($folders as $folder)
                    <tr class=" hover:bg-gray-50 cursor-pointer">
                        <td >

                            <a href="{{route('empresas.folder.index', $folder)}}" class="p-2 block w-full">{{$folder->name}}</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="p-2">No hay empresas registradas</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
        <x-slot name="footer">
            {{$folders->links()}}
        </x-slot>
    </x-card>
    <div class="flex">
        <div class="flex-grow"></div>
        <x-button :href="route('empresas.create')">Agregar</x-button>
    </div>
</div>
