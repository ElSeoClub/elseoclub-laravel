<div class="p-3 grid grid-cols-1 md:grid-cols-2 gap-3 lg:grid-cols-3 max-w-[1200px] m-auto">
    @foreach($matters as $matter)
        <a href="{{route('subjects.index',$matter)}}"
           class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none border-2 border-transparent hover:text-orange-500 hover:border-orange-500">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">{{$matter->name}}</div>
        </a>
    @endforeach
    <a href="{{route('reportes.index')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
        <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
        <div class="grid-grow truncate">Reportes</div>
    </a>
</div>
