<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth {{ config('app.debug') ? '' : 'opacity-0' }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ asset('/favicon/favicon.ico') }}"/>
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/favicon/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('/favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(config('recaptchav3.enable'))
            {!! RecaptchaV3::initJs() !!}
        @endif

        @if (!empty($pageTitle))
            <title>{{ $pageTitle }}</title>
            <meta property="og:title" content="{{ $pageTitle }}" />
        @else
            <title>@yield('title', config('app.name', 'Laravel'))</title>
            <meta property="og:title" content="@yield('title', config('app.name', 'Laravel'))" />
        @endif

        <meta name="description" content="@yield('page_description', $pageDescription ?? \App\Facades\Setting::getParam('page-description'))"/>
        <meta name="keywords" content="@yield('keywords', $pageKeywords ?? \App\Facades\Setting::getParam('page-keywords'))"/>
        <meta property="og:url" content="@yield('public_url', $publicUrl ?? url()->current())" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="@yield('page_description', $pageDescription ?? \App\Facades\Setting::getParam('page-description'))" />
        <meta property="og:image" content="@yield('share_image', $shareImageUrl ?? asset('images/logo-light.png'))" />
        @if(false)
            <link rel="canonical" href="@yield('canonical', $pageCanonical ?? '')"/>
        @endif
        <x-cookie-consent-and-tracking></x-cookie-consent-and-tracking>
        @stack('firstStyles')

        @vite([
            //'resources/frontend-assets/scss/vendor/animate.scss',
            //'resources/frontend-assets/scss/vendor/tobii.scss',
            'resources/frontend-assets/scss/vendor/tiny-slider.scss',
            'resources/frontend-assets/scss/materialdesignicons.scss',
            'resources/frontend-assets/scss/app.scss'
        ])
        <!-- Styles -->
        @livewireStyles
        @stack('styles')
        @stack('firstScripts')
    </head>

    <body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900 flex flex-col min-h-screen">
        <div class="">

            <x-frontend.notification-handler />

                <div class="grid grid-cols-12">
                    <x-frontend.dashboard-navbar/>
                    {{ $slot }}
                </div>
        </div>

        @include('layouts.frontend._footer')

        @stack('vendors')

        @vite([
            'resources/frontend-assets/js/vendor/feather.js',
            'resources/frontend-assets/js/vendor/tiny-slider.js',
            'resources/frontend-assets/js/plugins.init.js',
            'resources/frontend-assets/js/app.js'
        ])

        @livewireScripts
        @stack('scripts')
        <script src='fullcalendar/dist/index.global.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    </body>

</html>
