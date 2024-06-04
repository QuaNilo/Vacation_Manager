@props(['active' => null, 'index' => 0])
@aware(['light' => null])

<li
    {{ $attributes->whereStartsWith('class')->class(
            merge([
                $index > 0 ? 'relative text-sm' : null,

                !$light && $index > 0
                    ? ""
                    : null,

                $light && $index > 0
                    ? ""
                    : null,
                $index > 0 ? '' : null,

                !$light && $active ? 'text-primary font-bold cursor-text dark:text-slate-400' : null,
                $light && $active ? 'text-white/70' : null,
            ]),
        ) }}>
        @if($index != 0)
            <span class="mx-2 text-gray-400 font-normal">|</span>
        @endif
        <a {{ $attributes->merge(['href' => ''])->whereDoesntStartWith('class') }}>{{ $slot }}</a>
</li>
