<x-backend-base-layout :enable-recaptcha="true">
    <x-backend.theme-switcher />
    <x-notification-handler />
    {{ $slot }}
</x-backend-base-layout>
