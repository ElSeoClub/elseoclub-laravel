<x-monitor-layout>
    <div class="flex flex-col  p-6 gap-6">
        <div class="flex gap-6">
            <img src="{{ asset('img/logocong.jpg') }}" class="h-32" />
            <div class="flex flex-col gap-2 w-full">
                <div class="font-bold text-6xl text-center w-full">XX Congreso Nacional Extraordinario</div>
                <div class="font-bold text-5xl text-center w-full">Pase de asistencia</div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-5">
            @foreach($event->locations as $n => $location)
            @if($n == 0 || $n == 11)
            <div class="flex flex-col gap-5">
                @endif
                <div class="flex gap-6">
                    @foreach($location->doors as $door)
                    @if($door->name == "Efectivo")

                    <div class="font-bold text-3xl w-28 text-right" id="p{{$door->id}}">
                        0%</div>
                    <div class="w-full bg-gray-100 rounded shadow border gap-5 relative">


                        <div class="absolute bg-green-500 rounded py-1 gap-6 font-bold text-2xl mt-7"
                            id="pg{{$door->id}}" style="width:0%">
                        </div>
                        <div class="w-full flex px-6 absolute">
                            <div class=" flex justify-between w-full items-center">
                                <div class="font-bold text-2xl">{{$n+1}}. {{$location->name}}</div>
                                <div class="font-bold text-lg">
                                    <span contenteditable="true" onkeyup="upd(event, {{$door->id}})" class="r">0</span>
                                    de
                                    <span id="t{{$door->id}}">{{$door->guests()->count()}}</span>
                                    delegados efectivos
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @if($n == 10 || $n == 21)
            </div>
            @endif
            @endforeach

        </div>
        <div class="flex gap-6">
            <div class="font-bold text-3xl w-28 text-right" id="totp">
                0%</div>
            <div class="w-full bg-gray-100 rounded shadow border gap-5 relative">

                <div class="absolute bg-green-500 rounded py-1 gap-6 font-bold text-2xl mt-7" id="totpg"
                    style="width:0%">
                </div>
                <div class="w-full flex px-6 absolute">
                    <div class=" flex justify-between w-full items-center">
                        <div class="font-bold text-2xl">Avance Nacional</div>
                        <div class="font-bold text-lg">
                            <span id="tot">0</span> de
                            760
                            delegados efectivos
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function upd(e,id){
            total = parseInt(document.querySelector("#t"+id).innerText)
            actual = parseInt(e.target.innerText)
            avance = Math.round((actual/total)*100,0)
            if (isNaN(avance)) {
                avance = 0
            }

            if(avance > 100)
            avance =  100

            document.querySelector("#p"+id).innerText = avance + '%'
            document.querySelector("#pg"+id).style.width = avance + '%'

            track();
        }

        function track(){
            t = 0
            document.querySelectorAll('.r').forEach(e => {
                actual = parseInt(e.innerText)
                if(isNaN(actual)){
                    actual = 0;
                }
                t += parseInt(e.innerText)
               
            })
            document.querySelector('#tot').innerText = t;

            total = 760
            real = t
            avance = Math.round((real/total)*100,0)
            if (isNaN(avance)) {
                avance = 0
            }

            if(avance > 100)
            avance =  100
            document.querySelector("#totp").innerText = avance + '%'
            document.querySelector("#totpg").style.width = avance + '%'
        }
    </script>
</x-monitor-layout>