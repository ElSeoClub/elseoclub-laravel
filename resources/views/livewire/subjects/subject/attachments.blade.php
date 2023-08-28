<div class="select-none">
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
                       type="file" wire:model="files" enctype="multipart/form-data" multiple/>
                
                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress" class="w-full"></progress>
                </div>
            </div>
            @if(isset($files))
                <x-button click="storeFile()" color="green" class="full">Guardar</x-button>
                <x-jet-input-error for="fileName"></x-jet-input-error>
            @endif
        </div>
        <x-search class="w-full  p-3 md:p-0"></x-search>
        <div class=" bg-white w-full grid grid-cols-1 divide-y border">
        @foreach($attachments as $archivo)
            <div class="relative flex {{$archivo->status == 'deleted' ? 'bg-red-50 hover:bg-red-100' : 'hover:bg-gray-100'}}">
                <a target="_blank" href="{{asset('storage/'.$archivo->path)}}" class="flex-grow flex gap-3 items-center align-middle p-3">
                    
                    @if($archivo->extension == 'pdf')
                            <img src="{{asset('svg/pdf-file.png')}}" class="w-[32px] max-h-[32px]">
                    @elseif($archivo->extension == 'png' || $archivo->extension == 'jpg')
                        
                            <img src="{{asset('storage/'.$archivo->path)}}" class="w-[32px] max-h-[32px]">
                    @else
                        <img src="{{asset('svg/documents.png')}}" class="w-[32px]    max-h-[32px]">
                    @endif
                    <div>{{$archivo ->name}}</div>
                    
                </a>
    
                <div class="flex justify-center items-center mr-3">
                    <div
                            x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }
 
                this.$refs.button.focus()
 
                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return
 
                this.open = false
 
                focusAfter && focusAfter.focus()
            }
        }"
                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']"
                            class="relative"
                    >
                        <!-- Button -->
                        <button
                                x-ref="button"
                                x-on:click="toggle()"
                                :aria-expanded="open"
                                :aria-controls="$id('dropdown-button')"
                                type="button"
                                class="flex items-center gap-2 bg-white px-5 py-2.5 hover:bg-gray-100 rounded border"
                        >
                            <i class="fas fa-bars"></i>
                        </button>
            
                        <!-- Panel -->
                        <div
                                x-ref="panel"
                                x-show="open"
                                x-transition.origin.top.left
                                x-on:click.outside="close($refs.button)"
                                :id="$id('dropdown-button')"
                                style="display: none;"
                                class="absolute left-[-136px] w-48 rounded-md bg-white shadow-md z-10 border flex flex-col divide-y"
                        >
                            <a href="#" class="cursor-pointer flex items-center w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                <i class="fas fa-edit w-6"></i> Cambiar nombre
                            </a>
                            
                            @if($archivo->status == 'deleted')
                                <a wire:click="restore({{$archivo->id}})" class="cursor-pointer flex items-center text-red-600 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    <i class="fas fa-trash-restore w-6"></i> Restablecer
                                </a>
                            @else
                                <a wire:click="delete({{$archivo->id}})" class="cursor-pointer flex items-center text-red-600 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    <i class="fas fa-trash w-6"></i> Eliminar
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        @endforeach
        </div>
       <div class="h-[65px]"></div>
    </x-content>
</div>
