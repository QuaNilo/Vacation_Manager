@props(['config' => null])

<div
    data-config="{{ $config }}"
    {{ $attributes->class(merge(['tiny-slider', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</div>

@pushOnce('styles')
    @vite('resources/css/vendor/tiny-slider.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/tiny-slider.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/tiny-slider.js')
@endPushOnce
