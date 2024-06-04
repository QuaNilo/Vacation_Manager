@props(['src' => null])

<img
    data-action="zoom"
    src="{{ $src }}"
    {{ $attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
/>

@pushOnce('styles')
    @vite('resources/css/vendor/zoom-vanilla.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/image-zoom.js')
@endPushOnce
