<!-- BEGIN: Weekly Top Products -->
<div class="col-span-12 mt-6">
    <div class="intro-y block h-10 items-center sm:flex">
        <h2 class="mr-5 truncate text-lg font-medium">
            {{__('Ultimas ferias submetidas')}}
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
                        {{__('NOME')}}
                    </x-base.table.th>
                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                        {{__('DATA INICIO')}}
                    </x-base.table.th>
                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                        {{__(('DATA FIM'))}}
                    </x-base.table.th>
                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                        {{__('DIAS')}}
                    </x-base.table.th>
                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                        {{__('ESTADO')}}
                    </x-base.table.th>
                    <x-base.table.th class="whitespace-nowrap border-b-0 text-center">
                        {{__('AÇÕES')}}
                    </x-base.table.th>
                </x-base.table.tr>
            </x-base.table.thead>
            <x-base.table.tbody>
                @foreach($vacations as $vacation)
                    <x-base.table.tr class="intro-x">
                        <x-base.table.td
                            class="border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                        >
                            <a
                                class="whitespace-nowrap font-medium"
                                href=""
                            >
                                {{$user->name}}
                            </a>
                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                {{$user->team->name ?? ''}}
                            </div>
                        </x-base.table.td>
                        <x-base.table.td
                            class="border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                        >
                            {{ $vacation->vacation_start }}
                        </x-base.table.td>
                        <x-base.table.td
                            class="border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                        >
                            {{ $vacation->vacation_end }}
                        </x-base.table.td>
                        <x-base.table.td
                            class="border-b-0 bg-white text-center shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                        >
                            {{ $vacation->vacation_days }}
                        </x-base.table.td>
                        <x-base.table.td
                            class="w-40 border-b-0 bg-white shadow-[20px_3px_20px_#0000000b] first:rounded-l-md last:rounded-r-md dark:bg-darkmode-600"
                        >
                            <div @class([
                                'flex items-center justify-center',
                                'text-success' => $vacation->approved === \App\Models\Vacation::STATUS_APPROVED,
                                'text-danger' => $vacation->approved === \App\Models\Vacation::STATUS_REJECTED,
                                'text-warning' => $vacation->approved === \App\Models\Vacation::STATUS_PENDING,
                            ])>
                                <x-base.lucide
                                    class="mr-2 h-4 w-4"
                                    icon="CheckSquare"
                                />
                                {{ $vacation->ApprovedLabel }}
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
                @endforeach
            </x-base.table.tbody>
        </x-base.table>
    </div>
</div>
