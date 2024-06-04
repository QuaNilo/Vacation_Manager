<div>
    @if(false)
        <!-- Password Field -->
        <div class="mb-3">
            <x-base.form-label :twMerge="false" for="current_password">{{ __('Current Password') }}</x-base.form-label>
            <x-base.form-input
                :twMerge="false"
                class="w-full  {{ ($errors->has('current_password') ? 'border-danger' : '') }}"
                id="current_password"
                name="current_password"
                type="password"
                wire:model="state.current_password"
                autocomplete="current-password"
            />
            @error('current_password')
            <div class="mt-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif

    <div class="mb-3">
        <x-base.form-label :twMerge="false" for="password">{{ __('New Password') }}</x-base.form-label>
        <x-base.form-input
            :twMerge="false"
            class="w-full  {{ ($errors->has('password') ? 'border-danger' : '') }}"
            id="password"
            name="password"
            type="password"
            wire:model="state.password"
            autocomplete="new-password"
        />
        @error('password')
        <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <x-base.form-label :twMerge="false" for="password_confirmation">{{ __('Confirm Password') }}</x-base.form-label>
        <x-base.form-input
            :twMerge="false"
            class="w-full  {{ ($errors->has('password_confirmation') ? 'border-danger' : '') }}"
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            wire:model="state.password_confirmation"
            autocomplete="new-password"
        />
        @error('password_confirmation')
        <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div x-data x-init="@this.on('saved', () => toastShow('{{ __('Saved with success') }}', '', 'success'))"></div>

    <div class="mt-3 text-right">
        <x-base.button variant="primary" :twMerge="false" type="button" wire:click="updatePassword">
            {{ __('Change password now') }}
        </x-base.button>
    </div>
</div>

