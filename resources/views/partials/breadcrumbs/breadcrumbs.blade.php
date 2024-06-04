@if (!empty($breadcrumbs))
    @if($activeTheme == 'rubick')
        @if($activeLayout == 'top-menu')
            <!-- BEGIN: Breadcrumb -->
            <x-base.breadcrumb class="-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10" light>
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if(!empty($breadcrumb->isHome))
                        <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @else
                        @if ($breadcrumb->url && !$loop->last)
                            <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @else
                            <x-base.breadcrumb.link :index="$key" :active="true">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @endif
                    @endif
                @endforeach
            </x-base.breadcrumb>
            <!-- END: Breadcrumb -->
        @else
            <!-- BEGIN: Breadcrumb -->
            <x-base.breadcrumb class="-intro-x mr-auto hidden sm:flex">
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if(!empty($breadcrumb->isHome))
                        <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @else
                        @if ($breadcrumb->url && !$loop->last)
                            <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @else
                            <x-base.breadcrumb.link :index="$key" :active="true">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @endif
                    @endif
                @endforeach
            </x-base.breadcrumb>
            <!-- END: Breadcrumb -->
        @endif
    @elseif($activeTheme == 'enigma')
        <x-base.breadcrumb
            @class([
                'h-[45px] md:ml-10 md:border-l border-white/[0.08] dark:border-white/[0.08] mr-auto -intro-x',
                'md:pl-6' => $activeLayout != 'top-menu',
                'md:pl-10' => $activeLayout == 'top-menu',
            ])
            light
        >
            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if(!empty($breadcrumb->isHome))
                    <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                        {{ $breadcrumb->title }}
                    </x-base.breadcrumb.link>
                @else
                    @if ($breadcrumb->url && !$loop->last)
                        <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @else
                        <x-base.breadcrumb.link :index="$key" :active="true">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @endif
                @endif
            @endforeach
        </x-base.breadcrumb>
    @elseif($activeTheme == 'icewall')
        <x-base.breadcrumb
            class="-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10"
            light
        >
            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if(!empty($breadcrumb->isHome))
                    <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                        {{ $breadcrumb->title }}
                    </x-base.breadcrumb.link>
                @else
                    @if ($breadcrumb->url && !$loop->last)
                        <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @else
                        <x-base.breadcrumb.link :index="$key" :active="true">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @endif
                @endif
            @endforeach
        </x-base.breadcrumb>
    @elseif($activeTheme == 'tinker')
        @if($activeLayout == 'top-menu')
            <!-- BEGIN: Breadcrumb -->
            <x-base.breadcrumb class="-intro-x mr-auto h-full border-white/[0.08] md:ml-10 md:border-l md:pl-10" light>
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if(!empty($breadcrumb->isHome))
                        <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @else
                        @if ($breadcrumb->url && !$loop->last)
                            <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @else
                            <x-base.breadcrumb.link :index="$key" :active="true">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @endif
                    @endif
                @endforeach
            </x-base.breadcrumb>
            <!-- END: Breadcrumb -->
        @else
            <!-- BEGIN: Breadcrumb -->
            <x-base.breadcrumb class="-intro-x mr-auto hidden sm:flex">
                @foreach ($breadcrumbs as $key => $breadcrumb)
                    @if(!empty($breadcrumb->isHome))
                        <x-base.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </x-base.breadcrumb.link>
                    @else
                        @if ($breadcrumb->url && !$loop->last)
                            <x-base.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @else
                            <x-base.breadcrumb.link :index="$key" :active="true">
                                {{ $breadcrumb->title }}
                            </x-base.breadcrumb.link>
                        @endif
                    @endif
                @endforeach
            </x-base.breadcrumb>
            <!-- END: Breadcrumb -->
        @endif
    @endif
@endif
