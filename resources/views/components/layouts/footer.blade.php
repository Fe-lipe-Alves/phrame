<footer
    class="text-sm flex flex-col lg:flex-row gap-x-16 gap-y-2 items-center justify-center text-granite-gray mt-8"
>
    <nav>
        <ul class="order-2 lg:order-1 flex gap-8">
            <li>
                <x-base.link-base to="">{{ __('Privacy policy') }}</x-base.link-base>
            </li>
            <li>
                <x-base.link-base to="">{{ __('Terms of use') }}</x-base.link-base>
            </li>
            <li>
                <x-base.link-base to="">{{ __('Help Center') }}</x-base.link-base>
            </li>
        </ul>
    </nav>

    <div class="order-1 lg:order-2">
        <span>{{ date('Y') }} &copy; Phrame</span>
    </div>
</footer>
