<x-app-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('home') }}
    @endsection
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">

                    <!-- BEGIN: Important Notes -->
                    <div
                        class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto">
                        <div class="intro-x flex h-10 items-center">
                            <h2 class="mr-auto truncate text-lg font-medium">
                                Notas importantes
                            </h2>
                            <x-base.button
                                class="tiny-slider-navigator mr-2 border-slate-300 px-2 text-slate-600 dark:text-slate-300"
                                data-carousel="important-notes"
                                data-target="prev"
                            >
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="ChevronLeft"
                                />
                            </x-base.button>
                            <x-base.button
                                class="tiny-slider-navigator mr-2 border-slate-300 px-2 text-slate-600 dark:text-slate-300"
                                data-carousel="important-notes"
                                data-target="next"
                            >
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="ChevronRight"
                                />
                            </x-base.button>
                        </div>
                        <div class="intro-x mt-5">
                            <div class="box zoom-in">
                                <x-base.tiny-slider id="important-notes">
                                    <div class="p-5">
                                        <div class="truncate text-base font-medium">
                                            Lorem Ipsum is simply dummy text
                                        </div>
                                        <div class="mt-1 text-slate-400">20 Hours ago</div>
                                        <div class="mt-1 text-justify text-slate-500">
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s.
                                        </div>
                                        <div class="mt-5 flex font-medium">
                                            <x-base.button
                                                class="px-2 py-1"
                                                type="button"
                                                variant="secondary"
                                            >
                                                View Notes
                                            </x-base.button>
                                            <x-base.button
                                                class="ml-auto px-2 py-1"
                                                type="button"
                                                variant="outline-secondary"
                                            >
                                                Dismiss
                                            </x-base.button>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="truncate text-base font-medium">
                                            Lorem Ipsum is simply dummy text
                                        </div>
                                        <div class="mt-1 text-slate-400">20 Hours ago</div>
                                        <div class="mt-1 text-justify text-slate-500">
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s.
                                        </div>
                                        <div class="mt-5 flex font-medium">
                                            <x-base.button
                                                class="px-2 py-1"
                                                type="button"
                                                variant="secondary"
                                            >
                                                View Notes
                                            </x-base.button>
                                            <x-base.button
                                                class="ml-auto px-2 py-1"
                                                type="button"
                                                variant="outline-secondary"
                                            >
                                                Dismiss
                                            </x-base.button>
                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="truncate text-base font-medium">
                                            Lorem Ipsum is simply dummy text
                                        </div>
                                        <div class="mt-1 text-slate-400">20 Hours ago</div>
                                        <div class="mt-1 text-justify text-slate-500">
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s.
                                        </div>
                                        <div class="mt-5 flex font-medium">
                                            <x-base.button
                                                class="px-2 py-1"
                                                type="button"
                                                variant="secondary"
                                            >
                                                View Notes
                                            </x-base.button>
                                            <x-base.button
                                                class="ml-auto px-2 py-1"
                                                type="button"
                                                variant="outline-secondary"
                                            >
                                                Dismiss
                                            </x-base.button>
                                        </div>
                                    </div>
                                </x-base.tiny-slider>
                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                </div>
            </div>
        </div>
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">Dados gerais</h2>
                        <a
                            class="ml-auto flex items-center text-primary"
                            href=""
                        >
                            <x-base.lucide
                                class="mr-3 h-4 w-4"
                                icon="RefreshCcw"
                            /> Atualizar dados
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




                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Últimas páginas editadas
                        </h2>
                        <div class="mt-3 flex items-center sm:ml-auto sm:mt-0">
                            @if(false)
                            <x-base.button class="!box flex items-center text-slate-600 dark:text-slate-300">
                                <x-base.lucide
                                    class="mr-2 hidden h-4 w-4 sm:block"
                                    icon="FileText"
                                />
                                Exportar Excel
                            </x-base.button>
                            <x-base.button class="!box ml-3 flex items-center text-slate-600 dark:text-slate-300">
                                <x-base.lucide
                                    class="mr-2 hidden h-4 w-4 sm:block"
                                    icon="FileText"
                                />
                                Export to PDF
                            </x-base.button>
                            @endif
                        </div>
                    </div>
                    <div class="intro-y mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                        <x-base.table class="border-separate border-spacing-y-[10px] sm:mt-2">
                            <x-base.table.thead>
                                <x-base.table.tr>
                                    <x-base.table.th class="whitespace-nowrap border-b-0">
                                        NOME
                                    </x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                        DATA
                                    </x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                        ESTADO
                                    </x-base.table.th>
                                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                                        AÇõES
                                    </x-base.table.th>
                                </x-base.table.tr>
                            </x-base.table.thead>
                            <x-base.table.tbody>
                                @for($i = 1; $i <= 5; $i++)
                                    <x-base.table.tr class="intro-x">
                                        <x-base.table.td
                                            class="border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                        >
                                            <a
                                                class="whitespace-nowrap font-medium"
                                                href=""
                                            >
                                                Nome da página
                                            </a>
                                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                Descrição da pagina
                                            </div>
                                        </x-base.table.td>
                                        <x-base.table.td
                                            class="border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                        >
                                            28/09/2023
                                        </x-base.table.td>
                                        <x-base.table.td
                                            class="w-40 border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                                        >
                                            <div @class([
                                                'flex items-center justify-center',
                                                'text-success' => true,
                                                'text-danger' => !true,
                                            ])>
                                                <x-base.lucide
                                                    class="mr-2 h-4 w-4"
                                                    icon="CheckSquare"
                                                />
                                                {{ true ? 'Active' : 'Inactive' }}
                                            </div>
                                        </x-base.table.td>
                                        <x-base.table.td
                                            class="relative w-56 border-b-0 bg-white py-0 shadow-[20px_3px_20px_#0000000b] before:absolute before:inset-y-0 before:left-0 before:my-auto before:block before:h-8 before:w-px before:bg-slate-200 first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600 before:dark:bg-darkmode-400"
                                        >
                                            <div class="flex items-center justify-center">
                                                <a
                                                    class="mr-3 flex items-center"
                                                    href=""
                                                >
                                                    <x-base.lucide
                                                        class="mr-1 h-4 w-4"
                                                        icon="CheckSquare"
                                                    />
                                                    Editar
                                                </a>
                                                <a
                                                    class="flex items-center text-danger"
                                                    href=""
                                                >
                                                    <x-base.lucide
                                                        class="mr-1 h-4 w-4"
                                                        icon="Trash"
                                                    />
                                                    Apagar
                                                </a>
                                            </div>
                                        </x-base.table.td>
                                    </x-base.table.tr>
                                @endfor
                            </x-base.table.tbody>
                        </x-base.table>
                    </div>
                    <div class="intro-y mt-3 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                        <x-base.pagination class="w-full sm:mr-auto sm:w-auto">
                            <x-base.pagination.link>
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="ChevronsLeft"
                                />
                            </x-base.pagination.link>
                            <x-base.pagination.link>
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="ChevronLeft"
                                />
                            </x-base.pagination.link>
                            <x-base.pagination.link>...</x-base.pagination.link>
                            <x-base.pagination.link>1</x-base.pagination.link>
                            <x-base.pagination.link active>2</x-base.pagination.link>
                            <x-base.pagination.link>3</x-base.pagination.link>
                            <x-base.pagination.link>...</x-base.pagination.link>
                            <x-base.pagination.link>
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="ChevronRight"
                                />
                            </x-base.pagination.link>
                            <x-base.pagination.link>
                                <x-base.lucide
                                    class="h-4 w-4"
                                    icon="ChevronsRight"
                                />
                            </x-base.pagination.link>
                        </x-base.pagination>
                        <x-base.form-select class="!box mt-3 w-20 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </x-base.form-select>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

    </div>


</x-app-layout>
