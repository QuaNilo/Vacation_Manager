@props(['title', 'number', 'iconName', 'card'])
<div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
    <div @class([
        'relative zoom-in',
        'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
    ])>
        <div class="box p-5">
            <div class="flex">
                <x-base.lucide
                    class="h-[28px] w-[28px] text-primary"
                    icon={{$iconName}}
                />
            </div>
            @if($card === 'team')
                <div class="mt-6 text-3xl font-medium leading-8">{{$card}}</div>
                <div class="mt-1 text-base text-slate-500">{{$title}}</div>
            @else
                <div class="mt-6 text-3xl font-medium leading-8">{{$number}}</div>
                <div class="mt-1 text-base text-slate-500">{{$title}}</div>
            @endif
        </div>
    </div>
</div>
