@props(['checked' => false])

<input type="radio"
    {!! $attributes->merge(['class' => 'dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-primary shadow-sm focus:ring-primary dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800']) !!}
    {{ $checked ? 'checked' : '' }}
/>
