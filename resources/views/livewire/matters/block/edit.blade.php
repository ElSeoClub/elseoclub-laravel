<x-card>
    <x-status-icon status="{{$block->status}}" wire:click="changeBlockStatus()"/>
    
    <div class="grid grid-cols-3 gap-3">
        <div class="flex flex-col gap-3">
            <input type="text" wire:model.defer="column_1.name" placeholder="Nombre del campo">
            <select  wire:model.defer="column_1.type">
                <option value="text">Tipo de campo</option>
                <option value="text">Texto</option>
                <option value="number">Numérico</option>
                <option value="date">Fecha</option>
                <option value="datetime-local">Fecha completa</option>
                <option value="select">Desplegable</option>
                <option value="checkbox">Checkbox</option>
            </select>
            <textarea class="resize-none" rows="10" wire:model.defer="column_1.options" placeholder="Opciones (solo para desplegable)"></textarea>
            <select wire:model.defer="column_1.required">
                <option value="no">¿Obligatorio?</option>
                <option value="no">No obligatorio</option>
                <option value="yes">Obligatorio</option>
            </select>
            <select wire:model.defer="column_1.status">
                <option value="draft">¿Estado?</option>
                <option value="publish">Publicar</option>
                <option value="deleted">Eliminar</option>
            </select>
        </div>
        <div class="flex flex-col gap-3">
            <input type="text" wire:model.defer="column_2.name" placeholder="Nombre del campo">
            <select  wire:model.defer="column_2.type">
                <option value="text">Tipo de campo</option>
                <option value="text">Texto</option>
                <option value="number">Numérico</option>
                <option value="date">Fecha</option>
                <option value="datetime-local">Fecha completa</option>
                <option value="select">Desplegable</option>
                <option value="checkbox">Checkbox</option>
            </select>
            <textarea class="resize-none" rows="10" wire:model.defer="column_2.options" placeholder="Opciones (solo para desplegable)"></textarea>
            <select wire:model.defer="column_2.required">
                <option value="no">¿Obligatorio?</option>
                <option value="no">No obligatorio</option>
                <option value="yes">Obligatorio</option>
            </select>
            <select wire:model.defer="column_2.status">
                <option value="draft">¿Estado?</option>
                <option value="publish">Publicar</option>
                <option value="deleted">Eliminar</option>
            </select>
        </div>
        <div class="flex flex-col gap-3">
            <input type="text" wire:model.defer="column_3.name" placeholder="Nombre del campo">
            <select  wire:model.defer="column_3.type">
                <option value="text">Tipo de campo</option>
                <option value="text">Texto</option>
                <option value="number">Numérico</option>
                <option value="date">Fecha</option>
                <option value="datetime-local">Fecha completa</option>
                <option value="select">Desplegable</option>
                <option value="checkbox">Checkbox</option>
            </select>
            <textarea class="resize-none" rows="10" wire:model.defer="column_3.options" placeholder="Opciones (solo para desplegable)"></textarea>
            <select wire:model.defer="column_3.required">
                <option value="no">¿Obligatorio?</option>
                <option value="no">No obligatorio</option>
                <option value="yes">Obligatorio</option>
            </select>
            <select wire:model.defer="column_3.status">
                <option value="draft">¿Estado?</option>
                <option value="publish">Publicar</option>
                <option value="deleted">Eliminar</option>
            </select>
        </div>
    </div>
    <x-slot name="footer">
        <x-button click="save()">Guardar cambios</x-button>
    </x-slot>
</x-card>