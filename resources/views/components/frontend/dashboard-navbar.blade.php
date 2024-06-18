<div class="col-span-1 flex flex-col space-y-12 justify-center align-bottom items-center border-r-2 border-r-blue-700">
    <a href="{{route('frontoffice.dashboard')}}" class="" title="Dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" @if(Route::currentRouteName() == 'frontoffice.dashboard') fill="#039BE5" @else fill="none" @endif  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
    </a>
    <a href="{{route('frontoffice.profile')}}" class="" title="Profile">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" @if(Route::currentRouteName() == 'frontoffice.profile') fill="#039BE5" @else fill="none" @endif stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
    </a>
</div>
