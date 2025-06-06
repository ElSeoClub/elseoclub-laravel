<div class="max-w-6xl mx-auto py-12 space-y-8">
    <nav class="flex text-gray-600 text-sm">
        <ul class="flex items-center space-x-2">
            <li>
                <a href="{{ route('empresas.index') }}" class="text-blue-500 hover:underline">Inicio</a>
            </li>
            @foreach ($this->ancestors as $breadcrumb)
                <li>/</li>
                <li>
                    <a href="{{ route('empresas.folder.index', $breadcrumb->id) }}"
                       class="text-blue-500 hover:underline">
                        {{ $breadcrumb->name }}
                    </a>
                </li>
            @endforeach
            <li>/</li>
            <li class="font-semibold text-gray-800">{{ $folder->name }}</li>
        </ul>
    </nav>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-3">
        @if($folder->with_subfolders)
            <x-card class="{{$folder->with_files && $folder->with_subfolders ? 'col-span-4' : 'col-span-12'}}">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full dark:text-gray-300">
                        <thead class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-left">Carpetas</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
                        @if($folders->count())
                            @foreach($folders as $f)
                                <tr class=" hover:bg-gray-50 cursor-pointer">
                                    <td>
                                        <a href="{{route('empresas.folder.index', $f)}}"
                                           class="p-2 block w-full">{{$f->name}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="p-2">No hay carpetas</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <x-slot name="footer">
                    <x-button color="blue" icon="fas fa-plus" class="w-full lg:max-w-xs"
                              :href="route('empresas.folder.create',$folder)">Agregar
                    </x-button>
                </x-slot>
            </x-card>
        @endif
        @if($folder->with_files)
            <x-card class="{{$folder->with_files && $folder->with_subfolders ? 'col-span-8' : 'col-span-12'}}">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full dark:text-gray-300">
                        <thead class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                        <tr>
                            <th class="p-2">
                                <div class="font-semibold text-left">Archivos</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
                        @if($files->count())
                            @foreach($files as $f)
                                <tr class=" hover:bg-gray-50 cursor-pointer">
                                    <td>
                                        <a href="/storage/{{$f->path}}" target="_blank"
                                           class="p-2 block w-full">{{$f->name}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="p-2">No hay archivos</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <x-slot name="footer">
                    <x-button color="blue" icon="fas fa-plus" class="w-full max-w-xs"
                              :href="route('empresas.folder.file',$folder)">Agregar
                    </x-button>
                </x-slot>
            </x-card>
        @endif
    </div>
    @if($folder->parent_id === null)
        <div>
            <x-card title="Informacion general">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        Empresa
                        <x-input-text wire:model.defer="name"></x-input-text>
                        <x-jet-input-error for="name"></x-jet-input-error>
                    </div>
                    <div>
                        Centro de trabajo
                        <x-input-text wire:model.defer="description"></x-input-text>
                        <x-jet-input-error for="description"></x-jet-input-error>
                    </div>
                </div>
                <x-slot name="footer">
                    <x-button color="blue" icon="fas fa-plus" class="w-full max-w-xs"
                              wire:click="save">Giardar cambios
                    </x-button>
                </x-slot>
            </x-card>
        </div>
    @endif
</div>
