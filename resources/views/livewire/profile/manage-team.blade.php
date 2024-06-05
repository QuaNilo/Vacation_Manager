<div>
    <div class="mb-3">
        <x-base.form-label for="team_id">{{ __('Team') }}</x-base.form-label>
        <x-base.form-select
            class="w-full {{ ($errors->has('team_id') ? 'border-danger' : '') }}"
            id="team_id"
            name="team_id"
            wire:model="team_id"
        >
            @if(isset($userTeam->name))
                <option value="">{{ $userTeam->name }}</option>
                @foreach($teams as $team)
                    @if($team->name != $userTeam->name)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endif
                @endforeach
            @else
                <option value="">{{ __('Selecione uma equipa') }}</option>
                @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            @endif
        </x-base.form-select>
        @error('team_id')
            <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>


    <div x-data x-init="@this.on('saved', () => toastShow('{{ __('Saved with success') }}', '', 'success'))"></div>
    <div class="flex space-x-3">
        <div class="mt-3 text-right">
            <x-base.button variant="primary" :twMerge="false" type="button" wire:click="saveTeam">
                {{ __('Save') }}
            </x-base.button>
        </div>
        <div class="mt-3 text-right">
            <x-base.button variant="danger" :twMerge="false" type="button" wire:click="deleteTeam">
                {{ __('Delete') }}
            </x-base.button>
        </div>
    </div>
</div>
