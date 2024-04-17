<div class="flex flex-col gap-1">
    <x-base.label-base for="{{ $id }}">{{ $label }}</x-base.label-base>
    <x-base.input-base :$name :$type :$id {{ $attributes }} />

    @error($name)
    <x-form.input-feedback type="danger" :message="$message"/>
    @enderror
</div>
