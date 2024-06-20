<div x-show="isOpenChangePassword" x-cloak>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="z-index: 9999;">
        <div class="bg-white p-8 rounded shadow">
            <form action="{{ route('frontoffice.calendar.save-vacations') }}" method="POST">
                @csrf
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
                @endif
                <div class="mt-4">
                    <x-base.button type="button" @click="isOpenChangePassword = false" class="mb-4">Close</x-base.button>
                </div>
            </form>
        </div>
    </div>
</div>
