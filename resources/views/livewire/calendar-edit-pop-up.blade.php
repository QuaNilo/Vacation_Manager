<div x-show="isOpenEdit" x-cloak>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="z-index: 9999;">
        <div class="bg-white p-8 rounded shadow">
            <form action="{{ route('vacations.update', $vacation->id ?? '') }}" method="POST" accept-charset="UTF-8">
                @csrf
                @method('PATCH')
                @include('vacations.fields')
                <div>
                    <input id="eventid" type="hidden" name="eventid">
                    <input id="title" type="hidden" name="title">
                    <x-base.button type="button" @click="isOpenEdit = false" class="mb-4">Close</x-base.button>
                    <x-base.button type="submit" @click="isOpenEdit = false" class="mb-4">Update</x-base.button>
                </div>
            </form>
        </div>
    </div>
</div>
