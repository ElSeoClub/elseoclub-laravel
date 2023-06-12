<div>
    <div class="grid grid-cols-3 gap-3 uppercase text-xl" wire:poll.30000ms>
        @foreach ($locations as $location)
        <x-card title="{{$location->name}}" >
            <div class="relative pt-1">
                <div class="flex mb-2 items-center justify-between">
                    <div>
                        <span class="
                    
                    font-bold
                    inline-block
                    py-1
                    px-2
                  ">
                            Asistencia
                        </span>
                    </div>
                    <div class="text-left">
                        <span class=" font-semibold inline-block text-gray-600">
                            {{$location->guests()->whereNotNull('attendance_door_id')->count()}} de
                            {{$location->guests()->count()}}
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="font-semibold inline-block text-gray-600">
                            {{$location->guests()->count() > 0
                            ?round(($location->guests()->whereNotNull('attendance_door_id')->count()/$location->guests()->count())*100,0)
                            : '0'}}%


                        </span>
                    </div>
                </div>
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                    <div style="width: {{$location->guests()->count() > 0 ?round(($location->guests()->whereNotNull('attendance_door_id')->count()/$location->guests()->count())*100,0) : '0'}}%"
                        class="
                  shadow-none
                  flex flex-col
                  text-center
                  whitespace-nowrap
                  text-white
                  justify-center
                  bg-green-500
                "></div>
                </div>
                <div class="overflow-ellipsis" style="height: 160px">
                    @php
                        $p = [];
                        $p[] = $location->p1(3) ?? 0;
                        $p[] = $location->p2(3) ?? 0;
                        $p[] = $location->p3(3) ?? 0;
                        $p[] = $location->p4(3) ?? 0;
                        $biggest = max($p);
                    @endphp
                    <table class="w-full text-center text-base mt-6 ">
                        <thead>
                        <th class="text-left">Planilla</th>
                        <th>Votos</th>
                        <th>%</th>
                        </thead>
                        <tbody>
                        @if($location->pc1(3))
                            <tr class="
                            @if($p[0] == $biggest && $p[0] != null) bg-green-600 text-white font-bold @else bg-gray-200 text-gray-800 @endif
                            ">
                                <td class="text-left font-bold">Planilla 1: {{$location->pc1(3)}}</td>
                                <td class="font-bold">{{$location->p1(3)}}</td>
                                <td class="font-bold">{{round(($location->p1(3)/$location->guests()->count())*100)}}%</td>
                            </tr>
                        @endif
                        @if($location->pc2(3))
                            <tr class="
                            @if($p[1] == $biggest && $p[1] != null) bg-green-600 text-white font-bold @else bg-gray-200 text-gray-800 @endif
                            ">
                                <td class="text-left font-bold">Planilla 2: {{$location->pc2(3)}}</td>
                                <td class="font-bold">{{$location->p2(3)}}</td>
                                <td class="font-bold">{{round(($location->p2(3)/$location->guests()->count())*100)}}%</td>
                            </tr>
                        @endif
                        @if($location->pc3(3))
                            <tr class="
                            @if($p[2] == $biggest && $p[2] != null) bg-green-600 text-white font-bold @else bg-gray-200 text-gray-800 @endif
                            ">
                                <td class="text-left font-bold">Planilla 3: {{$location->pc3(3)}}</td>
                                <td class="font-bold">{{$location->p3(3)}}</td>
                                <td class="font-bold">{{round(($location->p3(3)/$location->guests()->count())*100)}}%</td>
                            </tr>
                        @endif
                        @if($location->pc4(3))
                            <tr class="
                            @if($p[3] == $biggest && $p[3] != null) bg-green-600 text-white font-bold @else bg-gray-200 text-gray-800 @endif
                            ">
                                <td class="text-left font-bold">Planilla 4: {{$location->pc4(3)}}</td>
                                <td class="font-bold">{{$location->p4(3)}}</td>
                                <td class="font-bold">{{round(($location->p4(3)/$location->guests()->count())*100)}}%</td>
                            </tr>
                        @endif
                        <tr class="bg-gray-100 text-gray-800">
                            <td class="text-left font-bold">Votos nulos</td>
                            <td class="font-bold">{{$location->nulos(3)}}</td>
                            <td class="font-bold">{{round(($location->nulos(3)/$location->guests()->count())*100)}}%</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </x-card>
            @if($location->name == "ztc-Zona de Transmisión")
                <div class="h-24">
            
                </div>
                <div class="h-24">
            
                </div>
                <div class="h-24">
            
                </div>
            @endif
        
            @if($location->name == "ztm-Zona de Transmisión Metropolitana")
                <div class="h-24">
            
                </div>
                <div class="h-24">
            
                </div>
                <div class="h-24">
            
                </div>
                <div class="h-24">
            
                </div>
                <div class="h-24">
            
                </div>
            @endif
        @endforeach
    </div>
</div>