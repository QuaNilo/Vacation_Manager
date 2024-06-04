<div class="rounded-md border border-slate-200/60 p-5 dark:border-darkmode-400">
    <div class="">
        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
        @endif
    </div>
</div>



