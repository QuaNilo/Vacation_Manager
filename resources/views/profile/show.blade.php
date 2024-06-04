<x-app-layout>
    @if(true)
        @section('breadcrumbs')
            {{ Breadcrumbs::render('profile.show', $user) }}
        @endsection
        <form action="{{ route('users.update_me') }}" method="POST" accept-charset="UTF-8">
            @csrf
            @method('PATCH')
            <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
                <h2 class="mr-auto text-lg font-medium">{{ __('Edit User') }}</h2>
                <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
                    <x-base.button
                        class="shadow-md"
                        variant="primary"
                        type="submit"
                    >
                        {{ __('Save') }}
                    </x-base.button>

                </div>
            </div>
            <div class="intro-y mt-5 grid grid-cols-12 gap-5">
                @include('users.fields', ['hideSidebar' => true])
            </div>
            <div class="mt-5 text-right">
                @if(false)
                    <x-base.button
                        class="mr-1 w-24"
                        type="a"
                        variant="outline-secondary"
                        href="{{ route('users.index') }}"
                    >{{ __('Cancel') }}
                    </x-base.button>
                @endif
                <x-base.button
                    class="w-24"
                    type="submit"
                    variant="primary"
                >{{ __('Save') }}
                </x-base.button>
            </div>
        </form>
    @else
        <div role="alert" class="alert relative border rounded-md px-5 py-4 bg-danger border-danger text-white dark:border-danger mb-2">Esta página está incompleta.</div>

        @section('breadcrumbs')
            @if($user->id == auth()->user()->id)
                {{ Breadcrumbs::render('profile.show', $user) }}
            @else
                {{ Breadcrumbs::render('users.show', $user) }}
            @endif
        @endsection
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <x-jetstream.section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-jetstream.section-border />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-jetstream.section-border />
                @endif

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-jetstream.section-border />

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>

    @endif
</x-app-layout>
