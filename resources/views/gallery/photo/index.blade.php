<div class="gallery-photo inline-block mb-8 relative">
    @include('gallery.photo.header', compact('photo'))

    <img src="{{ $photo->url }}" alt="{{ $photo->title }}">


    @include('gallery.photo.footer')
</div>
