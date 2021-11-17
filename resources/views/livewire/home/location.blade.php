<div class="p-2">
    @if ($location)
    <div class="text-left">
        <p class="text-xl">Trabajador: <span class="text-yellow-600 font-bold">{{$user->name}}</span></p>
        <p class="text-xl">Dirección: <span class="text-yellow-600 font-bold"></span></p>
        <p class="text-xl">Fecha de la votación: <span class="text-yellow-600 font-bold">{{$event->start_date}}</span>
        </p>
        <p class="text-xl">Horario de votación: <span class="text-yellow-600 font-bold">08:00 AM a 6:00 PM</span></p>
    </div>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2233.733801701219!2d-101.18162927925826!3d19.683759922144123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842d0de640844f1b%3A0x1eb87cbe588da7b4!2sCalz.%20Ventura%20Puente%201653%2C%20Electricistas%2C%2058290%20Morelia%2C%20Mich.!5e0!3m2!1ses!2smx!4v1637079701440!5m2!1ses!2smx"
        width="600" height="450" style="border:0; max-width:100%" allowfullscreen="" loading="lazy"></iframe>
    <x-button icon="fas fa-download">Descargar convocatoria</x-button>
    @else
    <h1 class="text-3xl">Proxima legitimación:</h1>
    <h1 class="text-5xl text-yellow-500 font-bold mb-5">CCT CFE-SUTERM</h1>

    <h1 class="text-3xl">¿Quieres conocer dónde te corresponde votar?</h1>
    <div class="pb-2 pt-4">
        <input type="text" name="username" id="username" placeholder="Ingresa tu clave de empleado"
            value="{{old('username')}}" class="block w-full p-4 text-lg rounded-sm bg-black" required autofocus
            autocomplete="off" wire:model.defer="username">
    </div>
    <div class="px-4 pb-2 pt-4">
        <button type="button" wire:click="display_location()"
            class="uppercase block w-full p-4 text-lg rounded-full bg-red-500 hover:bg-red-600 focus:outline-none">Revisar
            sede</button>
    </div>
    @endif

</div>