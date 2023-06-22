<table>
    <thead>
        <tr>
            <th>Expediente</th>
            <th>Fecha</th>
            <th>Actor</th>
            <th>Abogado responsable</th>
            <th>Estado procesal</th>
            <th>Comentarios</th>
        </tr>
    </thead>
    <tbody>
    @foreach($actuaciones as $actuacion)
        <tr class="border">
            <td>{{$actuacion->asunto->expediente}}</td>
            <td>{{$actuacion->fecha}}</td>
            <td>{{$actuacion->asunto->metas()->where('meta_key','actor')->first()->meta_value ?? ''}}</td>
            <td>{{$actuacion->asunto->user->name ?? ''}}</td>
            <td>{{$actuacion->asunto->estado->name ?? ''}}</td>
            <td>{{$actuacion->comentarios_apertura ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>