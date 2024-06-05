<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $team->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $team->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Category Field -->
<div class="mb-3">
    <x-base.form-label for="category">{{ $team->getAttributeLabel('category') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('category') ? 'border-danger' : '') }}"
        id="category"
        name="category"
        :value="old('category', $team->category ?? '')"
        type="text"
    />
    @error('category')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Members Max Vacation Days Field -->
<div class="mb-3">
    <x-base.form-label for="members_max_vacation_days">{{ $team->getAttributeLabel('members_max_vacation_days') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('members_max_vacation_days') ? 'border-danger' : '') }}"
        id="members_max_vacation_days"
        name="members_max_vacation_days"
        :value="old('members_max_vacation_days', $team->members_max_vacation_days ?? '')"
        type="number"
        step="1"
    />
    @error('members_max_vacation_days')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Members Max On Vacation Field -->
<div class="mb-3">
    <x-base.form-label for="members_max_on_vacation">{{ $team->getAttributeLabel('members_max_on_vacation') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('members_max_on_vacation') ? 'border-danger' : '') }}"
        id="members_max_on_vacation"
        name="members_max_on_vacation"
        :value="old('members_max_on_vacation', $team->members_max_on_vacation ?? '')"
        type="number"
        step="1"
    />
    @error('members_max_on_vacation')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Members Vacation Days Regen Monthly Field -->
<div class="mb-3">
    <x-base.form-label for="members_vacation_days_regen_monthly">{{ $team->getAttributeLabel('members_vacation_days_regen_monthly') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('members_vacation_days_regen_monthly') ? 'border-danger' : '') }}"
        id="members_vacation_days_regen_monthly"
        name="members_vacation_days_regen_monthly"
        :value="old('members_vacation_days_regen_monthly', $team->members_vacation_days_regen_monthly ?? '')"
        type="number"
        step="1"
    />
    @error('members_vacation_days_regen_monthly')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
