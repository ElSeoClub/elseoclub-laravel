<div>
    <div class="flex flex-row gap-3 w-full p-6 bg-gray-100">
        <div class="w-[550px]">
            <div class="grid grid-cols-12 w-[550px]">
                <div class="bg-white col-span-10 px-3 py-1 font-bold">Coordinación</div>
                <div class="bg-white col-span-2 px-3 py-1 font-bold">Asistentes</div>
                @foreach($event->locations as $location)
                    <div class="bg-white col-span-10 px-3 py-1 font-bold">{{$location->name}}</div>
                    <div class="bg-white col-span-2 px-3 py-1 font-bold">{{$location->guests()->count()}} de {{$location->guests()->count()}}</div>
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-6 items-center text-center overflow-y-scroll"  style="height:calc(100vh - 50px)">
            @foreach($event->locations as $location)
            @foreach($location->fresh()->guests as $guest)
                <div>
                    <img src="{{Storage::url($guest->profile_photo_path)}}"
                         class="w-24 h-24 rounded-full m-auto {{$guest->pivot->attendance_door_id == null ? 'grayscale border-4 border-green-300':'border-4 border-green-500'}}"
                         alt="">
                    <div class="text-gray-800 font-bold">
                        <div>{{$guest->username}}</div>
                        <div class="text-sm uppercase">{{$guest->name}}</div>
                    </div>
                </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div>
