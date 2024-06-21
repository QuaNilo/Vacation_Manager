<!-- BEGIN: General Report -->
<div class="col-span-12 mt-8">
{{--    @dd($vacation_requests_pending, $vacation_days_available, $vacation_days_taken_year, $team)--}}
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
        @if(isset($team->name))
            <x-backend.dashboard.statistics-card :number="'10'" :title="$team->name" :card="'team'" :iconName="'bar-chart-4'"/>
        @endif
        <x-backend.dashboard.statistics-card :number="$vacation_days_taken_year" :card="'daysTaken'" :title="__('Dias Ferias/Ano Atual')" :iconName="'bar-chart-4'"/>
        <x-backend.dashboard.statistics-card :number="$vacation_days_available" :card="'daysAvailable'" :title="__('Dias Disponiveis')" :iconName="'mail-check'"/>
        <x-backend.dashboard.statistics-card :number="$vacation_requests_pending" :card="'vacationsPending'" :title="__('Ferias Pendentes')" :iconName="'User'"/>
    </div>
</div>
<!-- END: General Report -->
