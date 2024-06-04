<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('users.create') }}
    @endsection
    <form action="{{ route('users.store') }}" method="POST" accept-charset="UTF-8">
        @csrf
        <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
            <h2 class="mr-auto text-lg font-medium">{{ __('Create user') }}</h2>
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
        <div class="mt-5 grid grid-cols-12 gap-5">
            @include('users.fields')
        </div>
        <div class="mt-5 text-right">
            <x-base.button
                class="mr-1 w-24"
                as="a"
                variant="outline-secondary"
                href="{{ route('users.index') }}"
            >{{ __('Cancel') }}
            </x-base.button>
            <x-base.button
                class="w-24"
                type="submit"
                variant="primary"
            >{{ __('Save') }}
            </x-base.button>
        </div>
    </form>
</x-app-layout>
