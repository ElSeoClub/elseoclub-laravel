<div class="space-y-6 w-full max-w-6xl mx-auto">
    <div class="text-xl">Laboral</div>
    <div class="p-3 grid grid-cols-1 gap-3 lg:grid-cols-2 max-w-[1200px] m-auto">
        <a href="{{route('reportes.proxima_semana')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">1 Audiencias de la próxima semana (Laboral)</div>
        </a>
        <a href="{{route('reportes.laboral.semana-en-curso')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">2 Audiencias de la semana en curso (Laboral)</div>
        </a>
        <a href="{{route('reportes.laboral.rango-fechas')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">3 Audiencias por rango de fechas (Laboral)</div>
        </a>
    </div>
    <div class="text-xl">Tribunal</div>
    <div class="p-3 grid grid-cols-1 gap-3 lg:grid-cols-2 max-w-[1200px] m-auto">
    </div>

    <div class="text-xl">Conciliación Prejudicial</div>
    <div class="p-3 grid grid-cols-1 gap-3 lg:grid-cols-2 max-w-[1200px] m-auto">
        <a href="{{route('reportes.conciliacion_prejudicial')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">4 Conciliación prejudicial próxima semana</div>
        </a>
        <a href="{{route('reportes.conciliacion_prejudicial_now')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">5 Conciliación prejudicial semana en curso</div>
        </a>
        <a href="{{route('reportes.conciliacion_prejudicial_date')}}" class="p-5 flex bg-white shadow rounded-lg gap-3 items-center active:border-gray-600 active:border select-none">
            <div class="w-10"><img src="{{asset('svg/report.png')}}" class="h-8"></div>
            <div class="grid-grow truncate">5 Conciliación por rango de fechas</div>
        </a>
    </div>
</div>
