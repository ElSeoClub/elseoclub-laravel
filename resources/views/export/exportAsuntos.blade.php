<table>
    <thead>
        <tr>
            <th>Expediente</th>
            <th>Junta</th>
            <th>Fecha</th>
            <th>Actor</th>
            <th>Acción ejercida</th>
            <th>Estado procesal</th>
            <th>Comentarios</th>
            <th>Abogado responsable</th>
        </tr>
    </thead>
    <tbody>
    @foreach($actuaciones as $actuacion)
        <tr class="border">
            <td>{{$actuacion->subject->name}}</td>
            {{-- Junta --}}
            @if($actuacion->subject->metadata == null)
                <td>Indefinido</td>
            @else
                <td>{{unserialize($actuacion->subject->metadata)[2][1] ?? 'Indefinido'}}</td>
            @endif
            <td>{{$actuacion->fecha}}</td>
            {{-- Actor --}}
            @if($actuacion->subject->metadata == null)
                <td>Indefinido</td>
            @else
                <td>{{unserialize($actuacion->subject->metadata)[1][1] ?? 'Indefinido'}}</td>
            @endif
            {{-- Accion ejercida --}}
            @if($actuacion->subject->metadata == null)
                <td>Indefinido</td>
            @else
                <td>{{unserialize($actuacion->subject->metadata)[1][2] ?? 'Indefinido'}}</td>
            @endif
            <td>{{$actuacion->action}}</td>
            <td>{{$actuacion->comentarios_apertura ?? ''}}</td>
            <td>{{$actuacion->subject->user->name ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>