@props(['as' => 'button', 'variant' => null, 'elevated' => null, 'size' => null, 'rounded' => null])

@php
    // General Styles
    $generalStyles = [
        'py-[7px] px-4 border rounded-md items-center justify-center font-medium cursor-pointer', // Default
        'transition ease-in-out duration-150', // Disabled
    ];

    // Sizes
    $small = ['text-xs py-1.5 px-2'];
    $large = ['text-lg py-1.5 px-4'];

    // Main Colors
    $primary = [
        'bg-primary border-primary text-white dark:border-primary', // Default
        '[&:hover:not(:disabled)]:bg-primary/70 [&:hover:not(:disabled)]:border-primary/70', // On hover and not disabled
    ];
    $secondary = [
        'bg-secondary border-secondary text-slate-500', // Default
        '[&:hover:not(:disabled)]:bg-secondary/70 [&:hover:not(:disabled)]:border-secondary/70', // On hover and not disabled
    ];
    $softWhite = [
        'bg-soft-white border-soft-white text-primary', // Default
        '[&:hover:not(:disabled)]:bg-primary [&:hover:not(:disabled)]:border-primary [&:hover:not(:disabled)]:text-white', // On hover and not disabled
    ];
    // Outline
    $outlinePrimary = [
        'border-primary text-primary', // Default
        '[&:hover:not(:disabled)]:bg-primary [&:hover:not(:disabled)]:text-white', // On hover and not disabled
    ];
    $outlineSecondary = [
        'border-secondary text-secondary', // Default
        '[&:hover:not(:disabled)]:bg-secondary [&:hover:not(:disabled)]:text-white', // On hover and not disabled
    ];

@endphp

<{{$as}} {{ $attributes->class(
            merge([
                $generalStyles,
                $size == 'sm' ? $small : null,
                $size == 'lg' ? $large : null,
                $variant == 'primary' ? $primary : null,
                $variant == 'secondary' ? $secondary : null,
                $variant == 'soft-white' ? $softWhite : null,
                $variant == 'outline-primary' ? $outlinePrimary : null,
                $variant == 'outline-secondary' ? $outlineSecondary : null,
                $rounded ? '!rounded-full' : null,
                $elevated ? 'shadow-md' : null,
                $attributes->whereStartsWith('class')->first(),
            ]),
        )->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    {{ $slot }}
</{{$as}}>
