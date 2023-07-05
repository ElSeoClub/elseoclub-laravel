<div>
    <div class="w-full h-14 flex bg-white flex justify-center">
        <div class="w-full flex max-w-[480px] justify-center">
            <a href="{{route('subjects.subject.view', $subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-100 border-b-4 border-white hover:border-red-400"><img src="{{asset('svg/info.png')}}" width="26" alt=""></a>
            <a class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-100 border-b-4 border-white hover:border-red-400   border-red-400"><img src="{{asset('svg/files.png')}}" width="26" alt=""></a>
            <a href="{{route('subjects.subject.tasks', $subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-100 border-b-4 border-white hover:border-red-400 relative"><img src="{{asset('svg/wall-clock.png')}}" width="26" alt=""> <div class="px-1 bg-red-600 absolute text-xs rounded-full font-bold text-white top-2 right-4"></div></a>
        </div>
    </div>
    <x-content>
        <div class="bg-white p-6">
            <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <!-- File Input -->
                <input class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                       type="file" wire:model="file" enctype="multipart/form-data" />
                
                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress" class="w-full"></progress>
                </div>
            </div>
            @if(isset($file))
                @if(in_array($file->getClientOriginalExtension(),[   'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
                    'mov', 'avi', 'wmv', 'mp3', 'm4a',
                    'jpg', 'jpeg', 'mpga', 'webp', 'wma',
                ]))
                    <img src="{{  $file->temporaryUrl() }}" width='200px;'>
                @endif
                <input type="text" wire:model.defer="fileName">
                <x-button click="storeFile()">Guardar</x-button>
                <x-jet-input-error for="fileName"></x-jet-input-error>
            @endif
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-3 p-5">
            @foreach($subject->fresh()->attachments()->orderBy('created_at','desc')->get() as $archivo)
                @if($archivo->extension == 'pdf')
                    <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                        <img src="{{asset('svg/pdf-file.png')}}" class="w-full max-h-[250px]">
                        <div class="text-sm text-center">{{$archivo->name}}</div>
                    </a>
                @elseif($archivo->extension == 'png' || $archivo->extension == 'jpg')
                    <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                        <div class="flex-grow items-center flex"><img src="{{asset('storage/'.$archivo->path)}}" class="w-full max-h-[250px]"></div>
                        <div class="text-sm text-center">{{$archivo->name}}</div>
                    </a>
                @else
                    <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="bg-white rounded shadow border flex flex-col justify-between hover:bg-gray-50">
                        <div class="flex-grow items-center flex"><img src="{{asset('svg/documents.png')}}" class="w-full max-h-[250px]"></div>
                        <div class="text-sm text-center">{{$archivo->name}}</div>
                    </a>
                @endif
            @endforeach
        </div>
    </x-content>
</div>
