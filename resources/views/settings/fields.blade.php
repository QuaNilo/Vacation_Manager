<!-- Type Field -->
<div class="mb-3">
    <x-base.form-label for="type">{{ $setting->getAttributeLabel('type') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('type') ? 'border-danger' : '') }}"
        id="type"
        name="type"
        :value="old('type', $setting->type ?? '')"
        type="number"
        step="1"
    />
    @error('type')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Group Field -->
<div class="mb-3">
    <x-base.form-label for="group">{{ $setting->getAttributeLabel('group') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('group') ? 'border-danger' : '') }}"
        id="group"
        name="group"
        :value="old('group', $setting->group ?? '')"
        type="text"
    />
    @error('group')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $setting->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $setting->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
<div class="mb-3">
    <x-base.form-label for="slug">{{ $setting->getAttributeLabel('slug') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('slug') ? 'border-danger' : '') }}"
        id="slug"
        name="slug"
        :value="old('slug', $setting->slug ?? '')"
        type="text"
    />
    @error('slug')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Options Field -->
<div class="mb-3">
    <x-base.form-label for="options">{{ $setting->getAttributeLabel('options') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('options') ? 'border-danger' : '') }}"
        id="options"
        name="options"
        rows="5"
    >{{ old('options', $setting->options ?? '') }}</x-base.form-textarea>
    @error('options')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Value Field -->
<div class="mb-3">
    <x-base.form-label for="value">{{ $setting->getAttributeLabel('value') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('value') ? 'border-danger' : '') }}"
        id="value"
        name="value"
        rows="5"
    >{{ old('value', $setting->value ?? '') }}</x-base.form-textarea>
    @error('value')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

@if(false)
    <!-- Order Column Field -->
    <div class="mb-3">
        <x-base.form-label for="order_column">{{ $setting->getAttributeLabel('order_column') }}</x-base.form-label>
        <x-base.form-input
            class="w-full {{ ($errors->has('order_column') ? 'border-danger' : '') }}"
            id="order_column"
            name="order_column"
            :value="old('order_column', $setting->order_column ?? '')"
            type="number"
            step="1"
        />
        @error('order_column')
            <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
    </div>
@endif
