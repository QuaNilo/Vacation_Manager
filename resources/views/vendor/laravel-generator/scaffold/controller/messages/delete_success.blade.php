@if($config->options->localized)
    flash(__('messages.deleted', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]))->overlay()->success();
@else
    flash(__('Deleted successfully.'))->overlay()->success();
@endif
