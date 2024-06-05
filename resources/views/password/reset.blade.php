<x-app-layout>
    @if(empty($user->id))
        <div class="mt-5 rounded-md border border-slate-200/60 p-5 dark:border-darkmode-400">
            <div
                class="flex items-center border-b border-slate-200/60 pb-5 font-medium dark:border-darkmode-400">
                {{ __('Password') }}
            </div>
            <div class="mt-5">
                <!-- Password Field -->
                <div class="mb-3">
                    <x-base.form-label for="password">{{ $user->getAttributeLabel('password') }}</x-base.form-label>
                    <x-base.form-input
                        class="w-full  {{ ($errors->has('password') ? 'border-danger' : '') }}"
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="new-password"
                        required
                    />
                    @error('password')
                        <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <x-base.form-label for="password_confirmation">{{ $user->getAttributeLabel('password_confirmation') }}</x-base.form-label>
                    <x-base.form-input
                        class="w-full  {{ ($errors->has('password_confirmation') ? 'border-danger' : '') }}"
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        autocomplete="new-password"
                        required
                    />
                    @error('password_confirmation')
                        <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
