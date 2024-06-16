<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('companies.users.pending') }}
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
    <div class="mt-8">
        <livewire:pending-users-table />
    </div>
</x-app-layout>
