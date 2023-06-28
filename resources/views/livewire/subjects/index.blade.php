<x-content class="gap-0">
    <div class="w-full mt-5">
    <x-search class="w-full"></x-search>
        </div>
    <x-container class="bg-white shadow rounded w-full">
    @foreach($subjects as $subject)
        <a href="{{route('subjects.subject.view', $subject)}}" class="p-3 hover:bg-coolGray-100 cursor-pointer flex gap-2 w-full block">
            <div class="bg-blue-500 text-white rounded shadow text-sm px-1 items-center flex whitespace-nowrap">{{$subject->name}}</div>
            <div class="truncate flex-grow">{{$subject->comments}}</div>
            @if(auth()->user()->id != $subject->user->id)
                <div><img src="{{asset('storage/'.$subject->user->profile_photo_path)}}" class="w-6 h-6 rounded-full shadow"></div>
            @endif
        </a>
    @endforeach
    </x-container>
    <div class="w-full mt-2">
    {{$subjects->links()}}
    </div>
    
    <x-button href="{{route('subjects.create',$matter)}}">Añadir {{$matter->name}}</x-button>
</x-content>