<div>
    <div class="grid grid-cols-4 gap-3">
        <x-card title="Asistencia" px="0" py="0">
            <canvas id="myCharta" width="400" height="400"></canvas>
            <div class="bg-white shadow-xl rounded-lg">
                <ul class="divide-y divide-gray-300">
                    <li class="p-4 hover:bg-gray-50">
                        <i
                            class="fas fa-{{$event->guests()->count()/2 <= $event->guests()->whereNotNull('attendance_door_id')->count() ? 'check': 'times'}} mr-2 text-{{$event->guests()->count()/2 <= $event->guests()->whereNotNull('attendance_door_id')->count() ? 'green': 'red'}}-600"></i>Nacional
                        <div class="float-right">
                            {{$event->guests()->whereNotNull('attendance_door_id')->count()}} de
                            {{$event->guests()->count()}}
                        </div>
                    </li>
                    @foreach ($locations as $location)
                    <li class="p-4 hover:bg-gray-50">
                        <i
                            class="fas fa-{{$location->guests()->count()/2 <= $location->guests()->whereNotNull('attendance_door_id')->count() ? 'check': 'times'}} mr-2 text-{{$location->guests()->count()/2 <= $location->guests()->whereNotNull('attendance_door_id')->count() ? 'green': 'red'}}-600"></i>{{$location->name}}
                        <div class="float-right">
                            {{$location->guests()->whereNotNull('attendance_door_id')->count()}} de
                            {{$location->guests()->count()}}
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </x-card>
        @foreach ($event->consultas()->get()->unique('name') as $consulta)
        <x-card title="{{$consulta->name}}" px="0" py="0">
            <canvas id="{{$consulta->short_name}}" width="400" height="400"></canvas>
            <div class="bg-white shadow-xl rounded-lg">
                <ul class="divide-y divide-gray-300">
                    <li class="p-4 hover:bg-gray-50"><i
                            class="fas fa-thumbs-{{$event->consultas()->where('name',$consulta->name)->sum('si') > $event->consultas()->where('name',$consulta->name)->sum('no') ? 'up':'down'}} mr-2 text-{{$event->consultas()->where('name',$consulta->name)->sum('si') > $event->consultas()->where('name',$consulta->name)->sum('no') ? 'green':'red'}}-600"></i>Nacional
                        <div class="float-right">
                            {{$event->consultas()->where('name',$consulta->name)->sum('si')}} /
                            {{$event->consultas()->where('name',$consulta->name)->sum('no')}} /
                            {{$event->consultas()->where('name',$consulta->name)->sum('nulo')}}
                        </div>
                    </li>
                    @foreach ($locations as $location)
                    <li class="p-4 hover:bg-gray-50"><i
                            class="fas fa-thumbs-{{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si > $location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->no ? 'up':'down'}} mr-2 text-{{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si > $location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->no ? 'green':'red'}}-600"></i>{{$location->name}}
                        <div class="float-right">
                            {{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->si}}
                            /
                            {{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->no}}
                            /
                            {{$location->consultas()->where('location_id',$location->id)->where('name',$consulta->name)->first()->nulo}}
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
        </x-card>
        @endforeach

    </div>
</div>

<script>
    @foreach ($event->consultas()->get()->unique('name') as $consulta)
    var ctx{{$consulta->short_name}} = document.getElementById("{{$consulta->short_name}}");
        var {{$consulta->short_name}} = new Chart(ctx{{$consulta->short_name}}, {
        type: 'doughnut',
        data: {            
            labels: ["Si", "No", "No votó"],
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
    });
    @endforeach

    var ctxa = document.getElementById("myCharta");
    var myCharta = new Chart(ctxa, {
    type: 'doughnut',
    data: {
        labels: ["Asistió", "No Asistió"],
        datasets: [{
            label: '# of Votes',
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
});

function go(){
    setTimeout(() => {
        location.reload(true);
    }, 50000);
}

go();
</script>
</div>