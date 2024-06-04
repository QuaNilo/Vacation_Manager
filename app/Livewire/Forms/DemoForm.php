<?php

namespace App\Livewire\Forms;

use App\Livewire\Traits\FileUploadHandle;
use App\Models\Demo;
use Livewire\Form;

class DemoForm extends Form
{
    use FileUploadHandle; //this give us access to the $this->>fileUploadHandle method

    public ?\App\Models\Demo $demo;
    public $demo_id;
    public $user_id;
    public $name;
    public $body;
    public $phone;
    public $vat;
    public $zip;
    public $optional;
    public $body_optional;
    public $value;
    public $date;
    public $datetime;
    public $checkbox;
    public $privacy_policy;
    public $status;

    public $cover; // array of uploaded and removed files
    public $previousCoverMedia; // this attribute must follow this naming convention: previous{attributeName}Media

    public $files;
    public $previousFilesMedia; // this attribute must follow this naming convention: previous{attributeName}Media



    public function rules() : array
    {
        $rules = Demo::rules();
        unset($rules['order_column'], $rules['updated_at'], $rules['created_at']);
        return $rules;
    }

    public function setDemo(\App\Models\Demo $demo) : void
    {
        $this->demo = $demo;
        $this->demo_id = $demo->demo_id;
        $this->user_id = $demo->user_id;
        $this->name = $demo->name;
        $this->body = $demo->body;
        $this->phone = $demo->phone;
        $this->vat = $demo->vat;
        $this->zip = $demo->zip;
        $this->optional = $demo->optional;
        $this->body_optional = $demo->body_optional;
        $this->value = $demo->value;
        $this->date = !empty($demo->date) ? $demo->date->format('Y-m-d') : '';
        $this->datetime = !empty($demo->datetime) ? $demo->datetime->format('Y-m-d H:i') : '';
        $this->checkbox = $demo->checkbox;
        $this->privacy_policy = $demo->privacy_policy;
        $this->status = $demo->status;

        $this->previousCoverMedia = $demo->getMedia('cover');
        $this->previousFilesMedia = $demo->getMedia('files');

    }

    public function store() : void
    {
        $this->validate(attributes: \App\Models\Demo::attributeLabels());
        $this->demo = Demo::create(
            $this->except(['demo'])
        );
        //save the files on the media collection
        $this->fileUploadHandle('cover', 'cover', $this->demo);
        $this->fileUploadHandle('files', 'files', $this->demo);
    }

    public function update() : void
    {
        $this->validate(attributes: \App\Models\Demo::attributeLabels());
        $this->demo->update(
            $this->except(['demo'])
        );
        //save the files on the media collection
        $this->fileUploadHandle('cover', 'cover', $this->demo);
        $this->fileUploadHandle('files', 'files', $this->demo);
    }
}
