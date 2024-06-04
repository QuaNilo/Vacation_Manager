<textarea {{ $attributes->class(['editor'])->merge($attributes->whereDoesntStartWith('class')->getAttributes()) }}>
    {{ $slot }}
</textarea>
@pushOnce('styles')
    @vite('resources/css/vendor/ckeditor.css')
@endPushOnce
@once
    @push('vendors')
        <script src="{{ asset('build/js/ckeditor/ckeditor.js') }}"></script>
    @endpush
@endonce

@once
    @push('scripts')
        @vite('resources/js/components/base/classic-editor.js')
        <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.hook('morph.added', ({
                    el
                }) => {
                    //this run when the page is rendered and apply again the tailwind merge
                    applyTailwindMerge();
                });
            });
        </script>
    @endpush
@endonce
