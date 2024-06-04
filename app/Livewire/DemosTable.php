<?php

namespace App\Livewire;

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
use App\Models\Demo;

class DemosTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Demo::query()->ordered())
            ->columns([
                TextColumn::make("demo_id")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("user_id")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("name")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("body")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("phone")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("vat")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("zip")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("optional")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("body_optional")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("value")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("date")
                ->dateTime()
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("datetime")
                ->dateTime()
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("checkbox")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("privacy_policy")
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("status")
                ->formatStateUsing(fn (Demo $record): string => $record->statusLabel)
                ->sortable()
                ->toggleable(),
                //TextColumn::make('id'),
                //TextColumn::make('name')->sortable()->searchable()->toggleable(),
                //TextColumn::make('body')->description(fn (Demo $model): string => $model->statusLabel),
                //TextColumn::make('body')->searchable(isIndividual: true, isGlobal: true)->toggleable(),
                //TextColumn::make('status')->formatStateUsing(fn (Demo $model): string => $model->statusLabel)->searchable(isIndividual: true, isGlobal: false)->toggleable(),
                //TextColumn::make('created_at')->dateTime()->toggleable()->searchable(isIndividual: true, isGlobal: false),

                /*SelectColumn::make('status')
                ->searchable(isIndividual: true, isGlobal: true)
                ->options(Demo::getStatusArray()),*/
            ])
            ->filters([
                /*Filter::make('statusActive')
                ->query(fn (Builder $query): Builder => $query->where('status', Demo::STATUS_ACTIVE))
                ->label('Estado ativo')
                ->toggle(),
                SelectFilter::make('status')
                ->multiple()
                ->options(Demo::getStatusArray())*/
            ])
            ->actions([
                Action::make('edit')

                ->label(__('Update'))
                ->url(fn (Demo $record): string => route('demos.edit', ['demo' => $record]))
                ->icon('heroicon-o-pencil')
                //->color('danger')
            ])
            ->bulkActions([
                BulkAction::make('delete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->delete())
            ])
            ->defaultSort('order_column', 'asc')
            ->recordUrl(
                fn (Model $record): string => route('demos.show', ['demo' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->reorderable('order_column')
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('demos.table');
    }
}
