<!-- User Id Field -->
<div class="mb-3">
    <x-base.form-label for="user_id">{{ $userTeamRequests->getAttributeLabel('user_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }}"
        id="user_id"
        name="user_id"
        :value="old('user_id', $userTeamRequests->user_id ?? '')"
        type="number"
        step="1"
    />
    @error('user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Team Id Field -->
<div class="mb-3">
    <x-base.form-label for="team_id">{{ $userTeamRequests->getAttributeLabel('team_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('team_id') ? 'border-danger' : '') }}"
        id="team_id"
        name="team_id"
        :value="old('team_id', $userTeamRequests->team_id ?? '')"
        type="number"
        step="1"
    />
    @error('team_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Approved Field -->
<div class="mb-3">
    <x-base.form-label for="approved">{{ $userTeamRequests->getAttributeLabel('approved') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('approved') ? 'border-danger' : '') }}"
        id="approved"
        name="approved"
        :value="old('approved', $userTeamRequests->approved ?? '')"
        type="number"
        step="1"
    />
    @error('approved')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
