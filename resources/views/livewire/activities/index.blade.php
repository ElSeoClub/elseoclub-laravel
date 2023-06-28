<x-content class="mt-5">
    @foreach($users as $user)
        
        <div class="bg-white w-full flex gap-5">
            <div class="p-3">
                @if($user->profile_photo_path == null)
                    <img src="{{asset('storage/profile_photos/user.png')}}" class="w-24 h-24 rounded-full">
                @else
                    <img src="{{asset('storage/'.$user->profile_photo_path)}}" class="w-24 h-24 rounded-full">
                @endif
            </div>
            <div class="flex-grow p-3 flex flex-col gap-2">
                <div>{{$user->name}}</div>
                <div class="text-lg font-bold">Registro de actividades</div>
                @if(auth()->user()->id == $user->id)
                    <div class="flex">
                        <input class="flex-grow" type="text" wire:model.defer="customActivity">
                        <div wire:click="addActivity()" class="bg-blue-600 flex items-center px-3 text-white cursor-pointer"><i class="fas fa-save"></i></div>
                    </div>
                    <x-jet-input-error for="customActivity"></x-jet-input-error>
                @endif
                @foreach($user->activities()->whereDay('created_at', now()->day)->get() as $activity)
                    <div><span class="font-bold">{{explode(' ',$activity->created_at)[1]}}</span> {!! $activity->comments !!}</div>
                @endforeach
            </div>
        </div>
    @endforeach
</x-content>