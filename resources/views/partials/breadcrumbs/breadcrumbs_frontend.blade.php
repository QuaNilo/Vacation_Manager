@if (!empty($breadcrumbs))
    <!-- BEGIN: Breadcrumb -->
    <x-frontend.breadcrumb class="mr-auto  sm:flex mt-16 md:mt-[92px] lg:mt-32 container pt-6 mb-10">
        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if(!empty($breadcrumb->isHome))
                <x-frontend.breadcrumb.link :index="0" href="{{ $breadcrumb->url }}">
                    {{ $breadcrumb->title }}
                </x-frontend.breadcrumb.link>
            @else
                @if ($breadcrumb->url && !$loop->last)
                    <x-frontend.breadcrumb.link :index="$key" :active="false" href="{{ $breadcrumb->url }}">
                        {{ $breadcrumb->title }}
                    </x-frontend.breadcrumb.link>
                @else
                    <x-frontend.breadcrumb.link :index="$key" :active="true">
                        {{ $breadcrumb->title }}
                    </x-frontend.breadcrumb.link>
                @endif
            @endif
        @endforeach
    </x-frontend.breadcrumb>
    <!-- END: Breadcrumb -->
@endif
