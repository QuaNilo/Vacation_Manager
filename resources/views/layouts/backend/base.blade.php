<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ config('app.debug') ? '' : 'opacity-0' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if($enableRecaptcha && config('recaptchav3.enable'))
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

        <!-- Scripts -->
        @vite(['resources/css/app.css'])

        <!-- Styles -->
        @livewireStyles
        @stack('styles')
    </head>
    <body >
        {{ $slot }}

        @stack('firstScripts')
        @if(false)
            @vite('resources/js/app.js')
        @endif
        <!-- BEGIN: Vendor JS Assets-->
        @vite('resources/js/vendor/dom.js')
        @vite('resources/js/vendor/tailwind-merge.js')
        @stack('vendors')
        <!-- END: Vendor JS Assets-->

        <!-- BEGIN: Pages, layouts, components JS Assets-->
        @vite('resources/js/components/base/theme-color.js')
        @livewireScripts
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- END: Pages, layouts, components JS Assets-->
        @if(config('livewire-ui-spotlight.enabled') && auth()->check())
            @livewire('livewire-ui-spotlight')
        @endif
    </body>
</html>
