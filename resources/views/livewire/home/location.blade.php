<div class="p-2">
    @if ($location)
    <div class="text-left">
        <p class="text-xl">Trabajador: <span class="text-yellow-600 font-bold">NOMBRE DEL TRABAJADOR</span></p>
        <p class="text-xl">Centro de votación: <span class="text-yellow-600 font-bold">NOMBRE DEL CENTRO</span></p>
        <p class="text-xl">Dirección: <span class="text-yellow-600 font-bold">DIRECCIÓN DEL CENTRO</span></p>
        <p class="text-xl">Referencias: <span class="text-yellow-600 font-bold">REFERENCIAS DEL CENTRO</span></p>
        <p class="text-xl">Fecha de la votación: <span class="text-yellow-600 font-bold">27/08/2021</span></p>
        <p class="text-xl">Horario de votación: <span class="text-yellow-600 font-bold">08:00 AM a 04:00 PM</span></p>
    </div>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.7081442885105!2d-100.79266188524582!3d20.518187186277157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cb07d66088c6f%3A0x972b9fe58f4d0232!2sReal%20Inn%20Celaya!5e0!3m2!1ses!2smx!4v1629933212042!5m2!1ses!2smx"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    @else
    <h1 class="text-3xl">Proxima legitimación:</h1>
    <h1 class="text-5xl text-yellow-500 font-bold mb-5">CCT CFE-SUTERM 2020</h1>

    <h1 class="text-3xl">¿Quieres conocer dónde te corresponde votar?</h1>
    <div class="pb-2 pt-4">
        <input type="text" name="username" id="username" placeholder="Ingresa tu clave de empleado"
            value="{{old('username')}}" class="block w-full p-4 text-lg rounded-sm bg-black" required autofocus
            autocomplete="off">
    </div>
    <div class="px-4 pb-2 pt-4">
        <button type="button" wire:click="display_location()"
            class="uppercase block w-full p-4 text-lg rounded-full bg-red-500 hover:bg-red-600 focus:outline-none">Revisar
            sede</button>
    </div>
    @endif

</div>