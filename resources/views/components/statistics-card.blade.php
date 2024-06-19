<div class="flex-grow dark:text-white text-black w-fit h-fit p-5 text-center rounded-xl border-2 shadow-xl">
    <div class="flex">
        <div class="flex flex-col">
            <p class="text-md text-lg font-semibold">{{ $title }}</p>
            <p class="text-md text-2xl font-bold pb-2">{{ $value }}</p>
        </div>
        <div id="icon-div" class="flex items-center justify-center flex-grow ml-5">
            {{$slot}}
        </div>
    </div>
</div>
