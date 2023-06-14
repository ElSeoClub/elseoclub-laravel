<div class="max-w-[1200px] m-auto">
    <div class="flex gap-3 items-center p-3">
        <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" class="w-8 h-8 rounded-full">
        <div class="bg-white shadow rounded w-full p-3">
            <div class="text-sm font-bold">{{auth()->user()->name}}</div>
            <div class="flex gap-2 items-center">
                <textarea wire:model.defer="comentarios" class="w-full"></textarea>
                <div wire:click="add()" class="cursor-pointer hover:text-blue-600 " wire:loading.remove><i class="fas fa-paper-plane"></i></div>
                <div  class="cursor-pointer hover:text-blue-600 cursor-not-allowed" wire:loading><i class="fas fa-paper-plane"></i></div>
               
            </div>
            
        </div>
    </div>
    
    @foreach($mensajes as $mensaje)
        <div x-data="{ open: false }">
            <div class="flex gap-3 items-center p-3">
                @if($mensaje->user->profile_photo_path == null)
                    <img src="{{asset('/storage/profile_photos/user.png')}}" class="w-8 h-8 rounded-full">
                @else
                    <img src="{{asset('storage/'.$mensaje->user->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                @endif
                <div class="bg-white shadow rounded w-full p-3">
                    <div class="flex gap-3 justify-between">
                        <div class="text-sm font-bold flex-grow truncate">{{$mensaje->user->name}}</div>
                            <div class="font-bold text-sm"> {{$mensaje->created_at->format('g:i A')}}</div>
                    </div>
                    <div class="flex gap-3 justify-between cursor-pointer hover:text-red-600" x-on:click="open = ! open">
                        <div class="flex-grow">{{$mensaje->comentarios}}</div>
                        <div class="text-sm"><i class="fas fa-reply"></i> Responder</div>
                    </div>
                </div>
            </div>
            <div class="flex gap-3 items-center p-3" x-show="open">
                <div class="w-12"></div>
                <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                <div class="bg-white shadow rounded w-full p-3">
                    <div class="text-sm font-bold">{{auth()->user()->name}}</div>
                    <div class="flex gap-2 items-center">
                        <textarea wire:model.defer="comentarios" class="w-full"></textarea>
                        <div wire:click="add({{$mensaje->id}})" class="cursor-pointer hover:text-blue-600 " wire:loading.remove  x-on:click="open = false"><i class="fas fa-paper-plane"></i></div>
                        <div class="cursor-pointer hover:text-blue-600 cursor-not-allowed" wire:loading><i class="fas fa-paper-plane"></i></div>
                    </div>
                </div>
            </div>
            @foreach($mensaje->childs as $child)
                <div class="flex gap-3 items-center w-full" >
                    <div class="w-12"></div>
                    <div class="flex gap-3 items-center p-3 w-full">
                        @if($mensaje->user->profile_photo_path == null)
                            <img src="{{asset('/storage/profile_photos/user.png')}}" class="w-8 h-8 rounded-full">
                        @else
                            <img src="{{asset('storage/'.$child->user->profile_photo_path)}}" class="w-8 h-8 rounded-full">
                        @endif
                        <div class="bg-white shadow rounded w-full p-3">
                            <div class="flex gap-3 justify-between">
                                <div class="text-sm font-bold flex-grow truncate">{{$child->user->name}}</div>
                                <div class="font-bold text-sm"> {{$child->created_at->format('g:i A')}}</div>
                            </div>
                            <div class="flex gap-3 justify-between">
                                <div class="flex-grow">{{$child->comentarios}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
