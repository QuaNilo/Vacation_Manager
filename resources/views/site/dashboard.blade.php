<x-landing-layout>
    <x-frontend.dashboard-navbar/>
    <div class="col-span-11 flex-col p-5">
        <div class="flex space-x-10 justify-items-start">
            <div class="flex-col space-y-10 w-fit">
                <div id="profile-card" class="flex-col p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                    <div id="profile-div" class="">
                        <img class="border-2 border-b-blue-950 rounded-3xl bg-purple-950"/>
                    </div>

                    <div class="text-center">
                        <h1 class="font-bold text-blue-950">{{auth()->user()->name}}</h1>
                        <h2>{{auth()->user()->email}}</h2>
                    </div>

                    <div id="actions-div" class="flex-col mt-4 text-center">
                        <x-base.button>Edit Profile</x-base.button>
                        <div class="flex mt-2 space-x-3">
                            <x-base.button>Change Password</x-base.button>
                            <x-base.button>Message</x-base.button>
                        </div>
                    </div>
                </div>
                <x-statistics-card title="DESCRIPTION" value="DESCRIPTION"/>
            </div>
            <div class="flex-col space-y-10">
                <div class="flex content-evenly h-fit space-x-8">
                    <x-statistics-card title="Vacation Days Available" value="4"/>
                    <x-statistics-card title="Pending Vacations" value="1"/>
                </div>
                <div class="flex space-x-10">
                    <div class="flex-col space-y-12">
                        <div id="vacations_taken_current_year" class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                            CHART FOR VACATIONS TAKEN THIS YEAR
                        </div>
                        <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                            Pending Vacations
                        </div>
                    </div>
                    <div class="flex-col space-y-12">
                        <x-statistics-card title="TEAM" value="45"/>
                        @if(auth()->user()->team())
                            <?php
                            $team = auth()->user()->team()->first()
                            ?>
                            <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                                <h1 class="font-bold text-xl text-center">{{__('Team')}}</h1>
                                <span class="font-semibold">{{__('Team name :')}}</span>
                                <span>{{$team->name}}</span>
                            </div>
                            <div class="p-5 rounded-xl border-2 shadow-xl dark:text-white text-black">
                                <h1 class="font-bold text-xl text-center">{{__('Team Information')}}</h1>
                                <span class="font-semibold">{{__('Member count')}} :</span>
                                <span>{{$team->count}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-center my-8">
            <span class="text-4xl ">{{__('User Metrics')}}</span>
        </div>
        <div class="flex flex-col text-center my-12">
            <span class="text-4xl ">{{__('Team Metrics')}}</span>
        </div>
    </div>
</x-landing-layout>
