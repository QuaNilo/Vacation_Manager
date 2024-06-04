@props(['to' => null])

<div
    id="{{ $to }}"
    {{ $attributes->class(merge(['tippy-content', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}</div>

@pushOnce('styles')
    @vite('resources/css/vendor/tippy.css')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/tippy-content.js')
@endPushOnce
