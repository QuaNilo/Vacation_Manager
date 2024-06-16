<x-app-layout>
    <div id="main_div" class="flex flex-col h-screen">
        <div id="stats_div" class="flex space-x-4 mb-12">
            <x-statistics-card  title="Whatever" value="Value"/>
            <x-statistics-card  title="Whatever" value="Value"/>
            <x-statistics-card  title="Whatever" value="Value"/>
            <x-statistics-card  title="Whatever" value="Value"/>
        </div>
        <div id="tables_div" class="flex space-x-3">
            <div id="users_table" class="flex-grow">
                <livewire:users-table/>
            </div>
            <div id="teams_table" class="flex-grow">
                <livewire:teams-table/>

            </div>
        </div>
    </div>
</x-app-layout>
