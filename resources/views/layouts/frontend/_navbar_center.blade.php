<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-dark.png') }}" class="inline-block dark:hidden h-9" alt="{{ config('app.name', 'Laravel') }}">
            <img src="{{ asset('images/logo-light.png') }}" class="hidden dark:inline-block h-9" alt="{{ config('app.name', 'Laravel') }}">
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        @guest
            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="inline mb-0">
                    <a href="{{ route('login') }}" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600/5 hover:bg-indigo-600 border border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:border-indigo-600 dark:hover:border-indigo-700 dark:text-white"><i data-feather="log-in" class="size-4"></i></a>
                </li>
                @if(false)
                    <li class="inline ps-1 mb-0">
                        <a href="https://1.envato.market/techwind" target="_blank" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white"><i data-feather="shopping-cart" class="size-4"></i></a>
                    </li>
                @endif
            </ul>
            <!--Login button End-->
        @else
            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="inline mb-0">
                    <a href="{{ route('profile.show') }}" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600/5 hover:bg-indigo-600 border border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white"><i data-feather="settings" class="size-4"></i></a>
                </li>
                @if(false)
                    <li class="inline ps-1 mb-0">
                        <a href="https://1.envato.market/techwind" target="_blank" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600 hover:bg-indigo-700 border border-indigo-600 hover:border-indigo-700 text-white"><i data-feather="shopping-cart" class="size-4"></i></a>
                    </li>
                @endif
            </ul>
            <!--Login button End-->
        @endguest

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li><a href="{{ route('home') }}" class="sub-menu-item {{ request()->routeIs('home') ? "active" : "" }}">{{ __('Home') }}</a></li>

                <li><a href="{{ route('home') }}#price" class="sub-menu-item ">{{ __('Price') }}</a></li>
                @if(false)
                <li><a href="{{ route('contacts.create') }}" class="sub-menu-item">{{ __('Contacts') }}</a></li>
                @endif

            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->
