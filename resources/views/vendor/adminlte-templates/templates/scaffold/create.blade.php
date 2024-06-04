@verbatim<x-app-layout>@endverbatim
    @@section('breadcrumbs')
        @{{ Breadcrumbs::render('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.create') }}
    @@endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">@{{ __('Create {!! $config->modelNames->human !!}') }}</h2>
    </div>
    <div class="intro-y box mt-3 p-5">
        <form action="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.store') }}" method="POST" accept-charset="UTF-8">
            @@csrf
            @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields')

            <div class="mt-5 text-right">
                @verbatim<x-base.button@endverbatim
                    class="mr-1 w-24"
                    as="a"
                    variant="outline-secondary"
                    href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.index') }}"
                >@{{ __('Cancel') }}
                @verbatim</x-base.button>
                <x-base.button@endverbatim
                    class="w-24"
                    type="submit"
                    variant="primary"
                >@{{ __('Save') }}
                @verbatim</x-base.button>@endverbatim
            </div>
        </form>
    </div>
@verbatim</x-app-layout>@endverbatim
