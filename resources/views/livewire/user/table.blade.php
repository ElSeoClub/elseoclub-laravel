<div>
    <x-table>
        <x-slot name="thead">
            <td class="w-16"></td>
            <th class="text-left px-3 py-2">{{__('User')}}</th>
            <th class="text-left px-3 py-2">{{__('Name')}}</th>
            <th class="text-left px-3 py-2">{{__('Email')}}</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($users as $user)
            <tr>
                <td>
                    @if(Auth::user()->profile_photo_path)
                    <a href="#" class="text-red-600 font-bold hover:text-red-800">
                        <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}"
                            class="rounded-full p-1 w-16 h-16">
                    </a>
                    @endif
                </td>
                <td class="text-left px-3 pr-2">
                    <a href="#" class="text-red-600 font-bold hover:text-red-800">{{$user->username}}</a>
                </td>
                <td class="text-left px-3 py-2">{{$user->name}}</td>
                <td class="text-left px-3 py-2">{{$user->email}}</td>
            </tr>
            @endforeach
        </x-slot>

        <x-slot name="pagination">
            {{$users->links()}}
        </x-slot>
    </x-table>
</div>