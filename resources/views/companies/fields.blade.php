<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $company->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $company->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Category Field -->
<div class="mb-3">
    <x-base.form-label for="category">{{ $company->getAttributeLabel('category') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('category') ? 'border-danger' : '') }}"
        id="category"
        name="category"
        :value="old('category', $company->category ?? '')"
        type="text"
    />
    @error('category')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="mb-3">
    <x-base.form-label for="email">{{ $company->getAttributeLabel('email') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('email') ? 'border-danger' : '') }}"
        id="email"
        name="email"
        :value="old('email', $company->email ?? '')"
        type="email"
    />
    @error('email')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Telephone Field -->
<div class="mb-3">
    <x-base.form-label for="telephone">{{ $company->getAttributeLabel('telephone') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('telephone') ? 'border-danger' : '') }}"
        id="telephone"
        name="telephone"
        :value="old('telephone', $company->telephone ?? '')"
        type="text"
    />
    @error('telephone')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
