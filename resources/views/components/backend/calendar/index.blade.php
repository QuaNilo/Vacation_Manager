<div
    data-tw-merge
    {{ $attributes->class(['full-calendar'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    <div></div>
</div>

@pushOnce('styles')
    @vite('resources/css/vendor/full-calendar.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/calendar/calendar.js')
    @vite('resources/js/vendor/calendar/plugins/interaction.js')
    @vite('resources/js/vendor/calendar/plugins/day-grid.js')
    @vite('resources/js/vendor/calendar/plugins/time-grid.js')
    @vite('resources/js/vendor/calendar/plugins/list.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/calendar/calendar.js')
@endPushOnce
