@props(['id', 'name', 'formInputSize' => null, 'rounded' => null, 'twMerge' => true])
@aware(['formInline' => null, 'inputGroup' => null])

<input id="{{ $id }}_temp"
    @if($twMerge) data-tw-merge @endif
    {{ $attributes->class(
            merge([
                'disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent',
                '[&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent',
                'transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80',
                'group-[.form-inline]:flex-1',
                'group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10',
                $formInputSize == 'sm' ? 'text-xs py-1.5 px-2' : null,
                $formInputSize == 'lg' ? 'text-lg py-1.5 px-4' : null,
                $rounded ? 'rounded-full' : null,
                $attributes->whereStartsWith('class')->first(),
            ]),
        )->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}
/>
<input type="hidden" name="{{ $name }}" id="{{ $id }}" {{ $attributes }}>
<div id="phone-error-msg-{{ $id }}" class="text-danger mt-2"></div>


@pushOnce('styles')
    @vite('resources/css/vendor/intl-tel-input.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/intl-tel-input.js')
@endPushOnce

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var phoneInput = document.querySelector("#{{ $id }}_temp"),
                errorMsg = document.querySelector("#phone-error-msg-{{ $id }}");

            var errorMap = {
                0: "{{ __('Invalid number') }}",
                1: "{{ __('Invalid country code') }}",
                2: "{{ __('Too short') }}",
                3: "{{ __('Too long') }}",
                4: "{{ __('Invalid number') }}",
                '-99': "{{ __('Invalid number') }}"
            };

            var reset = function() {
                phoneInput.classList.remove('!border-danger');
                errorMsg.innerHTML = '';
                errorMsg.classList.remove('block');
                errorMsg.classList.add('hidden');
            };

            var iti = intlTelInput(phoneInput, {
                utilsScript: '{{ asset('build/js/intl-tel-input/utils.js') }}',
                preferredCountries: ['pt'],
            });

            phoneInput.addEventListener('blur', function() {
                reset();
                var element = document.getElementById("{{ $id }}");
                if (phoneInput.value.trim()) {
                    if (iti.isValidNumber()) {
                        element.value = iti.getNumber();
                    } else {
                        element.value = "";
                        phoneInput.classList.add('!border-danger');
                        var errorCode = iti.getValidationError();
                        errorMsg.innerHTML = errorMap[errorCode];
                        errorMsg.classList.remove("hidden");
                        errorMsg.classList.add("block");
                    }
                } else {
                    element.value = "";
                }
                element.dispatchEvent(new Event('input'));
            });
        });
    </script>
@endPush
