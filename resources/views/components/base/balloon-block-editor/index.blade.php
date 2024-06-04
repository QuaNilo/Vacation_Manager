<div class="editor">
    {{ $slot }}
</div>

@pushOnce('styles')
    @vite('resources/css/vendor/ckeditor.css')
@endPushOnce

@pushOnce('vendors')
    @vite('resources/js/vendor/ckeditor/balloon-block.js')
@endPushOnce

@pushOnce('scripts')
    @vite('resources/js/components/base/balloon-block-editor.js')
@endPushOnce
