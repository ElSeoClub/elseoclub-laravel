<div>
    <div class="w-full h-14 flex bg-white flex justify-center">
        <div class="w-full flex max-w-[480px] justify-center">
            <div wire:click="view('info')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'info')  border-red-400 @endif"><img src="{{asset('svg/info.png')}}" width="26" alt=""></div>
            <div wire:click="view('archivos')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'archivos')  border-red-400 @endif"><img src="{{asset('svg/files.png')}}" width="26" alt=""></div>
            <div wire:click="view('dinero')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'dinero')  border-red-400 @endif"><img src="{{asset('svg/money-bag.png')}}" width="26" alt=""></div>
            <div wire:click="view('actuaciones')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'actuaciones')  border-red-400 @endif"><img src="{{asset('svg/wall-clock.png')}}" width="26" alt=""></div>
            <div wire:click="view('configuracion')" class="w-[20%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 @if($view == 'configuracion')  border-red-400 @endif"><img src="{{asset('svg/cog.png')}}" width="26" alt=""></div>
        </div>
    </div>
    <div class="max-w-[1200px] mx-auto">
        @if($view == 'info')
            <x-card>
                s
            </x-card>
        @elseif($view == 'actuaciones')
            <x-button click="view('agregar_actuacion')">Agregar actuación</x-button>
            <div class="flex flex-col divide-y bg-white border rounded shadow">
                @foreach($asunto->fresh()->actuaciones as $actuacion)
                    <div class="flex gap-3 p-4" wire:click="editarActuacion({{$actuacion->id}})">
                        <div class="text-xs flex items-center @if($actuacion->status == 0) text-gray-300 @else text-green-600 @endif"><i class="fas fa-circle"></i></div>
                        <div>{{$actuacion->fecha}}</div>
                        <div class="truncate flex-grow">{{$actuacion->comentarios_apertura}}</div>
                    </div>
                @endforeach
            </div>
        @elseif($view == 'agregar_actuacion')
            <x-card title="Nueva actuación">
                <textarea wire:model="actuationComment" placeholder="Comentarios de la actuación"></textarea>
                <input type="datetime-local" wire:model.defer="actuationDate">
                <x-slot name="footer">
                    <x-button click="agregarActuacion()">Agregar actuación</x-button>
                </x-slot>
            </x-card>
        @elseif($view == 'editarActuacion')
            <x-card title="Actuación">
                <span class="font-bold">Comentarios de apertura</span>
                <textarea disabled class="bg-gray-200 w-full">{{$actuacion->comentarios_apertura}}</textarea>
                <span class="font-bold">Comentarios de cierre</span>
                @if($actuacion->status == 1)
                    <textarea  class="bg-gray-200 w-full" disabled>{{$actuacion->comentarios_cierre}}</textarea>
                @else
                    <textarea class="w-full" wire:model.defer="comentariosCierre"></textarea>
                    <x-slot name="footer">
                        <x-button click="cerrarActuacion()">Finalizar actuación</x-button>
                    </x-slot>
                @endif
            </x-card>
        @endif
        
    </div>
</div>
