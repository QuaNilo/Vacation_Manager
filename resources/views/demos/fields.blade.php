<!-- Demo Id Field -->
<div class="mb-3">
    <x-base.form-label for="demo_id">{{ $demo->getAttributeLabel('demo_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('demo_id') ? 'border-danger' : '') }}"
        id="demo_id"
        name="demo_id"
        :value="old('demo_id', $demo->demo_id ?? '')"
        type="number"
        step="1"
    />
    @error('demo_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- User Id Field -->
<div class="mb-3">
    <x-base.form-label for="user_id">{{ $demo->getAttributeLabel('user_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('user_id') ? 'border-danger' : '') }}"
        id="user_id"
        name="user_id"
        :value="old('user_id', $demo->user_id ?? '')"
        type="number"
        step="1"
    />
    @error('user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $demo->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('name') ? 'border-danger' : '') }}"
        id="name"
        name="name"
        :value="old('name', $demo->name ?? '')"
        type="text"
    />
    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Body Field -->
<div class="mb-3">
    <x-base.form-label for="body">{{ $demo->getAttributeLabel('body') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('body') ? 'border-danger' : '') }}"
        id="body"
        name="body"
        rows="5"
    >{{ old('body', $demo->body ?? '') }}</x-base.form-textarea>
    @error('body')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Phone Field -->
<div class="mb-3">
    <x-base.form-label for="phone">{{ $demo->getAttributeLabel('phone') }}</x-base.form-label>
    <x-base.form-phone
        class="w-full {{ ($errors->has('phone') ? 'border-danger' : '') }}"
        id="phone"
        name="phone"
        :value="old('phone', $demo->phone ?? '')"
        type="text"
    />
    @error('phone')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Vat Field -->
<div class="mb-3">
    <x-base.form-label for="vat">{{ $demo->getAttributeLabel('vat') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('vat') ? 'border-danger' : '') }}"
        id="vat"
        name="vat"
        :value="old('vat', $demo->vat ?? '')"
        type="text"
    />
    @error('vat')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Zip Field -->
<div class="mb-3">
    <x-base.form-label for="zip">{{ $demo->getAttributeLabel('zip') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('zip') ? 'border-danger' : '') }}"
        id="zip"
        name="zip"
        :value="old('zip', $demo->zip ?? '')"
        type="text"
    />
    @error('zip')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Optional Field -->
<div class="mb-3">
    <x-base.form-label for="optional">{{ $demo->getAttributeLabel('optional') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('optional') ? 'border-danger' : '') }}"
        id="optional"
        name="optional"
        :value="old('optional', $demo->optional ?? '')"
        type="text"
    />
    @error('optional')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Body Optional Field -->
<div class="mb-3">
    <x-base.form-label for="body_optional">{{ $demo->getAttributeLabel('body_optional') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('body_optional') ? 'border-danger' : '') }}"
        id="body_optional"
        name="body_optional"
        rows="5"
    >{{ old('body_optional', $demo->body_optional ?? '') }}</x-base.form-textarea>
    @error('body_optional')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Value Field -->
<div class="mb-3">
    <x-base.form-label for="value">{{ $demo->getAttributeLabel('value') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('value') ? 'border-danger' : '') }}"
        id="value"
        name="value"
        :value="old('value', $demo->value ?? '')"
        type="number"
        step="1"
    />
    @error('value')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Date Field -->
<div class="mb-3">
    <x-base.form-label for="date">{{ $demo->getAttributeLabel('date') }}</x-base.form-label>
    <x-base.input-group
        class="flatpickr"
        data-wrap="true"
        data-enable-time="false"
        data-date-format='Y-m-d'
        data-time_24hr='true'
        data-minute-increment='1'
        inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
            <x-base.lucide
                class="h-5 w-5"
                icon="Calendar"
            />
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('date') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="date"
            name="date"
            :value="old('date', $demo->date ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('date')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Datetime Field -->
<div class="mb-3">
    <x-base.form-label for="datetime">{{ $demo->getAttributeLabel('datetime') }}</x-base.form-label>
    <x-base.input-group
        class="flatpickr"
        data-wrap="true"
        data-enable-time="true"
        data-date-format='Y-m-d H:i'
        data-time_24hr='true'
        data-minute-increment='1'
        inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle>
            <x-base.lucide
                class="h-5 w-5"
                icon="Calendar"
            />
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('datetime') ? 'border-danger' : '') }} [&[readonly]]:bg-white"
            id="datetime"
            name="datetime"
            :value="old('datetime', $demo->datetime ?? '')"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('datetime')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Upload cover Field -->
<div class="mb-3">
    <livewire:files-upload
        inputName="cover"
        :isMultiple="false"
        maxFiles="1"
        maxFileSize="10240"
        :previousFiles="$demo->getMedia('cover')"
        :label="__('Upload Cover')"
        acceptedFileTypes="image/*"
        :uploadFieldMainLabel="__('Upload an image')"
    />
</div>

<!-- Upload Files Field -->
<div class="mb-3">
    <livewire:files-upload
        inputName="file"
        :isMultiple="true"
        maxFiles="10"
        maxFileSize="10240"
        :previousFiles="$demo->getMedia('files')"
        :label="__('Upload Files')"
        acceptedFileTypes="*/*"
        :uploadFieldMainLabel="__('Upload files')"
    />
</div>





<!-- Checkbox Field -->
<div class="mb-3">
    <x-base.form-input
        id="checkbox_hidden"
        name="checkbox"
        :value="0"
        type="hidden"
    />
    <x-base.form-switch>
        <x-base.form-switch.input
            class="{{ ($errors->has('checkbox') ? 'border-danger' : '') }}"
            id="checkbox"
            name="checkbox"
            :value="1"
            :checked="old('checkbox', $demo->checkbox ?? '') == 1"
            type="checkbox"
        />
        <x-base.form-switch.label for="checkbox">{{ $demo->getAttributeLabel('checkbox') }}</x-base.form-switch.label>
    </x-base.form-switch>
    @error('checkbox')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Privacy Policy Field -->
<div class="mb-3">
    <x-base.form-input
        id="privacy_policy_hidden"
        name="privacy_policy"
        :value="0"
        type="hidden"
    />
    <x-base.form-check>
        <x-base.form-check.input
            class="{{ ($errors->has('privacy_policy') ? 'border-danger' : '') }}"
            id="privacy_policy"
            name="privacy_policy"
            :value="1"
            :checked="old('privacy_policy', $demo->privacy_policy ?? '') == 1"
            type="checkbox"
        />
        <x-base.form-check.label for="privacy_policy">{{ $demo->getAttributeLabel('privacy_policy') }}</x-base.form-check.label>
    </x-base.form-check>
    @error('privacy_policy')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label for="status">{{ $demo->getAttributeLabel('status') }}</x-base.form-label>
    <x-base.form-select
        class="w-full {{ ($errors->has('status') ? 'border-danger' : '') }}"
        id="status"
        name="status"
        :value="old('status', $demo->status ?? '')"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(\App\Models\Demo::getStatusArray() as $key => $label)
            <option value="{{ $key }}" {{ old('status', $demo->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('status')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
