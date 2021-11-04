<div class="grid grid-cols-5 gap-5">
    <div class="col-span-3">
        <x-card title="Sedes del evento" px="0" py="0">
            <x-table>
                <x-slot name="thead">
                    <th class="text-left px-5 py-1">Nombre</th>
                    <th class="text-left px-5 py-1"># de invitados</th>
                    <th class="text-left px-5 py-1"># de Boletas</th>
                </x-slot>
                <x-slot name="tbody">
                    @foreach ($locations as $key => $location)
                    @if (Auth::user()->hasPermission($location->name))
                    <tr class="hover:bg-gray-100">
                        <td class="px-5 py-1">{{$location->name}}</td>
                        <td class="px-5 py-1">{{$location->guests()->count()}}</td>
                        <td class="px-5 py-1"><input type="text" wire:keyup="save({{$location->id}},event.target.value)"
                                value="{{$location->boletas}}"></td>
                    </tr>
                    @endif

                    @endforeach
                </x-slot>
            </x-table>
        </x-card>
    </div>
    <div class="col-span-2">
        <x-card title="Asistencia" px="0" py="0">
            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
            </script>

        </x-card>
    </div>
</div>