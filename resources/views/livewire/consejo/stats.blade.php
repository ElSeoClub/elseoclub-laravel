<div>
    <div class="grid grid-cols-3 gap-3">
        <div class="col-span-3 grid grid-cols-3 gap-3" id="stats_0" style="{{$consultax == 0 ? '':'display:none'}}">
            <x-card title="Asistencia" px="0" py="3">
                <canvas id="myCharta" width="400" height="400"></canvas>
            </x-card>
            <div class="col-span-2">
                <x-card title="Coordinaciones" px="0" py="0">
                    <div class="bg-white shadow-xl rounded-lg">
                        <div class="grid grid-cols-2 gap-5 py-3 px-5">
                            @if (Auth::user()->hasPermission('Global'))
                            <div class="px-2 hover:bg-gray-50 col-span-2 font-bold text-black text-xl">
                                <i
                                    class="fas fa-{{$event->guests()->count()/2 <= $event->guests()->whereNotNull('attendance_door_id')->count() ? 'check': 'times'}} mr-2 text-{{$event->guests()->count()/2 <= $event->guests()->whereNotNull('attendance_door_id')->count() ? 'green': 'red'}}-600"></i>Nacional
                                <div class="float-right font-bold text-black text-xl">
                                    {{$event->guests()->whereNotNull('attendance_door_id')->count()}} de
                                    {{$event->guests()->count()}}
                                </div>
                                </li>
                            </div>
                            @endif
                            @foreach ($locations as $location)

                            @if (Auth::user()->hasPermission($location->name) || Auth::user()->hasPermission('Global'))
                            <div class="px-2 hover:bg-gray-50 font-bold text-black text-xl">
                                <i
                                    class="fas fa-{{$location->guests()->count()/2 <= $location->guests()->whereNotNull('attendance_door_id')->count() ? 'check': 'times'}} mr-2 text-{{$location->guests()->count()/2 <= $location->guests()->whereNotNull('attendance_door_id')->count() ? 'green': 'red'}}-600"></i>{{$location->name}}
                                <div class="float-right font-bold text-black text-xl">
                                    {{$location->guests()->whereNotNull('attendance_door_id')->count()}} de
                                    {{$location->guests()->count()}}
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
        @foreach ($event->consultas()->get()->unique('name') as $consulta)
        <div class="col-span-3 grid grid-cols-3 gap-3" id="stats_{{$consulta->id}}"
            style="{{$consultax == $consulta->id ? '':'display:none'}}">
            <x-card title="{{$consulta->name}}" px="0" py="3">
                <canvas id="{{$consulta->short_name}}" width="400" height="400"></canvas>
            </x-card>
            <div class="col-span-2">
                <x-card title="Coordinaciones" px="0" py="0">
                    <div class="bg-white shadow-xl rounded-lg">
                        <div class="grid grid-cols-2 gap-5 py-3 px-5">
                            @if (Auth::user()->hasPermission('Global'))
                            <div class="px-2 hover:bg-gray-50 col-span-2 font-bold text-black text-xl"><i
                                    class="fas fa-thumbs-{{$event->consultas()->where('name',$consulta->name)->sum('si') > 0 ? ($event->consultas()->where('name',$consulta->name)->sum('si') > $event->consultas()->where('name',$consulta->name)->sum('no') ? 'up':'down') : ''}} mr-2 text-{{$event->consultas()->where('name',$consulta->name)->sum('si') > $event->consultas()->where('name',$consulta->name)->sum('no') ? 'green':'red'}}-600"></i>Nacional
                                <div class="float-right font-bold text-black text-xl">
                                    {{$event->consultas()->where('name',$consulta->name)->sum('si')}} /
                                    {{$event->consultas()->where('name',$consulta->name)->sum('no')}} /
                                    {{$event->consultas()->where('name',$consulta->name)->sum('nulo')}}
                                </div>
                            </div>
                            @endif
                            @foreach ($locations as $location)
                            @if (Auth::user()->hasPermission($location->name) ||
                            Auth::user()->hasPermission('Global'))
                            <div class="px-2 hover:bg-gray-50 font-bold text-black text-xl"><i
                                    class="fas fa-thumbs-{{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si > 0 ? ($location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si > $location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->no ? 'up':'down'):''}} mr-2 text-{{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si > $location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->no ? 'green':'red'}}-600"></i>{{$location->name}}
                                <div class="float-right font-bold text-black text-xl">
                                    {{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si}}
                                    /
                                    {{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->no}}
                                    /
                                    {{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->nulo}}
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        <select onchange="location.href='/consejo/estadisticas/{{$event->id}}/'+this.value">
            <option value="0">
                Asistencia</option>
            @foreach ($event->consultas()->get()->unique('name') as $consulta)
            <option value="{{$consulta->id}}" {{$consultax==$consulta->id ? 'selected':''}}>{{$consulta->name}}</option>
            @endforeach
        </select>
    </div>
    <script>
        @foreach ($event->consultas()->get()->unique('name') as $consulta)
        var ctx{{$consulta->short_name}} = document.getElementById("{{$consulta->short_name}}");
        var {{$consulta->short_name}} = new Chart(ctx{{$consulta->short_name}}, {
        type: 'doughnut',
        data: {            
            labels: ['Si {{round(($event->consultas()->where('name',$consulta->name)->sum('si')/$event->guests()->count())*100,0)}}%', 'No {{round($event->consultas()->where('name',$consulta->name)->sum('no')/$event->guests()->count()*100,0)}}%', 'No votó {{round($event->consultas()->where('name',$consulta->name)->sum('nulo')/$event->guests()->count()*100,0)}}%'],
            datasets: [{
                label: '# of Votes',
                data: [{{$event->consultas()->where('name',$consulta->name)->sum('si')}},{{$event->consultas()->where('name',$consulta->name)->sum('no')}},{{$event->consultas()->where('name',$consulta->name)->sum('nulo')}}],
                backgroundColor: [
                    'rgba(80, 128, 27, 0.4)',
                    'rgba(186, 24, 46, 0.4)',
                    'rgba(125, 125, 125, 0.4)'
                ],
                borderColor: [
                    'rgba(80, 128, 27, 1)',
                    'rgba(186, 24, 46, 1)',
                    'rgba(125, 125, 125, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 22,
                        weight: 'bold'
                    }
                }
            }
        }
        }
    });
    @endforeach
    

    var ctxa = document.getElementById("myCharta");
    var myCharta = new Chart(ctxa, {
        type: 'doughnut',
        data: {
            labels: ["Asistió {{round(($event->guests()->whereNotNull('attendance_door_id')->count()/($event->guests()->whereNotNull('attendance_door_id')->count()+$event->guests()->whereNull('attendance_door_id')->count()))*100,0)}}%", "No Asistió {{round(($event->guests()->whereNull('attendance_door_id')->count()/($event->guests()->whereNotNull('attendance_door_id')->count()+$event->guests()->whereNull('attendance_door_id')->count()))*100,0)}}%"],
            datasets: [{
                data: [{{$event->guests()->whereNotNull('attendance_door_id')->count()}}, {{$event->guests()->whereNull('attendance_door_id')->count()}}],
                backgroundColor: [
                    'rgba(80, 128, 27, 0.4)',
                    'rgba(125, 125, 125, 0.4)'
                ],
                borderColor: [
                    'rgba(80, 128, 27, 1)',
                    'rgba(125, 125, 125, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 24,
                        weight: 'bold'
                    }
                }
            }
        }
    }
    });

function go(){
    setTimeout(() => {
        location.reload(true);
    }, 60000);
}

go();
    </script>
</div>