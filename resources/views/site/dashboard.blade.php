<?php
    view()->share('pageTitle', __('Dashboard'));
?>
<x-landing-layout>
    <x-frontend.dashboard-navbar/>
    <div class="col-span-11 flex-col p-10">
        <div class="flex justify-evenly">
            <div class="flex-col space-y-16 w-fit">
                <div id="profile-card" class="flex-col p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                    <div id="profile-div" class="">
                        <img class="border-2 border-b-blue-950 rounded-3xl bg-purple-950"/>
                    </div>

                    <div class="text-center">
                        <h1 class="text-2xl font-bold text-blue-950">{{$user->name}}</h1>
                        <h2 class="text-xl">{{$user->email}}</h2>
                    </div>

                    <div class="flex mt-6 space-x-3">
                        <x-base.button>Edit Profile</x-base.button>
                        <x-base.button>Change Password</x-base.button>
                    </div>
                </div>
                @if($team)
                    <div class="flex flex-col p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                        <h1 class="font-bold text-2xl text-center mb-2">{{__('Team')}}</h1>
                        <div>
                            <span class="font-bold text-xl">{{__('Name :')}}</span>
                            <span class="text-lg font-semibold">{{$team->name}}</span>
                        </div>

                        <div>
                            <span class="font-bold text-xl">{{__('Category :')}}</span>
                            <span class="text-lg font-semibold">{{$team->category}}</span>
                        </div>
                    </div>

                    <div class="flex flex-col p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                        <h1 class="font-bold text-2xl text-center mb-2">{{__('Team Information')}}</h1>
                        <div>
                            <span class="font-bold text-xl">{{__('Member count')}} :</span>
                            <span class="text-lg font-semibold">{{$team_user_count}}</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="flex-col space-y-16">
                <div class="flex content-evenly h-fit space-x-8">
                    <x-statistics-card title="Vacation Days Available" value="4"/>
                    <x-statistics-card title="Vacation Days taken" value="1"/>
                    <x-statistics-card title="Vacation Days gained per month" value="{{$team->members_vacation_days_regen_monthly}}"/>
                </div>
                <div class="flex space-x-16">
                    @if($vacations)
                        <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                            <h2 class="text-lg font-bold mb-4">{{__('Vacations')}}</h2>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                                    {{__('Vacation Start Date')}}
                                                </th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                                    {{__('Vacation End Date')}}
                                                </th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                                    {{__('Vacation Days')}}
                                                </th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                                    {{__('Status')}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach($vacations as $vacation)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{$vacation->start}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{$vacation->end}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{$vacation->vacation_days}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{$vacation->approvedLabel}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{ $vacations->links() }}
                                    </div>
                                </div>
                        </div>
                    @endif
                    @if($team_users)
                        <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                            <h2 class="text-lg font-bold mb-4">{{__('Team Users')}}</h2>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                                    {{__('Name')}}
                                                </th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                                                    {{__('Team')}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                        @foreach($team_users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{$user->name}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{$user->team->name}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        {{ $team_users->links() }}
                                    </div>
                                </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>
