<!-- {{ $fieldTitle }} Field -->
<div class="mb-3">
@if($config->options->localized)
    @{!! Form::label('{{ $fieldName }}', __('models/{{ $config->modelNames->camelPlural }}.fields.{{ $fieldName }}').':') !!}
@else
    @verbatim<x-base.form-label@endverbatim for="{{ $fieldName }}">@{{ ${!! $config->modelNames->camel !!}->getAttributeLabel('{!! $fieldName !!}') }}@verbatim</x-base.form-label>@endverbatim
@endif
    <div class="relative w-full">
        <div
            class="absolute flex h-full w-10 items-center justify-center rounded-l border bg-slate-100 text-slate-500 dark:border-darkmode-800 dark:bg-darkmode-700 dark:text-slate-400">
            @verbatim<x-base.lucide
                class="h-4 w-4"
                icon="Calendar"
            />@endverbatim
        </div>
        @verbatim<x-base.litepicker@endverbatim
            class="pl-12 @{{ ($errors->has('{!! $fieldName !!}') ? 'border-danger' : '') }}"
            id="{{ $fieldName }}"
            name="{{ $fieldName }}"
            :value="old('{{ $fieldName }}', ${{ $config->modelNames->camel }}->{{ $fieldName }} ?? '')"
            data-single-mode="true"
            data-start-date="@{{ old('{!! $fieldName !!}', ${!! $config->modelNames->camel !!}->{!! $fieldName !!} ?? 'null') }}"
            data-reset-button="true"
        />

    </div>
    @@error('{{ $fieldName }}')
        <div class="mt-2 text-danger">@{{ $message }}</div>
    @@enderror
</div>
