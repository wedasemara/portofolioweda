@props(['label', 'name', 'value' => '', 'type' => 'text'])

@php
    $oldKey = str_replace(['[', ']'], ['.', ''], $name);
@endphp

<label class="block">
    <span class="mb-1.5 block text-xs font-medium uppercase tracking-wide text-neutral-400">{{ $label }}</span>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($oldKey, $value) }}"
        class="w-full rounded-lg border border-neutral-700 bg-neutral-900 px-3 py-2 text-sm text-neutral-100 placeholder:text-neutral-500 focus:border-lime-400 focus:outline-none focus:ring-1 focus:ring-lime-400"
    >
    @error($oldKey)
        <span class="mt-1 block text-xs text-red-400">{{ $message }}</span>
    @enderror
</label>
