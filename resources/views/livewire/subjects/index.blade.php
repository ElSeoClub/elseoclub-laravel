<x-content class="gap-0">
    <div class="w-full mt-5 md:px-0 px-3">
        <x-search class="w-full"></x-search>
    </div>
    <x-container class="bg-white shadow rounded w-full">
    @foreach($subjects as $subject)
        <a href="{{route('subjects.subject.view', $subject)}}" class="p-3 hover:bg-coolGray-100 cursor-pointer flex gap-2 w-full block items-center">
            <div class="flex flex-col  flex-grow max-w-[calc(100%-34px)] md:max-w-[calc(100%-50px)]">
                <div class="max-w-full flex gap-1">
                    @if($subject->status == 'closed')
                        <i class="fas fa-lock text-yellow-400"></i>
                    @endif
                    <div class="bg-blue-500 text-white rounded shadow text-sm px-1 truncate inline-block max-w-full">{{$subject->name}}</div>
                </div>
                <div class="truncate">{{$subject->comments}}</div>
            </div>
            <div class="md:w-10 md:h-10 md:min-w-10 w-6 h-6 min-w-6">
                @if($subject->user != null)
                    <img src="{{asset('storage/'.$subject->user->profile_photo_path)}}" class="object-fill md:w-10 md:h-10 w-6 h-6 rounded-full shadow">
                @else
                    <img src="{{asset('img/question-user.png')}}" class="object-fill md:w-10 md:h-10 w-6 h-6 rounded-full shadow">
                @endif
            </div>
        </a>
    @endforeach
    </x-container>
    <div class="w-full mt-2">
    {{$subjects->links()}}
    </div>

    @if(Auth::user()->id !== 1 && Auth::user()->id !== 17)
        <x-button href="{{route('subjects.create',$matter)}}">Añadir {{$matter->name}}</x-button>
    @endif
</x-content>
