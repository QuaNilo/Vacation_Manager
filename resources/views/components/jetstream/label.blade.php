@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-primary dark:text-gray-300']) }}>
    {{ $value ?? $slot }}{!! $required ? ' <span>*</span>' : '' !!}
</label>
