<li class="nav-item">
    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}.index') }}" class="nav-link @{{ Request::is('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->dashedPlural !!}*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
@if($config->options->localized)
        <p>@@lang('models/{{ $config->modelNames->camelPlural }}.plural')</p>
@else
        <p>{{ $config->modelNames->humanPlural }}</p>
@endif
    </a>
</li>
