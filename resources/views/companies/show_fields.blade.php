<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $company->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $company->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Category Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $company->getAttributeLabel('category') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $company->category }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Email Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $company->getAttributeLabel('email') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $company->email }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



<!-- Telephone Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $company->getAttributeLabel('telephone') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $company->telephone }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>



