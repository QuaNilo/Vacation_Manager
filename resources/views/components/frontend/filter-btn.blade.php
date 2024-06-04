@props(['isActive'])

<button
    {{ $attributes->merge(['class' => 'focus:bg-blue-700 focus:text-white bg-transparent  text-blue-700 py-2 px-4 border border-blue-700  rounded-lg']) }}
    class="{{ isset($isActive) && $isActive ? 'bg-blue-500 text-white' : '' }}"
>
    {{ $slot }}
</button>

