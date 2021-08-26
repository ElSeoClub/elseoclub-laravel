<div>
    <x-table>
        <x-slot name="thead">
            <th class="text-left p-3">Sede</th>
            <th class="text-left p-3">Voto si</th>
            <th class="text-left p-3">Voto no</th>
            <th class="text-left p-3">Voto nulo</th>
        </x-slot>
        <x-slot name="tbody">
            <tr>
                <td class="p-3">Whirlpool</td>
                <td class="p-3">
                    <div class="flex">
                        <button type="button" class="text-base bg-red-500 text-white font-bold px-3 py-1 rounded
    hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring focus:ring-red-600
    focus:ring-opacity-50"
                            onclick="document.getElementById('si').value = parseInt(document.getElementById('si').value)-1; document.getElementById('si').dispatchEvent(new Event('keyup'))">
                            -
                        </button>
                        <input type="number" id="si" class="h-8 mx-2" wire:model.defer="event.si">
                        <button type="button" class="text-base bg-green-500 text-white font-bold px-3 py-1 rounded
    hover:bg-green-600 focus:bg-green-600 focus:outline-none focus:ring focus:ring-green-600
    focus:ring-opacity-50"
                            onclick="document.getElementById('si').value = parseInt(document.getElementById('si').value)+1; document.getElementById('si').dispatchEvent(new Event('keyup'))">
                            +
                        </button>
                    </div>
                </td>
                <td class="p-3">
                    <div class="flex">
                        <button type="button" class="text-base bg-red-500 text-white font-bold px-3 py-1 rounded
    hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring focus:ring-red-600
    focus:ring-opacity-50"
                            onclick="document.getElementById('no').value = parseInt(document.getElementById('no').value)-1; document.getElementById('no').dispatchEvent(new Event('keyup'))">
                            -
                        </button>
                        <input type="number" id="no" class="h-8 mx-2" wire:model.defer="event.no">
                        <button type="button" class="text-base bg-green-500 text-white font-bold px-3 py-1 rounded
    hover:bg-green-600 focus:bg-green-600 focus:outline-none focus:ring focus:ring-green-600
    focus:ring-opacity-50"
                            onclick="document.getElementById('no').value = parseInt(document.getElementById('no').value)+1; document.getElementById('no').dispatchEvent(new Event('keyup'))">
                            +
                        </button>
                    </div>
                </td>
                <td class="p-3">
                    <div class="flex">
                        <button type="button" class="text-base bg-red-500 text-white font-bold px-3 py-1 rounded
    hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:ring focus:ring-red-600
    focus:ring-opacity-50"
                            onclick="document.getElementById('nulo').value = parseInt(document.getElementById('nulo').value)-1; document.getElementById('nulo').dispatchEvent(new Event('keyup'))">
                            -
                        </button>
                        <input type="number" id="nulo" class="h-8 mx-2" wire:model.defer="event.nulo">
                        <button type="button" class="text-base bg-green-500 text-white font-bold px-3 py-1 rounded
    hover:bg-green-600 focus:bg-green-600 focus:outline-none focus:ring focus:ring-green-600
    focus:ring-opacity-50"
                            onclick="document.getElementById('nulo').value = parseInt(document.getElementById('nulo').value)+1; document.getElementById('nulo').dispatchEvent(new Event('keyup'))">
                            +
                        </button>
                    </div>
                </td>
            </tr>
        </x-slot>
    </x-table>
    <x-button icon="fas fa-save" color="green" click="save">Guardar cambios</x-button>
</div>