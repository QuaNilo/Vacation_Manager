<div x-data="fileUploadData()"
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false"
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress"
>
    @if(!$hideLabel)
        <x-base.form-label wire:ignore>{{ $label ?? __('Upload Files') }}</x-base.form-label>
    @endif
    <div
        @drop.prevent="handleFileDrop"
        @dragover.prevent
        class="rounded-md border-2 border-dashed pt-4 dark:border-darkmode-400">
        <div class="flex flex-wrap px-4">
            <div class="flex flex-wrap">
                <!-- Previous files -->
                @foreach ($previousFiles as $media)
                    <div class="image-fit zoom-in relative mb-5 mr-5 h-32 w-32 cursor-pointer">
                        @if(\App\Facades\HelperMethods::isImage($media))
                            <img class="rounded-md shadow" src="{{ $media->getUrl() }}" alt="Uploaded Image">
                        @else
                            <!-- Default div with a generic file icon -->
                            <div class="bg-gray-100 w-full h-full flex items-center justify-center shadow ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-check" data-lucide="file-check" class="lucide lucide-file-check stroke-1.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path></svg>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                            <span class="w-full font-bold text-gray-900 truncate">{{ $media->name }}</span>
                            <span class="text-xs text-gray-900" x-text="humanFileSize({{ $media->size }})"></span>
                        </div>
                        <x-base.tippy
                            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"
                            as="div"
                            content="{{ __('Remove') }}"
                        >
                            <svg wire:click="removePreviousFile({{ $media->id }})"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </x-base.tippy>
                    </div>
                @endforeach
                <div >
                    @foreach ($removedPreviousFiles as $mediaId)
                        <input type="hidden" name="{{ $inputName.'_delete'.($isMultiple ? '[]': '') }}" value="{{ $mediaId }}">
                    @endforeach
                </div>
            </div>
            <!-- Uploaded Files Preview -->
            @if ($files)
                @foreach ($files as $file)
                    <input type="hidden" name="{{ $inputName.($isMultiple ? '[]': '') }}" value="{{ $file->getFilename() }}">
                    <input type="hidden" name="{{ $inputName.'_original_name'.($isMultiple ? '[]': '') }}" value="{{ $file->getClientOriginalName() }}">
                    <div class="image-fit zoom-in relative mb-5 mr-5 h-32 w-32 cursor-pointer">
                        @if(!empty($file->isPreviewable()))
                            <img class="rounded-md shadow" src="{{ $file->temporaryUrl() }}" alt="Uploaded Image">
                        @else
                            <!-- Default div with a generic file icon -->
                            <div class="bg-gray-100 w-full h-full flex items-center justify-center shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-check" data-lucide="file-check" class="lucide lucide-file-check stroke-1.5"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><path d="m9 15 2 2 4-4"></path></svg>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                            <span class="w-full font-bold text-gray-900 truncate">{{ $file->getClientOriginalName() }}</span>
                            <span class="text-xs text-gray-900" x-text="humanFileSize({{ $file->getSize() }})"></span>
                        </div>
                        <x-base.tippy
                            class="absolute top-0 right-0 -mt-2 -mr-2 flex h-5 w-5 items-center justify-center rounded-full bg-danger text-white"
                            as="div"
                            content="{{ __('Remove') }}"

                        >
                            <svg wire:click="removeFile('{{ $file->getFilename() }}')"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="x" data-lucide="x" class="lucide lucide-x stroke-1.5 h-4 w-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </x-base.tippy>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="relative flex cursor-pointer items-center px-4 pb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="image" data-lucide="image" class="lucide lucide-image stroke-1.5 mr-2 h-4 w-4"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
            <span class="mr-1 text-primary">{{ !empty($uploadFieldMainLabel) ? $uploadFieldMainLabel : ($isMultiple ? __('Upload files') : __('Upload a file')) }}</span>
            {{ !empty($uploadFieldSecondaryLabel) ? $uploadFieldSecondaryLabel : __('or drag and drop') }}
            <input
                x-ref="fileInput"
                type="file"
                wire:model="files"
                accept="{{ $acceptedFileTypes }}"
                {{ $isMultiple ? 'multiple' : '' }}
                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer absolute top-0 left-0 h-full w-full opacity-0 cursor-pointer">
        </div>
        <!-- Upload Progress -->
        <div x-show="isUploading" class="bg-slate-200 rounded dark:bg-black/20 h-4 mb-4 mx-4" x-cloak>
            <div role="progressbar" :style="`width: ${progress}%;`"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="bg-primary h-full rounded text-xs text-white flex justify-center items-center">
                <span x-text="progress + '%'"></span>
            </div>
        </div>
        <!-- Error Message -->
        @error('files.*')
        <div class="mt-2 ps-4 mb-4 text-danger">{{ $message }}</div>
        @enderror
        @error('files')
        <div class="mt-2 ps-4 mb-4 text-danger">{{ $message }}</div>
        @enderror
        @if(!empty($hintLabel))
            <x-base.form-help>
                {{ $hintLabel }}
            </x-base.form-help>
        @endif
    </div>
</div>
<script>
    function fileUploadData() {
        return {
            isUploading: false,
            progress: 0,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            /*triggerFileUpload() {
                this.$refs.fileInput.click();
            },*/
            handleFileDrop(event) {
                const files = event.dataTransfer.files;
                this.uploadFiles(files);
            },
            uploadFiles(files) {
                this.isUploading = true;
                // Use Livewire to upload the files
                @this.uploadMultiple('files', files, () => {
                    //console.log('Upload Complete!');
                    this.isUploading = false;
                }, () => {
                    //console.log('Upload Failed!');
                    this.isUploading = false;
                }, (event) => {
                    //console.log('Upload Progress:', event.detail.progress);
                    this.progress = event.detail.progress;
                });
            }
            // Other data and methods...
        };
    }
</script>
