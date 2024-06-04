@props(['twMerge' => true])
<div
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(merge(['flex items-center', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>{{ $slot }}</div>
