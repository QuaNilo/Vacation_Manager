<?php
$vacation = new \App\Models\Vacation();
?>

<div x-show="isOpenCreate" x-cloak>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="z-index: 9999;">
        <div class="bg-white p-8 rounded shadow">
            <form action="{{ route('frontoffice.calendar.save-vacations') }}" method="POST">
                @csrf
                @include('components.frontend.vacation-fields')
                <div class="mt-4">
                    <input id="eventid" type="hidden" name="eventid">
                    <input id="title" type="hidden" name="title">
                    <x-base.button type="button" @click="isOpenCreate = false" class="mb-4">Close</x-base.button>
                    <x-base.button type="submit" @click="isOpenCreate = false" class="mb-4">Create</x-base.button>
                </div>
            </form>
        </div>
    </div>
</div>
