<x-monitor-layout>
    <div class="flex flex-col  p-6 gap-6 mx-16">
        <div class="flex gap-6">
            <img src="{{ asset('img/logocong.jpg') }}" class="h-32" />
            <div class="flex flex-col gap-2 w-full">
                <div class="font-bold text-6xl text-center w-full">XX Congreso Nacional Extraordinario</div>
                <div class="font-bold text-5xl text-center w-full">Dictamen Aprobatorio de la Reforma Estatutaria</div>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-6">
            <div class="flex flex-col gap-1">
                <table class="">
                    <thead>
                        <th class="text-left">Coordinación</th>
                        <th>Si</th>
                        <th>No</th>
                        <th>Nulo</th>
                    </thead>
                    <tbody>
                        @foreach($event->locations as $n => $location)
                        <tr>
                            <td><span class="cursor-pointer" onclick="choose({{$location->id}})"
                                    id="name{{$location->id}}">{{$location->name}}</span></td>
                            <td class="text-center"><span contenteditable="true" onkeyup="choose({{$location->id}})"
                                    class="si" id="si{{$location->id}}">0</span></td>
                            <td class="text-center"><span contenteditable="true" onkeyup="choose({{$location->id}})"
                                    class="no" id="no{{$location->id}}">0</span></td>
                            <td class="text-center"><span contenteditable="true" onkeyup="choose({{$location->id}})"
                                    class="nulos" id="nulos{{$location->id}}">0</span></td>
                            @foreach($location->doors as $door)
                            @if($door->name == "Efectivo")
                            <td style="display:none"><span contenteditable="true" class="padron"
                                    id="padron{{$location->id}}">{{$door->guests()->count()}}</span></td>
                            @endif
                            @endforeach

                        </tr>
                        @endforeach
                        <tr>
                            <td><span class="cursor-pointer" onclick="choose('tot')" id="nametot">Resultado Nacional
                                    preliminar</span></td>
                            <td class="text-center" id="sitot">0</td>
                            <td class="text-center" id="notot">0</td>
                            <td class="text-center" id="nulostot">0</td>
                            <td style="display:none"><span id="padrontot">760</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-span-3">
                <div class="text-5xl text-center font-bold mb-8" id="dname">Baja California</div>
                <div class="grid grid-cols-3">
                    <div>
                        <div class="text-6xl font-bold text-center">SI</div>
                        <div class="text-8xl font-bold text-center text-green-800" id="dsi">0</div>
                    </div>
                    <div>
                        <div class="text-6xl text-center">No</div>
                        <div class="text-8xl font-bold text-center text-red-800" id="dno">0</div>
                    </div>
                    <div>
                        <div class="text-6xl text-center">Nulos</div>
                        <div class="text-8xl font-bold text-center text-gray-600" id="dnulos">0</div>
                    </div>
                    <div class="col-span-3 mt-8">
                        <div class="h-16 bg-gray-100 rounded-lg border-4 border-gray-600 shadow-lg flex">
                            <div class="h-full bg-green-600" style="width:0%" id="dgsi"></div>
                            <div class="h-full bg-red-400" style="width:0%" id="dgno"></div>
                            <div class="h-full bg-gray-400" style="width:0%" id="dgnulos"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mt-8 text-center font-bold text-4xl">Porcentaje de aprobación</div>
                    <div class="mt-8 text-center font-bold text-9xl" id="pa"></div>
                </div>
                <div class="text-center text-xl mt-8">Con una participación del <span class="font-bold"
                        id="dporpa"></span> de
                    los delegados efectivos (<span id="dtot"></span> de <span id="dpadron"></span>)
                </div>
            </div>
        </div>

        <script>
            function choose(id){
                name = document.querySelector("#name"+id).innerText
                si = parseInt(document.querySelector("#si"+id).innerText)
                if(isNaN(si)) si = 0
                no = parseInt(document.querySelector("#no"+id).innerText)
                if(isNaN(no)) no = 0
                nulos = parseInt(document.querySelector("#nulos"+id).innerText)
                if(isNaN(nulos)) nulos = 0

                
                padron = parseInt(document.querySelector("#padron"+id).innerText)
                if(isNaN(padron)) padron = 0

                total = si + no + nulos
                portot =(total/padron)*100;
                if(portot > 100) portot = 100

                document.querySelector('#dname').innerText = name
                document.querySelector('#dsi').innerText = si
                document.querySelector('#dno').innerText = no
                document.querySelector('#dnulos').innerText = nulos
                document.querySelector('#dtot').innerText = total
                document.querySelector('#dpadron').innerText = padron
                document.querySelector('#dporpa').innerText = parseFloat(portot).toFixed(2)+'%'
                
                psi = ((si/total)*100)
                if(isNaN(psi)) psi = 0
                pno = ((no/total)*100)
                if(isNaN(pno)) pno = 0
                pnulos = ((nulos/total)*100)
                if(isNaN(pnulos)) pnulos = 0
                
                document.querySelector('#dgsi').style.width = psi+'%'
                document.querySelector('#dgno').style.width = pno+'%'
                document.querySelector('#dgnulos').style.width = pnulos+'%'
                document.querySelector('#pa').innerText =parseFloat(psi).toFixed(2)+'%';

                totsi = 0
                document.querySelectorAll('.si').forEach(e =>{
                    esi = parseInt(e.innerText)
                    if(isNaN(esi)) esi = 0
                    totsi += esi;
                })
                
                document.querySelector('#sitot').innerText = totsi

                totno = 0
                document.querySelectorAll('.no').forEach(e =>{
                    eno = parseInt(e.innerText)
                    if(isNaN(eno)) eno = 0
                    totno += eno;
                })
                
                document.querySelector('#notot').innerText = totno

                
                totnulos = 0
                document.querySelectorAll('.nulos').forEach(e =>{
                    enulos = parseInt(e.innerText)
                    if(isNaN(enulos)) enulos = 0
                    totnulos += enulos;
                })
                
                document.querySelector('#nulostot').innerText = totnulos

            }
        </script>
</x-monitor-layout>