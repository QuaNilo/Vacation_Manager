<x-backend-base-layout>
    <x-backend.theme-switcher />
{{--    <x-notification-handler />--}}
    @component("components.backend.themes.$activeTheme.$activeLayout")
        {{ $slot }}
    @endcomponent
</x-backend-base-layout>
