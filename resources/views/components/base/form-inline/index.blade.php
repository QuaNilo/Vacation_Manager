@props(['twMerge' => true])
<div
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(['block sm:flex items-center group form-inline'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</div>
