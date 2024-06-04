<select {{ $attributes->class(['tom-select'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}>
    {{ $slot }}
</select>

@push('styles')
    <style>
        .ts-control {
            height: 60px;
            /*min-height: 60px;
            max-height: 120px;*/
            align-items: center;
            padding-inline-start: 30px;
            border: none;
            border-radius: 0px;
            overflow-y: auto;
            /*--tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);*/
            --tw-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            border-left: 1px solid #E7E7E7;
            /*box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);*/
        }

        .ts-control::after {
            content: "\2193";
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            color: #000000;
            font-size: 16px;
        }


        .ts-control,
        .ts-control input,
        .ts-dropdown {
            color: #303030;
            font-family: inherit;
            font-size: 15px;
            line-height: 18px;
        }

        /* Apply border-radius on medium and small screens */
        @media (max-width: 1024px) {
            .ts-control {
                border-radius: 9999px;
                /* Apply border-radius on medium and small screens */
                --tw-shadow: 0 5px 13px rgb(60 72 88 / 0.20) !important;
                --tw-shadow-colored: 0 5px 13px var(--tw-shadow-color) !important;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow) !important;
            }
        }
        .ts-wrapper {
            height: fit-content;
        }

        .ts-wrapper.multi .ts-control>div {
            background: #f2f2f2;
            border-radius: 9999px;
            border: 0 solid #d0d0d0;
            color: #303030;
            cursor: pointer;
            margin: 0 3px 3px 0;
            padding: 2px;
            font-size: 12px;
        }

        .ts-wrapper.plugin-remove_button:not(.rtl) .item .remove {
            border-left: none;
            margin-right: 2px;
            border-radius: 9999px;
            margin-left: 6px;
        }
        .ts-dropdown {
            margin: 0;
        }
        .ts-dropdown .optgroup-header {
            padding: 0.625rem 0.75rem;
            font-weight: 500;
            background-color: #f1f5f9;
        }
    </style>
@endpush

@once
    @push('vendors')
        @vite('resources/js/vendor/tom-select.js')
        @vite('resources/js/vendor/dom.js')
    @endpush
@endonce

@once
    @push('scripts')
        @vite('resources/js/components/base/tom-select.js')
    @endpush
@endonce
