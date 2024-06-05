<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('home') }}
    @endsection
    <div class="grid grid-cols-8 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">



            <livewire:statistics-dashboard/>
            <livewire:latest-vacations-table/>

            </div>
        </div>

    </div>


</x-app-layout>
