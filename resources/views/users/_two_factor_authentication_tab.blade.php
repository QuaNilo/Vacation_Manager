<div class="rounded-md border border-slate-200/60 p-5 dark:border-darkmode-400">
    <div class="">
        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            @livewire('profile.two-factor-authentication-form')
        @endif
    </div>
</div>



