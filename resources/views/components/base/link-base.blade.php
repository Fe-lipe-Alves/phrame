<a
    href="{{ $to }}"
    {{ $attributes->merge(['class' => 'underline text-granite-gray hover:text-raisin-black']) }}
    {{ $attributes }}
>
    {{ $slot }}
</a>
