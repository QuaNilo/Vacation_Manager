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
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        <form method="POST" action="{{ route('register') }}" id="register-form">
                            @csrf
                            @if(config('recaptchav3.enable'))
                                {!! RecaptchaV3::field('register', 'g-recaptcha-response', true, 'register-form', "onClickRecaptcha") !!}
                            @endif
                            <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                                {{ __('Sign Up') }}
                            </h2>
                            <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                                {{ __('A few more clicks to create your account.') }}
                            </div>

                            <div class="intro-x mt-8">
                                <x-base.form-input
                                    class="intro-x block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('name') ? 'border-danger' : '') }}"
                                    type="text"
                                    id="name"
                                    name="name"
                                    :value="old('name')"
                                    placeholder="{{ __('Name') }}"
                                    required autofocus autocomplete="name"
                                />
                                @error('name')
                                    <div class ="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                <x-base.form-input
                                    class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('email') ? 'border-danger' : '') }}"
                                    type="email"
                                    id="email"
                                    name="email"
                                    :value="old('email')"
                                    placeholder="{{ __('Email') }}"
                                    required autocomplete="username"
                                />
                                @error('email')
                                    <div class ="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                <x-base.form-input
                                    class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('password') ? 'border-danger' : '') }}"
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="{{ __('Password') }}"
                                    required autocomplete="new-password"
                                />
                                @error('password')
                                    <div class ="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @if(false)
                                    <div class="intro-x mt-3 grid h-1 w-full grid-cols-12 gap-4">
                                        <div class="col-span-3 h-full rounded bg-success"></div>
                                        <div class="col-span-3 h-full rounded bg-success"></div>
                                        <div class="col-span-3 h-full rounded bg-success"></div>
                                        <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                                    </div>
                                    <a
                                        class="intro-x mt-2 block text-xs text-slate-500 sm:text-sm"
                                        href=""
                                    >
                                        What is a secure password?
                                    </a>
                                @endif
                                <x-base.form-input
                                    class="intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[350px] {{ ($errors->has('password_confirmation') ? 'border-danger' : '') }}"
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required autocomplete="new-password"
                                    placeholder="{{ __('Confirm Password') }}"
                                />
                                @error('password_confirmation')
                                    <div class ="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                                @error('g-recaptcha-response')
                                    <div class ="mt-2 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="intro-x mt-4 flex items-center text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                    <x-base.form-check.input type="checkbox" class="mr-2 border" id="terms" name="terms" required />
                                    <label class="cursor-pointer select-none" for="terms" >
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('dashboard.terms_of_service').'" class="ml-1 text-primary dark:text-slate-200">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('dashboard.privacy_policy').'" class="ml-1 text-primary dark:text-slate-200">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                    </label>
                                </div>
                            @endif
                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <x-base.button
                                    class="w-full px-4 py-3 align-top xl:mr-3 xl:w-32"
                                    variant="primary"
                                    type="submit"
                                    :onclick="config('recaptchav3.enable') ? 'onClickRecaptcha(event)' : null"
                                >
                                    {{ __('Register') }}
                                </x-base.button>

                                <x-base.button
                                    class="mt-3 w-full px-4 py-3 align-top xl:mt-0 xl:w-32"
                                    variant="outline-secondary"
                                    as="a"
                                    href="{{ route('login') }}"
                                >
                                    {{ __('Sign In') }}
                                </x-base.button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>
</x-guest-layout>
