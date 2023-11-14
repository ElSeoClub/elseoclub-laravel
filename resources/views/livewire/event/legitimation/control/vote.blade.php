<div>
    <x-card>
        <x-input type="text" label="nombre de la votacion" model="name"></x-input>
        <x-input type="text" label="Etiqueta 1" model="label_1"></x-input>
        <x-input type="text" label="Etiqueta 2" model="label_2"></x-input>
        <x-input type="text" label="Etiqueta 3" model="label_3"></x-input>
        <x-input type="text" label="Etiqueta 4" model="label_4"></x-input>
        <x-input type="text" label="Etiqueta 5" model="label_5"></x-input>
        <x-input type="text" label="Etiqueta 6" model="label_6"></x-input>
        <x-input type="text" label="Etiqueta 7" model="label_7"></x-input>
        <x-input type="text" label="Etiqueta 8" model="label_8"></x-input>
        <x-input type="text" label="Etiqueta 9" model="label_9"></x-input>
        <x-input type="text" label="Etiqueta 10" model="label_10"></x-input>
        <x-slot name="footer">
            <x-button click="create">Crear</x-button>
        </x-slot>
    </x-card>

    <x-card>
        @foreach($event->votaciones as $votacion)
            <div>{{$votacion->name}}</div>
        @endforeach
    </x-card>
</div>
