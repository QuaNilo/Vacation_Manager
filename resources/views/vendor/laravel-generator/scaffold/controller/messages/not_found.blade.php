        if (empty(${{ $config->modelNames->camel }})) {
@if($config->options->localized)
            flash(__('models/{{ $config->modelNames->camelPlural }}.singular').' '.__('messages.not_found'))->overlay()->danger();
@else
            flash(__('Not found'))->overlay()->danger();
@endif

            return redirect(route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->dashedPlural }}.index'));
        }
