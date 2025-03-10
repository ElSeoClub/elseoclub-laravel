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
            <li>
                <a href="{{ route('empresas.folder.index', $folder->id) }}" class="text-blue-500 hover:underline">
                    {{ $folder->name }}
                </a>
            </li>
            <li>/</li>
            <li class="font-semibold text-gray-800">Agregar archivo</li>
        </ul>
    </nav>
    <x-card class="mt-5">
        <x-container>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
                <div class="bg-white p-6">
                    <div
                            x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                               type="file" wire:model="files" enctype="multipart/form-data" multiple/>

                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress" class="w-full"></progress>
                        </div>
                    </div>
                </div>
            </x-box>

            @if(isset($files))
                @foreach($files as $k => $file)

                    <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
                        <div>
                            <p class="text-xs text-slate-700 font-bold"><x-required/>Nombre ({{$file->getClientOriginalName()}})</p>
                            <x-input-text wire:model.defer="fileNames.{{$k}}"></x-input-text>
                            <x-jet-input-error for="fileNames.{{$k}}"></x-jet-input-error>
                        </div>
                    </x-box>
                @endforeach
            @endif
        </x-container>
        @if(isset($files))
        <x-slot name="footer">
            <div wire:loading.remove wire:target="save">
                <x-button color="blue" icon="fas fa-plus" class="w-full lg:w-96" click="save()">Agregar</x-button>
            </div>
            <div wire:loading>
                <x-button color="blue" icon="fas fa-plus" class="w-full lg:w-96" disabled>Agregando...</x-button>
            </div>
        </x-slot>
            @endif
    </x-card>
</div>
