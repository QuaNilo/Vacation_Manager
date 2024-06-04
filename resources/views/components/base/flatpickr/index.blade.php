<x-base.form-input
    type="text"
    {{ $attributes->class(merge(['', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
/>

@pushOnce('vendors')
    @vite('resources/js/vendor/dayjs.js')
    @vite('resources/js/vendor/flatpickr.js')
@endPushOnce

@once
    @push('scripts')
        @vite('resources/js/components/flatpickr.js')
    @endpush
@endonce

@once
    @push('styles')
        @vite('resources/css/vendor/flatpickr.css')
    @endpush
@endonce

