<x-card title="Datos principales">
    <x-container>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Prioridad:</p>
                <x-select>
                    <option value="">Alta</option>
                    <option value="">Media</option>
                    <option value="">Baja</option>
                </x-select>
            </div>
            <div></div>
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Estado procesal del asunto:</p>
                <x-select>
                    <option value="">Ofrecimiento de pruebas</option>
                </x-select>
            </div>
        </x-box>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente de la autoridad:</p>
                <x-input-text></x-input-text>
            </div>
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente interno:</p>
                <x-input-text></x-input-text>
            </div>
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>No. de expediente auxiliar:</p>
                <x-input-text></x-input-text>
            </div>
        </x-box>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Promueve:</p>
                <x-select>
                    <option value="">CFE</option>
                </x-select>
            </div>
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Fecha de presentación del asunto:</p>
                <x-input-date></x-input-date>
            </div>
        </x-box>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Abogado a cargo:</p>
                <x-select>
                    <option value="">Lucio Vargas Galvan</option>
                </x-select>
            </div>
        </x-box>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Ubicación geográfica de la problemática (Entidad):</p>
                <x-select>
                    <option value="">CIUDAD DE MÉXICO</option>
                </x-select>
            </div>
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Municipio:</p>
                <x-select>
                    <option value="">MIGUEL HIDALGO</option>
                </x-select>
            </div>
        </x-box>
        <x-box class="grid grid-cols-1 md:gap-3 md:grid-cols-3">
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Promovente:</p>
                <x-input-text></x-input-text>
            </div>
            <div>
                <p class="text-xs text-slate-700 font-bold"><x-required/>Promovido:</p>
                <x-input-text></x-input-text>
            </div>
        </x-box>
    </x-container>
</x-card>