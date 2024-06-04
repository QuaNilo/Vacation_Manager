@props(['twMerge' => true])
<div
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(['text-xs text-slate-500 mt-2'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</div>
