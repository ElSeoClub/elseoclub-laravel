<div class="grid grid-cols-5 gap-5">
    <div class="col-span-3">
        <x-table>
            <x-slot name="thead">
                <th class="text-left px-5 py-1">Nombre</th>
                <th class="text-left px-5 py-1"># de invitados</th>
                <th class="text-left px-5 py-1"># asistentes</th>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($locations as $key => $location)
                @if (Auth::user()->hasPermission($location->name))
                <tr class="hover:bg-gray-100">
                    <td class="px-5 py-1 font-bold text-lg">{{$location->name}}</td>
                    <td class="px-5 py-1 font-bold text-lg">{{$location->guests()->count()}}</td>
                    <td class="px-5 py-1 font-bold text-lg"><input type="text"
                            wire:keyup="save({{$location->id}},event.target.value)" value="{{$location->boletas}}"
                            class="py-1"></td>
                </tr>
                @endif

                @endforeach
            </x-slot>
        </x-table>
    </div>
    <div class="col-span-2">
        <x-card title="Asistencia" px="0" py="0">
            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(75, 192, 192, 1)',
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