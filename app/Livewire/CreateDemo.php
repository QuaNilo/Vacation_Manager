<?php

namespace App\Livewire;

use App\Livewire\Forms\DemoForm;
use App\Models\Demo;
use Livewire\Component;

class CreateDemo extends Component
{
    public DemoForm $form;
    public $validationErrors = [];

    public function mount(Demo $demo) : void
    {
        if($demo->id == null){
            $demo->loadDefaultValues();
        }
        $this->form->setDemo($demo);
    }

    public function save() : void
    {
        if($this->form->demo->id == null){
            $this->form->store();
        }else{
            $this->form->update();
        }
        $this->redirect(route('demos.show', $this->form->demo));
    }


    public function render() : \Illuminate\View\View
    {
        //to enable entangle validation errors on view to use inside wire:ignore elements
        $this->validationErrors = $this->getErrorBag()->toArray();
        return view('demos.create_demo_livewire');
    }
}
