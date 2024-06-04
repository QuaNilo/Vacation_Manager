@if($config->options->localized)
    flash(__('messages.updated', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]))->overlay()->success();
@else
    flash(__('Updated successfully.'))->overlay()->success();
@endif
