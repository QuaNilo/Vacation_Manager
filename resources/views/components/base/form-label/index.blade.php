@props(['twMerge' => true])
@aware(['class' => null])

<label
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(['inline-block mb-2', 'group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</label>
