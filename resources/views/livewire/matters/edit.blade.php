<x-content>
    <x-card class="mt-5">
        <x-container>
            <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-1">
                <div>
                    <p class="text-xs text-slate-700 font-bold"><x-required/>Nombre:</p>
                    <x-input-text wire:model.defer="matter.name"></x-input-text>
                    <x-jet-input-error for="matter.name"></x-jet-input-error>
                </div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Acciones o estados procesales:</p>
                <textarea class="resize-none" rows="10" wire:model.defer="matter.task_types" placeholder="Uno por línea"></textarea>
                <div>
                    <select wire:model.defer="matter.status" class="w-56">
                        <option value="draft">Borrador</option>
                        <option value="publish">Publicar</option>
                    </select>
                </div>
            </x-box>
        </x-container>
    
        <x-slot name="footer">
            <x-button color="blue" icon="fas fa-save" class="w-full lg:w-96" click="save()">Guardar cambios</x-button>
        </x-slot>
    </x-card>
    @foreach($matter->fresh()->blocks()->orderBy('position','asc')->get() as $block)
        
        <div class="flex gap-3 w-full items-center">
            @livewire('matters.block.edit',['block' => $block],$block->id)
            
            <div class="flex flex-col gap-3">
                @if($block->position == 0)
                    <div class=" cursor-not-allowed text-gray-500 bg-gray-200 w-6 h-6 rounded-lg shadow flex items-center justify-center">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                @else
                    <div class=" cursor-pointer text-gray-500 hover:text-blue-600 bg-white w-6 h-6 rounded-lg shadow flex items-center justify-center"
                    wire:click="moveUpBlock({{$block->id}})">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                @endif
                @if($block->position+1 == $matter->blocks()->count())
                    <div class=" cursor-not-allowed text-gray-500 bg-gray-200 w-6 h-6 rounded-lg shadow flex items-center justify-center">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                @else
                    <div class=" cursor-pointer text-gray-500 hover:text-blue-600 bg-white w-6 h-6 rounded-lg shadow flex items-center justify-center"
                         wire:click="moveDownBlock({{$block->id}})">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    <x-button class="w-full" icon="fas fa-plus" click="addBlock()">Agregar bloque de formulario</x-button>
</x-content>