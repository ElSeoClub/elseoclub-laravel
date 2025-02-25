<div class="flex flex-col gap-3  max-w-5xl m-auto w-full">
    <h2 class="text-2xl font-bold">Contratos colectivos</h2>
    <div class="p-3 grid grid-cols-1 md:grid-cols-2 gap-3 lg:grid-cols-3 max-w-[1200px] m-auto">
        <a href="{{route('test.contratos')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">Contratos Colectivos de trabajo</div>
        </a>
        <a href="{{route('reportes.index')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">Consultas al CTT</div>
        </a>
        <a href="{{route('reportes.index')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">Revisiones salariales</div>
        </a>
        <a href="{{route('reportes.index')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">Legitimación</div>
        </a>
    </div>

</div>