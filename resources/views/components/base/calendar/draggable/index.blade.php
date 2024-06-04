<div
    data-tw-merge
    {{ $attributes->class(['full-calendar-draggable'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>{{ $slot }}</div>

@pushOnce('styles')
    @vite('resources/css/vendor/full-calendar.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/calendar/calendar.js')
    @vite('resources/js/vendor/calendar/plugins/interaction.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/calendar/draggable.js')
@endPushOnce
