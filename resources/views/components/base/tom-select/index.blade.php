<select {{ $attributes->class(['tom-select'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}>
    {{ $slot }}
</select>

@pushOnce('styles')
    @vite('resources/css/vendor/tom-select.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/tom-select.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/tom-select.js')
@endPushOnce
