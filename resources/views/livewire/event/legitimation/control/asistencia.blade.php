<div>
    <div class="flex flex-row gap-3 w-full p-6 bg-gray-100">
        <div class="w-[750px]">
            <h1 class="text-2xl text-center">Asistencia preliminar</h1>
            <div class="bg-white grid grid-cols-12 w-[750px] text-2xl rounded border shadow">
                <div class="col-span-9 px-3  pb-1 font-bold"></div>
                <div class="col-span-3 px-3  pb-1 font-bold text-center">Asistentes</div>
                @foreach($event->fresh()->locations as $location)
                    <div class="col-span-9 px-3 pb-1 font-bold">{{$location->name}}</div>
                    <div class="col-span-3 px-3  pb-1 font-bold text-center">{{$location->fresh()->guests()->whereNotNull('attendance_door_id')->count()}} de {{$location->guests()->count()}}</div>
                @endforeach
            </div>
            <div class="w-full mt-5">
                            <span class="font-bold text-xl">Asistencia general:
                            {{$event->guests()->whereNotNull('attendance_door_id')->count()}} de
                            {{$event->guests()->count()}}
                            </span>
                <div class=" shadow-md w-full bg-gray-200 h-9 rounded">
                    <div class="bg-green-500 text-xs leading-none text-center text-white h-full rounded py-2 font-bold text-lg"
                         style="width: {{round(($event->guests()->whereNotNull('attendance_door_id')->count()/$event->guests()->count())*100)}}%">
                        {{round(($event->guests()->whereNotNull('attendance_door_id')->count()/$event->guests()->count())*100)}}%
                    </div>
                </div>
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
