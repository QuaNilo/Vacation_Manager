@props(['light' => null])

<nav
    aria-label="breadcrumb"
    {{ $attributes->class(merge(['flex']))->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
>
    <ol @class([
        'flex items-center text-gray-400 dark:text-slate-300',
        'text-white/90' => $light,
    ])>
        {{ $slot }}
    </ol>
</nav>
