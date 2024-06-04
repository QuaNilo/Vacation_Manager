(function () {
    "use strict";
    $(".editor").each(function () {
        const el = this;
        ClassicEditor.create(el,{
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            //plugins: [ Base64UploadAdapter],
            // ... other configuration options
            //plugins: [ SourceEditing ],
            //toolbar: [ 'sourceEditing', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'undo', 'redo' ],
            //
            toolbar: ['undo', 'redo', '|', 'heading', '|', 'bold', 'italic', 'underline', '|', 'link', 'imageUpload', 'insertTable','blockQuote', '|', 'bulletedList', 'numberedList', 'indent', 'outdent', 'sourceEditing'],
            //imageUpload
            simpleUpload: {
                uploadUrl: '/admin/file-upload',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            },
            link: {
                // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
                addTargetToExternalLinks: false,
                decorators: {
                    openInNewTab: {
                        mode: 'manual',
                        label: 'Abrir numa nova janela',
                        defaultValue: false,			// This option will be selected by default.
                        attributes: {
                            target: '_blank',
                            rel: 'noopener noreferrer'
                        }
                    }
                }
            }
        }).catch((error) => {
            console.error(error);
        });
    });
})();
