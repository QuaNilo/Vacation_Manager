<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $team->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $team->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Category Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $team->getAttributeLabel('category') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $team->category }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Members Max Vacation Days Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $team->getAttributeLabel('members_max_vacation_days') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $team->members_max_vacation_days }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Members Max On Vacation Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $team->getAttributeLabel('members_max_on_vacation') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $team->members_max_on_vacation }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Members Vacation Days Regen Monthly Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $team->getAttributeLabel('members_vacation_days_regen_monthly') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $team->members_vacation_days_regen_monthly }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



