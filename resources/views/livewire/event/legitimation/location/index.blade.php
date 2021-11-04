<div class="grid grid-cols-5 gap-5">
    <div class="col-span-3">
        <x-table>
            <x-slot name="thead">
                <th class="text-left px-5 py-1 font-bold text-lg">Nombre</th>
                <th class="text-left px-5 py-1 font-bold text-lg"># de invitados</th>
                <th class="text-left px-5 py-1 font-bold text-lg"># asistentes</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($locations as $key => $location)
                @if (Auth::user()->hasPermission($location->name))
                <tr class="hover:bg-gray-100">
                    <td class="px-5 py-1 font-bold text-lg">{{$location->name}}</td>
                    <td class="px-5 py-1 font-bold text-lg text-center">{{$location->guests()->count()}}</td>
                    <td class="px-5 py-1 font-bold text-lg text-center"><input type="text" id="e_{{$key}}"
                            value="{{$location->boletas}}" onkeyup="addData(myChart)"
                            class="py-1 asist outline-none border-none text-center">
                    </td>
                </tr>
                @endif

                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="col-span-2">
        <x-card title="" px="0" py="0">
            <canvas id="myChart" width="400" height="400"></canvas>
        </x-card>
        <x-card title="" px="5" py="3">
            <div class="font-bold text-3xl">
                Asistencia Nacional: <span id="tot">0</span> de
                {{$event->guests()->count()}}
            </div>
        </x-card>
    </div>

    <script>
        const total = {{$event->guests()->count()}};
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
        labels: [''],
        datasets: [{
            label: 'Porcentaje de Asistencia 0%',
            data: [0],
            backgroundColor: [
                'rgba(46, 171, 50, 1)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
        },
        options: {
        indexAxis: 'y',
        scales: {
            x: {
                beginAtZero: true,
                min: 0,
                max: 100,
                weight: 'bold',
                ticks: {
                // forces step size to be 50 units
                stepSize: 10,
                font: {
                    size: 20,
                    weight: 'bold'
                }
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 32,
                        weight: 'bold'
                    }
                }
            }
        }
        }
        });

        function roundToX(num, X) {    
            return +(Math.round(num + "e+"+X)  + "e-"+X);
        }

        function addData() {
            asist = document.getElementsByClassName('asist');
            data = [0];

            for(n = 0; n < asist.length; n++){
                data[0] += parseInt(asist[n].value) || 0;
            }

            tot = data[0];
            document.getElementById('tot').innerHTML = tot;

            data[0] = roundToX((data[0]/total)*100,2);

            myChart.data.datasets.forEach((dataset) => {
                dataset.label = 'Porcentaje de Asistencia '+data[0]+'%',
                dataset.data = data;
            });
            myChart.update();
        }
        addData();
    </script>
</div>