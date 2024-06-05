<?php
    $company = auth()->user()->company()->first();
    $users = $company->users()->get()
?>

<!-- User Id Field -->
{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="user_id">{{ $vacation->getAttributeLabel('user_id') }}</x-base.form-label>--}}
{{--    <x-base.form-input--}}
{{--        class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }}"--}}
{{--        id="user_id"--}}
{{--        name="user_id"--}}
{{--        :value="old('user_id', $vacation->user_id ?? '')"--}}
{{--        type="number"--}}
{{--        step="1"--}}
{{--    />--}}
{{--    @error('user_id')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<div class="mb-3">
    <x-base.form-label for="user_id">{{ __('Utilizador') }}</x-base.form-label>
    <select name="user_id" id="user_id" class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }} disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80">
            <option value="">{{__('Selecione um Utilizador')}}</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    @error('user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <x-base.form-label for="approved">{{ $vacation->getAttributeLabel('approved') }}</x-base.form-label>
    <x-base.form-select
        class="w-full {{ ($errors->has('approved') ? 'border-danger' : '') }}"
        id="approved"
        name="approved"
        :value="old('approved', $edition->approved ?? '')"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(\App\Models\Vacation::getApprovedArray() as $key => $label)
        <option value="{{ $key }}" {{ old('approved', $edition->approved ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('approved')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Vacation Start Field -->
<div class="mb-3">
    <x-base.form-label for="vacation_start">{{ $vacation->getAttributeLabel('vacation_start') }}</x-base.form-label>
    <x-base.input-group
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
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('vacation_start') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="vacation_start"
            name="vacation_start"
            :value="old('vacation_start', $vacation->vacation_start ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('vacation_start')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Vacation End Field -->
<div class="mb-3">
    <x-base.form-label for="vacation_end">{{ $vacation->getAttributeLabel('vacation_end') }}</x-base.form-label>
    <x-base.input-group
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
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('vacation_end') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="vacation_end"
            name="vacation_end"
            :value="old('vacation_end', $vacation->vacation_end ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('vacation_end')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
