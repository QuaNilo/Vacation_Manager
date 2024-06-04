<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('demos.index') }}
    @endsection
    @once
        @push('firstStyles')
            @filamentStyles
        @endpush
    @endonce
    @once
        @push('scripts')
            @filamentScripts
        @endpush
    @endonce
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Demos') }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <x-base.button
                class="mr-2 shadow-md"
                variant="primary"
                href="{{ route('demos.create') }}"
                as="a"
            >
                {{ __('Create Demo') }}
            </x-base.button>
            <x-base.button
                class="mr-2 shadow-md"
                variant="primary"
                href="{{ route('demos.create_livewire') }}"
                as="a"
            >
                {{ __('Create Demo') }} (Livewire)
            </x-base.button>

        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="mt-8">
        <livewire:demos-table />

    </div>
</x-app-layout>
