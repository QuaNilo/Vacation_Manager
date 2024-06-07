<!-- User Id Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $vacation->getAttributeLabel('user_id') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $vacation->user_id }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Approved Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $vacation->getAttributeLabel('approved') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $vacation->approved }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Vacation Start Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $vacation->getAttributeLabel('start') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $vacation->start }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Vacation End Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $vacation->getAttributeLabel('end') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $vacation->end }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Vacation Days Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $vacation->getAttributeLabel('vacation_days') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $vacation->vacation_days }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



