<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('settings.index') }}
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
        <h2 class="mr-auto text-lg font-medium">{{ __('Settings') }}</h2>
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            <x-base.button
                class="mr-2 shadow-md"
                variant="primary"
                href="{{ route('settings.create') }}"
                as="a"
            >
                {{ __('Create Setting') }}
            </x-base.button>
                <x-base.menu class="ml-auto sm:ml-0">
                <x-base.menu.button
                    class="!box px-2 font-normal"
                    as="x-base.button"
                >
                    <span class="flex h-5 w-5 items-center justify-center">
                        <x-base.lucide
                            class="h-4 w-4"
                            icon="Plus"
                        />
                    </span>
                </x-base.menu.button>
                <x-base.menu.items class="w-40">
                    <x-base.menu.item>
                        <x-base.lucide
                            class="mr-2 h-4 w-4"
                            icon="FilePlus"
                        /> New Category
                    </x-base.menu.item>
                    <x-base.menu.item>
                        <x-base.lucide
                            class="mr-2 h-4 w-4"
                            icon="UserPlus"
                        /> New Group
                    </x-base.menu.item>
                </x-base.menu.items>
            </x-base.menu>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="mt-8">
        <livewire:settings-table />
    </div>
</x-app-layout>
