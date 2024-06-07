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
                    <x-base.button  class="bg-primary text-white" @click="isOpenCreate = true">Create Vacation</x-base.button>
                    <x-base.button  class="bg-primary text-white" ><a href="{{route('vacations.index')}}">Show List</a></x-base.button>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

        <x-backend.calendar-modal-create-popup/>
        <x-backend.calendar-modal-edit-popup/>

    </div>


@push('scripts')
    <script type="text/javascript">
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
                    x_data.isOpenEdit = true;
                    var vacationEditRoute = '{{ route('vacations.edit', ['vacation' => '__vacationId__']) }}';
                    fetch(vacationEditRoute.replace('__vacationId__', events.event.id), {
                        method: 'GET', // Change the method to GET
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        window.location.href = response.url;
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
                }
            });
            calendar.render();
        });
    </script>
@endpush
</x-app-layout>



