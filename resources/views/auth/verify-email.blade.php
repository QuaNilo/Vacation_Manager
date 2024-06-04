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
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none xl:max-w-[350px]">
                            <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                                {{ __('Verify email') }}
                            </h2>
                            <div class="intro-x mt-2 text-center text-slate-400 ">
                                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                                </div>
                            @endif


                            <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <x-base.button
                                        class="w-full px-4 py-3 align-top"
                                        variant="primary"
                                        type="submit"
                                    >
                                        {{ __('Resend Verification Email') }}
                                    </x-base.button>
                                </form>
                                <!-- Flex container for the two buttons -->
                                <div class="flex flex-col xl:flex-row mt-3">
                                    <x-base.button
                                        class="w-full px-4 py-3 align-top xl:me-2 xl:w-1/2"
                                        variant="outline-dark"
                                        as="a"
                                        href="{{ route('profile.show') }}"
                                    >
                                        {{ __('Edit Profile') }}
                                    </x-base.button>
                                    <form method="POST" action="{{ route('logout') }}" class="w-full xl:ms-2 mt-3 xl:mt-0 xl:w-1/2">
                                        @csrf
                                        <x-base.button
                                            class="w-full px-4 py-3 align-top"
                                            variant="outline-secondary"
                                            as="button"
                                            type="submit"
                                        >
                                            {{ __('Log Out') }}
                                        </x-base.button>
                                    </form>
                                </div>
                            </div>

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

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jetstream.button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-jetstream.button>
                    </div>
                </form>

                <div>
                    <a
                        href="{{ route('profile.show') }}"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    >
                        {{ __('Edit Profile') }}</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ml-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </x-jetstream.authentication-card>
    @endif
</x-guest-layout>
