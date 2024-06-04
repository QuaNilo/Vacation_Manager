@props(['twMerge' => true])
<label
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(merge(['cursor-pointer ml-2', $attributes->whereStartsWith('class')->first()]))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>{{ $slot }}</label>
