<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('home') }}
    @endsection
    <div class="grid grid-cols-8 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">{{__('Dados Gerais')}}</h2>
                        <a
                            class="ml-auto flex items-center text-primary"
                            href=""
                        >
                            <x-base.lucide
                                class="mr-3 h-4 w-4"
                                icon="RefreshCcw"
                            />{{__('Atualizar dados')}}
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-primary"
                                            icon="bar-chart-4"
                                        />
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">49</div>
                                    <div class="mt-1 text-base text-slate-500">Power BI</div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-pending"
                                            icon="CreditCard"
                                        />
                                        <div class="ml-auto">
                                            <x-base.tippy
                                                class="flex cursor-pointer items-center rounded-full bg-danger py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                                as="div"
                                                content="2% mais do que no último mês"
                                            >
                                                2%
                                                <x-base.lucide
                                                    class="ml-0.5 h-4 w-4"
                                                    icon="ChevronDown"
                                                />
                                            </x-base.tippy>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">80</div>
                                    <div class="mt-1 text-base text-slate-500">Ficheiros</div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-warning"
                                            icon="mail-check"
                                        />
                                        <div class="ml-auto">
                                            <x-base.tippy
                                                class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                                as="div"
                                                content="12% mais do que no último mês"
                                            >
                                                12%
                                                <x-base.lucide
                                                    class="ml-0.5 h-4 w-4"
                                                    icon="ChevronUp"
                                                />
                                            </x-base.tippy>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">2.149</div>
                                    <div class="mt-1 text-base text-slate-500">
                                        Subscritores
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div @class([
                                'relative zoom-in',
                                'before:content-[\'\'] before:w-[90%] before:shadow-[0px_3px_20px_#0000000b] before:bg-slate-50 before:h-full before:mt-3 before:absolute before:rounded-md before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/70',
                            ])>
                                <div class="box p-5">
                                    <div class="flex">
                                        <x-base.lucide
                                            class="h-[28px] w-[28px] text-success"
                                            icon="User"
                                        />
                                        <div class="ml-auto">
                                            <x-base.tippy
                                                class="flex cursor-pointer items-center rounded-full bg-success py-[3px] pl-2 pr-1 text-xs font-medium text-white"
                                                as="div"
                                                content="22% mais do que no último mês"
                                            >
                                                22%
                                                <x-base.lucide
                                                    class="ml-0.5 h-4 w-4"
                                                    icon="ChevronUp"
                                                />
                                            </x-base.tippy>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">321</div>
                                    <div class="mt-1 text-base text-slate-500">
                                        Utilizadores
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->



            <livewire:latest-vacations-table/>

            </div>
        </div>

    </div>


</x-app-layout>
