<a
    href="{{ $to }}"
    {{ $attributes->merge(['class' => "button inline-block rounded disabled:opacity-50 flex items-center gap-2 $size $color"]) }}
    {{ $attributes }}
>
    {{ $slot }}
</a>
