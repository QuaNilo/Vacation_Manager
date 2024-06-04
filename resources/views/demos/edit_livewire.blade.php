<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('demos.edit', $demo) }}
    @endsection
    <div class="intro-y mt-8 flex flex-col items-center sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">{{ __('Edit Demo') }}(Livewire)</h2>
    </div>
    <div class="intro-y box mt-3 p-5">
        <livewire:create-demo :demo="$demo"/>
    </div>
</x-app-layout>
