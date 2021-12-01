<x-card>
    <div class="flex gap-5">
        @foreach ($event->locations as $location)
        <div
            class="w-12 h-12 text-center bg-gray-400 rounded-full flex content-center flex-wrap justify-center font-bold text-xl">
            <div>{{$location->name}}</div>
        </div>
        @endforeach
    </div>
</x-card>