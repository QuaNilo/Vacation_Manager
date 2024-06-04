<div>
    <form wire:submit="save">
        @include('demos.fields_livewire')
        <div class="mt-5 flex justify-between">
            <div>
                <x-base.button
                    :twMerge="false"
                    class="w-24"
                    as="a"
                    variant="outline-secondary"
                    href="{{ route('demos.index') }}"
                >{{ __('Cancel') }}
                </x-base.button>
            </div>
            <!-- Right aligned block for the Preview and Save buttons -->
            <div class="flex">
                <x-base.button
                    :twMerge="false"
                    class="w-24"
                    type="submit"
                    variant="primary"
                >{{ __('Save') }}
                </x-base.button>
            </div>
        </div>
    </form>
</div>
