<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('demos.create') }}
    @endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Create Demo') }}</h2>
    </div>
    <div class="intro-y box mt-3 p-5">
        <form action="{{ route('demos.store') }}" method="POST" accept-charset="UTF-8">
            @csrf
            @include('demos.fields')

            <div class="mt-5 text-right">
                <x-base.button
                    class="mr-1 w-24"
                    type="a"
                    variant="outline-secondary"
                    href="{{ route('demos.index') }}"
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
    </div>
</x-app-layout>
