<div>
    @if($screen == 'asistencia')
        @livewire('event.legitimation.control.asistencia', ['event' => $event->fresh(),'subscreen' => $subscreen])
    @elseif($screen == 'votacion')
        @livewire('event.legitimation.control.votacion', ['event' => $event->fresh(),'subscreen' => $subscreen])
    @endif
    <script>
        function refresher(){
        setTimeout(function () {
            console.log('refresh')
            Livewire.emit('refreshComponent')
            refresher();
        }, 5000);
        }
        refresher()
    </script>
</div>
