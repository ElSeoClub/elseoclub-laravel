<section class="flex flex-col gap-5">
    <x-card>
        <div class="flex flex-col divide-y">
            <label class="font-bold">No. de expediente*
                <input type="text" class="text-sm w-full" wire:model.defer="asunto.expediente">
            </label>
            <label class="font-bold">Tipo de asunto
            <select class="w-full text-sm" wire:model.defer="asunto.tipo_id">
                <option value="0">Elige un tipo de asunto</option>
                @foreach($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                @endforeach
            </select>
                <x-jet-input-error for="asunto.tipo_id"/>
            </label>
        </div>
        <x-slot name="footer">
            <x-button color="red" click="create()">Crear asunto</x-button>
        </x-slot>
    </x-card>
</section>
