<x-base.form-input
    type="text"
    {{ $attributes->class(merge(['datepicker', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
/>

@pushOnce('styles')
    @vite('resources/css/vendor/litepicker.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/dayjs.js')
    @vite('resources/js/vendor/litepicker.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/litepicker.js')
@endPushOnce
