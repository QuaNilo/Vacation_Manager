@if($config->options->localized)
    flash(__('messages.saved', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]))->overlay()->success();
@else
    flash(__('Saved successfully.'))->overlay()->success();
@endif
