<div class="gallery-photo inline-block mb-8 relative">
    @include('gallery.photo.header', compact('user', 'photo'))

    <img src="{{ $photo->url }}" alt="{{ $photo->title }}">

    @include('gallery.photo.footer')
</div>
