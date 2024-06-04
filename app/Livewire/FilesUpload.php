<?php

namespace App\Livewire;

use App\Facades\HelperMethods;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class FilesUpload extends Component
{
    use WithFileUploads;

    //#[Rule('image|max:10240')] // 10MB Max
    public $photo;
    //#[Rule(['files.*' => 'image|max:10240'])]
    #[Reactive]
    public Collection $previousFiles;
    public $removedPreviousFiles = [];
    public $files = [];
    public $isMultiple = true;
    public $maxFiles = 10;
    public $maxFileSize = 10240; // 10MB in KB
    public $acceptedFileTypes = '*/*'; // "'image/*,application/pdf'";
    public $label = null; // __('Upload Files')
    public $hideLabel = false;
    public $uploadFieldMainLabel = null; // __('Upload a file') or __('Upload files')
    public $uploadFieldSecondaryLabel = null; // __('or drag and drop')
    public $hintLabel = null; //default empty
    public $inputName='file';

    #[Modelable]
    public $outputValues = false;

    public function updatedFiles() : void
    {
        $mimes = $this->getMimesFromAcceptedFileTypes($this->acceptedFileTypes);

        $maxFiles = $this->isMultiple ? $this->maxFiles : 1;
        //code to check if we have more than files that the maxFiles and remove the ones that are over the limit
        if (count($this->files)+count($this->previousFiles) > $maxFiles) {
            do {
                $lastFile = end($this->files);
                if (!empty($lastFile)) {
                    $this->addError('files', __('The :attribute may not have more than :max items',
                        [
                            'attribute' => $label ?? __('Upload Files'),
                            'max' => $maxFiles
                        ]
                    ));
                    $this->removeFile($lastFile->getFilename());
                }
            } while (count($this->files) >0 &&  count($this->files)+count($this->previousFiles)  > $maxFiles);
            return;
        }
        $validationRules = [
            'files.*' => [
                'required',
                'max:' . $this->maxFileSize,
            ]
        ];

        if (!empty($mimes)) {
            $validationRules['files.*'][] = 'mimes:' . implode(',', $mimes);
        }

        //$this->validate($validationRules);
        $messages=[
            'required' => __('You must upload at least one file'),
            'max' => __('The maximum size allowed for :attribute is :max',
                [
                    'attribute' => $label ?? __('Upload Files'),
                    'max' => HelperMethods::bytesToHuman($this->maxFileSize*1024)
                ]
            ),
            'mimes' => __('The :attribute must be a file of type: :values.',
                [
                    'attribute' => $label ?? __('Upload Files'),
                ]
            ),
        ];
        //validate the size
        $validator = Validator::make(['files' => $this->files], $validationRules, $messages);
        if ($validator->fails()) {
            // Handle validation failure without stopping execution then add the errors to the files
            foreach ($validator->errors()->get('files.*', []) as $errorKey => $errorMessage) {
                $fileId = str_replace('files.', '', $errorKey);
                $this->addError('files.*', $errorMessage);
                $this->removeFile($this->files[$fileId]->getFilename());
            }
            return;
        }
        //fire the event of file uploaded with an array with the basic information about the files
        $this->dispatch('file-uploaded', files: $this->convertToArrayFiles());

        //Use the modelable to output the files uploaded and removed
        if($this->outputValues !== false) {
            $tempFiles = [];
            foreach ($this->files as $file) {
                $tempFiles[] = [
                    'name' => $file->getFilename(),
                    'original_name' => $file->getClientOriginalName(),
                ];
            }
            $this->outputValues['uploaded'] = $tempFiles;
        }
    }

    /*
     * Só consegui apagar os ficheiros assim de outras maneiras dava erros de javascript
     * TODO ver isto melhor
     */
    public function removeFile($filename) : void
    {
        $this->files = collect($this->files)->reject(function ($file) use ($filename) {
            return $file->getFilename() === $filename;
        })->values()->all();

        //Use the modelable to output the files uploaded and removed
        if($this->outputValues !== false) {
            $tempFiles = [];
            foreach ($this->files as $file) {
                $tempFiles[] = [
                    'name' => $file->getFilename(),
                    'original_name' => $file->getClientOriginalName(),
                ];
            }
            $this->outputValues['uploaded'] = $tempFiles;
        }
    }

    /**
     * Remove a previous file and show it correcty on page
     * @param $id
     * @return void
     */
    public function removePreviousFile($id) : void
    {
        //add the removed file to a collection of removed files
        $removedPreviousFile = $this->previousFiles->where('id', $id)->first();
        $this->removedPreviousFiles[]=$removedPreviousFile->id;
        //remove the removed file from the previousFiles collection
        $this->previousFiles =  $this->previousFiles->filter(function ($file) use ($id) {
            return $file->id != $id;
        });
        //Use the modelable to output the files uploaded and removed
        if($this->outputValues !== false) {
            $this->outputValues['removed'] = $this->removedPreviousFiles;
        }
    }


    public function render() : \Illuminate\View\View
    {
        //if we are using modelable we need to make sure that the files exists
        //otherwise we will have an error so in case of error we reset the files
        if($this->outputValues !== false) {
            try{
                foreach ($this->files as $file) {
                    $file->getSize();
                }
            }catch (\Exception $e){
                $this->files = [];
            }
        }
        return view('livewire.files-upload');
    }


    protected function getMimesFromAcceptedFileTypes($acceptedFileTypes) : array
    {
        $mimeToExtensionMapping = [
            'image/*' => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'],
            'application/pdf' => ['pdf'],
            'application/msword' => ['doc'],
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => ['docx'],
            // Add more mappings as needed...
        ];

        $mimes = [];
        $acceptedFileTypesArray = explode(',', $acceptedFileTypes);

        foreach ($acceptedFileTypesArray as $type) {
            if ($type === '*/*') {
                // Allow all file types
                return [];
            } elseif (isset($mimeToExtensionMapping[$type])) {
                $mimes = array_merge($mimes, $mimeToExtensionMapping[$type]);
            }
        }

        return $mimes;
    }

    /**
     * Override to enable multiple to add more that one file in a multiple input one at a time
     * @param $name
     * @param $tmpPath
     * @param $isMultiple
     * @return void
     */
    function _finishUpload($name, $tmpPath, $isMultiple) : void
    {
        $this->cleanupOldUploads();

        if ($isMultiple) {
            $file = collect($tmpPath)->map(function ($i) {
                return TemporaryUploadedFile::createFromLivewire($i);
            })->toArray();
            $this->dispatch('upload:finished', name: $name, tmpFilenames: collect($file)->map->getFilename()->toArray())->self();
            //added this if
            if (is_array($value = $this->getPropertyValue($name))) {
                $file = array_merge($value, $file);
            }
        } else {
            $file = TemporaryUploadedFile::createFromLivewire($tmpPath[0]);
            $this->dispatch('upload:finished', name: $name, tmpFilenames: [$file->getFilename()])->self();

            // If the property is an array, but the upload ISNT set to "multiple"
            // then APPEND the upload to the array, rather than replacing it.
            if (is_array($value = $this->getPropertyValue($name))) {
                //$file = array_merge($value, [$file]);
                $file=[$file];
            }
        }

        app('livewire')->updateProperty($this, $name, $file);
    }

    /**
     * Convert the files in an array to be dispached on an event
     * @return array
     */
    protected function convertToArrayFiles() : array
    {
        $filesArray = [$this->inputName => []];
        /*
         * @var TemporaryUploadedFile $file
         */
        foreach($this->files as $file){
            $clientOriginalName = $file->getClientOriginalName();
            $extension = $file->guessExtension();
            $originalName = str_replace('.' . $extension, '', $clientOriginalName);
            $filesArray[$this->inputName][]=[
                'originalName' => $originalName,
                'clientOriginalName' => $clientOriginalName,
                'filename' => $file->getFilename(),
                'size' => $file->getSize(),
                'extension' => $file->guessExtension(),
                'mimeType' => $file->getMimeType(),
                'temporaryUrl' => $file->isPreviewable() ?  $file->temporaryUrl() : null,
                'isPreviewable' => $file->isPreviewable(),
            ];
        }
        return $filesArray;
    }
}
