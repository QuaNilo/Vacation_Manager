<x-backend-base-layout>
    <div id="main-div" class="flex justify-center items-center h-screen align-middle">
        <div id="cards-div" class="flex space-x-10 h-1/2">
            <a href="{{route('companies.create')}}">
                <div id="register-company-card" class="flex flex-col bg-primary/70 p-6 text-white transform hover:scale-105 transition duration-300 ease-in-out">
                    <h1 class="text-center text-2xl font-bold py-2 uppercase tracking-wide">{{__('Register A Company')}}</h1>
                    <img src="{{ asset('images/create-company.svg') }}" alt="Register Company" class="h-80 w-80 mx-auto max-w-sm">
                    <p class="text-center mt-4">{{__('Register your company by clicking here')}}</p>
                </div>
            </a>
            <a href="{{route('companies.join')}}">
                <div id="apply-company-card" class="flex flex-col bg-primary/70 p-6 text-white transform hover:scale-105 transition duration-300 ease-in-out">
                    <h1 class="text-center text-2xl font-bold py-2 uppercase tracking-wide">{{__('Join A Company')}}</h1>
                    <img src="{{ asset('images/join-company.svg') }}" alt="Join Company" class="h-80 w-80 mx-auto max-w-sm">
                    <p class="text-center mt-4">{{__('Join a company by clicking here')}}</p>
                </div>
            </a>
        </div>
    </div>
</x-backend-base-layout>
