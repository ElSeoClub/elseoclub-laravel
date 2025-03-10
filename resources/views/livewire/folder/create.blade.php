<div class="max-w-6xl mx-auto py-12 space-y-8">
    <nav class="flex text-gray-600 text-sm">
        <ul class="flex items-center space-x-2">
            <li>
                <a href="{{ route('empresas.index') }}" class="text-blue-500 hover:underline">Inicio</a>
            </li>
            @foreach ($this->ancestors as $breadcrumb)
                <li>/</li>
                <li>
                    <a href="{{ route('empresas.folder.index', $breadcrumb->id) }}" class="text-blue-500 hover:underline">
                        {{ $breadcrumb->name }}
                    </a>
                </li>
            @endforeach
            <li>/</li>
            @if($folder)
                <li>
                    <a href="{{ route('empresas.folder.index', $folder->id) }}" class="text-blue-500 hover:underline">
                        {{ $folder->name }}
                    </a>
                </li>
                <li>/</li>
            @endif

            @if($folder)
            <li class="font-semibold text-gray-800">Agregar subcarpeta</li>
            @else
                <li class="font-semibold text-gray-800">Agregar empresa</li>
            @endif
        </ul>
    </nav>
    <x-card class="mt-5">
        <x-container>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Nombre:</p>
                    <x-input-text wire:model.defer="name"></x-input-text>
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>
            </x-box>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
                <div>
                    <div class="flex gap-3 items-center">
                        <x-input-checkbox wire:model.defer="withSubfolders"></x-input-checkbox>
                        Contiene subcarpetas
                    </div>
                    <x-jet-input-error for="withSubfolders"></x-jet-input-error>
                </div>
            </x-box>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
                <div>
                    <div class="flex gap-3 items-center">
                        <x-input-checkbox wire:model.defer="withFiles"></x-input-checkbox>
                        Contiene documentos
                    </div>
                    <x-jet-input-error for="withFiles"></x-jet-input-error>
                </div>
            </x-box>

            <x-jet-input-error for="selectOne"></x-jet-input-error>
        </x-container>
        <x-slot name="footer">
            <div wire:loading.remove wire:target="save">
                <x-button color="blue" icon="fas fa-plus" class="w-full lg:w-96" click="save()">Crear</x-button>
            </div>
            <div wire:loading>
                <x-button color="blue" icon="fas fa-plus" class="w-full lg:w-96" disabled>Creando...</x-button>
            </div>
        </x-slot>
    </x-card>
</div>
