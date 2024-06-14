<div id="input-div" class="flex flex-col text-white space-x-10 h-1/2 w-full max-w-screen-lg justify-center bg-primary/70">
    <div class="flex flex-col justify-center items-center h-full">
        <h1 class="text-center text-2xl font-bold py-2 uppercase tracking-wide">{{__('Submit Request')}}</h1>
        <img src="{{ asset('images/join-company.svg') }}" alt="Join Company" class="h-80 w-80 max-w-sm">
    </div>
    <div>
        <form method="POST" action="{{ route('companies.request-join') }}" class="ml-0 pl-0">
        @csrf
             <label class="form-label font-medium">Company's name : <span class="text-red-600">*</span></label>
            <div class="form-icon relative ml-0 m-2 pr-4">
                <input type="text" class="form-input w-full py-2 h-10 text-white bg-transparent rounded outline-none border border-gray-200 focus:border-indigo-600 focus:ring-0" placeholder="" name="company_name" required="">
            </div>
            <div class="m-6 ml-0 mt-0">
                <button class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">Submit Request</button>
            </div>
        </form>
    </div>
</div>
