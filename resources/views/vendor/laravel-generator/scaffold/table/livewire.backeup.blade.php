@php
    echo "<?php".PHP_EOL;
@endphp

namespace {{ $config->namespaces->livewireTables }};

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use {{ $config->namespaces->model }}\{{ $config->modelNames->name }};

class {{ $config->modelNames->plural }}Table extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    protected $model = {{ $config->modelNames->name }}::class;

    protected $listeners = ['deleteRecord' => 'deleteRecord'];

    public function deleteRecord($id)
    {
        {{ $config->modelNames->name }}::find($id)->delete();
@if($config->options->localized)
        Flash::success(__('messages.deleted', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]));
@else
        Flash::success('{{ $config->modelNames->human }} deleted successfully.');
@endif
        $this->emit('refreshDatatable');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('{{ $config->primaryName }}');
    }

    public function columns(): array
    {
        return [
            {!! $columns !!},
            Column::make("Actions", '{{ $config->primaryName }}')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('{{ $config->modelNames->dashedPlural }}.show', $row->{{ $config->primaryName }}),
                        'editUrl' => route('{{ $config->modelNames->dashedPlural }}.edit', $row->{{ $config->primaryName }}),
                        'recordId' => $row->{{ $config->primaryName }},
                    ])
                )
        ];
    }

    public function render() : View
    {
        return view('livewire.{{ $config->modelNames->dashedPlural }}');
    }
}

<?php

namespace App\Livewire;

use App\Models\Demo;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;


class ListDemos extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {

        return $table
            ->query(Demo::query())
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->sortable()->searchable()->toggleable(),
                //TextColumn::make('body')->description(fn (Demo $model): string => $model->statusLabel),
                TextColumn::make('body')->searchable(isIndividual: true, isGlobal: true)->toggleable(),
                //TextColumn::make('status')->formatStateUsing(fn (Demo $model): string => $model->statusLabel)->searchable(isIndividual: true, isGlobal: false)->toggleable(),
                TextColumn::make('created_at')->dateTime()->toggleable()->searchable(isIndividual: true, isGlobal: false),

                /*SelectColumn::make('status')
                    ->searchable(isIndividual: true, isGlobal: true)
                    ->options(Demo::getStatusArray()),*/
            ])
            ->filters([
                Filter::make('statusActive')
                    ->query(fn (Builder $query): Builder => $query->where('status', Demo::STATUS_ACTIVE))
                    ->label('Estado ativo')
                    ->toggle(),
                SelectFilter::make('status')
                    ->multiple()
                    ->options(Demo::getStatusArray())
            ])
            ->actions([
                Action::make('edit')
                    /*->label('<x-base.lucide
                                            class="mr-1 h-4 w-4"
                                            icon="CheckSquare"
                                                />'.__('Update'))*/
                    ->label(__('Update'))
                    ->url(fn (Demo $record): string => route('demos.edit', ['demo' => $record]))
                    ->icon('heroicon-o-pencil')
                //->color(['primary' => Color::Rose])
                //->color('danger')
                /*->extraAttributes([

                    'class' => ' s'
                ], true),*/

            ])
            ->bulkActions([
                BulkAction::make('delete')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->delete())
            ])
            ->defaultSort('id', 'asc')
            ->recordUrl(
                fn (Model $demo): string => route('demos.show', ['demo' => $demo]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession();
    }

    public function render() : View
    {
        return view('livewire.list-demos');
    }
}
