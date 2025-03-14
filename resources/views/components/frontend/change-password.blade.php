<div x-show="isOpenChangePassword" x-cloak>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" style="z-index: 9999;">
        <div class="bg-white p-10 rounded-xl shadow relative">
            <button
                type="button"
                @click="isOpenChangePassword = false"
                class="absolute top-2 right-2">
                <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="ic-cross" fill="#4A4A4A">
                        <path d="M12,10.4834761 L7.83557664,6.31871006 C7.41207382,5.89517239 6.73224519,5.89425872 6.31350312,6.31303524 C5.89184166,6.7347314 5.89730155,7.41332336 6.31917747,7.83523399 L10.4836008,12 L6.31917747,16.164766 C5.89730155,16.5866766 5.89184166,17.2652686 6.31350312,17.6869648 C6.73224519,18.1057413 7.41207382,18.1048276 7.83557664,17.6812899 L12,13.5165239 L16.1644234,17.6812899 C16.5879262,18.1048276 17.2677548,18.1057413 17.6864969,17.6869648 C18.1081583,17.2652686 18.1026985,16.5866766 17.6808225,16.164766 L13.5163992,12 L17.6808225,7.83523399 C18.1026985,7.41332336 18.1081583,6.7347314 17.6864969,6.31303524 C17.2677548,5.89425872 16.5879262,5.89517239 16.1644234,6.31871006 L12,10.4834761 L12,10.4834761 Z" id="Combined-Shape">
                    </path>
                    </g>
                </g>
            </svg>
            </button>
            <form action="{{ route('frontoffice.calendar.save-vacations') }}" method="POST">
                @csrf
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
                @endif
            </form>
        </div>
    </div>
</div>
