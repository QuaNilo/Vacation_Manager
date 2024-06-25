<?php
    use Carbon\Carbon;
    $company = auth()->user()->company()->first();
    $user = auth()->user()
?>
<div class="mb-3">
    <x-base.form-label for="user_id">{{ __('Utilizador') }}</x-base.form-label>
    <select name="user_id" id="user_id" class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }} disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80">
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    </select>
    @error('user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

{{--<div class="mb-3">--}}
{{--    <x-base.form-label for="approved">{{ $vacation->getAttributeLabel('approved') }}</x-base.form-label>--}}
{{--    <x-base.form-select--}}
{{--        class="w-full {{ ($errors->has('approved') ? 'border-danger' : '') }}"--}}
{{--        id="approved"--}}
{{--        name="approved"--}}
{{--        :value="old('approved', $vacation->approved ?? '')"--}}
{{--        type="text"--}}
{{--    >--}}
{{--        <option >{{ __('Select an option') }}</option>--}}
{{--        @foreach(\App\Models\Vacation::getApprovedArray() as $key => $label)--}}
{{--        <option value="{{ $key }}" {{ old('approved', $vacation->approved ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>--}}
{{--        @endforeach--}}
{{--    </x-base.form-select>--}}
{{--    @error('approved')--}}
{{--        <div class="mt-2 text-danger">{{ $message }}</div>--}}
{{--    @enderror--}}
{{--</div>--}}

<!-- Vacation Start Field -->
<div class="mb-3">
    <x-base.form-label for="start">{{ $vacation->getAttributeLabel('start') }}</x-base.form-label>
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
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>

        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('start') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="start"
            name="start"
            :value="old('start', Carbon::parse($vacation->start)->format('Y-m-d') ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </x-base.input-group.text>
    </x-base.input-group>
    @error('start')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Vacation End Field -->
<div class="mb-3">
    <x-base.form-label for="end">{{ $vacation->getAttributeLabel('end') }}</x-base.form-label>
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
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('end') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="end"
            name="end"
            :value="old('end', Carbon::parse($vacation->end)->format('Y-m-d') ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>

        </x-base.input-group.text>
    </x-base.input-group>
    @error('end')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
