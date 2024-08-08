<table>
    <thead>
    <tr>
        <th>Expediente</th>
        <th>Fecha</th>
        <th>Actor</th>
        <th>Tipo</th>
        <th>Estado procesal</th>
        <th>Comentarios</th>
        <th>Abogado responsable</th>
    </tr>
    </thead>
    <tbody>
    @foreach($actuaciones as $actuacion)
        <tr class="border">
            <td>{{$actuacion->subject->name}}</td>
            <td>{{$actuacion->fecha->format('d/m/Y H:i:s')}}</td>
            @if($actuacion->subject->metadata == null)
                <td>Indefinido</td>
            @else
                <td>{{unserialize($actuacion->subject->metadata)[0][1] ?? 'Indefinido'}}</td>
            @endif
            @if($actuacion->subject->metadata == null)
                <td>Indefinido</td>
            @else
                <td>{{unserialize($actuacion->subject->metadata)[0][2] ?? 'Indefinido'}}</td>
            @endif
            <td>{{$actuacion->action}}</td>
            <td>{{$actuacion->comentarios_apertura ?? ''}}</td>
            <td>{{$actuacion->subject->user->name ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
