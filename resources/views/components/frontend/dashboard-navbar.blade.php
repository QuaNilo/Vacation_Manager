<div class="col-span-1 flex flex-col items-center border-r-4 h-screen justify-between">
    <div class="mt-4">
        <a class="logo" href="{{ route('frontoffice.home') }}">
            <img src="{{ asset('images/logo-dark.png') }}" class="inline-block dark:hidden h-9" alt="{{ config('app.name', 'Laravel') }}">
            <img src="{{ asset('images/logo-light.png') }}" class="hidden dark:inline-block h-9" alt="{{ config('app.name', 'Laravel') }}">
        </a>
    </div>
    <div class="flex flex-col items-center space-y-12 flex-grow justify-center">
        <a href="{{route('frontoffice.home')}}" class="" title="Dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" @if(Route::currentRouteName() == 'frontoffice.home') fill="#039BE5" @else fill="none" @endif  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
        </a>
        <a href="{{route('frontoffice.calendar')}}" title="Calendar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" @if(Route::currentRouteName() == 'frontoffice.calendar') fill="#039BE5" @else fill="none" @endif stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
        </a>
    </div>
</div>
