<div class="max-w-6xl mx-auto py-12 space-y-8">
    <div class="w-full mt-5 md:px-0 px-3">
        <x-search class="w-full"></x-search>
    </div>
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
                            <td>
                                <a href="{{route('empresas.folder.index', $folder)}}"
                                   class="p-3 hover:bg-coolGray-100 cursor-pointer flex gap-2 w-full block items-center">
                                    <div class="flex flex-col  flex-grow max-w-[calc(100%-34px)] md:max-w-[calc(100%-50px)]">
                                        <div class="max-w-full flex gap-1">
                                            <div class="bg-blue-500 text-white rounded shadow text-sm px-1 truncate inline-block max-w-full">{{$folder->name}}</div>
                                        </div>
                                        <div class="truncate">{{$folder->description}}</div>
                                    </div>
                                </a>
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
        @if($folders->hasPages())
            <x-slot name="footer">
                {{$folders->links()}}
            </x-slot>
        @endif
    </x-card>
    <div class="flex">
        <div class="flex-grow"></div>
        <x-button :href="route('empresas.create')">Agregar</x-button>
    </div>
</div>
