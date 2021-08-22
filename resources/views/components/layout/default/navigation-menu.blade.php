<div>
    <div>
        <nav class="w-28 flex flex-col items-center bg-white dark:bg-gray-800 py-4">
            <div>
                <img src="{{asset('svg/logo.svg')}}" width="50px" height="50px" />
            </div>
            <ul class="mt-2 text-gray-700 dark:text-gray-400 capitalize w-full p-1">
                <x-layout.default.navigation-menu-option :route="route('dashboard')" activeRoute='dashboard'>Inicio
                </x-layout.default.navigation-menu-option>

                {{-- This menu can only be seen by role:admin --}}
                @if(Auth::user()->hasRole('admin'))
                <li class="mt-2 pt-2 text-xs font-bold text-center text-red-700 uppercase border-t border-gray-200">
                    Admin
                </li>
                <x-layout.default.navigation-menu-option :route="route('users.index')" activeRoute='users.*'
                    icon="fas fa-users">Usuarios
                </x-layout.default.navigation-menu-option>
                @endif
            </ul>
        </nav>
    </div>
</div>