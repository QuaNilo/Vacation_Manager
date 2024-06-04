@php
    echo "<?php".PHP_EOL;
@endphp

namespace {{ $config->namespaces->controller }};

@if(config('laravel_generator.tables') == 'datatables')
use {{ $config->namespaces->dataTables }}\{{ $config->modelNames->name }}DataTable;
@endif
use {{ $config->namespaces->request }}\Create{{ $config->modelNames->name }}Request;
use {{ $config->namespaces->request }}\Update{{ $config->modelNames->name }}Request;
//use {{ $config->namespaces->app }}\Http\Controllers\AppBaseController;
use {{ $config->namespaces->model }}\{{ $config->modelNames->name }};
use Illuminate\Http\Request;

class {{ $config->modelNames->name }}Controller extends Controller
{
    /**
     * Display a listing of the {{ $config->modelNames->name }}.
     */
    {!! $indexMethod !!}

    /**
     * Show the form for creating a new {{ $config->modelNames->name }}.
     */
    public function create()
    {
        ${{ $config->modelNames->camel }} = new {{ $config->modelNames->name }}();
        ${{ $config->modelNames->camel }}->loadDefaultValues();
        return view('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.create', compact('{{ $config->modelNames->camel }}'));
    }

    /**
     * Store a newly created {{ $config->modelNames->name }} in storage.
     */
    public function store(Create{{ $config->modelNames->name }}Request $request)
    {
        $input = $request->all();

        /** @var {{ $config->modelNames->name }} ${{ $config->modelNames->camel }} */
        ${{ $config->modelNames->camel }} = {{ $config->modelNames->name }}::create($input);
        if(${{ $config->modelNames->camel }}){
            @include('laravel-generator::scaffold.controller.messages.save_success')
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->dashedPlural }}.index'));
    }

    /**
     * Display the specified {{ $config->modelNames->name }}.
     */
    public function show({{ $config->modelNames->name }} ${{ $config->modelNames->camel }})
    {
        return view('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.show')->with('{{ $config->modelNames->camel }}', ${{ $config->modelNames->camel }});
    }

    /**
     * Show the form for editing the specified {{ $config->modelNames->name }}.
     */
    public function edit({{ $config->modelNames->name }} ${{ $config->modelNames->camel }})
    {
        return view('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.edit')->with('{{ $config->modelNames->camel }}', ${{ $config->modelNames->camel }});
    }

    /**
     * Update the specified {{ $config->modelNames->name }} in storage.
     */
    public function update({{ $config->modelNames->name }} ${{ $config->modelNames->camel }}, Update{{ $config->modelNames->name }}Request $request)
    {
        ${{ $config->modelNames->camel }}->fill($request->all());
        if(${{ $config->modelNames->camel }}->save()){
            @include('laravel-generator::scaffold.controller.messages.update_success')
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->dashedPlural }}.index'));
    }

    /**
     * Remove the specified {{ $config->modelNames->name }} from storage.
     *
     * @throws \Exception
     */
    public function destroy({{ $config->modelNames->name }} ${{ $config->modelNames->camel }})
    {
        if(${{ $config->modelNames->camel }}->delete()){
            @include('laravel-generator::scaffold.controller.messages.delete_success')
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->dashedPlural }}.index'));
    }
}
