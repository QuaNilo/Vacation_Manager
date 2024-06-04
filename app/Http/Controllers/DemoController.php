<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the Demo.
     */
    public function index(Request $request)
    {
        return view('demos.index');
    }

    /**
     * Show the form for creating a new Demo.
     */
    public function create()
    {
        $demo = new Demo();
        $demo->loadDefaultValues();
        return view('demos.create', compact('demo'));
    }

    /**
     * Show the form for creating a new Demo (Livewire).
     */
    public function createLivewire()
    {
        $demo = new Demo();
        $demo->loadDefaultValues();
        return view('demos.create_livewire', compact('demo'));
    }

    /**
     * Store a newly created Demo in storage.
     */
    public function store(CreateDemoRequest $request)
    {
        $input = $request->all();

        /** @var Demo $demo */
        $demo = Demo::create($input);
        if($demo) {
            //handle the file upload and delete
            $this->fileUploadHandle($request, 'cover', 'cover', $demo, false);

            //handle the file upload and delete
            $this->fileUploadHandle($request, 'file', 'files', $demo, true);
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('demos.index'));
    }

    /**
     * Display the specified Demo.
     */
    public function show(Demo $demo)
    {
        return view('demos.show')->with('demo', $demo);
    }

    /**
     * Show the form for editing the specified Demo.
     */
    public function edit(Demo $demo)
    {
        return view('demos.edit')->with('demo', $demo);
    }

    /**
     * Show the form for editing the specified Demo (Livewire).
     */
    public function editLivewire(Demo $demo)
    {
        return view('demos.edit_livewire')->with('demo', $demo);
    }

    /**
     * Update the specified Demo in storage.
     */
    public function update(Demo $demo, UpdateDemoRequest $request)
    {
        $demo->fill($request->all());
        if ($demo->save()){
            //handle the file upload and delete
            $this->fileUploadHandle($request, 'cover', 'cover', $demo, false);

            //handle the file upload and delete
            $this->fileUploadHandle($request, 'file', 'files', $demo,true);
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('demos.index'));
    }


    /**
     * Remove the specified Demo from storage.
     *
     * @throws \Exception
     */
    public function destroy(Demo $demo)
    {
        if($demo->delete()) {
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('demos.index'));
    }

    /**
     * Handle the file upload for a model
     * @param $request
     * @param $fileName
     * @param $collection
     * @param $model
     * @return void
     */
    protected function fileUploadHandle($request, $fileName, $collection, $model, $isMultiple = false): void
    {
        if($isMultiple == false) {
            if (!empty($file_id = $request->input($fileName . '_delete'))) {
                if (!empty($model->getMedia($collection)->where('id', $file_id)->first())) {
                    $model->getMedia($collection)->where('id', $file_id)->first()->delete();
                }
            }
            if (!empty($file = $request->input($fileName))) {
                $model->addMedia(storage_path("app/livewire-tmp/" . $file))
                    ->usingName($request->input($fileName . '_original_name'))//get the media original name at the same index as the media item
                    ->toMediaCollection($collection);
            }
        }else{ // is multiple
            foreach ($request->input($fileName . '_delete', []) as $file_id) {
                if(!empty($model->getMedia($collection)->where('id', $file_id)->first())){
                    $model->getMedia($collection)->where('id', $file_id)->first()->delete();
                }
            }
            foreach ($request->input($fileName, []) as $index => $file) {
                $model->addMedia(storage_path( "app/livewire-tmp/" . $file))
                    ->usingName($request->input($fileName . '_original_name',[])[$index])//get the media original name at the same index as the media item
                    ->toMediaCollection($collection);
            }

        }
    }
}
