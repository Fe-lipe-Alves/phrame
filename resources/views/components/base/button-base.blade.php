<button
    {{ $attributes->merge(['class' => "w-full rounded disabled:opacity-50 ". $sized()." ".$color]) }}
    {{ $attributes }}
>
    {{ $slot }}
</button>
