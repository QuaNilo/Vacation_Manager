<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the Setting.
     */
    public function index(Request $request)
    {
        return view('settings.index');
    }


    /**
     * Show the form for creating a new Setting.
     */
    public function create()
    {
        $setting = new Setting();
        $setting->loadDefaultValues();
        return view('settings.create', compact('setting'));
    }


    /**
     * Store a newly created Setting in storage.
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();

        /** @var Setting $setting */
        $setting = Setting::create($input);
        if ($setting) {
            flash(__('Saved successfully.'))->overlay()->success();
        } else {
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('settings.index'));
    }

    /**
     * Display the specified Setting.
     */
    public function show(Setting $setting)
    {
        return view('settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified Setting.
     */
    public function edit(Setting $setting)
    {
        return view('settings.edit')->with('setting', $setting);
    }

    /**
     * Update the specified Setting in storage.
     */
    public function update(Setting $setting, UpdateSettingRequest $request)
    {
        $setting->fill($request->all());
        if ($setting->save()) {
            flash(__('Updated successfully.'))->overlay()->success();
        } else {
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @throws \Exception
     */
    public function destroy(Setting $setting)
    {
        if ($setting->delete()) {
            flash(__('Deleted successfully.'))->overlay()->success();
        } else {
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('settings.index'));
    }

    // protected function fileUploadHandle($request, $fileName, $collection, $model): void
    // {
    //     if (!empty($file_id = $request->input($fileName . '_delete'))) {
    //         if (!empty($model->getMedia($collection)->where('id', $file_id)->first())) {
    //             $model->getMedia($collection)->where('id', $file_id)->first()->delete();
    //         }
    //     }
    //     if (!empty($file = $request->input($fileName))) {
    //         $model->addMedia(storage_path("app/livewire-tmp/" . $file))
    //             ->usingName($request->input($fileName . '_original_name')) //get the media original name at the same index as the media item
    //             ->toMediaCollection($collection);
    //     }
    // }

    protected function filesUploadHandle($request, $collection, $model): void
    {
        // Remove the files from the server; this should be called before saving the new files
        foreach ($request->input($collection . '_delete', []) as $file_id) {
            $mediaToDelete = $model->getMedia('images')->where('id', $file_id)->first();
            if (!empty($mediaToDelete)) {
                $mediaToDelete->delete();
            }
        }

        // Save the new files to the server
        foreach ($request->input($collection , []) as $index => $file) {
            $model->addMedia(storage_path("app/livewire-tmp/" . $file))
                ->usingName($request->input($collection  . '_original_name.' . $index)) //get the media original name at the same index as the media item
                ->toMediaCollection($collection );
        }
    }
}
