<!-- Demo Id Field -->
<div class="mb-3">
    <x-base.form-label for="demo_id">{{ $form->demo->getAttributeLabel('demo_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.demo_id') ? '!border-danger' : '') }}"
        id="demo_id"
        name="demo_id"
        wire:model="form.demo_id"
        type="number"
        step="1"
    />
    @error('form.demo_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- User Id Field -->
<div class="mb-3">
    <x-base.form-label for="user_id">{{ $form->demo->getAttributeLabel('user_id') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.user_id') ? '!border-danger' : '') }}"
        id="user_id"
        name="user_id"
        wire:model="form.user_id"
        type="number"
        step="1"
    />
    @error('form.user_id')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Name Field -->
<div class="mb-3">
    <x-base.form-label for="name">{{ $form->demo->getAttributeLabel('name') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.name') ? '!border-danger' : '') }}"
        id="name"
        name="name"
        wire:model="form.name"
        type="text"
    />
    @error('form.name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Body Field -->
<div class="mb-3">
    <x-base.form-label for="body">{{ $form->demo->getAttributeLabel('body') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('form.body') ? '!border-danger' : '') }}"
        id="body"
        name="body"
        rows="5"
        wire:model="form.body"
    ></x-base.form-textarea>
    @error('form.body')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Phone Field -->
<div class="mb-3" x-data="{ validationErrors: @entangle('validationErrors') }">
    <x-base.form-label for="phone">{{ $form->demo->getAttributeLabel('phone') }}</x-base.form-label>
    <div wire:ignore>
        <x-base.form-phone
            x-bind:class="{ '!border-danger': validationErrors['form.phone'] }"
            class="w-full"
            id="phone"
            name="phone"
            :value="$form->demo->phone"
            type="text"
            wire:model="form.phone"
        />
    </div>
    @error('form.phone')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Vat Field -->
<div class="mb-3">
    <x-base.form-label for="vat">{{ $form->demo->getAttributeLabel('vat') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.vat') ? '!border-danger' : '') }}"
        id="vat"
        name="vat"
        wire:model="form.vat"
        type="text"
    />
    @error('form.vat')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Zip Field -->
<div class="mb-3">
    <x-base.form-label for="zip">{{ $form->demo->getAttributeLabel('zip') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.zip') ? '!border-danger' : '') }}"
        id="zip"
        name="zip"
        wire:model="form.zip"
        type="text"
    />
    @error('form.zip')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Optional Field -->
<div class="mb-3">
    <x-base.form-label for="optional">{{ $form->demo->getAttributeLabel('optional') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.optional') ? '!border-danger' : '') }}"
        id="optional"
        name="optional"
        wire:model="form.optional"
        type="text"
    />
    @error('form.optional')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Body Optional Field -->
<div class="mb-3">
    <x-base.form-label for="body_optional">{{ $form->demo->getAttributeLabel('body_optional') }}</x-base.form-label>
    <x-base.form-textarea
        class="w-full {{ ($errors->has('form.body_optional') ? '!border-danger' : '') }}"
        id="body_optional"
        name="body_optional"
        rows="5"
        wire:model="form.body_optional"
    ></x-base.form-textarea>
    @error('form.body_optional')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Value Field -->
<div class="mb-3">
    <x-base.form-label for="value">{{ $form->demo->getAttributeLabel('value') }}</x-base.form-label>
    <x-base.form-input
        class="w-full {{ ($errors->has('form.value') ? '!border-danger' : '') }}"
        id="value"
        name="value"
        wire:model="form.value"
        type="number"
        step="1"
    />
    @error('form.value')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Date Field -->
<div class="mb-3">
    <x-base.form-label for="date">{{ $form->demo->getAttributeLabel('date') }}</x-base.form-label>
    <x-base.input-group
        class="flatpickr"
        data-wrap="true"
        data-enable-time="false"
        data-date-format='Y-m-d'
        data-time_24hr='true'
        data-minute-increment='1'
        inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle wire:ignore>
            <x-base.lucide

                class="h-5 w-5"
                icon="Calendar"
            />
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('form.date') ? '!border-danger' : '') }} [&[readonly]]:bg-white"
            id="date"
            name="date"
            wire:model="form.date"
            :value="$form->date"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear wire:ignore>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('form.date')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Datetime Field -->
<div class="mb-3">
    <x-base.form-label for="datetime">{{ $form->demo->getAttributeLabel('datetime') }}</x-base.form-label>
    <x-base.input-group
        class="flatpickr"
        data-wrap="true"
        data-enable-time="true"
        data-date-format='Y-m-d H:i'
        data-time_24hr='true'
        data-minute-increment='1'
        inputGroup
    >
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Toggle') }}" data-toggle wire:ignore>
            <x-base.lucide
                class="h-5 w-5"
                icon="Calendar"

            />
        </x-base.input-group.text>
        <x-base.flatpickr
            class="{{ ($errors->has('form.datetime') ? '!border-danger' : '') }} [&[readonly]]:bg-white"
            id="datetime"
            name="datetime"
            wire:model="form.datetime"
            :value="$form->datetime"
            data-input
        />
        <x-base.input-group.text class="cursor-pointer" title="{{ __('Clear') }}" data-clear wire:ignore>
            <x-base.lucide
                class="h-5 w-5 "
                icon="x"
            />
        </x-base.input-group.text>
    </x-base.input-group>
    @error('form.datetime')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Upload cover Field -->
<div class="mb-3">
    <livewire:files-upload
        wire:key="cover"
        inputName="cover"
        :isMultiple="false"
        maxFiles="1"
        maxFileSize="10240"
        :previousFiles="$form->previousCoverMedia"
        :label="__('Upload Cover')"
        acceptedFileTypes="image/*"
        :uploadFieldMainLabel="__('Upload an image')"
        wire:model="form.cover"
    />
</div>

<!-- Upload Files Field -->
<div class="mb-3">
    <livewire:files-upload
        wire:key="files"
        inputName="files"
        :isMultiple="true"
        maxFiles="10"
        maxFileSize="10240"
        :previousFiles="$form->previousFilesMedia"
        :label="__('Upload Files')"
        acceptedFileTypes="*/*"
        :uploadFieldMainLabel="__('Upload files')"
        wire:model="form.files"
    />
</div>


<!-- Checkbox Field -->
<div class="mb-3">
    <x-base.form-switch>
        <x-base.form-switch.input
            class="{{ ($errors->has('form.checkbox') ? '!border-danger' : '') }}"
            id="checkbox"
            name="checkbox"
            :value="1"
            wire:model="form.checkbox"
            type="checkbox"
        />
        <x-base.form-switch.label for="checkbox">{{ $form->demo->getAttributeLabel('checkbox') }}</x-base.form-switch.label>
    </x-base.form-switch>
    @error('form.checkbox')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Privacy Policy Field -->
<div class="mb-3">
    <x-base.form-check>
        <x-base.form-check.input
            class="{{ ($errors->has('form.privacy_policy') ? '!border-danger' : '') }}"
            id="privacy_policy"
            name="privacy_policy"
            :value="1"
            wire:model="form.privacy_policy"
            type="checkbox"
        />
        <x-base.form-check.label for="privacy_policy">{{ $form->demo->getAttributeLabel('privacy_policy') }}</x-base.form-check.label>
    </x-base.form-check>
    @error('form.privacy_policy')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- Status Field -->
<div class="mb-3">
    <x-base.form-label for="status">{{ $form->demo->getAttributeLabel('status') }}</x-base.form-label>
    <x-base.form-select
        class="w-full {{ ($errors->has('form.status') ? '!border-danger' : '') }}"
        id="status"
        name="status"
        wire:model="form.status"
        type="text"
    >
        <option >{{ __('Select an option') }}</option>
        @foreach(\App\Models\Demo::getStatusArray() as $key => $label)
            <option value="{{ $key }}" {{ old('status', $demo->status ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </x-base.form-select>
    @error('form.status')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
