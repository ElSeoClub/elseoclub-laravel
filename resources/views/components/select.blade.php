<select {{ $attributes->merge(['class' => "w-full"]) }} {{$attributes}}>
    {{$slot}}
</select>