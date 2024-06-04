<x-guest-layout>
    <div @class([
        '-m-3 sm:-mx-8 p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ])>
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Login Info -->
                <div class="hidden min-h-screen flex-col xl:flex">
                    <x-jetstream.authentication-card-logo />
                    <div class="my-auto">
                        <img
                            class="-intro-x -mt-16 w-1/2"
                            src="{{ asset('images/illustration.svg') }}"
                            alt="{{ config('app.name') }}"
                        />
                        <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                            A few more clicks to <br />
                            sign in to your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                            Developed with ❤️ by <a href="https://noop.pt" class="text-white underline">noop</a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none" x-data="{ recovery: false }">
                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf
                            <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                                {{ __('Two Factor Authentication') }}
                            </h2>
                            <div class="intro-x mt-2 text-center text-slate-400 xl:text-left" x-show="! recovery">
                                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                            </div>
                            <div class="intro-x mt-2 text-center text-slate-400 xl:text-left" x-cloak x-show="recovery">
                                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                            </div>

                            <div class="intro-x mt-8">
                                <div x-show="! recovery">
                                    <x-base.form-input
                                        class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('code') ? 'border-danger' : '') }}"
                                        type="text"
                                        inputmode="numeric"
                                        id="code"
                                        name="code"
                                        :value="old('code')"
                                        placeholder="{{ __('Code') }}"
                                        autofocus x-ref="code" autocomplete="one-time-code"
                                    />
                                    @error('code')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div x-cloak x-show="recovery">
                                    <x-base.form-input
                                        class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('email') ? 'border-danger' : '') }}"
                                        type="text"
                                        inputmode="numeric"
                                        id="recovery_code"
                                        name="recovery_code"
                                        :value="old('recovery_code')"
                                        placeholder="{{ __('Recovery Code') }}"
                                        x-ref="recovery_code" autocomplete="one-time-code"
                                    />
                                    @error('recovery_code')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="intro-x mt-4 flex text-xs text-slate-600 dark:text-slate-500 sm:text-sm justify-end">
                                <button type="button"
                                        x-show="! recovery"
                                        x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                                    {{ __('Use a recovery code') }}
                                </button>

                                <button type="button"
                                        x-cloak
                                        x-show="recovery"
                                        x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                                    {{ __('Use an authentication code') }}
                                </button>
                            </div>

                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top"
                                    variant="primary"
                                    type="submit"
                                >
                                    {{ __('Log in') }}
                                </x-base.button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>
    @if(false)
        <x-jetstream.authentication-card>
            <x-slot name="logo">
                <x-jetstream.authentication-card-logo />
            </x-slot>

            <div x-data="{ recovery: false }">
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-show="! recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-cloak x-show="recovery">
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>

                <x-jetstream.validation-errors class="mb-4" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mt-4" x-show="! recovery">
                        <x-jetstream.label for="code" value="{{ __('Code') }}" />
                        <x-jetstream.input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    </div>

                    <div class="mt-4" x-cloak x-show="recovery">
                        <x-jetstream.label for="recovery_code" value="{{ __('Recovery Code') }}" />
                        <x-jetstream.input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                        x-show="! recovery"
                                        x-on:click="
                                            recovery = true;
                                            $nextTick(() => { $refs.recovery_code.focus() })
                                        ">
                            {{ __('Use a recovery code') }}
                        </button>

                        <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                        x-cloak
                                        x-show="recovery"
                                        x-on:click="
                                            recovery = false;
                                            $nextTick(() => { $refs.code.focus() })
                                        ">
                            {{ __('Use an authentication code') }}
                        </button>

                        <x-jetstream.button class="ml-4">
                            {{ __('Log in') }}
                        </x-jetstream.button>
                    </div>
                </form>
            </div>
        </x-jetstream.authentication-card>
    @endif
</x-guest-layout>
