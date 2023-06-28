<i class="
@if($status == 'publish')
    fas fa-check text-green-600
@elseif($status == 'draft')
    fas fa-edit text-yellow-600
@elseif($status == 'deleted')
    fas fa-trash text-red-600
@endif
" {{$attributes}}></i>