<div>
    @if($screen == 'asistencia')
        @livewire('event.legitimation.control.asistencia', ['event' => $event->fresh()])
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
