<x-content class="mt-5">
    @foreach($users as $user)
        
        <div class="bg-white w-full flex gap-2">
            <div class="p-3">
                @if($user->profile_photo_path == null)
        
                    <div class="w-12 h-12 md:w-24 md:h-24">
                    <img src="{{asset('storage/profile_photos/user.png')}}" class="w-12 h-12 md:w-24 md:h-24 rounded-full">
                    </div>
                @else
                <div class="w-12 h-12 md:w-24 md:h-24">
                    <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="w-12 h-12 md:w-24 md:h-24 rounded-full object-fill">
                </div>
                @endif
            </div>
            <div class="flex-grow p-3 flex flex-col gap-2">
                <div>{{$user->name}}</div>
                <div class="text-lg font-bold">Registro de actividades</div>
                @if(auth()->user()->id == $user->id)
                    <div class="flex">
                        <textarea class="flex-grow" rows="5" wire:model.defer="customActivity"></textarea>
                    </div>
        
                    <input type="time" wire:model.defer="timer">
                
                <div class="flex">
                <x-button icon="fas fa-save" color="blue" click="addActivity()" class="md:w-48 w-full">Agregar actividad</x-button>
                    <x-jet-input-error for="customActivity"></x-jet-input-error>
                </div>
                @endif
                @foreach($user->activities()->whereDay('created_at', now()->day)->orderBy('created_at','asc')->get() as $activity)
                    <div><span class="font-bold">{{explode(' ',$activity->created_at)[1]}}</span> {!! $activity->comments !!}</div>
                @endforeach
            </div>
        </div>
    @endforeach
</x-content>