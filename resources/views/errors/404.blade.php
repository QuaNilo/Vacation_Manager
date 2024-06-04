<?php
/**
 *
 * @var $exception \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
 */
?>
<x-error-layout>
    <div class="bg-gradient-to-b from-theme-1 to-theme-2 py-2">
        <div class="container">
            <!-- BEGIN: Error Page -->
            <div class="error-page flex h-screen flex-col items-center justify-center text-center lg:flex-row lg:text-left">
                <div class="-intro-x lg:mr-20">
                    <img
                        class="h-48 w-[450px] lg:h-auto"
                        src="{{ asset('images/error-illustration.svg') }}"
                        alt="{{ config('app.name') }}"
                    />
                </div>
                <div class="mt-10 text-white lg:mt-0">
                    <div class="intro-x text-8xl font-medium">{{ $exception->getStatusCode() }}</div>
                    <div class="intro-x mt-5 text-xl font-medium lg:text-3xl">
                        @lang('http-statuses.'.$exception->getStatusCode())
                    </div>
                    <div class="intro-x mt-3 text-lg">
                        {{ $exception->getMessage() }}
                    </div>
                    <x-base.button
                        as="a"
                        href="/"
                        class="intro-x mt-10 border-white px-4 py-3 text-white dark:border-darkmode-400 dark:text-slate-200"
                    >
                        {{ __('Back to Home') }}
                    </x-base.button>
                </div>
            </div>
            <!-- END: Error Page -->
        </div>
    </div>
</x-error-layout>
