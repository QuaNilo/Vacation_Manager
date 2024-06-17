<?php
    $company = auth()->user()->company()->first();
    $users = $company->users()->get();
    $vacation = new \App\Models\Vacation();
    view()->share('pageTitle', __('Homepage'));
?>
<x-landing-layout>
    <div class="container flex space-x-3 mt-16 justify-evenly">
        <div class="border-2 border-blue-800 p-3 shadow-sm">
            <h1>Days to take vacation</h1>
            <p>3 Days</p>
        </div>
        <div class="border-2 border-b-blue-800 p-3 shadow-sm">
            <h1>Days to take vacation</h1>
            <p>3 Days</p>
        </div>
        <div class="border-2 border-b-blue-800 p-3 shadow-sm">
            <h1>Days to take vacation</h1>
            <p>3 Days</p>
        </div>
        <div class="border-2 border-b-blue-800 p-3 shadow-sm">
            <h1>Days to take vacation</h1>
            <p>3 Days</p>
        </div>
    </div>
    <div class="flex justify-center mt-32">
        <div x-data="{ isOpenCreate: false, isOpenEdit: false, event_data: {}}" id='calendarDiv' class="row justify-content-center h-screen w-1/2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            <x-backend.calendar-modal-create-popup/>
            <livewire:calendar-edit-pop-up />

        </div>
    </div>
    @push('firstScripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endpush
    @push('scripts')
        <script type="text/javascript">
            $.noConflict();
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'multiMonthYear',
                    editable: true,
                    displayEventTime: true,
                    displayEventEnd: true,
                    events: '{{ route('calendar.get-vacations') }}',

                    eventClick: function(events, jsEvent, view) {
                        var calendarDiv = document.getElementById('calendarDiv');
                        var x_data = Alpine.$data(calendarDiv);
                        var eventId = events.event.id;
                        Livewire.dispatch('vacationUpdated', {id: eventId});

                        x_data.isOpenEdit = true;
                    }
                });
                calendar.render();
            });
        </script>
    @endpush
</x-landing-layout>
