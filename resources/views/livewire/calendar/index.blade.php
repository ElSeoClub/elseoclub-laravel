<div>
    <ul class="w-full flex flex-col divide-gray-400 divide-y bg-white rounded shadow">
        @foreach($actuaciones as $actuacion)
            <a class="flex gap-5 px-5 py-2" href="{{route('subjects.subject.view',$actuacion->subject)}}">
                <div><img src="{{asset('storage/'.$actuacion->subject->user?->profile_photo_path ?? '')}}" width="32" height="32" class="rounded-full w-[32px] h-[32px]"></div>
                <div>{{$actuacion->fecha}}</div>
                <div class>{{$actuacion->subject->name}}</div>
                <div class>{{$actuacion->subject->comments}}</div>
                <div class>{{$actuacion->subject->user->name ?? ''}}</div>
            </a>
        @endforeach
    </ul>
</div>
