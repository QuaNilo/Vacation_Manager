<!-- {{ $fieldTitle }} Field -->
<div class="mb-3">
@if($config->options->localized)
    @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}').':') !!}
@else
    @verbatim<x-base.form-label@endverbatim for="{{ $fieldName }}">@{{ ${!! $config->modelNames->camel !!}->getAttributeLabel('{!! $fieldName !!}') }}@verbatim</x-base.form-label>@endverbatim
@endif
    @verbatim<x-base.input-group
        class="flatpickr"
        data-wrap="true"
        data-enable-time="false"
        data-date-format='Y-m-d'
        data-time_24hr='true'
        data-minute-increment='1'
        inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
            <x-base.lucide
                class="h-5 w-5"
                icon="Calendar"
            />
        </x-base.input-group.text>@endverbatim
        @verbatim<x-base.flatpickr@endverbatim
            class="@{{ ($errors->has('{!! $fieldName !!}') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="{{ $fieldName }}"
            name="{{ $fieldName }}"
            :value="old('{{ $fieldName }}', ${{ $config->modelNames->camel }}->{{ $fieldName }} ?? '')"
            data-input
        />
        @verbatim<x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>@endverbatim
    @@error('{{ $fieldName }}')
        <div class="mt-2 text-danger">@{{ $message }}</div>
    @@enderror
</div>
