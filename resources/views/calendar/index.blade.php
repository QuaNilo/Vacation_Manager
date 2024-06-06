<x-app-layout>
<?php
    $company = auth()->user()->company()->first();
    $users = $company->users()->get();
    $vacation = new \App\Models\Vacation();
?>
    <div x-data="{ isOpen: false }" class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <x-base.button  class="bg-primary text-white" @click="isOpen = true">Create Vacation</x-base.button>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

        <x-backend.calendar-modal-popup/>
    </div>


    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: true,
            displayEventTime: false,
            });
            calendar.render();
            });
        </script>

    @endpush
</x-app-layout>
