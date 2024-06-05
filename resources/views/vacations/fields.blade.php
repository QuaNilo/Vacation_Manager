<!-- User Id Field -->
<div class="mb-3">
    <x-base.form-label for="user_id">{{ $vacation->getAttributeLabel('user_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }}"
        id="user_id"
        name="user_id"
        :value="old('user_id', $vacation->user_id ?? '')"
        type="number"
        step="1"
    />
    @error('user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Approved Field -->
<div class="mb-3">
    <x-base.form-label for="approved">{{ $vacation->getAttributeLabel('approved') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('approved') ? 'border-danger' : '') }}"
        id="approved"
        name="approved"
        :value="old('approved', $vacation->approved ?? '')"
        type="number"
        step="1"
    />
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

<!-- Vacation Days Field -->
<div class="mb-3">
    <x-base.form-label for="vacation_days">{{ $vacation->getAttributeLabel('vacation_days') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('vacation_days') ? 'border-danger' : '') }}"
        id="vacation_days"
        name="vacation_days"
        :value="old('vacation_days', $vacation->vacation_days ?? '')"
        type="number"
        step="1"
    />
    @error('vacation_days')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
