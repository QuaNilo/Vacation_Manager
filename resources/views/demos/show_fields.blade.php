<!-- Demo Id Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('demo_id') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->demo_id }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- User Id Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('user_id') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->user_id }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Name Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('name') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->name }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Body Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('body') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->body }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Phone Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('phone') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->phone }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Vat Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('vat') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->vat }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Zip Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('zip') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->zip }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Optional Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('optional') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->optional }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Body Optional Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('body_optional') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->body_optional }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Value Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('value') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->value }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Date Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('date') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ !empty($demo->date) ? $demo->date->format('d-m-Y') : '' }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Datetime Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('datetime') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ !empty($demo->datetime) ? $demo->datetime->format('d-m-Y H:i') : '' }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Checkbox Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('checkbox') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->checkbox ? __('Yes') : __('No') }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Privacy Policy Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('privacy_policy') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->privacy_policy ? __('Yes') : __('No') }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




<!-- Status Field -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <dt class="font-medium md:col-span-1">{{ $demo->getAttributeLabel('status') }}</dt>
    <dd class="text-slate-500 dark:text-slate-300 md:col-span-2">{{ $demo->statusLabel }}</dd>
</div>
<div class="mt-5 w-full border-t border-slate-200/60 dark:border-darkmode-400 last-of-type:hidden"></div>




