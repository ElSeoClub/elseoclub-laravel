<div class="max-w-[1200px] m-auto">
    <div class="flex gap-3 items-center p-3">
        <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" class="w-8 h-8 rounded-full">
        <div class="bg-white shadow rounded w-full p-3">
            <div class="text-sm font-bold">{{auth()->user()->name}}</div>
            <div class="flex gap-2 items-center">
                <textarea wire:model.defer="comentarios" class="w-full"></textarea>
                <div wire:click="add()" class="cursor-pointer hover:text-blue-600"><i class="fas fa-paper-plane"></i></div>
            </div>
            
        </div>
    </div>
    
    @foreach($mensajes as $mensaje)
        <div class="flex gap-3 items-center p-3">
            <img src="{{asset('storage/'.$mensaje->user->profile_photo_path)}}" class="w-8 h-8 rounded-full">
            <div class="bg-white shadow rounded w-full p-3">
                <div class="text-sm font-bold">{{$mensaje->user->name}}</div>
                <div>{{$mensaje->comentarios}}</div>
            </div>
        </div>
    @endforeach
</div>
