<x-landing-layout>
    <div class="grid h-screen mt-20 grid-cols-12">
        <x-frontend.dashboard-navbar/>
        <div class="col-span-11 flex-col p-5">
            <div class="flex flex-col text-center my-12">
                <span class="text-4xl ">User Metrics</span>
            </div>
            <div class="flex space-x-3">
                <x-statistics-card title="Vacations Taken" value="45"/>
                <x-statistics-card title="Company" value="{{auth()->user()->company()->first()->name}}"/>
                <x-statistics-card title="Company" value="{{auth()->user()->company()->first()->name}}"/>
                <x-statistics-card title="Company" value="{{auth()->user()->company()->first()->name}}"/>
            </div>
            <div class="flex flex-col text-center my-12">
                <span class="text-4xl ">Team Metrics</span>
            </div>
        </div>
    </div>
</x-landing-layout>
