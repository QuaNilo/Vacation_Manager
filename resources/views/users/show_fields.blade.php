<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Email Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('email') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->email }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Email Verified At Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('email_verified_at') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->email_verified_at }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Password Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('password') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->password }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Two Factor Secret Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('two_factor_secret') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->two_factor_secret }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Two Factor Recovery Codes Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('two_factor_recovery_codes') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->two_factor_recovery_codes }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Two Factor Confirmed At Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('two_factor_confirmed_at') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->two_factor_confirmed_at }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Remember Token Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('remember_token') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->remember_token }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Current Team Id Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('current_team_id') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->current_team_id }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Profile Photo Path Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $user->getAttributeLabel('profile_photo_path') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $user->profile_photo_path }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



