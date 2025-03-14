<?php
//    $company = auth()->user()->company()->first();
//    $users = $company->users()->get();
//    $vacation = new \App\Models\Vacation();
    view()->share('pageTitle', __('Calendar'));
?>

<x-landing-layout>
    <div class="col-span-3 flex-col space-y-10 p-5 pr-0">
        @if($vacations_pending)
            <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                <h2 class="text-lg font-bold mb-4">{{__('Pending Vacations')}}</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('Start Date')}}
                                    </th>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('End Date')}}
                                    </th>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('Days')}}
                                    </th>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('Status')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($vacations_pending as $vacation)
                                <tr>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->start->format('Y-m-d')}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->end->format('Y-m-d')}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->vacation_days}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->approvedLabel}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $vacations_pending->links() }}
                        </div>
                    </div>
            </div>
        @endif
        @if($vacations_history)
            <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                <h2 class="text-lg font-bold mb-4">{{__('Past Vacations')}}</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('Start Date')}}
                                    </th>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('End Date')}}
                                    </th>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('Days')}}
                                    </th>
                                    <th class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                        {{__('Status')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @foreach($vacations_history as $vacation)
                                <tr>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->start->format('Y-m-d')}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->end->format('Y-m-d')}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->vacation_days}}
                                    </td>
                                    <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                        {{$vacation->approvedLabel}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $vacations_history->links() }}
                        </div>
                    </div>
            </div>
        @endif
    </div>
    <div x-data="{ isOpenCreate: false, isOpenEdit: false, event_data: {}}" class="col-span-8 flex-col py-5 m-5 mb-10 rounded-xl border-2 shadow-xl dark:text-white text-black">
        <div class="flex justify-center">
            <div id='calendarDiv' class="row justify-content-center w-3/4">
                <div class="flex space-x-4 align-middle">
                    <x-base.button id="showTeamVacations" class="bg-blue-600 text-white mb-4" >{{__('Show Team Vacations')}}</x-base.button>
                    <div class="w-40">
                        <x-base.form-select class="h-fit" id="filterVacations">
                            <option value="dayGridMonth">Month</option>
                            <option value="dayGridWeek">Week</option>
                            <option value="timeGridDay">Day</option>
                            <option value="listWeek">List Week</option>
                        </x-base.form-select>

                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
                <livewire:calendar-edit-pop-up/>
                <livewire:calendar-create-pop-up />

            </div>
        </div>
    </div>

    @push('firstScripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endpush
    @push('firstScripts')
        <script type="text/javascript">
            $.noConflict();
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    editable: true,
                    displayEventTime: true,
                    displayEventEnd: true,
                    events: '{{ route('frontoffice.calendar.get-vacations') }}',

                    eventClick: function(events, jsEvent, view) {
                        var calendarDiv = document.getElementById('calendarDiv');
                        var x_data = Alpine.$data(calendarDiv);
                        var eventId = events.event.id;
                        Livewire.dispatch('vacationUpdated', {id: eventId});

                        x_data.isOpenEdit = true;
                    },

                    dateClick: function(info) {
                        var x_data = Alpine.$data(calendarDiv);
                        Livewire.dispatch('vacationCreate', {date: info.dateStr});
                        x_data.isOpenCreate = true;
                    }
                });
                calendar.render();
                const showTeamVacations = () => {
                    calendar.removeAllEventSources()
                    calendar.addEventSource('{{ route('frontoffice.calendar.get-vacations') }}')
                }

                const showUserVacations = () => {
                    calendar.removeAllEventSources()
                    calendar.addEventSource('{{ route('frontoffice.calendar.get-vacations') }}')
                }
                let isUser = false;
                showButton = document.getElementById('showTeamVacations');
                showButton.addEventListener('click', function() {
                    if(isUser){
                        calendar.removeAllEventSources();
                        showButton.innerHTML = 'Show Team Vacations'
                        calendar.addEventSource('{{ route('frontoffice.calendar.get-vacations') }}')
                        calendar.refetchEvents()
                        console.log('showing user vacations')
                    }
                    else{
                        calendar.removeAllEventSources();
                        showButton.innerHTML = 'Show User Vacations'
                        calendar.addEventSource('{{ route('frontoffice.calendar.get-team-vacations') }}');
                        calendar.refetchEvents()
                        console.log('showing team vacations')
                    }
                    isUser = !isUser;
                });
                 var filterSelect = document.getElementById('filterVacations');
                filterSelect.addEventListener('change', function (){
                    calendar.changeView(filterSelect.value)
                });
            });
        </script>
    @endpush
</x-landing-layout>
