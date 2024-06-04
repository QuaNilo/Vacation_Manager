<div class="editor">
    {{ $slot }}
</div>

@pushOnce('styles')
    @vite('resources/css/vendor/ckeditor.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/ckeditor/inline.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/inline-editor.js')
@endPushOnce
