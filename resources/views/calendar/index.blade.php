<x-app-layout>
<?php
    $company = auth()->user()->company()->first();
    $users = $company->users()->get();
    $vacation = new \App\Models\Vacation();
?>

    <div x-data="{ isOpenCreate: false, isOpenEdit: false, event_data: {}}" id='calendarDiv' class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="flex justify-end pb-5 pt-2">
                    <x-base.button  class="bg-primary text-white" ><a href="{{route('vacations.index')}}">Show List</a></x-base.button>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <x-backend.calendar-modal-create-popup/>
        <livewire:calendar-edit-pop-up />

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
                },

                dateClick: function(info) {
                    var x_data = Alpine.$data(calendarDiv);
                    Livewire.dispatch('vacationCreate', {date: info.dateStr});
                    x_data.isOpenCreate = true;
                }
            });
            calendar.render();
        });
    </script>
@endpush
</x-app-layout>



