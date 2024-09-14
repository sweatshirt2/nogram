@props(['fieldname', 'inputType', 'placeholder'])

<label class="block text-sm font-semibold" for="{{ $fieldname }}">{{ $slot }}</label>
<input type={{ isset($inputType) ? $inputType : 'text' }} name="{{ $fieldname }}" class="p-3 text-sm"
    placeholder="{{ $placeholder }}" value="{{ old($fieldname) }}">
@error($fieldname)
    <p class="text-xs text-red-600">{{ $message }}</p>
@enderror
