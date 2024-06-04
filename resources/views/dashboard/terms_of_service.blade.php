<x-guest-layout>
    <div class="bg-gradient-to-b from-theme-1 to-theme-2 py-2">
        <div class="container">
            <div class="flex h-screen flex-col items-center justify-center text-center lg:flex-row lg:text-left">
                <div class="mt-10 lg:mt-0">
                    <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-darkmode-600 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
                        {!! $terms !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
