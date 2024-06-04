<!-- {{ $fieldTitle }} Field -->
<div class="mb-3">
@if($config->options->localized)
    @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}').':') !!}
@else
    @verbatim<x-base.form-label@endverbatim for="{{ $fieldName }}">@{{ ${!! $config->modelNames->camel !!}->getAttributeLabel('{!! $fieldName !!}') }}@verbatim</x-base.form-label>@endverbatim
@endif
    @verbatim<x-base.form-input@endverbatim
        class="w-full @{{ ($errors->has('{!! $fieldName !!}') ? 'border-danger' : '') }}"
        id="{{ $fieldName }}"
        name="{{ $fieldName }}"
        :value="old('{{ $fieldName }}', ${{ $config->modelNames->camel }}->{{ $fieldName }} ?? '')"
        type="text"
    />
    @@error('{{ $fieldName }}')
        <div class="mt-2 text-danger">@{{ $message }}</div>
    @@enderror
</div>
