<!-- {{ $fieldTitle }} Field -->
<div class="mb-3">
    @verbatim<x-base.form-input@endverbatim
        id="{{ $fieldName }}_hidden"
        name="{{ $fieldName }}"
        :value="0"
        type="hidden"
    />
    @verbatim<x-base.form-switch>
        <x-base.form-switch.input@endverbatim
            class="@{{ ($errors->has('{!! $fieldName !!}') ? 'border-danger' : '') }}"
            id="{{ $fieldName }}"
            name="{{ $fieldName }}"
            :value="{{ $checkboxVal }}"
            :checked="old('{{ $fieldName }}', ${{ $config->modelNames->camel }}->{{ $fieldName }} ?? '') == {{ $checkboxVal }}"
            type="checkbox"
        />
        @verbatim<x-base.form-switch.label@endverbatim for="{{ $fieldName }}">@{{ ${!! $config->modelNames->camel !!}->getAttributeLabel('{!! $fieldName !!}') }}@verbatim</x-base.form-switch.label>@endverbatim
    @verbatim</x-base.form-switch>@endverbatim
    @@error('{{ $fieldName }}')
        <div class="mt-2 text-danger">@{{ $message }}</div>
    @@enderror
</div>
