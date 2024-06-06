<?php
$vacation = new \App\Models\Vacation();
?>

<div x-show="isOpen" x-cloak>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="z-index: 9999;">
        <div class="bg-white p-8 rounded shadow">
            <form action="{{ route('calendar.create') }}" method="POST">
                @csrf
                @include('vacations.fields')
                <div>
                    <x-base.button type="button" @click="isOpen = false" class="mb-4">Close</x-base.button>
                    <x-base.button type="submit" @click="isOpen = false" class="mb-4">Create</x-base.button>
                </div>
            </form>
        </div>
    </div>
</div>
