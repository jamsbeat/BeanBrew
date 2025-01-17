@if(Auth::check() && Auth::user()->user_type == 'admin')
    <x-admin-layout>
        {{ $slot }}
    </x-admin-layout>
@else
    <x-app-layout>
        {{ $slot }}
    </x-app-layout>
@endif
