<table>
    <thead>
        <tr>
            <th>Expediente</th>
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
            <td>{{$actuacion->asunto->expediente}}</td>
            <td>{{$actuacion->fecha}}</td>
            <td>{{$actuacion->asunto->metas()->where('meta_key','actor')->first()->meta_value ?? ''}}</td>
            <td>{{$actuacion->asunto->metas()->where('meta_key','accion_ejercida')->first()->meta_value ?? ''}}</td>
            <td>{{$actuacion->asunto->user->name ?? ''}}</td>
            <td>{{$actuacion->estado->name ?? 'Indefinido.'}}</td>
            <td>{{$actuacion->comentarios_apertura ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>