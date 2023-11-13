<div>
    <div class="flex flex-row gap-3 w-full p-6 bg-gray-100">
        <div class="w-[750px]">
            <div class="bg-white grid grid-cols-12 w-[750px] text-2xl rounded border shadow">
                <div class="col-span-9 px-3  pb-1 font-bold">Sedes</div>
                <div class="col-span-3 px-3  pb-1 font-bold text-center">Asistentes</div>
                @foreach($event->locations as $location)
                    <div class="col-span-9 px-3 pb-1 font-bold">{{$location->name}}</div>
                    <div class="col-span-3 px-3  pb-1 font-bold text-center">{{$location->guests()->count()}} de {{$location->guests()->count()}}</div>
                @endforeach
            </div>
        </div>
        <div class="grid grid-cols-5 items-center text-center overflow-y-scroll"  style="height:calc(100vh - 50px)">
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
