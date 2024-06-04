@props(['lat' => null, 'long' => null, 'sources' => null, 'apiKey' => null])

<div
    data-lat="{{ $lat }}"
    data-long="{{ $long }}"
    data-sources="{{ $sources }}"
    data-api-key="{{ $apiKey }}"
    {{ $attributes->class(['leaflet', 'z-0 [&_.leaflet-tile-pane]:saturate-[.3]'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
</div>

@pushOnce('styles')
    @vite('resources/css/vendor/leaflet.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/leaflet-map.js')
    @vite('resources/js/vendor/axios.js')
    @vite('resources/js/utils/colors.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/leaflet-map-loader.js')
@endPushOnce
