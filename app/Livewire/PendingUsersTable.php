<?php

namespace App\Livewire;

use App\Models\Role;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use App\Models\User;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PendingUsersTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function table(Table $table): Table
    {
        $newModel = new User();
        $authenticatedUserCompany = auth()->user()->company()->first();
        if ($authenticatedUserCompany) {
            $query = User::query()->with('roles', 'company')
                ->whereHas('company', function ($query) use ($authenticatedUserCompany) {
                    $query->where('companies.id', $authenticatedUserCompany->id)
                    ->where('company_join_request', User::STATUS_JOIN_REQUEST_PENDING);
                });

        }

        return $table
            ->query($query)
            ->columns([
                TextColumn::make("name")
                    ->label($newModel->getAttributeLabel("name"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make("email")
                    ->label($newModel->getAttributeLabel("email"))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                /*TextColumn::make("email_verified_at")
                    ->label($newModel->getAttributeLabel("email_verified_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),*/
                /*TextColumn::make("profile_photo_path")
                    ->label($newModel->getAttributeLabel("profile_photo_path"))
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
                TextColumn::make('roles.name')
                    ->label($newModel->getAttributeLabel('roles'))
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
                SelectFilter::make('roles')
                    ->label($newModel->getAttributeLabel('roles'))
                    ->options(Role::pluck('name', 'id')->toArray())
                    ->modifyQueryUsing(function (Builder $query, $state) {
                        if (empty($state['value'])) {
                            return $query;
                        }
                        return $query->whereHas('roles', fn($query) => $query->where('id', $state['value']));
                    }),
            ])
            ->actions([
                Action::make('view')
                    ->label(__('View'))
                    ->url(fn (User $record): string => route('users.show', ['user' => $record]))
                    ->icon('heroicon-o-eye'),
                    Action::make('edit')
                        ->label(__('Update'))
                        ->url(fn (User $record): string => route('users.edit', ['user' => $record]))
                        ->icon('heroicon-o-pencil'),
//                    Action::make('impersonate')
//                        ->label(__('Impersonate'))
//                        ->url(fn (User $record): string => route('impersonate', $record->id))
//                        //->action(fn (User $record): bool => auth()->user()->impersonate($record, 'web'))
//                        ->icon('heroicon-o-users')
//                        ->visible(fn (User $record): bool => auth()->user()->id != $record->id && (auth()->user()->can('adminFullApp'))),
                        //->authorize(fn (User $record): bool => auth()->user()->id != $record->id && (auth()->user()->can('adminFullApp'))),
                    Action::make('Approve')
                        ->label(__('Approve'))
                        ->url(fn (User $record): string => route('companies.users.approve', ['user' => $record]))
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()

//                //->color('danger')
//                ActionGroup::make([
//                ])->iconButton()
            ])
            ->bulkActions([
                //BulkActionGroup::make([
                BulkAction::make('delete')
                ->requiresConfirmation()
                ->action(fn (Collection $records) => $records->each->delete()),
                ExportBulkAction::make()
                //]),
            ])
            ->defaultSort('id', 'desc')
            ->recordUrl(
                fn (Model $record): string => route('users.edit', ['user' => $record]),
            )
            //->striped()
            ->persistFiltersInSession()
            ->persistSearchInSession()
            ->defaultPaginationPageOption(25);
    }

    public function render() : View
    {
        return view('users.pending-users-table');
    }
}
