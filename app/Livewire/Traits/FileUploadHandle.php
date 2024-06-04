<?php

namespace App\Livewire\Traits;

trait FileUploadHandle
{
    /**
     * Handle the file upload for a model
     * @param $attribute // attribute of the array with the uploaded and removed files
     * @param $collection // collection name
     * @param $model // model to attach the media
     * @return void
     */
    protected function fileUploadHandle($attribute, $collection, $model): void
    {
        //remove the files that are on the array marked as removed
        foreach (($this->{$attribute}['removed'] ?? []) as $file_id) {
            if(!empty($model->getMedia($collection)->where('id', $file_id)->first())){
                $model->getMedia($collection)->where('id', $file_id)->first()->delete();
            }
        }
        foreach (($this->{$attribute}['uploaded'] ?? []) as $index => $uploadedFile) {
            $model->addMedia(storage_path( "app/livewire-tmp/" . $uploadedFile['name']))
                ->usingName($uploadedFile['original_name'])//get the media original name at the same index as the media item
                ->toMediaCollection($collection);
        }
        //refresh to make sure the media is loaded
        $model->refresh();
        //clear the uploaded and removed files
        $this->{$attribute} = [];
        //load the previousMedia
        $previousAttributeName = 'previous' . ucfirst($attribute) . 'Media';
        $this->{$previousAttributeName} = $model->getMedia($collection);
    }
}
