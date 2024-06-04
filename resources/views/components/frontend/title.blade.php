@props(['as' => 'h2'])
@php
    // Determine if 'text-left' class is provided
    $textLeftProvided = $attributes->get('class') && str_contains($attributes->get('class'), 'text-left');
    // Default classes without 'text-center'
    $defaultClasses = 'text-3xl font-extrabold text-primary uppercase';
    // Add 'text-center' if 'text-left' is not provided
    $classes = $textLeftProvided ? $defaultClasses : "{$defaultClasses} text-center";
@endphp
@php
    // Determine if 'text-left' or 'text-right' class is provided
    $textAlignmentProvided = collect($attributes->get('class'))->contains(function ($value, $key) {
        return str_contains($value, 'text-left') || str_contains($value, 'text-right');
    });
    // Default classes without 'text-center'
    $defaultClasses = 'text-3xl font-extrabold text-primary uppercase';
    // Add 'text-center' if no specific text alignment is provided
    $classes = $textAlignmentProvided ? $defaultClasses : "{$defaultClasses} text-center";
@endphp
<{{$as}} {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{$as}}>
