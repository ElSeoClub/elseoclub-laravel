<x-card icon="fab fa-searchengin" title="Llegada del verificador por sede">
    <div class="flex gap-5 flex-wrap">
        @foreach ($locations as $location)
        <div
            class="w-12 h-12 text-center bg-{{$location->llegada_verificador != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
            <div>{{$location->name}}</div>
        </div>
        @endforeach
    </div>
</x-card>

<x-card icon="fab fa-searchengin" title="Inicio del proceso de votación">
    <div class="flex gap-5 flex-wrap">
        @foreach ($locations as $location)
        <div
            class="w-12 h-12 text-center bg-{{$location->apertura != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
            <div>{{$location->name}}</div>
        </div>
        @endforeach
    </div>
</x-card>

<x-card icon="fab fa-searchengin" title="Inicio del centro de votación">
    <div class="flex gap-5 flex-wrap">
        @foreach ($locations as $location)
        <div
            class="w-12 h-12 text-center bg-{{$location->apertura != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
            <div>{{$location->name}}</div>
        </div>
        @endforeach
    </div>
</x-card>

<x-card icon="fab fa-searchengin" title="Inicio de conteo de votos">
    <div class="flex gap-5 flex-wrap">
        @foreach ($locations as $location)
        <div
            class="w-12 h-12 text-center bg-{{$location->apertura != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
            <div>{{$location->name}}</div>
        </div>
        @endforeach
    </div>
</x-card>