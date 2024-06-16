<div id="input-div" class="flex flex-col text-white h-fit w-full max-w-screen-lg bg-primary/70">
    @if($hasPendingRequest)
        <div class="p-10">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-center text-2xl font-bold py-2 uppercase tracking-wide">{{__('Submit Request')}}</h1>
                <img src="{{ asset('images/join-company.svg') }}" alt="Join Company" class="h-80 w-80 max-w-sm">
            </div>
            <table class="min-w-full bg-white border border-gray-200 ml-0">
                <thead>
                    <tr class="bg-white text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Submitted at</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="text-white bg-primary/70 text-sm font-light">
                    <tr class="border-b border-gray-200">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $companyRequested->name }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $companyRequested->created_at }}</td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $user->company_join_request }}</td>
                        <td class="py-3 px-6 text-left">
                            <form action="{{ route('companies.delete-join') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="p-10">
            <div class="flex flex-col justify-center items-center">
                <h1 class="text-center text-2xl font-bold py-2 uppercase">{{__('Submit Request')}}</h1>
                <img src="{{ asset('images/join-company.svg') }}" alt="Join Company" class="h-80 w-80 max-w-sm">
            </div>
            <div>
                <form method="POST" action="{{ route('companies.request-join') }}">
                @csrf
                     <label class="form-label font-medium">Company's name : <span class="text-red-600">*</span></label>
                    <div class="form-icon relative ml-0 m-2 pr-4">
                        <input id="company_name" type="text" class="form-input w-full py-2 h-10 text-white bg-transparent rounded outline-none border border-gray-200 focus:border-indigo-600 focus:ring-0" placeholder="" name="company_name" required="">
                    </div>
                    <div class="m-6 ml-0 mt-0">
                        <button class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
