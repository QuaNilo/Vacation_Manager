<?php
    view()->share('pageTitle', __('Dashboard'));
?>
<x-landing-layout>
    <div class="col-span-11 flex-col py-3">
        <div class="flex justify-evenly">
            <div class="flex-col space-y-8 w-fit">
                <div id="profile-card" class="flex-col p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">

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
                        <div id="team_div" class="pb-4 border-b-2">
                            <h1 class="font-bold text-2xl text-center mb-6">{{__('Team')}}</h1>
                            <div class="flex justify-between px-2">
                                <span class="font-bold text-slate-500 text-md">{{__('Name')}}</span>
                                <span class="text-lg font-semibold">{{$team->name}}</span>
                            </div>

                            <div class="flex justify-between px-2">
                                <span class="font-bold text-slate-500 text-md">{{__('Category')}}</span>
                                <span class="text-lg font-semibold">{{$team->category}}</span>
                            </div>

                        </div>
                        <div id="team_information_div" class="pb-4 border-b-2">
                            <h1 class="font-bold text-2xl text-center my-6">{{__('Team Information')}}</h1>
                            <div class="flex justify-between px-2">
                                <span class="font-bold text-slate-500 text-md">{{__('Member count')}}</span>
                                <span class="text-lg font-semibold">{{$team_user_count}}</span>
                            </div>
                            <div class="flex flex-col justify-around">
                                <span class="font-semibold text-black text-xl text-center my-2">{{__('Members on Vacation')}}</span>
                                <div class="flex justify-between px-2">
                                    <span class="font-bold text-slate-500 text-md">{{__('Next Week')}}</span>
                                    <span class="text-lg font-semibold">{{$vacation_next_week_team}}</span>
                                </div>
                                <div class="flex justify-between px-2">
                                        <span class="font-bold text-slate-500 text-md">{{__('Next Month')}}</span>
                                        <span class="text-lg font-semibold">{{$vacation_next_month_team}}</span>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-lg font-bold text-center my-4">{{__('Team Users')}}</h2>
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
            <div class="flex-col space-y-8">
                <div class="flex content-evenly h-fit space-x-8">
                    <x-statistics-card title="Vacation Days Available" value="{{$user->vacation_days}}">
                        <svg width="84" height="84" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 7L7 7M20 7L11 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M20 17H17M4 17L13 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M4 12H7L20 12" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </x-statistics-card>
                    <x-statistics-card title="Vacation Days taken" value="{{$vacation_days_taken_total}}">
                        <svg width="84" height="84" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </x-statistics-card>
                    <x-statistics-card title="Vacation Days gained per month" value="{{$team->members_vacation_days_regen_monthly}}">
                        <svg width="84" height="84" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.46436 20.5354L20.5354 3.46436" stroke="#1C274D" stroke-width="1.5"/>
                        <path d="M18 17H13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M10.5 8.00002H8M8 8.00002L5.5 8.00002M8 8.00002L8 5.5M8 8.00002L8 10.5" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                    </x-statistics-card>
                </div>
                <div class="flex space-x-8">
                    @if($company)
                        <div class="flex flex-col p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                            <div id="team_div" class="pb-4 border-b-2">
                                <h1 class="font-bold text-2xl text-center mb-6">{{__('Company')}}</h1>
                                <div class="flex justify-between px-2">
                                    <span class="font-bold text-slate-500 text-md">{{__('Name')}}</span>
                                    <span class="text-lg font-semibold">{{$company->name}}</span>
                                </div>

                                <div class="flex justify-between px-2">
                                    <span class="font-bold text-slate-500 text-md">{{__('Category')}}</span>
                                    <span class="text-lg font-semibold">{{$company->category}}</span>
                                </div>

                            </div>
                            <div id="team_information_div" class="">
                                <h1 class="font-bold text-2xl text-center my-6">{{__('Company Information')}}</h1>
                                <div class="flex justify-between px-2">
                                    <span class="font-bold text-slate-500 text-md">{{__('Member count')}}</span>
                                    <span class="text-lg font-semibold">{{$company_user_count}}</span>
                                </div>
                                <div class="flex flex-col justify-around">
                                    <span class="font-semibold text-black text-xl text-center my-2">{{__('Members on Vacation')}}</span>
                                    <div class="flex justify-between px-2">
                                        <span class="font-bold text-slate-500 text-md">{{__('Next Week')}}</span>
                                        <span class="text-lg font-semibold">{{$vacation_next_week_company}}</span>
                                    </div>
                                    <div class="flex justify-between px-2">
                                            <span class="font-bold text-slate-500 text-md">{{__('Next Month')}}</span>
                                            <span class="text-lg font-semibold">{{$vacation_next_month_company}}</span>
                                    </div>
                                </div>
                            </div>
                   @endif
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>
