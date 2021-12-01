<x-card icon="fab fa-searchengin" title="Llegada del verificador">
    <div class="flex gap-5 flex-wrap">
        @foreach ($locations as $location)
        <div
            class="w-12 h-12 text-center bg-{{$location->llegada_verificador != null ? 'green':'gray'}}-600 text-white rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
            <div>{{$location->name}}</div>
        </div>
        @endforeach
    </div>
</x-card>