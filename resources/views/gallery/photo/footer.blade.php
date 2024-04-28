<div
    class="gallery-photo-description w-full h-16 absolute invisible flex items-end bottom-0 p-2 bg-gradient-to-t from-gray-900/50">
    <div class="box-like flex justify-start items-center gap-2 text-white">
        @auth
            <x-base.button-base
                type="submit"
                size="sm"
                title="{{ $photo->liked_users_exists ? 'Remover Gostei' : 'Marcar como Gostei' }}"
                color="gray"
                onClick="handleLike(this, '{{ $photo->id }}')"
                class="btn-like !bg-transparent border-none rounded-full hover:!bg-gray-100/50 h-8 text-white flex place-content-center"
            >
                <span class="icon-like text-lg material-symbols-outlined {{ $photo->liked_users_exists ? 'to-fill-in' : '' }}">favorite</span>
                <small class="counter-like">{{ $photo->liked_users_count }}</small>
            </x-base.button-base>
        @else
            <span class="icon-like text-lg material-symbols-outlined">favorite</span>
            <small class="counter-like">{{ $photo->liked_users_count }}</small>
        @endauth
    </div>

    @pushOnce('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.1/axios.min.js"></script>
        <script>
            function toggleLike(button, liked) {
                const span = button.querySelector('.icon-like');
                const counter = button.querySelector('.counter-like');

                span.classList.toggle('to-fill-in', liked);
                span.classList.toggle('to-fill-out', !liked);
                button.title = liked ? 'Remover Gostei' : 'Marcar como Gostei';
                counter.innerHTML = parseInt(counter.innerHTML) + (!liked ? -1 : 1);
            }

            function handleLike(button) {
                button.disabled = true

                axios.post('{{ route('photo.like', compact('photo')) }}')
                    .then((response) => toggleLike(button, response.data?.action?.attached?.length))
                    .finally(() => button.disabled = false)
            }
        </script>
    @endPushOnce

</div>
