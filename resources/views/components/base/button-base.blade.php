<button
    {{ $attributes->merge(['class' => "w-full rounded disabled:opacity-50 flex items-center gap-2 $size $color"]) }}
    {{ $attributes }}
>
    {{ $slot }}
</button>
