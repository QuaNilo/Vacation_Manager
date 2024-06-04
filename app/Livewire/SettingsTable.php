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
use App\Models\Setting;

class SettingsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    /**
     * @throws \Exception
     */
    public function table(Table $table): Table
    {
        $newModel = new Setting();
        return $table
            ->query(Setting::query())
            ->columns([
                TextColumn::make("type")
                ->label($newModel->getAttributeLabel("type"))
                ->formatStateUsing(fn (Setting $record): string => $record->typeLabel)
                ->sortable()
                ->toggleable(),
            TextColumn::make("group")
                ->label($newModel->getAttributeLabel("group"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("name")
                ->label($newModel->getAttributeLabel("name"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("slug")
                ->label($newModel->getAttributeLabel("slug"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("options")
                ->label($newModel->getAttributeLabel("options"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            TextColumn::make("value")
                ->label($newModel->getAttributeLabel("value"))
                ->sortable()
                ->toggleable()
                ->searchable(),
            /*TextColumn::make("order")
                ->label($newModel->getAttributeLabel("order"))
                ->sortable()
                ->toggleable()
                ->searchable(),*/
                TextColumn::make('created_at')
                    ->label($newModel->getAttributeLabel('created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label($newModel->getAttributeLabel('updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                ->label($newModel->getAttributeLabel('status'))
                ->query(fn (Builder $query): Builder => $query->where('status', Demo::STATUS_ACTIVE))
                ->label('Estado ativo')
                ->toggle(),*/
                SelectFilter::make('type')
                ->label($newModel->getAttributeLabel('type'))
                ->multiple()
                ->options(Setting::getTypeArray())
            ])
            ->actions([
                Action::make('edit')
                ->label(__('Update'))
                ->url(fn (Setting $record): string => route('settings.edit', ['setting' => $record]))
                ->icon('heroicon-o-pencil')
                //->color('danger')
            ])
            ->bulkActions([
                //BulkActionGroup::make([
                BulkAction::make('delete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->delete())
                //]),
            ])
            ->defaultSort('id', 'desc')
            ->recordUrl(
                fn (Model $record): string => route('settings.show', ['setting' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->reorderable('order_column')
            ->defaultPaginationPageOption(50);
    }

    public function render() : View
    {
        return view('settings.table');
    }
}
